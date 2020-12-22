<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;

    protected $table = 'articles';

    protected $fillable=['al_desc','tr_desc','stock','pur_price','sale_price','age','image','user_id','prime_stock'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
