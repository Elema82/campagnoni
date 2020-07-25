<!doctype html>
<html class="no-js">
@section('htmlheader_social_meta')
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
<title>Campagnoni - Novedades - {{ $news->title }}</title>
<meta name="title" content="{{ $news->title }}">
<meta name="description" content="{{ $headerValues['settings']['meta-description'] }}">
<!-- Schema.org markup para Google+ -->
<meta itemprop="name" content="Campagnoni - Novedades - {{ $news->title }}">
@if($news->short_description) <meta itemprop="description" content="{{ $news->short_description }}"> @else
<meta name="twitter:description" content="{{ $headerValues['settings']['meta-description'] }}">  
@endif

@foreach($news->attachments()->getResults() as $images)
 @if($images->id == $news->img_principal) <meta itemprop="image" content="{{ $images->url_path }}" />@endif @endforeach
<!-- Twitter Card data -->
<meta name="twitter:card" content="product">
<!-- <meta name="twitter:site" content="@PUBLICADOR"> -->
<meta name="twitter:title" content="Campagnoni - Novedades - {{ $news->title }}">
@if($news->short_description) <meta itemprop="description" content="{{ $news->short_description }}"> @else <meta name="twitter:description" content="{{ $headerValues['settings']['meta-description'] }}"> @endif
<!-- <meta name="twitter:creator" content="@AUTOR"> -->
@foreach($news->attachments()->getResults() as $images)
@if($images->id == $news->img_principal) <meta name="twitter:image" content="{{ $images->url_path }}"> @endif @endforeach
<!-- Open Graph data -->
<meta property="og:title" content="Campagnoni - Novedades - {{ $news->title }}" />
<meta property="og:type" content="website.product" />
<meta property="og:url" content="{{ Request::url() }}" />
@foreach($news->attachments()->getResults() as $images)
@if($images->id == $news->img_principal) <meta property="og:image" content="{{ $images->url_path }}" /> @endif @endforeach
@if($news->short_description) <meta itemprop="description" content="{{ $news->short_description }}"> @else <meta name="twitter:description" content="{{ $headerValues['settings']['meta-description'] }}">  @endif
<meta property="og:site_name" content="Campagnoni - Novedades - {{ $news->title }}" />
@show
@include('partial.header')
<body id="custom-scroll"><!--[if lt IE 7]><p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade
   your browser</a> to improve your experience.</p><![endif]-->

@include('partial.header-menu')

<!-- Header category/product -->
<section id="header-category" style="height: 100px;background-color: white;">
{{--   <div class="hero-img" style="background-image: url('http://campagnoni.com.ar/public/images/news/hero_novedades.jpg')"></div>--}}
</section>
<!-- /Header category/product -->

<!-- Product content -->
<section class="single-product" style="padding-bottom: 66%;">
   <div class="container custom" style="background-color: #F4F4F4;">
      <div class="first-column" style="width: 50%;float: left;">
         <div class="img-responsive" style="padding: 10px;">
            @foreach($news->attachments()->getResults() as $images)
               @if($images->id == $news->img_principal)
                  <img src="{{ $images->url_path }}" alt="{{ $news->title }}" class="img-fluid">
               @endif
            @endforeach
         </div>
          <br><br>
          @if($news->video != '')
{{--              <div class="img-responsive" style="padding: 10px;text-align: center;">--}}
              <div class="video-responsive" style="padding: 10px;">
                  <iframe src="{{ $news->video }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
          @endif
      </div>
      <div class="second-column" style="width: 50%;float: right;min-height: 700px;">
          <hr class="product-info">
          <h1 class="product-title">{{ $news->title }}</h1>
          <hr>
          <div style="font-size: 14px !important;">
              <span>{{ $news->short_description }}</span>
              <br><br>
          </div>
          <div class="product-description" style="font-size: 16px !important;">
              <p style="padding: 10px;margin-top: 20px;">
                  @if($news->description)
                      {!! $news->description !!}
                  @endif
              </p>
          </div>
          <!-- Go to www.addthis.com/dashboard to customize your tools --> <div class="addthis_inline_share_toolbox"></div>
      </div>
      </div>
   </div>
</section>

<!-- slider products -->
@if(!empty($news->getImgsSlider()))
<section id="home-carousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <!-- {{  $i = 0 }} -->
        @foreach($news->getImgsSlider() as $image)
            <li data-target="#home-carousel" data-slide-to="{{$i}}"  class="@if($i == 0)active @endif"></li>
            <!-- {{ $i = $i + 1 }} -->
        @endforeach
    </ol>
    <div class="carousel-inner" role="listbox">
        <!-- {{ $i = 0 }} -->
        @foreach($news->getImgsSlider() as $image)
                <div class="carousel-item @if($i==0)active @endif">
                    <div class="img" style="background-image:url({{ $image->url_path }})">
                        <div></div>
                    </div>
                </div>
            <!-- {{ $i = $i + 1 }} -->
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#home-carousel" role="button" data-slide="prev">
        <i class="fa fa-angle-left" aria-hidden="true"></i>
        <span class="sr-only">Anterior</span> </a>
    <a class="carousel-control-next" href="#home-carousel" role="button" data-slide="next">
        <i class="fa fa-angle-right" aria-hidden="true"></i>
        <span class="sr-only">Siguiente</span></a>
</section>
@endif
<!-- slider products -->

<div class="color-band" style="background-color: #124A85; margin-top: 10px;">
    <p><a href="{{ route("contact") }}" style="color:white; ">Queres comunicarte con nosotros? Dejanos tu mensaje</a> </p>
</div>

@include('partial.home-footer')

<!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5d5dc56efc824a34"></script>

</body>
</html>