<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public $table = "cart";
    protected $fillable = ['product_id','user_id'];


    public function product(){
        return $this->belongsTo(Product::class, 'id');
    }


    public function User(){
        return $this->belongsTo(User::class, 'id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'id');
    }


}
