<?php

namespace App\Http\Controllers\Api\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product_type;
use App\Models\news;
use App\Models\details_news;

class NewsController extends Controller
{
    public function news()
    {
        $types = product_type::where('Status',1)->get();
        $news = news::all(); 
        return view('home.news.mainNews')->with(compact('types','news'));
    }
    public function detailnews($id)
    {
        $types = product_type::where('Status',1)->get();
        $action = news::find($id);
        $action ->Action = $action ->Action + 1 ;
        $action -> save();
        $detailnews = details_news::where('NewsID', $id)->get();
        $news = news::where('NewsID', $id)->get();
        $newall = news::all(); 
        return view('home.news.postNews')->with(compact('types','detailnews','news','newall'));
    }
}
