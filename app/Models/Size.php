<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $guarded = [];

    //RELACION UNO A MUCHOS INVERSA

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    //RELACION MUCHOS A MUCHOS

    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }
}
