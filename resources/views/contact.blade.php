<!doctype html>
<html class="no-js">

@include('partial.header')

<body id="custom-scroll"><!--[if lt IE 7]><p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade
    your browser</a> to improve your experience.</p><![endif]-->

@include('partial.header-menu')

<section id="header-category">
    <div class="hero-img" style="background-image:url(/public/images/contacto/hero.jpg)"></div>
    <h1 class="category-name">Contacto</h1></section>
<div class="container contacto">

    @if($message != '')
        <div class="first-row">
            <p>
            <div class="alert alert-success">
                {{ $message }}
            </div>
            </p>
        </div>
    @endif
    <div class="first-row">
        <p>Fijo: <a target="_blank" href="#">+54 9 3434952165</a></p>
        <p>WhatsApp: <img src="/public/img/wsp.png" width="32"> <a target="_blank" href="https://api.whatsapp.com/send?phone=+54 9 3435196109&text=Hola%2C%20deseo%20adquirir%20un%20soporte%20con%20ustedes">+54 9 3435196109</a></p>
    </div>
    <div class="form-container">
        <form method="post" action="">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <div class="form-row">
            <div class="control"><label for="fullname">NOMBRE</label><input name="fullname" id="fullname" required></div>
            <div class="control"><label for="email">EMAIL</label><input name="email" id="email" type="email" required></div>
        </div>
        <div class="form-row">
            <div class="control"><label for="tel">TELÉFONO · <span>OPCIONAL</span></label><input name="tel" id="tel"
                                                                                                 type="tel"></div>
            <div class="control"><label for="company">EMPRESA · <span>OPCIONAL</span></label><input name="company"
                                                                                                    id="company"></div>
        </div>
        <div class="form-ta"><label for="message">MENSAJE</label><textarea name="message" rows="3" required></textarea></div>
        <div class="separator"></div>
        <div class="form-row actions">
            <div>
                <button class="clear-form" type="button"></button>
            </div>
            <div>
                <button>ENVIAR</button>
            </div>
        </div>
        </form>
    </div>
    <div class="place" style="margin-top:10px"><img src="/public/images/contacto/map.jpg" alt="" class="img-fluid"></div>
</div>

@include('partial.home-footer')

</body>
</html>