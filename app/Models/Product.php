<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

     protected $appends = ['count_rating'];

    public function getCountRatingAttribute(){
           $rating = DB::table('ratings')->where('product_id', $this->id)->select(DB::raw("ROUND(AVG(count_star),1)as total_rating"))->get();
           return $rating[0]->total_rating;
    }

    public function image(){
        return $this->hasMany("App\Models\ProductImage");
    }
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
    public function brand(){
        return $this->belongsTo('App\Models\Brand');
    }
    public function discussion(){
        return $this->hasMany('App\Models\Discussion');
    }

    public function rating(){
        return $this->hasMany("App\Models\Rating");
    }

}
