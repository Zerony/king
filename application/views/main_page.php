<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script>

</script>

<section id="home" class="padbot0">
    <!-- TOP SLIDER -->
    <div class="flexslider top_slider">
        <ul class="slides">
            <li class="slide1">
                <div class="flex_caption1">
                    <p class="title1 captionDelay2 FromTop" id="we">Ми </p>

                    <p class="title2 captionDelay6 FromTop">граємо в Гру престолів</p>

                    <p class="title4 captionDelay7 FromBottom">Спробуй свої сили в боротьбі за Вестерос!</p>
                </div>
                <div id="detailed_got">
                    <a class="slide_btn FromRight" href="#gameofthrones">Детальніше</a>
                </div>
            </li>
            <li class="slide2">
                <div class="flex_caption1">
                    <p class="title1 captionDelay2 FromTop" id="mafia_label">Мафія</p>

                    <p class="title2 captionDelay6 FromTop">з кращими гравцями Києва</p>

                    <p class="title4 captionDelay7 FromLeft">Пахан і Челахов придумають крутий слоган</p>
                </div>
                <a class="slide_btn FromRight" href="javascript:void(0);">Детальніше</a>
            </li>
            <li class="slide3">
                <div class="flex_caption1">
                    <p class="title1 captionDelay1 FromBottom">Paintball</p>

                    <p class="title4 captionDelay5 FromBottom">Ні з ким постріляти? Приєднуйся!</p>
                </div>
                <a class="slide_btn FromRight" href="javascript:void(0);">Детальніше</a>

                <!-- VIDEO BACKGROUND -->
                <a id="P2" class="player"
                   data-property="{videoURL:'tDvBwPzJ7dY',containment:'.top_slider .slide3',autoPlay:true, mute:true, startAt:0, opacity:1}"></a>
                <!-- //VIDEO BACKGROUND -->
            </li>
        </ul>
    </div>
    <div id="carousel">
        <ul class="slides">
            <li><img src="images/slider/slide1_bg.jpg" alt=""/></li>
            <li><img src="images/slider/slide2_bg.jpg" alt=""/></li>
            <li><img src="images/slider/slide3_bg.jpg" alt=""/></li>
        </ul>
    </div>
</section>

