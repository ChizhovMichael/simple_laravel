
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="canonical" href="{{ URL::current() }}">
<meta name="theme-color" content="{{ config('app.color') }}" />
<meta name="msapplication-TileColor" content="{{ config('app.color') }}">
<meta name="robots" content="index, follow">
<meta name="author" content="WebArt Studio" />
<meta name="copyright" content="{{ config('app.name') }}">


<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">

<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<!-- Script -->
<script src="{{ asset('js/app.js') }}"></script>


<!-- Favicon -->
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes"/>
<link rel="shortcut icon" href="{{{ asset('img/favicon/favicon.ico') }}}" />
<link rel="icon" type="image/png" sizes="32x32" href="{{{ asset('img/favicon/favicon-32x32.png') }}}">
<link rel="icon" type="image/png" sizes="16x16" href="{{{ asset('img/favicon/favicon-16x16.png') }}}">
<link rel="apple-touch-icon" sizes="180x180" href="{{{ asset('img/favicon/apple-touch-icon.png') }}}">
<link rel="icon" sizes="192x192" href="{{{ asset('img/favicon/android-chrome-192x192.png') }}}">
<link rel="icon" sizes="512x512" href="{{{ asset('img/favicon/android-chrome-512x512.png') }}}">
<meta name="msapplication-TileImage" content="{{{ asset('img/favicon/mstile-144x144.png') }}}">
<link rel="mask-icon" href="{{ asset('img/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
<link rel="manifest" href="{{{ asset('img/favicon/site.webmanifest') }}}">
<meta name="msapplication-config" content="{{ asset('img/favicon/browserconfig.xml') }}" />
<meta name="apple-mobile-web-app-title" content="{{ config('app.name') }} Application">
<meta name="application-name" content="{{ config('app.name') }} Application">


<meta property="og:locale" content="ru_RU">
<meta property="og:type" content="website">
<meta property="og:title" content="{{ config('app.name') }} - реестр недобросовестных врачей и медицинских учреждений"><!-- -->
<meta property="og:description" content="Реестр недобросовестных врачей, реестр недобросовестных медицинских учреждений, черный список врачей, черный список медицинских учреждений, черный список мед служащих, реестр недобросовестных медицинских работников"><!-- -->
<meta property="og:url" content="{{ URL::current() }}">
<meta property="og:site_name" content="{{ config('app.name') }}">
<meta property="fb:app_id" content=""><!-- -->
<meta property="og:image" content="{{ asset('img/favicon/twitter.png') }}">
<meta property="og:image:alt" content="Og изображение {{ config('app.name') }}. Логотип компании и элементы фирменного стиля">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:description" content="Реестр недобросовестных врачей, реестр недобросовестных медицинских учреждений, черный список врачей, черный список медицинских учреждений, черный список мед служащих, реестр недобросовестных медицинских работников"><!-- -->
<meta name="twitter:title" content="{{ config('app.name') }} - реестр недобросовестных врачей и медицинских учреждений"><!-- -->
<meta name="twitter:image" content="{{ asset('img/favicon/twitter.png') }}">
<script type="application/ld+json">
	{
		"@context": "https://schema.org",
		"@type": "WebSite",
		"@id": "{{ config('app.url') }}/#website",
		"url": "{{ config('app.url') }}",
		"name": "{{ config('app.name') }}/",
		"potentialAction":
		{
			"@type": "SearchAction",
			"target": "{{ config('app.url') }}/?s={search_term_string}",
			"query-input": "required name=search_term_string"
		}
	}
</script>
<script type="application/ld+json">
	{
		"@context": "https://schema.org",
		"@type": "Organization",
		"name": "{{ config('app.name') }}",
		"url": "{{ config('app.url') }}/",
		"sameAs": [
			
		],
		"@id": "{{ config('app.name') }}/#organization",		
		"logo": "{{ config('app.name') }}/img/icon/logo.svg"
	}
</script>