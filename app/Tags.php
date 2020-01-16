<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    public function articles() {
    	return $this->belongsToMany(Articles::class);
    }
}
