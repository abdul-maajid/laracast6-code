<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function user() {
    	return $this->blongsTo(User::class);
    }
}
