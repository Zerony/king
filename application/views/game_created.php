<!DOCTYPE html>
<!--[if IE 8]>    <html class="no-js ie8 ie" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9 ie" lang="en"> <![endif]-->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>Game was created!</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS styles -->
    <link rel='stylesheet' type='text/css' href='/admin/css/huraga-red.css'>

    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="/admin/img/icons/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/admin/img/icons/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/admin/img/icons/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/admin/img/icons/apple-touch-icon-57-precomposed.png">

    <!-- JS Libs -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="/admin/js/libs/jquery.js"><\/script>')</script>
    <script src="/admin/js/libs/modernizr.js"></script>
    <script src="/admin/js/libs/selectivizr.js"></script>

    <script>
        $(document).ready(function(){

            // Tooltips
            $('[title]').tooltip({
                placement: 'top'
            });

        });
    </script>
</head>
<body class="error-page">

<!-- Error page container -->
<section class="error-container">

    <h1><? echo $game_id ?></h1>
    <p class="description">Awesome! Game was created</p>
    <p>Redirecting to: <a href="<? echo $redirect_to; ?>"><? echo $redirectTo; ?></a>.</p>


</section>

<script src="/admin/js/bootstrap/bootstrap-tooltip.js"></script>

</body>
</html>
