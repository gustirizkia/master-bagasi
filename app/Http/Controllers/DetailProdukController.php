<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailProdukController extends Controller
{
    public function index($slug){
        $product = Product::where('slug', $slug)->with('image', 'category', 'brand', 'discussion.comment')->first();
        if(!$product){
            return response()->json([
                'success' => false,
                'message' => 'product not found'
            ], 404);
        }

        $anotherProductCategory = Product::where('categori_id', $product->categori_id)->get();
        $anotherProductBrand = Product::where('brand_id', $product->brand_id)->get();

        $countRating = Rating::where('product_id', $product->id)->count();
        $rating = Rating::where('product_id', $product->id)->groupBy('count_star')->select('count_star as star', DB::raw("count(*) as total"))->get();
        foreach($rating as $index => $item){
            $rating[$index]->total ="$item->total"."/" ."$countRating";
        }

        return response()->json([
            'success' => true,
            'product' => $product,
            'rating' => $rating,
            'another_product_in_catgory' => $anotherProductCategory,
            'another_product_in_brand' => $anotherProductBrand
        ]);
    }
}
