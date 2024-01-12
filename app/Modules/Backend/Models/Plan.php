<?php

namespace App\Modules\Backend\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model {

    protected $table = 'plans';
    protected $fillable = [
        'id',
        'name',
        'price',
        'expiry_days',
        'daily_limit',
        'status',
        'is_archive',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function getList()
    {
        return Plan::where('is_archive',0)->orderBy('name', 'ASC');
    }

    public static function boot() {
        parent::boot();
        static::creating(function($user) {
           if(auth()->user()){
               $user->created_by = auth()->user()->id ?? null;
               $user->updated_by = auth()->user()->id ?? null;
           }
        });

        static::updating(function($user) {
           if(auth()->user())
               $user->updated_by = auth()->user()->id ?? null;
        });
    }

}