<section id="gameofthrones">
    <div class="services_block padbot40" data-appear-top-offset="-200" data-animated="fadeInUp">

        <div class="container">
            <!-- ROW -->
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-ss-12 margbot30">
                    <p><b>Як </b> грати?</p>
                    <span>Перед першою грою обовязково передивитися відео з правилами. Перша гра безкоштовна! </span>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-ss-12 margbot30">
                    <p><b>Коли </b> відбуваються ігри?</p>
                    <span>Слідкуйте за записами на нашій сторінці в Facebook</span>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-ss-12 margbot30">
                    <p><b>Як </b> зареєструватися?</p>
                    <span>Для запису на гру вам необхідно зареєструватися на сайті і обрати день та герб вашої сімї. </span>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-ss-12 margbot30">
                    <p><b>Тривалість</b> гри</p>
                    <span>Середня тривалість гри 4 години, проте є ігри коли битва триває понад 6 годин. </span></div>
            </div>
            <!-- //ROW -->
        </div>
    </div>


    <!-- got_userinfo -->
    <div class="got_userinfo container">
        <div id="unathorized_user">
            <p class="title"><b>Реєстрація</b> та авторизація.</p>

            <div style="width:100%;">
                <div style="width:50%; float:left; padding: 10px;" id="authorization">
                    <h3>Авторизація</h3>

                    <div id="auth_error"></div>
                    <div>
                        <span>Логін</span>

                        <form id="form_auth">
                            <input type="text" id="auth_username" name="username"/>
                            <span>Пароль</span>
                            <input type="password" id="auth_password" name="password"/>
                            <input type="submit" value="Увійти" id="auth"/>
                        </form>
                    </div>
                </div>
                <div style="width:50%; float:left; padding: 10px;" id="registration">
                    <h3>Реєстрація</h3>

                    <div id="reg_error"></div>
                    <form id="form_register" method="POST">
                        <span>Логін</span>
                        <input type="text" id="reg_username" name="name"/>
                        <span>Пароль</span>
                        <input type="password" id="reg_password" name="pass"/>
                        <span>Повт пароль</span>
                        <input type="password" id="reg_password_proof"/>
                        <span>Телефон</span>
                        <input type="tel" id="reg_phone" name="phone"/>
                        <span>Email</span>
                        <input type="text" id="reg_mail" name="email"/>
                        <? echo recaptcha_get_html($publickey); ?>
                        <input type="submit" value="Зареєструватися" id="register"/>
                    </form>
                </div>
                <div style="clear:both;"></div>
                <div id="logout">
                    <form id="logout_form" method="post">
                        <input type="submit" value="Вийти" id="logout_btn"/>
                    </form>
                </div>
            </div>

        </div>

        <!-- MULTI PURPOSE -->
        <div class="purpose_block">

            <!-- CONTAINER -->
            <div class="container">
                <!-- ROW -->
                <div class="row">
                    <div class="col-lg-7 col-md-7 col-sm-7" data-appear-top-offset="-200" data-animated="fadeInLeft">
                        <h2><b>Остання гра</b> та переможець</h2>

                        <p><? if($game) echo $game[0]['description']; ?></p>

                        <a class="btn btn-active" href="javascript:void(0);">
                            <span data-hover="Yes I want it">Статистика гри</span></a>
                        <!--<a class="btn" href="javascript:void(0);" >Карти Ланністерів</a> -->
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-5 ipad_img_in" data-appear-top-offset="-200"
                         data-animated="fadeInRight">
                        <img class="ipad_img1" src="/images/gerb/<? if($game) echo $game[0]['family']; ?>.png" alt=""/>
                    </div>
                </div>
                <!-- //ROW -->
            </div>
            <!-- //CONTAINER -->
        </div>
        <!-- //MULTI PURPOSE -->
    </div>
</section>

