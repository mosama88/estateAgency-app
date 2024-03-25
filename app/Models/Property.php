<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'address',
        'details',
        'price',
        'floor',
        'hall',
        'space',
        'room',
        'Baths',
        'Kitchen',
        'image_1',
        'image_2',
        'image_3',
        'type',
        'status',
        'project_id',
        'user_id',
    ];


    public function project(){

        return $this->belongsTo(Project::class);
    }


    public function user(){

        return $this->belongsTo(User::class);
    }

    public function image_1(){
        if($this->image_1){
            return asset($this->image_1);
        }
        return asset("defaultproperty.png");
}
public function image_2(){
    if($this->image_2){
        return asset($this->image_2);
    }
    return asset("defaultproperty.png");
}
public function image_3(){
    if($this->image_3){
        return asset($this->image_3);
    }
    return asset("defaultproperty.png");
}

}
