<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!--[if IE 8]>    <html class="no-js ie8 ie" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9 ie" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>Login</title>
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
<body>

<!-- Main page container -->
<section class="container login" role="main">

    <h1><a href="/"><img src="/admin/img/clear_logo.png" height="100" style="height: 100px;"/></a></h1>
    <div class="data-block">
        <form method="post" action="/login/auth_user">
            <fieldset>
                <div class="control-group">
                    <label class="control-label" for="login">Username</label>
                    <div class="controls">
                        <input id="icon" type="text" placeholder="Your username" name="username">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="password">Password</label>
                    <div class="controls">
                        <input id="password" type="password" placeholder="Password" name="password">
                        <label class="checkbox">
                            <input id="optionsCheckbox" type="checkbox" value="option1"> Remember me
                        </label>
                    </div>
                </div>
                <div class="form-actions">
                    <button class="btn btn-large btn-inverse btn-alt" type="submit"><span class="awe-signin"></span> Log in</button>
                </div>
            </fieldset>
        </form>
    </div>
    <p><a href="#" class="pull-right"><small>Password reset</small></a></p>

</section>
<!-- /Main page container -->

<!-- Scripts -->
<script src="/admin/js/bootstrap/bootstrap-tooltip.js"></script>

</body>
</html>
