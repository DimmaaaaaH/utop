<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Threads extends Model
{
	public function path()
	{
		return 'threads/' . $this->id;
	}

	public function replies() :Reply
	{
		return $this->hasMany(Reply::class);
	}
}
