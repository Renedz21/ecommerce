<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $guarded = [];

    //RELACION MUCHOS A MUCHOS

    public function Product()
    {
        return $this->belongsToMany(Product::class);
    }

    public function Size()
    {
        return $this->belongsToMany(Size::class);
    }
}
