@extends('home.layoutshome')
@section('home')
<div class="container">
        <div class="news" style="margin-top:125px">
          <div class="title" style="text-align: center;font-weight:bold">TIN TỨC</div>
          <div class="col-md-9 col-sm-8 col-xs-12">
            @foreach($news as $new)
                <h3>{{$new->TittleNews}}</h3>
                
                <p style="margin-top: 20px; font-size: 12px;">
                {!!$new->Description!!}
                </p>
            @endforeach

            @foreach($detailnews as $detail)
                <h3>{{$detail->DetailsTittle}}</h3>
                <hr style="border-top: 1px solid #555;">
                <p style="font-size: 12px;">{!!$detail->Description!!} </p>
                <p><img src="{{asset('/uploads/'.$detail->DetailsImage)}}" style="width:100%" alt=""></p>
            @endforeach
          </div>
          
          <div class="col-md-3 col-sm-4">
            <div class="panel panel-default">
              <div class="panel-heading">
                <p>Tin mới nhất</p>
              </div>
              <div class="panel-body">
              @foreach($newall as $newalls)
              <p>
                <ol>
                <a href="{{route('detail-news.detailnews',$newalls->NewsID)}}">
                    <?php 
                      $a = ucfirst(mb_strtolower($newalls->TittleNews,'UTF-8'));
                      echo $a;
                    ?>
                  </a>
                </ol>
              </p>
              @endforeach
              </div>
            </div>
          </div>
        </div>
        
      </div>
@endsection
