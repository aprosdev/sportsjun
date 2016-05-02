@extends('home.layout')

@section('content')
                        <!--// Main Banner //-->
                        <div id="mainbanner">
                                <div class="flexslider">
                                        <ul class="slides">
                                                <li>
                                                        <img src="{{ asset('/home/extra-images/slide1.jpg') }}" alt="" />
                                                        <div class="container">
                                                                <div class="kode-caption">       
                                                                        <h2>Your Path to Sports <span>Career</span> and <span>Fame</span></h2>
                                                                        <div class="clearfix"></div>
                                                                      <!--<p>You. Your team.<br>
                                                    Your sports organization.<br>
                                                    One product.<br>
                                                    Everything you need.</p>-->
                                                                        <div class="clearfix"></div>
                                                                        <a class="kode-modren-btn thbg-colortwo" href="javascript:void(0);" data-toggle="modal" data-target="#home-login-modal">Login</a>&nbsp;&nbsp;<span class="or_text">OR</span>&nbsp;&nbsp;
                                                                        <a class="kode-modren-btn thbg-colortwo" href="javascript:void(0);" data-toggle="modal" data-target="#home-register-modal">Register</a>
                                                                </div>
                                                        </div>
                                                </li>
                                        </ul>
                                </div>
                        </div>
                        <!--// Main Banner //-->

                        <!--// Main Content //-->
                        <div class="kode-content padding-top-0">

                                <!--// Page Content //-->
                                <section class="kode-pagesection padding-30-topbottom bg-squre-pattren" id="howitworks">
                                        <div class="container">
                                                <div class="row">

                                                        <div class="kode-result-list shape-view col-md-12">
                                                                <div class="heading heading-12">
                                                                        <h2><span class="left"></span>How SportsJun Works<span class="right"></span></h2>
                                                                </div>
                                                                <div class="clear clearfix"></div>

                                                                <div class="col-md-12 how_img_dis">
                                                                        <h1>Track all Your Sports Performances with one profile</h1>                                  
                                                                        <img src="{{ asset('/home/extra-images/track.png') }}">

                                                                </div>
                                                        </div>

                                                </div>
                                        </div>
                                </section>
                                <!--// Page Content //-->

                                <section class="kode-pagesection kode-parallax kode-modern-expert-blogger features-bg" style="margin-bottom:0;">

                                        <div class="container">
                                                <div class="row">
                                                        <div class="kode-result-list shape-view col-md-12">
                                                                <div class="heading heading-12">
                                                                        <h2 style="color:#FFFFFF;"><span class="left"></span>Features<span class="right"></span></h2>
                                                                </div>
                                                        </div>
                                                </div>

                                                <div class="row text-center">

                                                        <div class="col-md-4 col-sm-4 col-xs-12 features_text">
                                                                <i class="fa fa-5x"><img src="{{ asset('/home/extra-images/player-icon.png') }}" width="60%" height="60%"></i>
                                                                <h3 class="player_color">Player</h3>
                                                                <p>Build individual sports profile (add sports, pictures, specialisation) to join and create teams. One profile for</p>
                                                                <a class="label_more" href="features.html">...</a>
                                                        </div>

                                                        <div class="col-md-4 col-sm-4 col-xs-12 features_text">
                                                                <i class="fa fa-5x"><img src="{{ asset('/home/extra-images/team-icon.png') }}" width="60%" height="60%"></i>
                                                                <h3 class="team_color">TEAMS</h3>
                                                                <p>Create Teams and assign players,managers and admins to manage great teams, stay connected</p>
                                                                <a class="label_more" href="features.html">...</a>
                                                        </div>

                                                        <div class="col-md-4 col-sm-4 col-xs-12 features_text">
                                                                <i class="fa fa-5x"><img src="{{ asset('/home/extra-images/organization.png') }}" width="60%" height="60%"></i>
                                                                <h3 class="organization_color">Organization Structure</h3>
                                                                <p>Create organization and assign all teams part of the organization for easier management</p>
                                                                <a class="label_more" href="features.html">...</a>
                                                        </div>

                                                </div>

                                                <div class="row text-center">

                                                        <div class="col-md-4 col-sm-4 col-xs-12 features_text">
                                                                <i class="fa fa-5x"><img src="{{ asset('/home/extra-images/scores_icon.png') }}" width="60%" height="60%"></i>
                                                                <h3 class="online_score_color">ONLINE SCORING</h3>
                                                                <p>Use scoring system to enter real time and offline scoring for 4 sports (Cricket, Tennis, Badminton, Soccer)</p>
                                                                <a class="label_more" href="features.html">...</a>
                                                        </div>

                                                        <div class="col-md-4 col-sm-4 col-xs-12 features_text">
                                                                <i class="fa fa-5x"><img src="{{ asset('/home/extra-images/league.png') }}" width="60%" height="60%"></i>
                                                                <h3 class="league_color">League and tournaments</h3>
                                                                <p>Super easy league builder for organisers. Manage all aspects of league and tournament scheduling </p>
                                                                <a class="label_more" href="features.html">...</a>
                                                        </div>

                                                        <div class="col-md-4 col-sm-4 col-xs-12 features_text">
                                                                <i class="fa fa-5x"><img src="{{ asset('/home/extra-images/gallery.png') }}" width="60%" height="60%"></i>
                                                                <h3 class="gallery_color">gallery</h3>
                                                                <p>Create albums and post your personal sporting pictures and team events in a snap. Share your amazing</p>
                                                                <a class="label_more" href="features.html">...</a>
                                                        </div>

                                                </div>

                                                <div class="row text-center">

                                                        <div class="col-md-4 col-sm-4 col-xs-12 features_text">
                                                                <i class="fa fa-5x"><img src="{{ asset('/home/extra-images/market-place.png') }}" width="60%" height="60%"></i>
                                                                <h3 class="market_place_color">Market Place</h3>
                                                                <p>Connect with sporting community to buy and sell equipment.</p>
                                                                <a class="label_more" href="features.html">...</a>
                                                        </div>

                                                </div>

                                                <div class="kode-align-btn"><a class="kode-modren-btn thbg-colortwo" href="features.html">View More</a></div>

                                </section>

                                <!--// Page Content //-->

                                <section class="kode-pagesection kode-parallax  kode-modern-expert-blogger sj_white_bg" style="margin-bottom:0;">
                                        <div class="container">
                                                <div class="row">

                                                        <div class="col-md-12">
                                                                <div class="heading heading-12 margin-top-bottom-30">
                                                                        <h2 class="color-white" style="color:#374457;"><span class="left"></span>Tournaments<span class="right"></span></h2>
                                                                </div>

                                                                <div class="kode-blog-list kode-large-blog">
                                                                        <ul class="row">

                                                                                <li class="col-md-4">
                                                                                        <div class="kode-time-zoon">
                                                                                                <time datetime="2008-02-14 20:00">07 <span>may</span></time>
                                                                                                <h5><a href="#">Sed ut perspiciatis unde omnisiste natus error</a></h5>
                                                                                        </div>
                                                                                        <figure><a href="#"><img src="{{ asset('/home/extra-images/bloggird-1.jpg') }}" alt=""></a></figure>
                                                                                        <div class="kode-blog-info">
                                                                                                <p>Lorem ipsum dolor sit amet, cons ecte tuer adipiscing elit, sed diam non ummy nibh euismod tinc idunt ut laoreet dolore magna ali quam erat volutpat. Ut veniam, quis..</p>
                                                                                                <a href="#" class="kode-blog-btn kode_blog_btn_link">...</a>
                                                                                                <div class="clearfix"></div>

                                                                                        </div>
                                                                                </li>
                                                                                <li class="col-md-4">
                                                                                        <div class="kode-time-zoon">
                                                                                                <time datetime="2008-02-14 20:00">07 <span>may</span></time>
                                                                                                <h5><a href="#">Sed ut perspiciatis unde omnisiste natus error</a></h5>
                                                                                        </div>
                                                                                        <figure><a href="#"><img src="{{ asset('/home/extra-images/bloggird-2.jpg') }}" alt=""></a></figure>
                                                                                        <div class="kode-blog-info">
                                                                                                <p>Lorem ipsum dolor sit amet, cons ecte tuer adipiscing elit, sed diam non ummy nibh euismod tinc idunt ut laoreet dolore magna ali quam erat volutpat. Ut veniam, quis..</p>
                                                                                                <a href="#" class="kode-blog-btn kode_blog_btn_link">...</a>
                                                                                                <div class="clearfix"></div>

                                                                                        </div>
                                                                                </li>
                                                                                <li class="col-md-4">
                                                                                        <div class="kode-time-zoon">
                                                                                                <time datetime="2008-02-14 20:00">07 <span>may</span></time>
                                                                                                <h5><a href="#">Sed ut perspiciatis unde omnisiste natus error</a></h5>
                                                                                        </div>
                                                                                        <figure><a href="#"><img src="{{ asset('/home/extra-images/bloggird-3.jpg') }}" alt=""></a></figure>
                                                                                        <div class="kode-blog-info">
                                                                                                <p>Lorem ipsum dolor sit amet, cons ecte tuer adipiscing elit, sed diam non ummy nibh euismod tinc idunt ut laoreet dolore magna ali quam erat volutpat. Ut veniam, quis..</p>
                                                                                                <a href="#" class="kode-blog-btn kode_blog_btn_link">...</a>
                                                                                                <div class="clearfix"></div>

                                                                                        </div>
                                                                                </li>

                                                                        </ul>
                                                                        <div class="kode-align-btn"><a href="#" class="kode-modren-btn thbg-colortwo">View More</a></div>
                                                                </div>
                                                        </div>
                                                </div>

                                        </div>
                                </section>
                                <!--// Page Content //-->
                                <div class="kd-divider divider4"><span></span></div>
@endsection