<?php

namespace App;

use App\Category;
use App\Size;
use App\Color;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
    
    public function size()
    {
        return $this->belongsTo(Size::class,'size_id','id');
    }
    public function color()
    {
        return $this->belongsTo(Color::class,'color_id','id');
    }
}
