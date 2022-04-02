<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\product_size; 
use App\Models\product_sale;
use App\Models\product_brand; 
use App\Models\product_type;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use File;
use DateTime;
use Session;
use App\Imports\ImportsProduct;
use App\Exports\ExportsProduct;
use Excel;
use Illuminate\Support\Facades\Redirect;
use Toastr;

class ProductController extends Controller
{

    public function authenWath(){
        $admin_user = Session::get('Xem sản phẩm');

        if($admin_user){
            return Redirect::to('api/homes');
        }else{
            return Redirect::to('api/admin')->send();
        }
    }

    public function authenUpdate(){
        $admin_user = Session::get('Chỉnh sửa thông tin sản phẩm');

        if($admin_user){
            return Redirect::to('api/homes');
        }else{
            return Redirect::to('api/admin')->send();
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authenWath();
        $products = Product::with('product_Type','product_Size','product_Sale','product_Brand')->orderBy('ProductID','DESC')->where("Status","<>",2)->get();
        return view('admin.product.get_Products')->with(compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $type = product_type::where('Status',1)->get();
        $brand = product_brand::all();
        $sale = product_sale::all();
        $size = product_size::all();
        return response()->json(['data'=>$type,'brand'=>$brand, 'size'=>$size, 'sale'=>$sale],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authenUpdate();
        $products = Product::with('product_Type','product_Size','product_Sale','product_Brand')->orderBy('ProductID','DESC')->get();
        $product = new Product();
        $product -> ProductName = $request->name;
        $product -> ProductPrice = $request->price;
        $product -> ProductCount = $request->count;
        $product -> ProductName = $request->name;
        $product -> Size = $request->size;
        $product -> Type = $request->type;
        $product -> Brand = $request->brand;
        $product -> Sale = $request->sale;
        $product -> Note = $request->note;
        $product -> Status = 1;
        $product -> DefaultPrice = $request->pricedefaul;
        
        
        if($request['ImageUpload']){
            $ProductImage = $request['ImageUpload'];
            $ext = $ProductImage->getClientOriginalExtension();
            $name = time().'_'.$ProductImage->getClientOriginalName();
            Storage::disk('public')->put($name,File::get($ProductImage));
            $product->ProductImage = $name;
        }else{
            $product->ProductImage ='default.jpg';
        }
        $date = new DateTime();
        $product->ProductCreatedDate = $date;
        $product->save();
        Toastr::success('Thêm mới sản phẩm thành công', 'Thành công');
        
        return view('admin.product.get_Products')->with(compact('products'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $this->authenUpdate();
        $sales =product_sale::all();
        $sizes =product_size::all();
        $brands =product_brand::all();
        $types = product_type::all();
        $product = Product::find($id);
       
        return view('admin.product.edit_Product')->with(compact('product','types','brands','sizes','sales'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
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
        $products = Product::with('product_Type','product_Size','product_Sale','product_Brand')->orderBy('ProductID','DESC')->get();
        $this->authenUpdate();
        $product =  Product::find($id);
        $product -> ProductName = $request->name;
        $product -> ProductPrice = $request->price;
        $product -> ProductCount = $request->count;
        $product -> ProductName = $request->name;
        $product -> Size = $request->size;
        $product -> Type = $request->type;
        $product -> Brand = $request->brand;
        $product -> Sale = $request->sale;
        $product -> Note = $request->note;
        $product -> DefaultPrice = $request->pricedeafa;

        if($request['ImageUpload']){

            $ProductImage = $request['ImageUpload'];
            $ext = $ProductImage->getClientOriginalExtension();
            $name = time().'_'.$ProductImage->getClientOriginalName();
            Storage::disk('public')->put($name,File::get($ProductImage));
            $product->ProductImage = $name;
     
        }

        $product->save();
        Toastr::success('Cập nhật thông tin thành công', 'Thành công');
        
        return view('admin.product.get_Products')->with(compact('products'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $this->authenUpdate();
        $product = Product::find($id);
        $product -> Status = 2;
        $product -> save();
        return response()->json(['data'=>'removed'],200);
    }

    public function import_Excel(Request $request){
        $path = $request->file('file')->getRealPath();
        Excel::import(new ImportsProduct, $path);
        return back();
    }

    public function export_Excel(){
        return Excel::download(new ExportsProduct , 'product.xlsx');
    }
}
