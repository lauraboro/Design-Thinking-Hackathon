<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroceryListProducts extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'grocery_list_products';
    protected $fillable = ['id', 'grocery_list_id', 'product_name', 'product_barcode', 'product_quantity', 'product_image'];
}
