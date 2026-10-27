<!--== Start Footer Area Wrapper ==-->
  <footer class="footer-area default-style">
    <div class="footer-main">
      <div class="container">
        <div class="row">
          <div class="col-md-5 col-lg-3">
            <div class="widget-item item-style3">
              <div class="about-widget">
                <a class="footer-logo" href="{{ url('/') }}">
                  <img src="{{ asset('storage/' . $companyProfile->logo_image) }}" alt="Logo">
                </a>
                <p>{{ $companyProfile->short_description }}</p>
                <div class="widget-social-icons">
                  <a href="{{ url($companyProfile->twitter_link) }}" target="_blank"><i class="ion-social-twitter"></i></a>
                  <a href="{{ url($companyProfile->tiktok_link) }}" target="_blank"><i class="ion-social-tumblr"></i></a>
                  <a href="{{ url($companyProfile->facebook_link) }}" target="_blank"><i class="ion-social-facebook"></i></a>
                  <a href="{{ url($companyProfile->instagram_link) }}" target="_blank"><i class="ion-social-instagram-outline"></i></a>
                  <a href="{{ url($companyProfile->youtube_link) }}" target="_blank"><i class="ion-social-youtube-outline"></i></a>
                  <a href="{{ url($companyProfile->linkedin_link) }}" target="_blank"><i class="ion-social-linkedin-outline"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-lg-2">
            <div class="widget-item item-style1">
              <h4 class="widget-title">Quick Links</h4>
              <h4 class="widget-title widget-collapsed-title collapsed" data-bs-toggle="collapse" data-bs-target="#dividerId-1">Quick Links</h4>
              <div id="dividerId-1" class="collapse widget-collapse-body">
                <nav class="widget-menu-wrap">
                  <ul class="nav-menu nav item-hover-style">
                    <li><a href="{{ route('shop.categories.show') }}">- Support</a></li>
                    <li><a href="{{ route('shop.categories.show') }}">- Helpline</a></li>
                    <li><a href="{{ route('shop.categories.show') }}">- Courses</a></li>
                    <li><a href="{{ route('shop.categories.show') }}">- About</a></li>
                    <li><a href="{{ route('shop.categories.show') }}">- Event</a></li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-lg-2">
            <div class="widget-item item-style1">
              <h4 class="widget-title">Other Page</h4>
              <h4 class="widget-title widget-collapsed-title collapsed" data-bs-toggle="collapse" data-bs-target="#dividerId-2">Other Page</h4>
              <div id="dividerId-2" class="collapse widget-collapse-body">
                <nav class="widget-menu-wrap item-hover-style">
                  <ul class="nav-menu nav">
                    <li><a href="{{ route('shop.categories.show') }}">- About</a></li>
                    <li><a href="{{ route('shop.categories.show') }}">- Blog</a></li>
                    <li><a href="{{ route('shop.categories.show') }}">- Speakers</a></li>
                    <li><a href="{{ route('shop.categories.show') }}">- Contact</a></li>
                    <li><a href="{{ route('shop.categories.show') }}">- Tricket</a></li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
          <div class="col-md-5 col-lg-2">
            <div class="widget-item item-style2">
              <h4 class="widget-title">Company</h4>
              <h4 class="widget-title widget-collapsed-title collapsed" data-bs-toggle="collapse" data-bs-target="#dividerId-3">Company</h4>
              <div id="dividerId-3" class="collapse widget-collapse-body">
                <nav class="widget-menu-wrap item-hover-style">
                  <ul class="nav-menu nav">
                    <li><a href="{{ route('shop.categories.show') }}">- Jesco</a></li>
                    <li><a href="{{ route('shop.categories.show') }}">- Shop</a></li>
                    <li><a href="{{ route('shop.categories.show') }}">- Contact us</a></li>
                    <li><a href="{{ route('shop.categories.show') }}">- Log in</a></li>
                    <li><a href="{{ route('shop.categories.show') }}">- Help</a></li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
          <div class="col-md-7 col-lg-3">
            <div class="widget-item">
              <h4 class="widget-title">Store Information.</h4>
              <h4 class="widget-title widget-collapsed-title collapsed" data-bs-toggle="collapse" data-bs-target="#dividerId-4">Store Information.</h4>
              <div id="dividerId-4" class="collapse widget-collapse-body">
                <p class="widget-address">{{ $companyProfile->address }}</p>
                <ul class="widget-contact-info">
                  <li>Fax: <a href="tel://{{ $companyProfile->fax_no }}">{{ $companyProfile->fax_no }}</a></li>
                  <li>Email: <a href="mailto://{{ $companyProfile->email_address  }}">{{ $companyProfile->email_address  }}</a></li>
                </ul>
                <div class="widget-payment-info">
                  <div class="thumb">
                    <a href="{{ route('shop.categories.show') }}"><img src="{{ asset('assets/images/payment1.png') }}" alt="Image"></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="footer-bottom-content">
          <div class="row text-center">
            <div class="col-sm-12">
              <div class="widget-copyright">
                <p><i class="fa fa-copyright"></i> <?php echo date('Y'); ?> <span>developed by Delickate </span> </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-shape bg-img" data-bg-img="{{ asset('assets/images/footer1.png') }}" style="background-image: url(&quot;assets/img/photos/footer1.png&quot;);"></div>
  </footer>
  <!--== End Footer Area Wrapper ==-->