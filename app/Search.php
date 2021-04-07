<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    protected $table='search';
    
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function category()
    {
        return $this->belongsTo('App\Category','category_id');
    }
    public function color()
    {
        return $this->belongsTo('App\Color','color_id');
    }
}
