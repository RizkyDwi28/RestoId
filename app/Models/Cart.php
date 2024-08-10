<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function status(){
        return $this->belongsTo(Status::class);
    }

    public function menus(){
        return $this->belongsToMany(Menu::class,'cart_items', 'cart_id', 'menu_id');
    }

    public function cart_items(){
        return $this->hasMany(Cart_item::class);
    }
}
