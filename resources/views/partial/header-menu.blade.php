
<header class="main-menu">
    <div class="container">
        <div class="logo"><a href="{{ route("home") }}" class="white" title="Volver al inicio"><img src="/images/logo.png" alt="Campagnoni"></a><a
                    href="{{ route("home") }}" class="blue" title="Volver al inicio"><img src="/images/logo-blue.png" alt="Campagnoni"></a>
        </div>
        <nav class="nav dl-menuwrapper" id="dl-menu">
            <button class="mobile-hamburguer dl-trigger"><span></span> <span></span> <span></span> <span></span>
            </button>
            <ul class="dl-menu">
                <li class="has-child"><a href="{{ route("engines") }}" title="Motores">Motores</a>
                    <ul class="submenu dl-submenu">
                        <li class="title">Motores eléctricos</li>
                        @foreach($headerValues['engineProducts'] as $product)
                        <li class="item"><a href="{{ route("single-product",['category'=>"motores-electricos", "product"=>$product->id, "name"=>str_replace('+','-',urlencode($product->name))]) }}">
                                @foreach($product->attachments as $attachment)
                                    @if($attachment->id == $product->img_thumbnail)
                                        <div class="img">
                                            <div style="background-image:url({{ $attachment->url_path }})"></div>
                                        </div>
                                    @endif
                                @endforeach
                                <div class="info"><span class="name">{{ $product->name }}</span> <span class="data" style="display:none">700 W · 3.2 A</span></div>
                            </a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="has-child has-grandchild"><a href="{{ route("garden") }}" title="Jardin">Jardin</a>
                    <ul class="submenu dl-submenu lvl2">
                        <li class="has-child"><a href="{{ route("garden") }}" title="Bordeadoras">Bordeadoras</a>
                            <ul class="submenu dl-submenu lvl2">
                                <li class="title">Tipo Americano</li>
                                @foreach($headerValues['gardenBProducts'] as $product)
                                    <li class="item"><a href="{{ route("single-product",['category'=>"jardin-bordeadoras", "product"=>$product->id, "name"=>str_replace('/','-',str_replace('+','-',urlencode($product->name)))]) }}">
                                            @foreach($product->attachments as $attachment)
                                                @if($attachment->id == $product->img_thumbnail)
                                                    <div class="img">
                                                        <div style="background-image:url({{ $attachment->url_path }})"></div>
                                                    </div>
                                                @endif
                                            @endforeach
                                            <div class="info"><span class="name">{{ $product->name }}</span> <span class="data">1/2 HP</span></div>
                                        </a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="has-child"><a href="{{ route("garden") }}" title="Cortadoras">Cortadoras</a>
                            <ul class="submenu dl-submenu">
                                <li class="title">Standard Sin Recolector</li>
                                @foreach($headerValues['gardenCProducts'] as $product)
                                    @if(!preg_match('/RAE/',$product->name))
                                        <li class="item"><a href="{{ route("single-product",['category'=>"jardin-cortadoras", "product"=>$product->id, "name"=>str_replace('/','-',str_replace('+','-',urlencode($product->name)))]) }}">
                                                @foreach($product->attachments as $attachment)
                                                    @if($attachment->id == $product->img_thumbnail)
                                                        <div class="img">
                                                            <div style="background-image:url({{ $attachment->url_path }})"></div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                                <div class="info"><span class="name">{{ $product->name }}</span> <span class="data">1/2 HP</span></div>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                                <li class="title">Standard Con Recolector</li>
                                @foreach($headerValues['gardenCProducts'] as $product)
                                    @if(preg_match('/RAE/',$product->name))
                                        <li class="item"><a href="{{ route("single-product",['category'=>"jardin-cortadoras", "product"=>$product->id, "name"=>str_replace('+','-',urlencode($product->name))]) }}">
                                                @foreach($product->attachments as $attachment)
                                                    @if($attachment->id == $product->img_thumbnail)
                                                        <div class="img">
                                                            <div style="background-image:url({{ $attachment->url_path }})"></div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                                <div class="info"><span class="name">{{ $product->name }}</span> <span class="data">1/2 HP</span></div>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                        <li class="has-img"><img src="/images/jardin/charihue.png" alt="Carihue"></li>
                    </ul>
                </li>
                <li class="has-child"><a href="{{ route("ventilation") }}" title="Ventilación">Ventilación</a>
                    <ul class="submenu dl-submenu">
                        <li class="title">Extractores</li>
                        @foreach($headerValues['ventilationProducts'] as $product)
                            @if(preg_match('/Extractor/',$product->name))
                                <li class="item"><a href="{{ route("single-product",['category'=>"ventilacion", "product"=>$product->id, "name"=>str_replace('+','-',urlencode($product->name))]) }}">
                                        @foreach($product->attachments as $attachment)
                                            @if($attachment->id == $product->img_thumbnail)
                                                <div class="img">
                                                    <div style="background-image:url({{ $attachment->url_path }})"></div>
                                                </div>
                                            @endif
                                        @endforeach
                                        <div class="info"><span class="name">{{ $product->name }}</span> <span class="data"></span>
                                        </div>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                        <li class="title">Ventiladores</li>
                        @foreach($headerValues['ventilationProducts'] as $product)
                            @if(!preg_match('/Extractor/',$product->name))
                                <li class="item"><a href="{{ route("single-product",['category'=>"ventilacion", "product"=>$product->id, "name"=>str_replace('+','-',urlencode($product->name))]) }}">
                                        @foreach($product->attachments as $attachment)
                                            @if($attachment->id == $product->img_thumbnail)
                                                <div class="img">
                                                    <div style="background-image:url({{ $attachment->url_path }})"></div>
                                                </div>
                                            @endif
                                        @endforeach
                                        <div class="info"><span class="name">{{ $product->name }}</span> <span class="data"></span>
                                        </div>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </li>
                <li class="has-child"><a href="{{ route("heating") }}" title="Calefacción">Calefacción</a>
                    <ul class="submenu dl-submenu">
                        <li class="title">Estufas Eléctricas</li>
                        @foreach($headerValues['heatingProducts'] as $product)
                        <li class="item"><a href="{{ route("single-product",['category'=>"calefaccion", "product"=>$product->id, "name"=>str_replace('+','-',urlencode($product->name))]) }}">
                                @foreach($product->attachments as $attachment)
                                    @if($attachment->id == $product->img_thumbnail)
                                        <div class="img">
                                            <div style="background-image:url({{ $attachment->url_path }})"></div>
                                        </div>
                                    @endif
                                @endforeach
                                <div class="info"><span class="name">{{ $product->name }}</span> <span class="data"></span>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                <li class="not-child"><a href="{{ route("irrigation") }}" title="Riego">Riego</a></li>
                <li class="separator"><span>|</span></li>
                <li class="not-child"><a href="{{ route("showNews") }}" title="Novedades">Novedades</a></li>
                <li class="not-child"><a href="{{ route("about-us") }}" title="Empresa">Empresa</a></li>
                <li class="not-child"><a href="{{ route("contact") }}" title="Contacto">Contacto</a></li>
            </ul>
        </nav>
    </div>
</header>