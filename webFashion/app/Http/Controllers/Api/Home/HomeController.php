<?php

namespace App\Http\Controllers\Api\Home;

use App\Models\product_size; 
use App\Models\product_sale;
use App\Models\product_brand; 
use App\Models\product_type;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slide;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = product_type::where('Status',1)->get();
        $slides = Slide::all();
        return view('home.home.pages')->with(compact('types','slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $types = product_type::where('Status',1)->get();
        $brands = product_brand::all();
        $sales = product_sale::all();
        $products = Product::where('Type',$id)->where('ProductCount','>',0)->where("Status",1)->simplePaginate(8);
        $ids = $id;
        $productnew =  Product::with('product_Sale')->where('Type' ,'<>', $id)->where('ProductCount','>',0)->where("Status",1)->limit(4)->get();
        $tag = product_type::find($id);
        $taglink = $tag->TypeName;
        return view('home.home.product_type')->with(compact('types','products','sales','brands','ids','productnew','taglink'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function contactHome(){
        $types = product_type::all();
        $slides = Slide::all();
        return view('home.home.contact')->with(compact('types','slides'));
    }
}
