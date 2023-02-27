  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <nav class="main-nav">
                      <!-- ***** Logo Start ***** -->
                      <a href="{{route('home')}}" class="logo">
                          <h4>SOCIAL MEDIA <img src="{{ asset('assets/images/logo-icon.png') }}" alt=""></h4>
                      </a>
                      <!-- ***** Logo End ***** -->
                      <!-- ***** Menu Start ***** -->
                      <ul class="nav">
                          <li class="scroll-to-section"><a href="{{Route::currentRouteName() == 'home' ? '#top' : '/'}}" class="active">Home</a></li>
                          <li class="scroll-to-section"><a href="{{Route::currentRouteName() == 'home' ? '#features' : '/'}}">How It Work</a></li>
                          <li class="scroll-to-section"><a href="{{Route::currentRouteName() == 'home' ? '#about' : '/'}}">About Us</a></li>
                          <li class="scroll-to-section"><a href="{{Route::currentRouteName() == 'home' ? '#services' : '/'}}">Services</a></li>
                          <li class="scroll-to-section"><a href="mailto:support@speedrequest.net"><i class="fa fa-envelope"></i> support@speedrequest.net</a></li>
                          <li class="scroll-to-section"></li>
                      </ul>
                      <a class='menu-trigger'>
                          <span>Menu</span>
                      </a>
                      <!-- ***** Menu End ***** -->
                  </nav>
              </div>
          </div>
      </div>
  </header>
  <!-- ***** Header Area End ***** -->
