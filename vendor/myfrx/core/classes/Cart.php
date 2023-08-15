<?php

namespace myfrx;


class Cart
{
    protected $do;
    protected $type;
    protected $id;
    protected $do_list = ['show', 'delete', 'deleteall', 'add'];
    protected $type_list = ['show', 'phones', 'tablets', 'laptops'];

    public function __construct()
    {
        $this->do = $_GET['do'] ?? 'show';
        $this->type = $_GET['type'] ?? 'show';
        $this->id = $_GET['id'] ?? 'show';
        if (!in_array($this->type, $this->type_list)) {
            $this->type = 'show';
        }
        if (!in_array($this->do, $this->do_list)) {
            $this->do = 'show';
        }
        if ($this->do !== 'show') {
            $this->do($this->do, $this->type, $this->id);
        }
    }

    protected function do($do, $type, $id)
    {
        $this->$do($type, $id);
    }

    protected function add($type, $id)
    {
        global $db;
        if (!isset($_SESSION['cart'][$type][$id])) {
            if ($type === 'show') {
                abort();
            } else {
                $_SESSION['cart'][$type][$id] = $db->query("SELECT * FROM $type WHERE id = ? LIMIT 1", [$id])->findOrFail();
            }
        }
    }

    protected function delete($type, $id)
    {
        if (isset($_SESSION['cart'][$type][$id])) {
            unset($_SESSION['cart'][$type][$id]);
            if (empty($_SESSION['cart']['phones']) && empty($_SESSION['cart']['tablets']) && empty($_SESSION['cart']['laptops'])) {
                $this->deleteall($type, $id);
            }
        }
    }

    protected function deleteall($type, $id)
    {
        if (isset($_SESSION['cart'])) {
            unset($_SESSION['cart']);
        }
    }
}
