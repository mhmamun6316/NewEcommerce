<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'product_name', 'category_id', 'product_short_description','product_long_description','price','publication_status','deleted_at','product_image'
    ];
    
    public function category()
    {
        return $this->belongsTo('App\Category','id');
    }
}
