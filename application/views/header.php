<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="uk">
	<head>
	<meta charset="utf-8">
	<title>Кололівські ігри. Клуб інтелектуального відпочинку</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="images/favicon.ico">

	<!-- CSS -->
	<link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="/css/flexslider.css" rel="stylesheet" type="text/css" />
	<link href="/css/prettyPhoto.css" rel="stylesheet" type="text/css" />
	<link href="/css/animate.css" rel="stylesheet" type="text/css" media="all" />
	<link href="/css/owl.carousel.css" rel="stylesheet">
	<link href="/css/style.css" rel="stylesheet" type="text/css" />
	<link href="/css/token-input.css" rel="stylesheet" type="text/css" />
	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500italic,700,500,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href="/css/font-awesome.css" rel="stylesheet">
    
	<!-- SCRIPTS -->
	<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<!--[if IE]><html class="ie" lang="en"> <![endif]-->

	<script src="/js/jquery.min.js" type="text/javascript"></script>
	<script src="/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="/js/jquery.prettyPhoto.js" type="text/javascript"></script>
	<script src="/js/jquery.nicescroll.min.js" type="text/javascript"></script>
	<script src="/js/superfish.min.js" type="text/javascript"></script>
	<script src="/js/jquery.flexslider-min.js" type="text/javascript"></script>
	<script src="/js/owl.carousel.js" type="text/javascript"></script>
	<script src="/js/animate.js" type="text/javascript"></script>
	<script src="/js/jquery.BlackAndWhite.js"></script>
	<script src="/js/myscript.js" type="text/javascript"></script>
    
	<script>
		$(function () {
			$("#form_auth").on("submit", function (e) {
				e.preventDefault();
				$.ajax({
					type: "post",
					url: "/Main_controller/auth_user",
					data: $(this).serialize(),
					success: function (response) {
						if (response == 1) {
							hide_authorization ();
						} else {
							$('#auth_error').show();
							$('#auth_error').html(response);
						}
					},
					error: function (response) {
						alert(response);
					}
				});
			});
		});
		
		$(function () {
			$("#logout_form").on("submit", function (e) {
				$.ajax({
					type: "post",
					url: "/Main_controller/ajax_logout",
					data: {logout: true},
					success: function (response) {
						if (response) {
							console.log('Logged out');
						}
					},
					error: function (response) {
						alert(response);
					}
				});
			});
		});
		
		
		function hide_authorization () {
			$('#authorization').hide(true);
			$('#registration').hide(true);
			$('#logout_btn').show();
		}; 
		
		$(function () {
			$("#form_register").on("submit", function (e) {
				e.preventDefault();
				var data_to_send = $(this).serialize();
				data_to_send.recaptcha_challenge_field = $('[name="recaptcha_challenge_field"]').val();
				data_to_send.recaptcha_response_field = $('[name="recaptcha_response_field"]').val();
				
				$.ajax({
					type: "post",
					url: "/Main_controller/register_user",
					data: data_to_send,
					success: function (response) {
						if (response) {
							if (response == 1) {
								hide_authorization ();
							} else {
								console.log('innerHTML ' + response);
								$('#reg_error').html(response); 
								$('#reg_error').show();
							}
						}
					},
					error: function (response) {
						alert(response);
					}
				});
			});
		});
		
		
		//PrettyPhoto
		jQuery(document).ready(function() {
			$("a[rel^='prettyPhoto']").prettyPhoto();
			var name = '<? echo $name; ?>'; 
			$('#logout_btn').hide(true);
			$('#fulltext').hide(true);
			if(name!=''){
				console.log('logged in');
				hide_authorization();
			}
		});
		
		//BlackAndWhite
		$(window).load(function(){
			$('.client_img').BlackAndWhite({
				hoverEffect : true, // default true
				// set the path to BnWWorker.js for a superfast implementation
				webworkerPath : false,
				// for the images with a fluid width and height 
				responsive:true,
				// to invert the hover effect
				invertHoverEffect: false,
				// this option works only on the modern browsers ( on IE lower than 9 it remains always 1)
				intensity:1,
				speed: { //this property could also be just speed: value for both fadeIn and fadeOut
					fadeIn: 300, // 200ms for fadeIn animations
					fadeOut: 300 // 800ms for fadeOut animations
				},
				onImageReady:function(img) {
					// this callback gets executed anytime an image is converted
				}
			});
		});
		
	</script>
	<style>
		#authorization {
			color:#FFF;
		}
		#reg_error, #auth_error {
			background:#F00;
			color:#fff;
			padding:4px;
			display:none;
			margin-right:10%;
		}
	</style>
</head>
<body>
	<!-- PRELOADER --> 
	<img id="preloader" src="/images/preloader.gif" alt="" /> 
	<!-- //PRELOADER -->
	<div class="preloader_hide"> 
		<!-- PAGE -->
		<div id="page"> 
            <!-- HEADER -->
            <header> 
                <!-- MENU BLOCK -->
                <div class="menu_block"> 
                    <!-- CONTAINER -->
                    <div class="container clearfix"> 
                        <!-- LOGO -->
                        <div class="logo pull-left"> <a href="/" ><img src="/images/logo.png" /></a> </div>
                        <!-- //LOGO --> 
                        
                        <!-- MENU -->
                        <div class="pull-right">
                            <nav class="navmenu center">
                                <ul>
                                    <li class="first active scroll_btn"><a href="#home" >Головна</a></li>
                                    <li class="scroll_btn"><a href="#gameofthrones" >Гра престолів</a></li>
                                    <li class="scroll_btn"><a href="#team" >Кращі гравці</a></li>
                                    <li class="scroll_btn"><a href="#news" >Найближчі заходи</a></li>
                                    <li class="scroll_btn"><a href="#photos" >Фото</a></li>
                                    <li class="scroll_btn last"><a href="#contacts" >Контакти</a></li>
                                    <li class="sub-menu"> <a href="javascript:void(0);" >Королям</a>
                                        <ul>
                                            <li><a href="blog.html" >Події</a></li>
                                            <li><a href="blog-post.html" >Рейтинг</a></li>
                                            <li><a href="blog.html" >Новини</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- //MENU --> 
                        
                    </div>
                <!-- //MENU BLOCK --> 
                </div>
                  <!-- //CONTAINER --> 
            </header>