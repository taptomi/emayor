<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $fillable=['user_id','meta','method'];
    protected $casts=['meta'=>'object'];

    public function user(){

        return $this->hasOne(User::class,'id','user_id');

    }

}
