<!doctype html>
<html class="no-js">
     @section('htmlheader_social_meta')
        <!-- Schema.org markup para Google+ -->
        <meta itemprop="name" content="Campagnoni motores-electricos">
        <meta itemprop="description" content="{{ $headerValues['settings']['meta-description'] }}">
        <meta itemprop="image" content="http://www.campagnoni.com.ar/public/images/home/cat-motores.jpg">
         
        <!-- Twitter Card data -->
        <meta name="twitter:card" content="product">
        <!-- <meta name="twitter:site" content="@PUBLICADOR"> -->
        <meta name="twitter:title" content="Campagnoni motores-electricos">
        <meta name="twitter:description" content="{{ $headerValues['settings']['meta-description'] }}">
        <!-- <meta name="twitter:creator" content="@AUTOR"> -->
        <meta name="twitter:image" content="http://www.campagnoni.com.ar/public/images/home/cat-motores.jpg">
         
        <!-- Open Graph data -->
        <meta property="og:title" content="Campagnoni motores-electricos" />
        <meta property="og:type" content="website.category" />
        <meta property="og:url" content="http://www.campagnoni.com.ar/productos/motores-electricos/" />
        <meta property="og:image" content="http://www.campagnoni.com.ar/public/images/home/cat-motores.jpg" />
        <meta property="og:description" content="{{ $headerValues['settings']['meta-description'] }}" />
        <meta property="og:site_name" content="Campagnoni motores electricos" />
    @show
@include('partial.header')

<body id="custom-scroll"><!--[if lt IE 7]><p class="browsehappy">You are using an <strong>outdated</strong> browser.
    Please <a href="#">upgrade your browser</a> to improve your experience.</p><![endif]-->

@include('partial.header-menu')

<section id="header-category">
    <div class="hero-img" style="background-image:url(/images/motores/hero.jpg)"></div>
    <h1 class="category-name">Motores</h1></section>
    <div class="container">
    <section id="product-list" data-cat-color="#124a85">
        @foreach($products as $product)
        <article class="product-row">
            <div class="model">
                @foreach($product->attachments as $attachment)
                    @if($attachment->id == $product->img_thumbnail)
                        <div class="img" style="background-image:url({{ $attachment->url_path }});width=200px;"></div>
                    @endif
                @endforeach
                <div class="info"><p class="txt1">Modelo</p>
                    <h3>{{ ($product->attributes()->getBaseQuery()->where('key','=','37')->first())->value }}</h3></div>
            </div>
            <div class="power"><p class="txt1">Potencia</p>
                <p>{{ ($product->attributes()->getBaseQuery()->where('key','=','38')->first())->value }}</p></div>
            <div class="current"><p class="txt1">Corriente</p>
                <p>{{ ($product->attributes()->getBaseQuery()->where('key','=','39')->first())->value }}</p></div>
            <div class="capacitor"><p class="txt1">Capacitor</p>
                <p>{{ ($product->attributes()->getBaseQuery()->where('key','=','40')->first())->value }}</p></div>
            <div class="view-more"><a href="{{ route("single-product",['category'=>"motores-electricos", "product"=>$product->id, "name"=>str_replace('+','-',urlencode($product->name))]) }}">Ver más <i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
        </article>
        @endforeach
    </section>
</div>
@include('partial.home-footer')
</body>
</html>