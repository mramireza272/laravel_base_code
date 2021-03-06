<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Project</title>


    <!--STYLESHEET-->
    <!--=================================================-->

    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>


    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="/css/bootstrap.min.css" rel="stylesheet">


    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="/css/nifty.min.css" rel="stylesheet">


    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="/css/demo/nifty-demo-icons.min.css" rel="stylesheet">



<style>
body {
    background-image: url(img/bg-img/fondo_error.jpg);
    background-repeat: no-repeat;
    background-color: #353535;
    background-size: cover;
    background-attachment: fixed;
}
</style>

</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->

<body>
    <div id="container" class="cls-container">



		<!-- CONTENT -->
		<!--===================================================-->

		<div class="cls-content">
			<div class="cls-content-sm panel">
				<div class="panel-body">
					<div class="media-body text-bold text-main">
			        	<img width="100%" src="/img/logos/logo_full.png">
			        </div>
				</div>
			</div>
		    <h1 style="font-size:70px; font-weight: bold; color: #39960e"class="error-code text-info">¡No disponible!</h1>
		    <p class="h4 text-uppercase text-bold">Recurso no disponible (301).</p>
		    <div class="pad-btm">
		        <h1 style="font-size:18px; color: #000000">El recurso al que desea acceder ya no se encuentra disponible. Puedes <a href="{{ route('login') }}"><mark>iniciar sesión</mark></a> o ponerte en contacto con nosotros.
		    </div>
		    <hr class="new-section-sm bord-no">
		    <div class="pad-top"><a class="btn btn-primary" href="{{ route('login') }}">Iniciar Sesión</a></div>
		</div>


    </div>
    <!--===================================================-->
    <!-- END OF CONTAINER -->



    <!--JAVASCRIPT-->
    <!--=================================================-->

    <!--jQuery [ REQUIRED ]-->
    <script src="/js/jquery.min.js"></script>


    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="/js/bootstrap.min.js"></script>


    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="/js/nifty.min.js"></script>




    <!--=================================================-->
    </body>
</html>