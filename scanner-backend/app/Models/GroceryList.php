<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroceryList extends Model
{
    public $timestamps = false;

    use HasFactory;
    protected $table = 'grocery_list';
    protected $fillable = ['id', 'user_id', 'name'];
}
