<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $guarded = [];

    public function permissions() {
    	return $this->belongsToMany(Permission::class)->withTimestamps();
    }

    public function allowTo($permission){
    	$this->permissions()->save($permission);
    }

}  
