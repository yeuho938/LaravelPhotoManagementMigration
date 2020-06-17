<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoDescription extends Model
{
    public function photos(){
    	return $this->hasOne("App\Photo","photo_id");
    }
}
