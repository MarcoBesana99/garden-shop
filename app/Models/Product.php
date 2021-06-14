<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Product extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    public $translatedAttributes = ['name', 'description', 'slug', 'sizes', 'features'];
    protected $fillable = ['images_path','category_id'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function descriptions() {
        return $this->hasMany(Description::class);
    }
}
