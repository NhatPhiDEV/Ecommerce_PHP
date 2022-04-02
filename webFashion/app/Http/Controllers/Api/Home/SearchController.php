<?php

namespace App\Http\Controllers\Api\Home;

use App\Models\product_size; 
use App\Models\product_sale;
use App\Models\product_brand; 
use App\Models\product_type;
use App\Models\Product;
use App\Models\product_rating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function ajaxSearch (Request $request){

                $query = $request->get('query');
                $data = Product::where('ProductName','LIKE',"%{$query}%")->where("Status","<>",2)->orderBy('ProductName')->get();
        
                return response()->json(['data'=>$data],200);
    }
    public function searchDetail (Request $request){
        $data = $request->search;

        $types = product_type::where('Status',1)->get();
        $brands = product_brand::all();
        $sales = product_sale::all();
        $products = Product::where('ProductName','LIKE',"%{$data}%")->where("Status",1)->orderBy('ProductName')->simplePaginate(8);
  
        $productnew =  Product::with('product_Sale')->where('ProductCount','>',0)->where("Status",1)->limit(4)->get();
        
        return view('home.home.search_product')->with(compact('types','products','sales','brands','productnew'));
    }
    
    public function lowPrice($id)
    {
        $types = product_type::where('Status',1)->get();
        $brands = product_brand::all();
        $sales = product_sale::all();
        $products = Product::where('Type',$id)->where('ProductCount','>',0)->where("Status",1)->orderBy('ProductPrice','ASC')->simplePaginate(4);
        $ids = $id;
        $tag = product_type::find($id);
        $taglink = $tag->TypeName;
        $productnew =  Product::with('product_Sale')->where('Type' ,'<>', $id)->where('ProductCount','>',0)->where("Status",1)->limit(4)->get();
        return view('home.home.product_type')->with(compact('types','products','sales','brands','ids','productnew','taglink'));
    }

    public function highPrice($id)
    {
        $types = product_type::where('Status',1)->get();
        $brands = product_brand::all();
        $sales = product_sale::all();
        $products = Product::where('Type',$id)->where('ProductCount','>',0)->where("Status",1)->orderBy('ProductPrice','DESC')->simplePaginate(4);
        $ids = $id;
        $tag = product_type::find($id);
        $taglink = $tag->TypeName;
        $productnew =  Product::with('product_Sale')->where('Type' ,'<>', $id)->where('ProductCount','>',0)->where("Status",1)->limit(4)->get();
        return view('home.home.product_type')->with(compact('types','products','sales','brands','ids','productnew','taglink'));
    }
    
    public function popularPro($id)
    {
        $types = product_type::where('Status',1)->get();
        $brands = product_brand::all();
        $sales = product_sale::all();
        $products = Product::where('Type',$id)->where('ProductCount','>',0)->where("Status",1)->orderBy('ProductCount','ASC')->simplePaginate(4);
        $ids = $id;
        $tag = product_type::find($id);
        $taglink = $tag->TypeName;
        $productnew =  Product::with('product_Sale')->where('Type' ,'<>', $id)->where('ProductCount','>',0)->where("Status",1)->limit(4)->get();
        return view('home.home.product_type')->with(compact('types','products','sales','brands','ids','productnew','taglink'));
    }

    public function searchPrice($id, Request $request)
    {
        
        $priceto = $request -> dateto;
        $pricefrom = $request -> datefrom;

        $types = product_type::where('Status',1)->get();
        $brands = product_brand::all();
        $sales = product_sale::all();
        $products = Product::whereBetween('ProductPrice',[ $priceto,$pricefrom])->where('Type',$id)->where('ProductCount','>',0)->where("Status",1)->simplePaginate(4);
        $ids = $id;
        $tag = product_type::find($id);
        $taglink = $tag->TypeName;
        $productnew =  Product::with('product_Sale')->where('Type' ,'<>', $id)->where('ProductCount','>',0)->where("Status",1)->limit(4)->get();
        return view('home.home.product_type')->with(compact('types','products','sales','brands','ids','productnew','taglink'));
    }

    public function ratingProduct (Request $request){

        $data = $request->all();
        $idrate = $data['rating_id'];

        $rate = product_rating::find($idrate);
        $rate -> Status = 0 ;
        $rate -> Rate = $data['index'];
        $rate -> save();
        echo "done";
    }
    
}