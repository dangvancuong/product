<?php

namespace App;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = [
	    'id',
		'name',
		'type',
		'category_id',
		'price',
		'size',
		'note',
		'note_1',
	];

	public $timestamps = true;

	protected $appends = ['category'];

	public function getAll()
    {
        return $this->all();
    }

    public function getCategoryAttribute(){
        return Category::all();
    }

    /**
     * @return mixed
     */
    public function getRecordTitle()
    {
        return $this->name;
    }
}
