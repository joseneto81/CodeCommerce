<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

    public function products()
    {
        return $this->belongsToMany('CodeCommerce\Product', 'products_tags'); //segundo parametro serve quando o nome da tabela for no plural
    }

}
