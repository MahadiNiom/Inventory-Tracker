<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemOut extends Model
{
    /** @use HasFactory<\Database\Factories\ItemOutFactory> */
    use HasFactory;
    protected $fillable = [
        'item_id',
        'quantity',
        'price',
        'date',
        'customer_id',
    ];
    public function itemin()
    {
        return $this->belongsTo(ItemIn::class, 'item_in_id');
    }
}