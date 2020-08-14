<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
	    'id',
		'name',
		'type',
	];

	public $timestamps = true;

	public function getAll()
    {
        return $this->all();
    }

    /**
     * @return mixed
     */
    public function getRecordTitle()
    {
        return $this->name;
    }
}
