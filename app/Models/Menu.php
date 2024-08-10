<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function carts(){
        return $this->belongsToMany(Cart::class,'cart_items','menu_id','cart_id');
    }

    public function cart_items(){
        return $this->hasMany(Cart_item::class);
    }

}
