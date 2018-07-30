<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;

use Illuminate\Contracts\Auth\Authenticatable;

class User extends Model implements Authenticatable
{
	use Notifiable;
	
    use \Illuminate\Auth\Authenticatable;

    public function ads()
    {
    	return $this->hasMany('App\Ad');
    }
}