<section id="team">
    <!-- CONTAINER -->
    <div class="container">
        <h2><b>Кращі гравці</b></h2>

        <!-- ROW -->
        <div class="row" data-appear-top-offset="-200" data-animated="fadeInUp">
            <div class="owl-demo owl-carousel team_slider">
                <div class="item">
                    <div class="crewman_item">
                        <div class="crewman">
                            <h3>Гравець місяця</h3>
                            <img src="/images/mafia/players/bubuyan.jpg" alt=""/>
                        </div>
                        <div class="crewman_descr center">
                            <div class="crewman_descr_cont">
                                <p>Эмоциональный</p>
                                <span>Кращий гравець за рейтигом</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="crewman_item">
                        <div class="crewman">
                            <h3>Кращий маневр</h3>
                            <img src="../../images/mafia/players/karina.jpg" alt=""/>
                        </div>
                        <div class="crewman_descr center">
                            <div class="crewman_descr_cont">
                                <p>Каріна</p>
                                <span>Найефектніша битва</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="crewman_item">
                        <div class="crewman">
                            <h3>Останній переможець</h3>
                            <img src="../../images/mafia/players/boss.jpg" alt=""/>
                        </div>
                        <div class="crewman_descr center">
                            <div class="crewman_descr_cont">
                                <p>Босс</p>
                                <span>А ще Босс гарний рибак!</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="crewman_item">
                        <div class="crewman"><img src="images/team/4.jpg" alt=""/></div>
                        <div class="crewman_descr center">
                            <div class="crewman_descr_cont">
                                <p>Peter Parker</p>
                                <span>Manager</span></div>
                        </div>
                        <div class="crewman_social">
                            <!--<a href="javascript:void(0);" >
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="javascript:void(0);" >
                                <i class="fa fa-facebook-square"></i>
                            </a> -->
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="crewman_item">
                        <div class="crewman"><img src="../../images/mafia/players/lacky.jpg" alt=""/></div>
                        <div class="crewman_descr center">
                            <div class="crewman_descr_cont">
                                <p>Лаки</p>
                                <span>Designer</span></div>
                        </div>

                    </div>
                </div>

                <div class="item">
                    <div class="crewman_item">
                        <div class="crewman"><img src="images/team/6.jpg" alt=""/></div>
                        <div class="crewman_descr center">
                            <div class="crewman_descr_cont">
                                <p>John Marks</p>
                                <span>Designer</span>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="item">
                    <div class="crewman_item">
                        <div class="crewman"><img src="images/team/7.jpg" alt=""/></div>
                        <div class="crewman_descr center">
                            <div class="crewman_descr_cont">
                                <p>Joe Mades</p>
                                <span>Developer</span>
                            </div>
                        </div>
                        <div class="crewman_social">
                            <!-- <a href="javascript:void(0);" >
                                 <i class="fa fa-twitter"></i>
                             </a>
                             <a href="javascript:void(0);" >
                                 <i class="fa fa-facebook-square"></i>
                             </a> -->
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="crewman_item" style="display:none !important;">
                        <div class="crewman"><img src="images/team/8.jpg" alt=""/></div>
                        <div class="crewman_descr center">
                            <div class="crewman_descr_cont">
                                <p>Julia Anderson</p>
                                <span>Developer</span>
                            </div>
                        </div>
                        <div class="crewman_social">
                            <a href="javascript:void(0);">
                                <i class="fa fa-google-plus"></i>
                            </a>
                            <a href="javascript:void(0);">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="javascript:void(0);">
                                <i class="fa fa-facebook-square"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<section id="news">
    <!-- CONTAINER -->
    <div class="container">
        <h2><b>Новини</b> нашого клуба</h2>

        <!-- RECENT POSTS -->
        <div class="row recent_posts" data-appear-top-offset="-200" data-animated="fadeInUp">
            <div class="col-lg-4 col-md-4 col-sm-4 padbot30 post_item_block">
                <div class="post_item">
                    <div class="post_item_img"><img src="images/blog/1.jpg" alt=""/> <a class="link"
                                                                                        href="blog-post.html"></a></div>
                    <div class="post_item_content">
                        <a class="title" href="blog-post.html">Inteligent Transitions In UX Design</a>
                        <ul class="post_item_inf">
                            <li><a href="javascript:void(0);">Anna</a> |</li>
                            <li><a href="javascript:void(0);">Photography</a> |</li>
                            <li><a href="javascript:void(0);">10 Comments</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 padbot30 post_item_block">
                <div class="post_item">
                    <div class="post_item_img"><img src="images/blog/2.jpg" alt=""/> <a class="link"
                                                                                        href="blog-post.html"></a></div>
                    <div class="post_item_content">
                        <a class="title" href="blog-post.html">Recent trends in storytelling</a>
                        <ul class="post_item_inf">
                            <li><a href="javascript:void(0);">Anna</a> |</li>
                            <li><a href="javascript:void(0);">Web Design</a> |</li>
                            <li><a href="javascript:void(0);">No comment</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 padbot30 post_item_block">
                <div class="post_item">
                    <div class="post_item_img">
                        <img src="images/blog/3.jpg" alt=""/>
                        <a class="link" href="blog-post.html"></a>
                    </div>
                    <div class="post_item_content">
                        <a class="title" href="blog-post.html">Supernatural FX Showreel</a>
                        <ul class="post_item_inf">
                            <li><a href="javascript:void(0);">Anna</a> |</li>
                            <li><a href="javascript:void(0);">Creative</a> |</li>
                            <li><a href="javascript:void(0);">3 Comments</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- RECENT POSTS -->
    </div>
    <!-- //CONTAINER -->
