<!doctype html>
<html class="no-js">
     @section('htmlheader_social_meta')
        <!-- Schema.org markup para Google+ -->
        <meta itemprop="name" content="Campagnoni riego">
        <meta itemprop="description" content="{{ $headerValues['settings']['meta-description'] }}">
        <meta itemprop="image" content="http://www.campagnoni.com.ar/public/images/riego/hero.jpg">
         
        <!-- Twitter Card data -->
        <meta name="twitter:card" content="product">
        <!-- <meta name="twitter:site" content="@PUBLICADOR"> -->
        <meta name="twitter:title" content="Campagnoni riego">
        <meta name="twitter:description" content="{{ $headerValues['settings']['meta-description'] }}">
        <!-- <meta name="twitter:creator" content="@AUTOR"> -->
        <meta name="twitter:image" content="http://www.campagnoni.com.ar/public/images/riego/hero.jpg">
         
        <!-- Open Graph data -->
        <meta property="og:title" content="Campagnoni riego" />
        <meta property="og:type" content="website.category" />
        <meta property="og:url" content="http://www.campagnoni.com.ar/productos/riego/" />
        <meta property="og:image" content="http://www.campagnoni.com.ar/public/images/riego/hero.jpg" />
        <meta property="og:description" content="{{ $headerValues['settings']['meta-description'] }}" />
        <meta property="og:site_name" content="Campagnoni riego" />
    @show
@include('partial.header')
<body><!--[if lt IE 7]><p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade
    your browser</a> to improve your experience.</p><![endif]-->

@include('partial.header-menu')

<section id="header-category">
    <div class="hero-img" style="background-image:url(/images/riego/hero.jpg)"></div>
    <h1 class="category-name">Riego</h1></section>
<div class="container">
    <section id="product-list" class="riego" data-cat-color="#eba40d">
        <div class="product-row first" style="box-shadow:inset 0 -5px 0 #eba40d"><p class="text-center">Disponemos de
                todos los elementos necesarios para armar los kit de riego para aplicaciones avícolas, porcina, tambera,
                industriales, entre otras.</p></div>

        <!-- {{$i=1}} -->
        @foreach($products as $product)
            <div class="acc-content">
                <article class="product-row" data-toggle="collapse" href="#product{{$i}}" aria-expanded="false"
                         aria-controls="product{{$i}}">
                    <div class="model">
                        @if($product->attachments()->count() > 0)
                            @foreach($product->attachments()->getResults() as $images)
                               @if($images->id == $product->img_principal)
                               <div class="img" style="background-image: url('{{ $images->url_path }}'); min-width: 70px;border-radius:50%;"></div>
                               @endif
                            @endforeach
                        @else
                            <div class="img" style="background-color:#ddd; min-width: 70px;border-radius:50%;"></div>
                        @endif

                        {!! $product->getVentilationName() !!}

                    </div>
                    @if($product->description)
                        <div class="view-more">
                            <a href="#"><i class="fa fa-plus" aria-hidden="true"></i><i class="fa fa-minus" aria-hidden="true"></i></a>
                        </div>
                    @endif
                </article>
                @if($product->description)
                    <div id="product{{$i}}" class="collapse in acc-show" role="tabpanel">
                        <div class="content">
                            <ul class="list-unstyled">
                                {!! $product->description !!}
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
            <!-- {{$i++}} -->
        @endforeach

    </section>
</div>
@include('partial.home-footer')
</body>
</html>