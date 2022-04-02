@extends('home.layoutshome')
@section('home')
    <section class="sliders">

                <div class="aspect-ratio-169">
                @foreach($slides as $slide)
                    <img src="{{asset('/uploads/'.$slide->SlideImage)}}" alt="">

                @endforeach

                </div>
                <div class="dot-container">
                    <div class="dot active"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                </div>
    </section>
@endsection