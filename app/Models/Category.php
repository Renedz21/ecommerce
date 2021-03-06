<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //RELACION UNO A MUCHOS

    protected $guarded = [];

    public function subCategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    //RELACION MUCHOS A MUCHOS

    public function brands()
    {
        return $this->belongsToMany(Brand::class);
    }

    public function products()
    {
        return $this->hasManyThrough(Product::class, Subcategory::class);
    }
}
