<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['slug', 'title', 'content', 'user_id', 'organization_id'];

    public function author()
    {

        return $this->hasOne(User::class, 'id', 'user_id');

    }

    public function organization()
    {

        return $this->hasOne(Organization::class, 'id', 'organization_id');

    }

}
