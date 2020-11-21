<!DOCTYPE html>
<html>

<!-- Mirrored from t.commonsupport.com/conpress/contact-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 May 2019 07:42:06 GMT -->
<head>
<meta charset="utf-8">
<title>Conpress Business &amp; Agency HTML Template | Contact Three</title>
<!-- Stylesheets -->
<link href="{{URL::to('public/css/bootstrap.css')}}" rel="stylesheet">
<link href="{{URL::to('public/css/style.css')}}" rel="stylesheet">
<link href="{{URL::to('public/css/responsive.css')}}" rel="stylesheet">

<link rel="shortcut icon" href="{{URL::to('public/images/favicon.png')}}" type="image/x-icon">
<link rel="icon" href="{{URL::to('public/images/favicon.png')}}" type="image/x-icon">
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body>

<div class="page-wrapper">
    
    <!-- Main Header-->
    <header class="main-header header-style-six">
    
        <!-- Main Box -->
        <div class="main-box">
            <div class="auto-container">
                <div class="outer-container clearfix">
                    <!--Logo Box-->
                    <div class="logo-box">
                        <div class="logo"><a href="{{URL::to('/')}}"><img src="{{URL::to('public/images/logo-6.png')}}" alt=""></a></div>
                    </div>
                    
                    <!--Nav Outer-->
                    <div class="nav-outer clearfix">
                        <!-- Main Menu -->
                        <nav class="main-menu">
                            <div class="navbar-header">
                                <!-- Toggle Button -->      
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            
                            <div class="navbar-collapse collapse clearfix">
                                <ul class="navigation clearfix">
                                    <li><a href="{{URL::to('/')}}">Home</a></li>
                                    <li><a href="{{URL::to('/about')}}">About Us</a></li>
                                    <li><a href="{{URL::to('contact')}}">Contact</a></li>
                                    <li><a href="{{URL::to('registration')}}">Registration</a></li>
                                    <li><a href="{{URL::to('login')}}">Login</a></li>
                                 </ul>
                            </div>
                        </nav>
                        <!-- Main Menu End-->
                        
                        <!-- Main Menu End-->
                        <div class="outer-box">
                            <!--Search Box-->
                            <div class="search-box-outer">
                                <div class="dropdown">
                                    <button class="search-box-btn dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-search"></span></button>
                                    <ul class="dropdown-menu pull-right search-panel" aria-labelledby="dropdownMenu3">
                                        <li class="panel-outer">
                                            <div class="form-container">
                                                <form method="post" action="http://t.commonsupport.com/conpress/blog.html">
                                                    <div class="form-group">
                                                        <input type="search" name="field-name" value="" placeholder="Search Here" required>
                                                        <button type="submit" class="search-btn"><span class="fa fa-search"></span></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            
                           <!--  <div class="language dropdown"><a class="btn btn-default dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" href="#">EN <span class="icon fa fa-caret-down"></span></a>
                                <ul class="dropdown-menu style-one" aria-labelledby="dropdownMenu1">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">German</a></li>
                                    <li><a href="#">Arabic</a></li>
                                    <li><a href="#">Hindi</a></li>
                                </ul>
                            </div> -->
                            
                            <!--Nav Toggler-->
                            <!-- <div class="nav-toggler"><span class="flaticon-menu-options"></span></div> -->
                            
                        </div>
                        
                    </div>
                    <!--Nav Outer End-->
                    
                </div>    
            </div>
        </div>
        
        <!--Sticky Header-->
        <div class="sticky-header">
            <div class="auto-container clearfix">
                <!--Logo-->
                <div class="logo pull-left">
                    <a href="{{URL::to('/')}}" class="img-responsive"><img src="{{URL::to('public/images/logo-6.png')}}" alt="" title=""></a>
                </div>
                
                <!--Right Col-->
                <div class="right-col pull-right">
                    <!-- Main Menu -->
                    <nav class="main-menu">
                        <div class="navbar-header">
                            <!-- Toggle Button -->      
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        
                        <div class="navbar-collapse collapse clearfix">
                            <ul class="navigation clearfix">
                                <li><a href="{{URL::to('/')}}">Home</a></li>
                                <li><a href="{{URL::to('/')}}">About Us</a></li>
                                <li><a href="{{URL::to('contact')}}">Contact</a></li>
                                <li><a href="{{URL::to('registration')}}">Registration</a></li>
                                <li><a href="{{URL::to('login')}}">Login</a></li>
                             </ul>
                        </div>
                    </nav><!-- Main Menu End-->
                </div>
                
            </div>
        </div>
        <!--End Sticky Header-->
    
    </header>
    <!--End Main Header -->

    <?php if(Session::get('succes') != null) { ?>
                     <div class="alert alert-info alert-dismissible" role="alert">
                    <a href="#" class="fa fa-times" data-dismiss="alert" aria-label="close"></a>
                    <strong><?php echo Session::get('succes') ;  ?></strong>
                    <?php Session::put('succes',null) ;  ?>
                    </div>
                    <?php } ?>
    <!--Page Title-->
    <section class="page-title" style="background-image:url(public/images/background/6.jpg);">
        <div class="auto-container">
            <h1>Contact us</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{URL::to('/')}}">Home</a></li>
                <li class="active">contact</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->
    
    <!--Contact Section-->
    <section class="contact-section style-two padding-top">
        <div class="auto-container">
            <div class="row clearfix">
                <!--Form Column-->
                <div class="form-column col-md-6 col-sm-6 col-xs-12">
                    <div class="column-inner">

                    <?php if(Session::get('succes') != null) { ?>
                     <div class="alert alert-info alert-dismissible" role="alert">
                    <a href="#" class="fa fa-times" data-dismiss="alert" aria-label="close"></a>
                    <strong><?php echo Session::get('succes') ;  ?></strong>
                    <?php Session::put('succes',null) ;  ?>
                    </div>
                    <?php } ?>

                     <?php if(Session::get('failed') != null) { ?>
                     <div class="alert alert-danger alert-dismissible" role="alert">
                    <a href="#" class="fa fa-times" data-dismiss="alert" aria-label="close"></a>
                    <strong><?php echo Session::get('succes') ;  ?></strong>
                    <?php Session::put('succes',null) ;  ?>
                    </div>
                    <?php } ?>
                        
                        <!--Contact Form-->
                        <div class="contact-form">
                            {!! Form::open(['url' =>'sendContactInfoByEmail','method' => 'post','role' => 'form','class'=>'form-horizontal']) !!}
                                <div class="form-group">
                                    <input type="email" name="email" placeholder="Email Address*" required>
                                </div>
                                    
                                <div class="form-group">
                                    <input type="text" name="subject" placeholder="Subject*" required>
                                </div>
                                    
                                <div class="form-group">
                                    <textarea name="message" placeholder="Your Message*" required></textarea>
                                </div>
                                    
                                <div class="form-group">
                                    <button class="theme-btn btn-style-six" type="submit" name="submit-form">SEND MESSAGE</button>
                                </div>
                            {!! Form::close() !!}
                        </div>
                        
                    </div>
                </div>
                <!--Info Column-->
                <div class="content-column col-md-6 col-sm-6 col-xs-12">
                    <div class="inner">
                        <div class="sec-title-four">
                            <h2>Don’t Hesitate to <br> contact with us for any <br> kind of information</h2>
                        </div>
                        <div class="text">Call us for imiditate support this number</div>
                        <h3>(423) 465-4644</h3>
                        <!--Social Icon Four-->
                        <ul class="social-icon-four">
                            <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                            <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                            <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                            <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Contact Section-->
    
    <!--Map Section-->
    <!-- <section class="map-section"> -->
        <!--Map Outer-->
        <!-- <div class="map-outer"> -->
            <!--Map Canvas-->
            <!-- <div class="map-canvas style-two"
                data-zoom="12"
                data-lat="-37.817085"
                data-lng="144.955631"
                data-type="roadmap"
                data-hue="#ffc400"
                data-title="Envato"
                data-icon-path="{{URL::to('public/images/icons/map-marker.png')}}"
                data-content="Melbourne VIC 3000, Australia<br><a href='mailto:info@youremail.com'>info@youremail.com</a>">
            </div> -->
            <!--Map Info-->
        <!-- </div> -->
    <!-- </section> -->
    <!--End Map Section-->
    
    <!--Footer Style Two-->
    <footer class="footer-style-two alternate">
        <div class="auto-container">
            <!--Widgets Section-->
            <div class="widgets-section">
                <div class="row clearfix">
                    
                    <!--Big Column-->
                    <div class="big-column col-md-8 col-sm-12 col-xs-12">
                        <div class="row clearfix">
                            
                            <!--Footer Column / Logo Widget-->
                            <div class="footer-column col-md-6 col-sm-6 col-xs-12">
                                <div class="footer-widget logo-widget">
                                    <div class="widget-content">
                                        <div class="logo-box">
                                            <a href="index.html"><img src="{{URL::to('public/images/logo-6.png')}}" alt="" /></a>
                                        </div>
                                        <div class="email">support@adlaravel.com</div>
                                        <div class="number">(423) 465-4644</div>
                                    </div>
                                </div>
                            </div>
                            
                            <!--Footer Column / Link Widget-->
                            <div class="footer-column col-md-6 col-sm-6 col-xs-12">
                                <div class="footer-widget link-widget">
                                    <h2>QUick Links</h2>
                                    <div class="widget-content">
                                        <ul>
                                            <li><a href="{{URL::to('/')}}">Home</a></li>
                                            <li><a href="{{URL::to('/about')}}">About Us</a></li>
                                            <li><a href="{{URL::to('contact')}}">Contact</a></li>
                                            <li><a href="{{URL::to('registration')}}">Registration</a></li>
                                            <li><a href="{{URL::to('login')}}">Login</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                    <!--Big Column-->
                    <div class="big-column col-md-4 col-sm-12 col-xs-12">
                        <div class="row clearfix">
                            
                            <!--Footer Column / Link Widget-->
                            <div class="footer-column col-md-6 col-sm-6 col-xs-12">
                                <div class="footer-widget link-widget">
                                    <h2>Quick Contact</h2>
                                    <div class="widget-content">
                                        <ul>
                                            <li><a href="#">Skype</a></li>
                                            <li><a href="#">Facebook</a></li>
                                            <li><a href="#"></a></li>
                                            <li><a href="#">Testimonials</a></li>
                                            <li><a href="#">Blog</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
            
            <!--Footer Bottom-->
            <div class="footer-bottom">
                <div class="row clearfix">
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="copyright">&copy; {{ date('Y') }} <a href="#">Adlaravel.</a> All rights reserved</div>
                    </div>
                    <!--Counter Column-->
                    <div class="counter-column col-md-8 col-sm-12 col-xs-12">
                        <div class="row clearfix">
                        
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="text count-box"><span class="count-text green_color" data-speed="4000" data-stop="20185">0</span>Conversions</div>
                            </div>
                            
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="text count-box"><span class="count-text green_color" data-speed="6000" data-stop="2540">0</span>Offers</div>
                            </div>
                            
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="text count-box"><span class="count-text green_color" data-speed="4000" data-stop="3120">0</span>Publishers</div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </footer>
    <!--End Footer Style Two-->
    
</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-up"></span></div>

<script src="{{URL::to('public/js/jquery.js')}}"></script>
<script src="{{URL::to('public/js/bootstrap.min.js')}}"></script>
<script src="{{URL::to('public/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{URL::to('public/js/jquery.fancybox.pack.js')}}"></script>
<script src="{{URL::to('public/js/jquery.fancybox-media.js')}}"></script>
<script src="{{URL::to('public/js/owl.js')}}"></script>
<script src="{{URL::to('public/js/wow.js')}}"></script>
<script src="{{URL::to('public/js/appear.js')}}"></script>
<script src="{{URL::to('public/js/validate.js')}}"></script>
<script src="{{URL::to('public/js/script.js')}}"></script>

<!--Google Map APi Key-->
<script src="http://maps.google.com/maps/api/js?key=AIzaSyBKS14AnP3HCIVlUpPKtGp7CbYuMtcXE2o"></script>
<script src="{{URL::to('public/js/map-script.js')}}"></script>
<!--End Google Map APi-->

</body>

<!-- Mirrored from t.commonsupport.com/conpress/contact-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 May 2019 07:42:06 GMT -->
</html>