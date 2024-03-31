<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'main_image',
        'other_images',
    ];

    public function mainImage() {
        return $this->hasOne(Picture::class, 'id', 'main_image');
    }

    public function additionalImages() {
        return $this->hasMany(Picture::class, 'item_id', 'id');
    }
}

