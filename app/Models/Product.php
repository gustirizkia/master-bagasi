<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

     protected $appends = ['count_rating', 'terjual', 'thumbnail'];

     public function getTerjualAttribute(){
        $data = DB::table('detail_transactions')
            ->where('product_id', $this->id)
            ->join('transactions', 'detail_transactions.transaction_id', 'transactions.id')
            ->where('transactions.status', 'done')
            ->sum('detail_transactions.qty');
        return $data;
     }

     public function getThumbnailAttribute(){
        $image = DB::table('product_images')->where('product_id', $this->id)->where('is_thumbnail', 1)->orderByDesc('updated_at')->first();

        return $image;
     }

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
