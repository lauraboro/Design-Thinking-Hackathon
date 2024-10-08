<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScannerUser extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'scanner_user';
    protected $fillable = ['id', 'user_id', 'scanner_id'];
}
