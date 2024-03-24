<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'user_id',
    ];
    public function user(){

        return $this->belongsTo(user::class);
    }


    public function properties(){

        return $this->hasMany(Property::class);
    }

}