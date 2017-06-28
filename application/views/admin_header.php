<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!--[if IE 8]>    <html class="no-js ie8 ie" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9 ie" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>Kings Admin Page</title>
    <meta name="description" content="">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- jQuery Visualize Styles -->
    <link rel='stylesheet' type='text/css' href='/admin/css/plugins/jquery.visualize.css'>

    <!-- jQuery jGrowl Styles -->
    <link rel='stylesheet' type='text/css' href='/admin/css/plugins/jquery.jgrowl.css'>

    <!-- CSS styles -->
    <link rel='stylesheet' type='text/css' href='/admin/css/huraga-red.css'>

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/admin/img/icons/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/admin/img/icons/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/admin/img/icons/apple-touch-icon-57-precomposed.png">

    <!-- JS Libs -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="/admin/js/libs/jquery.js"><\/script>')</script>
    <script src="/admin/js/libs/modernizr.js"></script>
    <script src="/admin/js/libs/selectivizr.js"></script>
    <script src="/admin/js/jquery.tokeninput.js"></script>
    <link rel="stylesheet" href="/css/token-input.css" type="text/css" />

    <script>
        $(document).ready(function(){

            // Tooltips
            $('[title]').tooltip({
                placement: 'top'
            });

        });
    </script>
</head>
<body>

<!-- Main page header -->
<header class="container">

    <!-- Main page logo -->
    <h1><a href="/gotadmin"><img src="/admin/img/clear_logo.png" height="100" style="height: 100px;"/></a></h1>

    <!-- Alternative navigation -->
    <nav>
        <ul>
            <li><a href="/Gotadmin/logout">Logout</a></li>
        </ul>
    </nav>
    <!-- /Alternative navigation -->

</header>