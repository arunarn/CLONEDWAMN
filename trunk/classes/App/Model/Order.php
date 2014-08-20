<?php

namespace App\Model;

class Order extends \PHPixie\ORM\Model {

    public $table = 'tbl_orders';
    public $id_field = 'id';

    protected $has_many = array(
        'orderItems' => array(
            'model' => 'orderItems',
            'key' => 'order_id'
        ),
        'orderAddress' => array(
            'model' => 'orderAddress',
            'key' => 'order_id'
        ),
    );

    public function getMyOrders()
    {
        $rows = $this->where('customer_id', $this->pixie->auth->user()->id)->find_all()->as_array();
        return $rows;
    }

    public function get($propertyName)
    {
        if ($propertyName == 'increment_id') {
            return $this->id + 10000000;
        }
    }

}