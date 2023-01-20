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

    public static function boot(){

        static::creating(function ($model) {
            $log = new Log();
            $log->user_id=auth()->user()->id;
            $log->method = 'create';
            $model->model='Blocs';
            $log->meta = $model;
            $log->save();
        });

        static::updating(function ($model) {
            $log = new Log();
            $log->user_id=auth()->user()->id;
            $log->method = 'update';
            $model->model='Blocs';
            $log->meta = $model;
            $log->save();
        });

        static::deleting(function ($model) {
            $log = new Log();
            $log->user_id=auth()->user()->id;
            $log->method = 'delete';
            $data=$model;
            $data->model='Blocs';
            $log->meta = $data;
            $log->save();
        });

        parent::boot();




    }


}
