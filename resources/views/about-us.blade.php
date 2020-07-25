<!doctype html>
<html class="no-js">
@include('partial.header')
<body id="custom-scroll"><!--[if lt IE 7]><p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade
  your browser</a> to improve your experience.</p><![endif]-->

@include('partial.header-menu')

<!-- Header empresa -->
<section id="header-category">
    <div class="hero-img" style="background-image: url('/public/images/empresa/hero.jpg')"></div>
    <h1 class="category-name">Empresa</h1>
</section>
<!-- /Header empresa -->

<div >
    <div class="container-fluid empresa" style="padding: 0">
        <div class="item-row first">
            <div class="img">
                <div style="background-image: url('/public/images/empresa/img1.jpg')">
                    <img src="/public/images/empresa/img1.jpg" alt="Product name" class="img-fluid" style="opacity: 0">
                </div>
            </div>
            <div class="info">
                <div class="title">
                    <h2>Construidos <br> para durar.</h2>
                </div>
                <div class="description">
                    <p style="font-size: 24px">
                        Crear productos de calidad y soluciones eficientes es el compromiso de Campagnoni. Para ello, la
                        apuesta
                        en ingeniería, innovación y el trabajo en equipo es continua.
                    </p>
                </div>
            </div>
        </div>
        <div class="item-row">
            <div class="img">
                <div style="background-image: url('/public/images/empresa/img2.jpg')">
                    <img src="/public/images/empresa/img2.jpg" alt="Product name" class="img-fluid" style="opacity: 0">
                </div>
            </div>
            <div class="info">
                <div class="description">
                    <p>Nacimos el 10 de Diciembre de 1983 como empresa dedicada a la reparación de motores eléctricos.
                        Durante
                        esta larga trayectoria nos hemos definido por un marcado espíritu de servicio al cliente y proveedor,
                        caracterizado por una enorme seriedad y por una total garantía. Para nosotros el cliente y proveedor
                        siempre han sido lo principal y eso ha quedado patente en cada uno de los pasos que hemos ido
                        dando.</p>

                    <p>Fruto y aval de ello es la confianza de la que actualmente disfrutamos por parte de todos y cada uno
                        de
                        nuestros clientes.
                        Nuestra filosofía de servicio nos ha llevado a buscar nuevas herramientas para poder estar a la
                        vanguardia en tecnología al tiempo que nos diferencia de nuestra competencia.
                        No nos hemos quedado tampoco ahí: hemos desarrollado marcas propias que ofrecen al cliente productos
                        que
                        cubren perfectamente sus necesidades.</p>

                    <p>Y esto lo podemos hacer porque nos preocupamos por conocer cuáles son estas necesidades, las
                        estudiamos y
                        tratamos de dar soluciones concretas al consumidor.</p>
                </div>
            </div>
        </div>
        <div class="item-row">
            <div class="img">
                <div style="background-image: url('/public/images/empresa/img3.jpg')">
                    <img src="/public/images/empresa/img3.jpg" alt="Product name" class="img-fluid" style="opacity: 0">
                </div>
            </div>
            <div class="info">
                <div class="description">
                    <p>Nuestro mayor afán es seguir trabajando para brindarles siempre las mejores condiciones de precio,
                        calidad y servicio; por lo cual estamos constantemente innovando para mejorar nuestra oferta.
                        En el campo internacional estamos desarrollando importantes planes para la exportación con lo que
                        trataremos de alzarnos en un mercado fuera de nuestras fronteras.</p>

                    <p>Nuestro objetivo es seguir avanzando y manteniendo la misma filosofía de servicio al cliente y
                        proveedor
                        con la que nacimos, ya que somos conscientes de que sólo podemos ir hacia delante de su mano.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Home carousel -->
<section id="home-carousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#home-carousel" data-slide-to="0" class="active"></li>
        <li data-target="#home-carousel" data-slide-to="1" class=""></li>
        <li data-target="#home-carousel" data-slide-to="2" class=""></li>
        <li data-target="#home-carousel" data-slide-to="3" class=""></li>
        <li data-target="#home-carousel" data-slide-to="4" class=""></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <div class="img" style="background-image: url(/public/images/empresa/empresa_slide1.jpg)">
                <div></div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="img" style="background-image: url(/public/images/empresa/empresa_slide2.jpg)">
                <div></div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="img" style="background-image: url(/public/images/empresa/empresa_slide3.jpg)">
                <div></div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="img" style="background-image: url(/public/images/empresa/empresa_slide4.jpg)">
                <div></div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="img" style="background-image: url(/public/images/empresa/empresa_slide5.jpg)">
                <div></div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#home-carousel" role="button" data-slide="prev">
        <i class="fa fa-angle-left" aria-hidden="true"></i>
        <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#home-carousel" role="button" data-slide="next">
        <i class="fa fa-angle-right" aria-hidden="true"></i>
        <span class="sr-only">Siguiente</span>
    </a>
</section>
<!-- /Home carousel -->
<div class="color-band empresa" style="background-color: #124a85">
    <p>¿Querés comunicarte con nosotros? <a style="font-weight: normal;color: #fff" href="{{ route("contact") }}" >Dejanos tu mensaje.</a></p>
</div>

    @include('partial.home-footer')

  </body>
</html>