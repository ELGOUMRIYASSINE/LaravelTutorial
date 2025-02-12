<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $fillable = ['title','description','post_creator','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    // hna ila makentich adire f smiya dyal lfunction nefss smiya dyal table ly post belongs lih khass tzid f funciton parameters dyal foriegn key
    public function postCreator(){
        return $this->belongsTo(User::class,'user_id');
    }
}
