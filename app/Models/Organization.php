<?php

namespace App\Models;

use App\Models\Scopes\OrganizationScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Organization extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = ['title', 'domain'];


    public function blocs()
    {

        return $this->hasMany(Blocs::class, 'organization_id', 'id');

    }

    public function documents()
    {

        return $this->hasMany(PublicDocument::class, 'organization_id', 'id');

    }

    public function users()
    {

        return $this->hasManyThrough(User::class, OrganizationUser::class, 'organization_id', 'id', 'id', 'user_id');

    }

    public function posts()
    {

        return $this->hasMany(Post::class, 'organization_id', 'id');

    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new OrganizationScope);
    }

}
