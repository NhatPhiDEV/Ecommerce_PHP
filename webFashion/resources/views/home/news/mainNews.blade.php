@extends('home.layoutshome')
@section('home')
<div class="container">
        <div class="news" style="margin-top:125px">
          <div class="title" style="text-align: center;font-weight:bold; margin-bottom:50px">TIN TỨC</div>
          <div class="col-md-9 col-sm-8 col-xs-12">
            <p style="margin-bottom:40px; font-weight:bold">Những tin tức nổi bật</p>
            <ul class="list-unstyled">
              <li>
              @foreach($news as $newss)
                <ul class="list-inline">
                  <li class="col-md-3 col-sm-4 col-xs-12" style="margin-bottom:-10px; margin-top:-10px" >
                    <a href="{{route('detail-news.detailnews',$newss->NewsID)}}"><img src="{{asset('/uploads/'.$newss->NewsImage)}}" style="height: 100%;width: 100%;"   alt=""></a>
                  </li>
                  <li class="col-md-9 col-sm-8 col-xs-12" style="margin-top:-5px"  >
                   <p style="font-weight: bold;">
                    <a style="color:black" href="{{route('detail-news.detailnews',$newss->NewsID)}}">{{$newss->TittleNews}}</a>
                   </p>
                    <div class="news_detail">
                      <p style="font-size: 13px;text-align:justify;">{!!$newss->Description!!}  </p>
                    </div>
                  </li>    
                </ul>
                <div class="clearfix"></div>
                <hr>
                @endforeach
              </li>
            </ul>
          </div>
          <div class="col-md-3 col-sm-4">
            <div class="panel panel-default">
              <div style="text-align:center" class="panel-heading">
                <p>Tin mới nhất</p>
              </div>
              <div class="panel-body">
                  @foreach($news as $newss)
                    <p>
                      <ol>
                        <a href="{{route('detail-news.detailnews',$newss->NewsID)}}">
                          <?php 
                            $a = ucfirst(mb_strtolower($newss->TittleNews,'UTF-8'));
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