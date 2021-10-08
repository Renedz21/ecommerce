<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function Size()
    {
        return $this->hasMany(Size::class);
    }

    //RELACION UNO A MUCHOS INVERSA

    public function Brands()
    {
        return $this->belongsTo(Brand::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function Colors()
    {
        return $this->belongsToMany(Color::class);
    }

    //RELACION UNO A MUCHOS POLIMORFICA

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
