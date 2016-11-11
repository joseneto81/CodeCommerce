<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id','name','description','price','featured','recommend'];

    public function category()
    {
        return $this->belongsTo('CodeCommerce\Category');
    }

    public function images()
    {
        return $this->hasMany('CodeCommerce\ProductImage');
    }

    public function tags()
    {
        return $this->belongsToMany('CodeCommerce\Tag', 'products_tags'); //segundo parametro serve quando o nome da tabela for no plural
    }

    //trabalhando com atributo dinamico
    public function getTagListAttribute()
    {
        $tags = $this->tags->lists('name')->toArray();
        return implode(', ',$tags);
    }

    public function getNameDescriptionAttribute()
    {
        return $this->name." - ".$this->description;
    }
}
