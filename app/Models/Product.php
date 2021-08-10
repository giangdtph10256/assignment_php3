<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Chỉ định tên table trong trường hợp không đặt theo nguyên tắc của Eloquent
    protected $table = 'products';
    
    //Mặc định, Eloquent coi primary key là cột id
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'price',
        'image',
        'quantity',
        'category_id',
        
    ];
    public function Category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
