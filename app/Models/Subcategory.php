<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    //UNO A MUCHOS

    public function Products()
    {
        return $this->hasMany(Product::class);
    }

    //UNO A MUCHOS INVERSA

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
}
