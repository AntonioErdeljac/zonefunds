<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }

    public $table = "ads";

    protected $fillable = ["ad_title"];
}
