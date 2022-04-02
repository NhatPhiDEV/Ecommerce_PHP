<?php

namespace App\Http\Controllers\Api\Home;

use App\Models\Product;
use App\Models\product_type;
use App\Models\product_rating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
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
        $product_details = Product::with('product_Type','product_Size','product_Sale','product_Brand')->find($id);
        $type_pro = $product_details->Type;
        $product_relates = Product::with('product_Type','product_Size','product_Sale','product_Brand')->where('ProductID' ,'<>', $id)->where('Type', $type_pro)->limit(5)->get();
        $rating = product_rating::where('ProductID',$id)->where('Status',1)->avg('Rate');
        $rating = round($rating);
        $comment = product_rating::with('rating_customer')->where('ProductID',$id)->where('Status',1)->get();
    
        $taglink = $product_details->product_Type->TypeName;
        $taglinkid = $product_details->product_Type->Type;
        $actionpr = Product::find($id);
        $actionpr -> Action = $actionpr-> Action +1;
        $actionpr ->save();
        return view('home.home.product_details')->with(compact('types','product_details','product_relates','rating','comment','taglink','taglinkid'));
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
}
