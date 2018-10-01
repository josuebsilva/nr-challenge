<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bidding extends Model
{
    protected $table = 'biddings';
    protected $fillable = ['id','number', 'description', 'file', 'category_id'];

    public function categories(){
        return $this->belongsToMany(Category::class);
    }
}
