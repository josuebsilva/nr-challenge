<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['id', 'title'];

    public function biddings(){
        return $this->hasMany(Bidding::class);
    }

}
