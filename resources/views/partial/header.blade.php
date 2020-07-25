<head>
     @section('htmlheader_social_meta')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <title>Campagnoni Motores</title>
    <meta name="title" content="{{ $headerValues['settings']['meta-title'] }}">
    <meta name="description" content="{{ $headerValues['settings']['meta-description'] }}">
		<!-- Schema.org markup para Google+ -->
		<meta itemprop="name" content="Campagnoni home">
		<meta itemprop="description" content="{{ $headerValues['settings']['meta-description'] }}">
		@if(isset($headerValues['meta-image']))
			<meta itemprop="image" content="{{ $headerValues['meta-image'] }}">
		@else
			<meta itemprop="image" content="https://www.campagnoni.com.ar/public/images/logo-blue.png">
		@endif

		<!-- Twitter Card data -->
		<meta name="twitter:card" content="product">
		<!-- <meta name="twitter:site" content="@PUBLICADOR"> -->
		<meta name="twitter:title" content="Campagnoni home">
		<meta name="twitter:description" content="{{ $headerValues['settings']['meta-description'] }}">
		<!-- <meta name="twitter:creator" content="@AUTOR"> -->
		@if(isset($headerValues['meta-image']))
			<meta name="twitter:image" content="{{ $headerValues['meta-image'] }}">
		@else
			<meta name="twitter:image" content="https://www.campagnoni.com.ar/public/images/logo-blue.png">
		@endif
		<!-- Open Graph data -->
		<meta property="og:title" content="Campagnoni" />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="https://campagnoni.com.ar/" />
		@if(isset($headerValues['meta-image']))
			<meta property="og:image:width" content="450" />
			<meta property="og:image:height" content="600" />
			<meta property="og:image" content="{{ $headerValues['meta-image'] }}" />
		@else
			<meta property="og:image" content="https://www.campagnoni.com.ar/public/images/logo-blue.png" />
			<meta property="og:image:width" content="50" />
			<meta property="og:image:height" content="50" />
		@endif


		<meta property="og:description" content="{{ $headerValues['settings']['meta-description'] }}" />
		<meta property="og:site_name" content="Campagnoni motores electricos" />

    @show
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,700,800" rel="stylesheet">
    <link rel="favicon" href="https://www.campagnoni.com.ar/public/favicon.ico">
    <link rel="stylesheet" href="https://www.campagnoni.com.ar/public/styles/main.css">

</head>