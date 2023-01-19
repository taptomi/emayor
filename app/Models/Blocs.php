<?php

namespace App\Models;

use App\Models\Scopes\OrganizationScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blocs extends Model
{
    use HasFactory;


    protected $fillable=['content','shortname'];

    public function organization(){

        return $this->belongsTo(Organization::class,'organization_id','id');

    }


}