</section>

<section id="photos" class="padbot20">
    <!-- CONTAINER -->
    <div class="container">
        <h2><b>Фотографії</b></h2>
    </div>
    <!-- //CONTAINER -->

    <div class="projects-wrapper" data-appear-top-offset="-200" data-animated="fadeInUp">
        <!-- PROJECTS SLIDER -->
        <div class="owl-demo owl-carousel projects_slider">
            <!-- work1 -->
            <div class="item">
                <div class="work_item">
                    <div class="work_img">
                        <img src="images/works/1.jpg" alt=""/>
                        <a class="zoom" href="images/works/1.jpg" rel="prettyPhoto[portfolio1]"></a>
                    </div>
                    <div class="work_description">
                        <div class="work_descr_cont">
                            <a href="portfolio-post.html">Гра престолів</a>
                            <span>17 Березень, 2041</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //work1 -->

            <!-- work2 -->
            <div class="item">
                <div class="work_item">
                    <div class="work_img"><img src="images/works/2.jpg" alt=""/>
                        <a class="zoom" href="images/works/2.jpg" rel="prettyPhoto[portfolio1]"></a>
                    </div>
                    <div class="work_description">
                        <div class="work_descr_cont">
                            <a href="portfolio-post.html">Мафія</a>
                            <span>17 Березень, 2041</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //work2 -->

            <!-- work3 -->
            <div class="item">
                <div class="work_item">
                    <div class="work_img">
                        <img src="images/works/3.jpg" alt=""/>
                        <a class="zoom" href="images/works/3.jpg" rel="prettyPhoto[portfolio1]"></a>
                    </div>
                    <div class="work_description">
                        <div class="work_descr_cont">
                            <a href="portfolio-post.html">Квести</a>
                            <span>17 March, 2041</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //work3 -->

            <!-- work4 -->
            <div class="item">
                <div class="work_item">
                    <div class="work_img">
                        <img src="images/works/4.jpg" alt=""/>
                        <a class="zoom" href="images/works/4.jpg" rel="prettyPhoto[portfolio1]"></a>
                    </div>
                    <div class="work_description">
                        <div class="work_descr_cont">
                            <a href="portfolio-post.html">Ginger Beast</a>
                            <span>17 March, 2041</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //work4 -->

            <!-- work5 -->
            <div class="item">
                <div class="work_item">
                    <div class="work_img">
                        <img src="images/works/5.jpg" alt=""/>
                        <a class="zoom" href="images/works/5.jpg" rel="prettyPhoto[portfolio1]"></a>
                    </div>
                    <div class="work_description">
                        <div class="work_descr_cont">
                            <a href="portfolio-post.html">Ginger Beast</a>
                            <span>17 March, 2041</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //work5 -->

            <!-- work6 -->
            <div class="item">
                <div class="work_item">
                    <div class="work_img">
                        <img src="images/works/6.jpg" alt=""/>
                        <a class="zoom" href="images/works/6.jpg" rel="prettyPhoto[portfolio1]"></a>
                    </div>
                    <div class="work_description">
                        <div class="work_descr_cont">
                            <a href="portfolio-post.html">Ginger Beast</a> <span>17 March, 2041</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //work6 -->

            <!-- work7 -->
            <div class="item">
                <div class="work_item">
                    <div class="work_img">
                        <img src="images/works/7.jpg" alt=""/>
                        <a class="zoom" href="images/works/7.jpg" rel="prettyPhoto[portfolio1]"></a>
                    </div>
                    <div class="work_description">
                        <div class="work_descr_cont">
                            <a href="portfolio-post.html">Ginger Beast</a>
                            <span>17 March, 2041</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //work7 -->
        </div>
        <!-- //PROJECTS SLIDER -->
    </div>
</section>
<!-- //PHOTOS --> 
