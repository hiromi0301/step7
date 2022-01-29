<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\ProductController;

class Product extends Model
{
    use HasFactory;

    //テーブル名
    protected $table = 'products';

    //可変項目
    protected $fillable =
    [
            'product_name',
            'content'
    ];
}
