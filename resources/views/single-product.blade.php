<!doctype html>
<html class="no-js">
@section('htmlheader_social_meta')
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
<title>Campagnoni  {{ strtolower($category) }} - {{ $product->name }}</title>
<meta name="title" content="{{ $product->name }}">
<meta name="description" content="{{ $headerValues['settings']['meta-description'] }}">
<!-- Schema.org markup para Google+ -->
<meta itemprop="name" content="Campagnoni  {{ strtolower($category) }} - {{ $product->name }}">
@if($product->description) <meta itemprop="description" content="{{ $product->description }}"> @else
<meta name="twitter:description" content="{{ $headerValues['settings']['meta-description'] }}">  
@endif

@foreach($product->attachments()->getResults() as $images)
 @if($images->id == $product->img_principal) <meta itemprop="image" content="{{ $images->url_path }}" />@endif @endforeach
<!-- Twitter Card data -->
<meta name="twitter:card" content="product">
<!-- <meta name="twitter:site" content="@PUBLICADOR"> -->
<meta name="twitter:title" content="Campagnoni - {{ strtolower($category) }} - {{ $product->name }}">
@if($product->description) <meta itemprop="description" content="{{ $product->description }}"> @else <meta name="twitter:description" content="{{ $headerValues['settings']['meta-description'] }}"> @endif
<!-- <meta name="twitter:creator" content="@AUTOR"> -->
@foreach($product->attachments()->getResults() as $images)
@if($images->id == $product->img_principal) <meta name="twitter:image" content="{{ $images->url_path }}"> @endif @endforeach
<!-- Open Graph data -->
<meta property="og:title" content="Campagnoni - {{ strtolower($category) }} - {{ $product->name }}" />
<meta property="og:type" content="website.product" />
<meta property="og:url" content="{{ Request::url() }}" />
@foreach($product->attachments()->getResults() as $images)
@if($images->id == $product->img_principal) <meta property="og:image" content="{{ $images->url_path }}" /> @endif @endforeach
@if($product->description) <meta itemprop="description" content="{{ $product->description }}"> @else <meta name="twitter:description" content="{{ $headerValues['settings']['meta-description'] }}">  @endif
<meta property="og:site_name" content="Campagnoni - {{ strtolower($category) }} - {{ $product->name }}" />
@show
@include('partial.header')
<body id="custom-scroll"><!--[if lt IE 7]><p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade
   your browser</a> to improve your experience.</p><![endif]-->

@include('partial.header-menu')

<!-- Header category/product -->
<section id="header-category">
   <div class="hero-img" style="background-image: url('/images/{{ strtolower($category) }}/hero.jpg')"></div>
   <h1 class="category-name">{{ $category }}</h1>
</section>
<!-- /Header category/product -->

<!-- Product content -->
<section class="single-product">
   <div class="container custom">
      <div class="first-row">
         <div class="img">
            @foreach($product->attachments()->getResults() as $images)
               @if($images->id == $product->img_principal)
               <div style="background-image: url('{{ $images->url_path }}')">
                      <img src="{{ $images->url_path }}" alt="{{ $product->name }}" class="img-fluid" style="opacity: 0">
               </div>
               @endif
            @endforeach
         </div>
         <div class="product-info">
            <div class="title">
               <p>{{ $name[0] }}</p>
               <h2>{{ $name[1] }} @if(isset($name[2])) {{ $name[2] }}@endif @if(isset($name[3])) {{ $name[3] }}@endif @if(isset($name[4])) {{ $name[4] }}@endif @if(isset($name[5])) {{ $name[5] }}@endif @if(isset($name[6])) {{ $name[6] }}@endif</h2>
            </div>
            <div class="description">
                <p>
                  @if($product->description)
                    {{ $product->description }}
                  @endif
               </p>
            </div>
         </div>
      </div>
   </div>
   <div class="container">
      <div class="product-detail">
         <div class="title">
            <p>Especificaciones<br/>
               Técnicas
            </p>
         </div>
         <div class="table">
            @foreach($product->attributes()->getResults() as $attribute)
            <div class="item-row">
                @if($attribute->value != '')
                   <div class="name">
                      <p>
                         {{ $attribute->category()->getResults()->key }}
                      </p>
                   </div>
                   <div class="value">
                      <p>{{ $attribute->value }}</p>
                   </div>
                @endif
            </div>
            @endforeach
         </div>
      </div>
   </div>
</section>


<!-- slider products -->
@if(!empty($product->getImgsSlider()))
<section id="home-carousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <!-- {{  $i = 0 }} -->
        @foreach($product->getImgsSlider() as $image)
            <li data-target="#home-carousel" data-slide-to="{{$i}}"  class="@if($i == 0)active @endif"></li>
            <!-- {{ $i = $i + 1 }} -->
        @endforeach
    </ol>
    <div class="carousel-inner" role="listbox">
        <!-- {{ $i = 0 }} -->
        @foreach($product->getImgsSlider() as $image)
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

<!-- /Product content -->
@if(strtolower($category) == 'jardin')
    <div class="color-band">
       <p>Productos comercializados</p>
       <p>bajo la marca</p>
       <img src="/images/jardin/charihue.png" alt="Carihue">
    </div>
@endif

@if(preg_match('/airtec/',strtolower($product->name)))
    <div class="color-band" style="background-color: #34b3b1">
        <p>Productos comercializados</p>
        <p>bajo la marca</p>
        <img src="/images/ventilacion/marcaAirtec.png" alt="Airtec">
    </div>
@endif

@include('partial.home-footer')

</body>
</html>