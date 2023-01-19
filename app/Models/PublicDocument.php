<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicDocument extends Model
{
    use HasFactory;

    public function category(){

        return $this->belongsTo(PublicDocumentCategory::class,'category_id','id');

    }
}
