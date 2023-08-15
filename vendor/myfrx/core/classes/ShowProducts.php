<?php

namespace myfrx;

class ShowProducts
{
    protected $show_list = ['all', 'phones', 'laptops', 'tablets'];
    protected $show_type;

    public function __construct()
    {
        $this->show_type = $_GET['show'] ?? 'all';
        if (!in_array($this->show_type, $this->show_list)) {
            $this->show_type = 'all';
        }
    }

    public function show()
    {
        $show_type = $this->show_type;
        return $this->$show_type();
    }

    protected function all()
    {
        global $db;
        $phones = $db->query("SELECT * FROM phones")->findAll();
        $tablets = $db->query("SELECT * FROM tablets")->findAll();
        $laptops = $db->query("SELECT * FROM laptops")->findAll();
        $html = '';
        foreach ($phones as $key => $value) {
            $html .= "<div class='main-card effect-block'>";
            $html .=    "<img src='/assets/img/productimg/" . h($value['tmpimage']) . "' alt='Phone-image'>";
            $html .=    "<div class='card-title'>" . h($value['title'])  . "</div>";
            $html .=    "<div class='card-desc'>" . h($value['excerpt'])  . "</div>";
            $html .=    "<a class='card-price' href='product/phones?id=" . $value['id']  . "'>" . h($value['price'])  . " $</a>";
            $html .=    "<a class='card-add' href='cart?do=add&type=phones&id=" . $value['id']  . "'>Add to cart</a>";
            $html .= "</div>";
        }
        foreach ($tablets as $key => $value) {
            $html .= "<div class='main-card effect-block'>";
            $html .=    "<img src='/assets/img/productimg/" . h($value['tmpimage']) . "' alt='Table-image'>";
            $html .=    "<div class='card-title'>" . h($value['title'])  . "</div>";
            $html .=    "<div class='card-desc'>" . h($value['excerpt']) . "</div>";
            $html .=    "<a class='card-price' href='product/tablets?id=" . $value['id'] . "'>" . h($value['price']) . " $</a>";
            $html .=    "<a class='card-add' href='cart?do=add&type=tablets&id=" .  $value['id'] . "'>Add to cart</a>";
            $html .= "</div>";
        }
        foreach ($laptops as $key => $value) {
            $html .= "<div class='main-card effect-block'>";
            $html .=    "<img src='/assets/img/productimg/" . h($value['tmpimage']) . "' alt='Laptop-image'>";
            $html .=    "<div class='card-title'>" . h($value['title'])  . "</div>";
            $html .=    "<div class='card-desc'>" . h($value['excerpt'])  . "</div>";
            $html .=    "<a class='card-price' href='product/laptops?id=" . $value['id'] . "'>" . h($value['price']) . " $</a>";
            $html .=    "<a class='card-add' href='cart?do=add&type=laptops&id=" .  $value['id'] . "'>Add to cart</a>";
            $html .= "</div>";
        }
        return $html;
    }

    protected function phones()
    {
        global $db;
        $phones = $db->query("SELECT * FROM phones")->findAll();
        $html = '';
        foreach ($phones as $key => $value) {
            $html .= "<div class='main-card effect-block'>";
            $html .=    "<img src='/assets/img/productimg/" . h($value['tmpimage']) . "' alt='Phone-image'>";
            $html .=    "<div class='card-title'>" . h($value['title'])  . "</div>";
            $html .=    "<div class='card-desc'>" . h($value['excerpt'])  . "</div>";
            $html .=    "<a class='card-price' href='product/phones?id=" . $value['id'] . "'>" . h($value['price']) . " $</a>";
            $html .=    "<a class='card-add' href='cart?do=add&type=phones&id=" .  $value['id'] . "'>Add to cart</a>";
            $html .= "</div>";
        }
        return $html;
    }

    protected function laptops()
    {
        global $db;
        $laptops = $db->query("SELECT * FROM laptops")->findAll();
        $html = '';
        foreach ($laptops as $key => $value) {
            $html .= "<div class='main-card effect-block'>";
            $html .=    "<img src='/assets/img/productimg/" . h($value['tmpimage']) . "' alt='Laptop-image'>";
            $html .=    "<div class='card-title'>" . h($value['title'])  . "</div>";
            $html .=    "<div class='card-desc'>" . h($value['excerpt'])  . "</div>";
            $html .=    "<a class='card-price' href='product/laptops?id=" . $value['id'] . "'>" . h($value['price']) . " $</a>";
            $html .=    "<a class='card-add' href='cart?do=add&type=laptops&id=" .  $value['id'] . "'>Add to cart</a>";
            $html .= "</div>";
        }
        return $html;
    }

    protected function tablets()
    {
        global $db;
        $tablets = $db->query("SELECT * FROM tablets")->findAll();
        $html = '';
        foreach ($tablets as $key => $value) {
            $html .= "<div class='main-card effect-block'>";
            $html .=    "<img src='/assets/img/productimg/" . h($value['tmpimage']) . "' alt='Table-image'>";
            $html .=    "<div class='card-title'>" . h($value['title'])  . "</div>";
            $html .=    "<div class='card-desc'>" . h($value['excerpt']) . "</div>";
            $html .=    "<a class='card-price' href='product/tablets?id=" . $value['id'] . "'>" . h($value['price']) . " $</a>";
            $html .=    "<a class='card-add' href='cart?do=add&type=tablets&id=" .  $value['id'] . "'>Add to cart</a>";
            $html .= "</div>";
        }
        return $html;
    }
}
