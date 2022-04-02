<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;
use Storage;
use File;
class SlideController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $slides = Slide::all();
        return view('admin.slide.get_Slide')->with(compact('slides'));
    }

    /*
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
        $slide = new Slide();
        $slide -> SlideName = $request->name;
        $slide -> Status = 1;

        if($request['ImageUpload']){
            $SlideImage = $request['ImageUpload'];
            $ext = $SlideImage->getClientOriginalExtension();
            $name = time().'_'.$SlideImage->getClientOriginalName();
            Storage::disk('public')->put($name,File::get($SlideImage));
            $slide->SlideImage = $name;
        }else{
            $slide->SlideImage ='default.jpg';
        }

        $slide->save();

        return redirect()->back();
    }
    /*
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $slide = Slide::find($id);

        return view('admin.slide.edit_Slide')->with(compact('slide'));

    }

    /*
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slide =  Slide::find($id);
        $slide -> SlideName = $request->name;
        $slide -> Status = 1;
        if($request['ImageUpload']){

            $SlideImage = $request['ImageUpload'];
            $ext = $SlideImage->getClientOriginalExtension();
            $name = time().'_'.$SlideImage->getClientOriginalName();
            Storage::disk('public')->put($name,File::get($SlideImage));
            $slide->SlideImage = $name;

        }

        $slide->save();

        return redirect()->back();
    }

    /*
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Slide::find($id)->delete();
        return response()->json(['data'=>'removed'],200);
    }
}