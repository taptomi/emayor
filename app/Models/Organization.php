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

    public function admins(){

        return $this->hasMany(OrganizationUser::class,'organization_id','id')->with('user');

    }

    public function posts()
    {

        return $this->hasMany(Post::class, 'organization_id', 'id');

    }

    public function faqs()
    {

        return $this->hasMany(FAQ::class, 'organizations_id', 'id');

    }

    public function products()
    {

        return $this->hasMany(Product::class, 'organizations_id', 'id');

    }

    public function catalogs()
    {

        return $this->hasMany(Catalog::class);

    }

    protected static function boot()
    {

        static::created(function ($model) {

            $defaultCatalog = new Catalog();

            $defaultCatalog->organization_id = $model->id;
            $defaultCatalog->name = "default";
            $defaultCatalog->save();

        });

        parent::boot();


        static::addGlobalScope(new OrganizationScope);
    }



}
