<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items'; //forcar o nome da tabela

    protected $fillable = ['order_id','product_id', 'price', 'qtd'];

    public function order()
    {
        return $this->belongsTo("CodeCommerce\Order");
    }
    public function product()
    {
        return $this->belongsTo('CodeCommerce\Product');
    }

}