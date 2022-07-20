<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Homeland &mdash; Colorlib Website Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500"> 
    <link rel="stylesheet" href="{{asset('client/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('client/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/mediaelementplayer.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('client/fonts/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/fl-bigmug-line.css')}}">
    
  
    <link rel="stylesheet" href="{{asset('client/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('client/css/style.css')}}">
    
  </head>
  <body>
  
    <div class="site-loader"></div>
    
    <div class="site-wrap">
  
      <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div> <!-- .site-mobile-menu -->
  
      <div class="site-navbar mt-4">
          <div class="container py-1">
            <div class="row align-items-center">
              <div class="col-8 col-md-8 col-lg-4">
                <h1 class="mb-0"><a href="index.html" class="text-white h2 mb-0"><strong>Homeland<span class="text-danger">.</span></strong></a></h1>
              </div>
              <div class="col-4 col-md-4 col-lg-8">
                <nav class="site-navigation text-right text-md-right" role="navigation">
  
                  <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>
  
                  <ul class="site-menu js-clone-nav d-none d-lg-block">
                    <li class="active">
                      <a href="index.html">Home</a>
                    </li>
                    <li><a href="buy.html">Buy</a></li>
                    <li><a href="rent.html">Rent</a></li>
                    <li class="has-children">
                      <a href="properties.html">Properties</a>
                      <ul class="dropdown arrow-top">
                        <li><a href="#">Condo</a></li>
                        <li><a href="#">Property Land</a></li>
                        <li><a href="#">Commercial Building</a></li>
                        <li class="has-children">
                          <a href="#">Sub Menu</a>
                          <ul class="dropdown">
                            <li><a href="#">Menu One</a></li>
                            <li><a href="#">Menu Two</a></li>
                            <li><a href="#">Menu Three</a></li>
                          </ul>
                        </li>
                      </ul>
                    </li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="contact.html">Contact</a></li>
                  </ul>
                </nav>
              </div>
             
  
            </div>
          </div>
        </div>
      </div>
    </div>
    
      @yield('banner')

    <div class="site-section site-section-sm pb-0">
        <div class="container">
            @yield('search')
            @yield('filter')
        </div>
    </div>
    @yield('real_estates')

      <div class="site-section">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-7 text-center">
              <div class="site-section-title">
                <h2>Why Choose Us?</h2>
              </div>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis maiores quisquam saepe architecto error corporis aliquam. Cum ipsam a consectetur aut sunt sint animi, pariatur corporis, eaque, deleniti cupiditate officia.</p>
            </div>
          </div>
  
          <div class="row">
            <div class="col-md-6 col-lg-4">
              <a href="#" class="service text-center">
                <span class="icon flaticon-house"></span>
                <h2 class="service-heading">Research Subburbs</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt iure qui natus perspiciatis ex odio molestia.</p>
                <p><span class="read-more">Read More</span></p>
              </a>
            </div>
            <div class="col-md-6 col-lg-4">
              <a href="#" class="service text-center">
                <span class="icon flaticon-sold"></span>
                <h2 class="service-heading">Sold Houses</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt iure qui natus perspiciatis ex odio molestia.</p>
                <p><span class="read-more">Read More</span></p>
              </a>
            </div>
            <div class="col-md-6 col-lg-4">
              <a href="#" class="service text-center">
                <span class="icon flaticon-camera"></span>
                <h2 class="service-heading">Security Priority</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt iure qui natus perspiciatis ex odio molestia.</p>
                <p><span class="read-more">Read More</span></p>
              </a>
            </div>
          </div>
        </div>
      </div>

    <!--Blog-->
    @yield('news')

      <!--footer-->
      <footer class="site-footer">
        <div class="container">
          <div class="row">
            <div class="col-lg-4">
              <div class="mb-5">
                <h3 class="footer-heading mb-4">About Homeland</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe pariatur reprehenderit vero atque, consequatur id ratione, et non dignissimos culpa? Ut veritatis, quos illum totam quis blanditiis, minima minus odio!</p>
              </div>
  
              
              
            </div>
            <div class="col-lg-4 mb-5 mb-lg-0">
              <div class="row mb-5">
                <div class="col-md-12">
                  <h3 class="footer-heading mb-4">Navigations</h3>
                </div>
                <div class="col-md-6 col-lg-6">
                  <ul class="list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Buy</a></li>
                    <li><a href="#">Rent</a></li>
                    <li><a href="#">Properties</a></li>
                  </ul>
                </div>
                <div class="col-md-6 col-lg-6">
                  <ul class="list-unstyled">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Terms</a></li>
                  </ul>
                </div>
              </div>
  
  
            </div>
  
            <div class="col-lg-4 mb-5 mb-lg-0">
              <h3 class="footer-heading mb-4">Follow Us</h3>
  
                  <div>
                    <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                    <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                    <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                    <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                  </div>
  
              
  
            </div>
            
          </div>
          <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
              <p>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </p>
            </div>
            
          </div>
        </div>
      </footer>

    </div>

    <script src="{{asset('client/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('client/js/jquery-migrate-3.0.1.min.js')}}"></script>
    <script src="{{asset('client/js/jquery-ui.js')}}"></script>
    <script src="{{asset('client/js/popper.min.js')}}"></script>
    <script src="{{asset('client/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('client/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('client/js/mediaelement-and-player.min.js')}}"></script>
    <script src="{{asset('client/js/jquery.stellar.min.js')}}"></script>
    <script src="{{asset('client/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('client/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('client/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('client/js/aos.js')}}"></script>
  
    <script src="{{asset('client/js/main.js')}}"></script>
      
    </body>
  </html>