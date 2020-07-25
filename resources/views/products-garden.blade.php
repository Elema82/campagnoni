<!doctype html>
<html class="no-js">
     @section('htmlheader_social_meta')
        <!-- Schema.org markup para Google+ -->
        <meta itemprop="name" content="Campagnoni jardin">
        <meta itemprop="description" content="{{ $headerValues['settings']['meta-description'] }}">
        <meta itemprop="image" content="http://www.campagnoni.com.ar/public/images/jardin/hero.jpg">
         
        <!-- Twitter Card data -->
        <meta name="twitter:card" content="product">
        <!-- <meta name="twitter:site" content="@PUBLICADOR"> -->
        <meta name="twitter:title" content="Campagnoni jardin">
        <meta name="twitter:description" content="{{ $headerValues['settings']['meta-description'] }}">
        <!-- <meta name="twitter:creator" content="@AUTOR"> -->
        <meta name="twitter:image" content="http://www.campagnoni.com.ar/public/images/jardin/hero.jpg">
         
        <!-- Open Graph data -->
        <meta property="og:title" content="Campagnoni jardin" />
        <meta property="og:type" content="website.category" />
        <meta property="og:url" content="http://www.campagnoni.com.ar/productos/jardin/" />
        <meta property="og:image" content="http://www.campagnoni.com.ar/public/images/jardin/hero.jpg" />
        <meta property="og:description" content="{{ $headerValues['settings']['meta-description'] }}" />
        <meta property="og:site_name" content="Campagnoni jardin" />
    @show
@include('partial.header')

<body id="custom-scroll"><!--[if lt IE 7]><p class="browsehappy">You are using an <strong>outdated</strong> browser.
    Please <a href="#">upgrade your browser</a> to improve your experience.</p><![endif]-->

@include('partial.header-menu')

<section id="header-category">
    <div class="hero-img" style="background-image:url(/images/jardin/hero.jpg)"></div>
    <h1 class="category-name">Jardín</h1></section>
<div class="container">
    <section id="product-list" data-cat-color="#219d39">
        <div id="product-tabs" class="product-row" data-cat-color="#219d39">
            <div class="tabs">
                <div><a href="#bordeadoras" class="active">Bordeadoras</a></div>
                <div><a href="#cortadoras">Cortadoras</a></div>
            </div>
        </div>
        <div id="bordeadoras" class="tab-content active">
            @foreach($products1 as $product)
            <article class="product-row">
                <div class="model">
                    @foreach($product->attachments as $attachment)
                        @if($attachment->id == $product->img_thumbnail)
                            <div class="img" style="background-image:url({{ $attachment->url_path }});width=200px;"></div>
                        @endif
                    @endforeach
                    <div class="info"><p class="txt1">Modelo</p>
                        <h3>{{ ($product->attributes()->getBaseQuery()->where('key','=','16')->first())->value }}</h3></div>
                </div>
                <div class="power"><p class="txt1">Potencia Máxima (W)</p>
                    <p>{{ ($product->attributes()->getBaseQuery()->where('key','=','17')->first())->value }}</p></div>
                <div class="current"><p class="txt1">Material de Carcasa</p>
                    <p>{{ ($product->attributes()->getBaseQuery()->where('key','=','18')->first())->value }}</p></div>
                <div class="capacitor"><p class="txt1">Diametro de corte</p>
                    <p>{{ ($product->attributes()->getBaseQuery()->where('key','=','19')->first())->value }}</p></div>
                <div class="view-more"><a href="{{ route("single-product",['category'=>"jardin-bordeadoras", "product"=>$product->id, "name"=>str_replace('+','-',urlencode(($product->attributes()->getBaseQuery()->where('key','=','16')->first())->value))]) }}">Ver más <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                </div>
            </article>
            @endforeach
        </div>
        <div id="cortadoras" class="tab-content">
            @foreach($products2 as $product)
                <article class="product-row">
                    <div class="model">
                        @foreach($product->attachments as $attachment)
                            @if($attachment->id == $product->img_thumbnail)
                                <div class="img" style="background-image:url({{ $attachment->url_path }});width=200px;"></div>
                            @endif
                        @endforeach

                        <div class="info"><p class="txt1">Modelo</p>
                            <h3>{{ ($product->attributes()->getBaseQuery()->where('key','=','24')->first())->value }}</h3></div>
                    </div>
                    <div class="power"><p class="txt1">Potencia</p>
                        <p>{{ ($product->attributes()->getBaseQuery()->where('key','=','25')->first())->value }}</p></div>
                    <div class="current"><p class="txt1">Chasis</p>
                        <p>{{ ($product->attributes()->getBaseQuery()->where('key','=','28')->first())->value }}</p></div>
                    <div class="capacitor"><p class="txt1">Diametro de corte</p>
                        <p>{{ ($product->attributes()->getBaseQuery()->where('key','=','29')->first())->value }}</p></div>
                    <div class="view-more"><a href="{{ route("single-product",['category'=>"jardin-bordeadoras", "product"=>$product->id, "name"=>str_replace('+','-',urlencode(($product->attributes()->getBaseQuery()->where('key','=','24')->first())->value))]) }}">Ver más <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
</div>
<div class="color-band"><p>Productos comercializados</p>
    <p>Bajo la marca</p><img src="/images/jardin/charihue.png" alt="Carihue"></div>
@include('partial.home-footer')
</body>
</html>