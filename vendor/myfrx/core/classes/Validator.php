<?php

namespace myfrx;

class Validator
{
    protected $errors = [];
    protected $data_items;
    protected $rules_list = ['required', 'min', 'max', 'int', 'email', 'match', 'unique'];
    protected $messages = [
        'required' => 'The :fieldname: field must be required',
        'min' => 'The :fieldname: field must have at least :rulevalue: characters',
        'max' => 'The :fieldname: field must have a maximum of :rulevalue: characters',
        'email' => 'Here you need to enter your email',
        'match' => 'The :fieldname: field must match the :rulevalue: field',
        'int' => 'The :fieldname: field must contain a number',
        'unique' => 'Field :fieldname: must be unique',
    ];

    public function validate($data = [], $rules = [])
    {
        $this->data_items = $data;
        foreach ($data as $filedname => $value) {
            if (isset($rules[$filedname])) {
                $this->check([
                    'fieldname' => $filedname,
                    'value' => $value,
                    'rules' => $rules[$filedname],
                ]);
            }
        }
        return $this;
    }

    protected function check($field)
    {
        foreach ($field['rules'] as $rule => $rule_value) {
            if (in_array($rule, $this->rules_list)) {
                if (!call_user_func_array([$this, $rule], [$field['value'], $rule_value])) {
                    $this->addError($field['fieldname'], str_replace([':fieldname:', ':rulevalue:'], [$field['fieldname'], $rule_value], $this->messages[$rule]));
                }
            }
        }
    }

    protected function addError($filedname, $error)
    {
        $this->errors[$filedname][] = $error;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function listErrors($fieldname)
    {
        $output = '';
        if (isset($this->errors[$fieldname])) {
            $output .= "<div class='error-form-div'><ul class='error-form-ul'>";
            foreach ($this->errors[$fieldname] as $error) {
                $output .= "<li>$error</li>";
            }
            $output .= '</ul></div>';
        }
        return $output;
    }

    public function hasErrors()
    {
        return !empty($this->errors);
    }

    protected function required($value, $rule_value)
    {
        return !empty(trim($value));
    }

    protected function min($value, $rule_value)
    {
        return mb_strlen($value, 'UTF-8') >= $rule_value;
    }

    protected function max($value, $rule_value)
    {
        return mb_strlen($value, 'UTF-8') <= $rule_value;
    }

    protected function email($value, $rule_value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    protected function int($value, $rule_value)
    {
        return is_numeric($value);
    }

    protected function unique($value, $rule_value)
    {
        global $db;
        $data = explode(':', $rule_value);
        return (!$db->query("SELECT {$data[1]} FROM {$data[0]} WHERE {$data[1]} = ?", [$value])->getColumn());
    }

    protected function match($value, $rule_value)
    {
        return $value === $this->data_items[$rule_value];
    }
}
