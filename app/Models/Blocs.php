<?php

namespace App\Models;

use App\Models\Scopes\OrganizationScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Blocs extends Model
{
    use HasFactory;


    protected $fillable=['content','shortname'];

    public function organization(){

        return $this->belongsTo(Organization::class,'organization_id','id');

    }

    public static function boot(){
        if(Schema::hasTable('logs')&&Schema::hasTable('blocs')){

        static::creating(function ($model) {
            $log = new Log();
            $log->user_id=auth()->user()->id;
            $log->method = 'create';
            $data=$model;
            $data->ip=request()->ip();
            $data->model='Blocs';
            $log->save();
        });

        static::updating(function ($model) {
            $log = new Log();
            $log->user_id=auth()->user()->id;
            $log->method = 'update';
            $data=$model;
            $data->ip=request()->ip();
            $data->model='Blocs';
            $log->save();
        });

        static::deleting(function ($model) {
            $log = new Log();
            $log->user_id=auth()->user()->id;
            $log->method = 'delete';
            $data=$model;
            $data->ip=request()->ip();
            $data->model='Blocs';
            $log->meta = $data;
            $log->save();
        });


        }

        parent::boot();




    }


}
