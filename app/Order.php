<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'name', 'email', 'total','phone','address', 'payment'
    ]; 

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
