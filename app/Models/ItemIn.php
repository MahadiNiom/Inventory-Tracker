<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemIn extends Model
{
    /** @use HasFactory<\Database\Factories\ItemInFactory> */
    use HasFactory;
    protected $fillable = [
        'item_id',
        'quantity',
        'price',
        'date',
        'supplier_id',
    ]; 
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
    public function itemOuts()
    {
        return $this->hasMany(ItemOut::class, 'item_in_id');
    }
}