<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /** @use HasFactory<\Database\Factories\ItemFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'quantity',
        'price',
        'category_id',
    ];
    public function itemIns()
    {
        return $this->hasMany(ItemIn::class);
    }
}