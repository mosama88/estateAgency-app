<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'description',
        'image',
        'location',
        'user_id',
    ];
    public function user(){

        return $this->belongsTo(user::class);
    }


    public function properties(){

        return $this->hasMany(Property::class);
    }

    public function image(){
        if($this->image){
            return asset($this->image);
        }
        return asset("defaultproject.png");
    }

}


