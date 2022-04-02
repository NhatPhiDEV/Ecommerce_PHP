<?php

namespace App\Http\Controllers\Api\Home;

use App\Models\product_type;
use App\Models\product_brand;
use App\Models\product_sale;
use App\Models\product_size;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        //
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
        $products = Product::where('Sale',$id)->simplePaginate(8);
        $ids = $id;
        $tag = product_sale::find($id);
        $taglink = $tag->SaleName;
        $productnew =  Product::with('product_Sale')->where('Sale' ,'<>', $id)->where('ProductCount','>',0)->where("Status",1)->limit(4)->get();
        return view('home.home.product_sale')->with(compact('types','products','sales','brands','ids','productnew','taglink'));
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
        Cart::update($rowId,0);
        return Redirect::to('api/carts');
    }
}
