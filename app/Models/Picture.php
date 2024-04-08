<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    protected $fillable = [
        'filename', 
        'item_id',
    ];

    public function item() {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }
}

