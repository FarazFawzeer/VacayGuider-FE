
  <div class="th-menu-wrapper onepage-nav">
      <div class="th-menu-area text-center">
          <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
          <div class="mobile-logo ">
              <a href="home-travel.html"><img src="{{ asset('assets/img/vacayguider.png') }}" alt="Tourm"></a>
          </div>
          <div class="th-mobile-menu">
              <ul>
                  <li>
                      <a href="{{ url('/') }}">Home</a>
                  </li>
                  <li>
                      <a href="{{ url('/about') }}">About Us</a>
                  </li>

                  {{-- <li class="menu-item-has-children">
                     <a href="#" class="mobile-submenu-toggle">Services</a>
                      <ul class="sub-menu">
                         

                      </ul>
                  </li> --}}

                   <li><a href="{{ url('/inbound-tours') }}">Inbound</a></li>
                              <li><a href="{{ url('/rent') }}">Rent Vehicle</a></li>
                                  <li><a href="{{ url('/transportation') }}">Transportation</a></li>
                                      <li><a href="{{ url('/airline') }}">Air Line</a></li>

                  <li>
                      <a href="{{ url('/blog') }}">Blog</a>
                  </li>
                  <li>
                      <a href="{{ url('/contact') }}">Contact</a>
                  </li>
              </ul>
          </div>

      </div>
  </div>

<header class="header shadow" id="header">
    <div class="container">
        <div class="header-content">
            <div class="header-logo">
                <a href="#">
                    <img src="{{ asset('assets/img/vacayguider.png') }}" alt="VacayGuider Logo" style="max-height: 75px;">
                </a>
            </div>

            <div class="header-controls">
                <nav>
                    <ul class="main-nav">
                        <li><a href="/" class="{{ Request::is('/') ? 'active' : '' }}">Home</a></li>
                        <li><a href="/about" class="{{ Request::is('about') ? 'active' : '' }}">About Us</a></li>
                        <li>
                            <a href="#"
                                class="{{ Request::is('inbound-tours') || Request::is('rent') || Request::is('transportation') || Request::is('airline') ? 'active' : '' }}">
                                Services <i class="fas fa-chevron-down" style="font-size: 12px; margin-left: 5px;"></i>
                            </a>
                            <ul class="sub-menu">
                                <li><a href="/inbound-tours"
                                        class="{{ Request::is('inbound-tours') ? 'active' : '' }}">Inbound Tours</a>
                                </li>
                                <li><a href="/rent" class="{{ Request::is('rent') ? 'active' : '' }}">Rent Vehicle</a>
                                </li>
                                <li><a href="/transportation"
                                        class="{{ Request::is('transportation') ? 'active' : '' }}">Transportation</a>
                                </li>
                                <li><a href="/airline" class="{{ Request::is('airline') ? 'active' : '' }}">Airlines</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="/blog" class="{{ Request::is('blog') ? 'active' : '' }}">Blog</a></li>
                        <li><a href="/contact" class="{{ Request::is('contact') ? 'active' : '' }}">Contact</a></li>
                    </ul>

                </nav>

                <div class="support-badge">
                    <span>24/7 Support</span>
                </div>

                <div class="language-dropdown">
                    <button class="language-btn">
                        <img src="https://flagcdn.com/us.svg" alt="English" width="20" height="14"
                            style="border-radius: 2px;">
                        <span>Engligh</span>
                        <i class="fas fa-chevron-down" style="font-size: 12px;"></i>
                    </button>
                    <div class="language-menu">
                        <a href="#"><img src="https://flagcdn.com/us.svg" alt="English" width="24">
                            English</a>
                        <a href="#"><img src="https://flagcdn.com/es.svg" alt="Español" width="24">
                            Español</a>
                        <a href="#"><img src="https://flagcdn.com/fr.svg" alt="Français" width="24">
                            Français</a>
                        <a href="#"><img src="https://flagcdn.com/de.svg" alt="Deutsch" width="24">
                            Deutsch</a>
                        <a href="#"><img src="https://flagcdn.com/cn.svg" alt="中文" width="24"> 中文</a>
                    </div>

                </div>

             
            </div>

                <button type="button" class="th-menu-toggle d-block d-xl-none" >
                              <i class="fas fa-bars"></i>
                          </button>
        </div>
    </div>

    </div>
</header>


<style>
    @media (max-width: 1024px) {
        .mobile-nav {
            display: none;
            position: absolute;
            top: 80px;
            left: 0;
            width: 100%;
            background: #0a3d52;
            padding: 20px;
            z-index: 999;
        }

        .mobile-nav.open {
            display: block;
        }

        .mobile-nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            flex-direction: column;
        }

        .mobile-nav a {
            display: block;
            padding: 12px 20px;
            color: white;
            text-decoration: none;
            font-weight: 600;
        }

        .mobile-nav a:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .main-nav {
            display: none !important;
        }

       
        .language-dropdown {
            display: none !important;
        }

            .sub-menu {
        display: none;
        background: #0a3d52;
        padding-left: 20px;
    }

    .sub-menu.open {
        display: block;
    }

    .menu-item-has-children > a::after {
        content: " ▼";
        font-size: 12px;
    }
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        padding-top: 80px;
        /* Space for fixed header */
    }

    .language-btn img {
        margin-right: 8px;
        vertical-align: middle;
    }

    .language-menu a img {
        margin-right: 10px;
        border-radius: 2px;
        vertical-align: middle;
    }

    .language-btn span {
        font-weight: 500;
    }

    .header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background: linear-gradient(135deg, #0d4e6b 0%, #0a3d52 100%);
        z-index: 1000;
        box-shadow: 0 4px 20px rgba(13, 78, 107, 0.3);
        transition: all 0.3s ease;
    }

    .header.scrolled {
        background: rgba(13, 78, 107, 0.95);
        backdrop-filter: blur(10px);
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .header-content {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 12px 0;
        min-height: 80px;
    }

    .header-logo {
        display: flex;
        align-items: center;
    }

    .header-logo img {
        height: 75px;
        width: auto;
        border-radius: 8px;
        transition: transform 0.3s ease;
    }

    .header-logo img:hover {
        transform: scale(1.05);
    }

    .main-nav {
        display: flex;
        align-items: center;
        list-style: none;
        margin: 0 20px;
    }

    .main-nav li {
        position: relative;
        margin: 0 5px;
    }

    .main-nav a {
        color: white;
        text-decoration: none;
        padding: 12px 16px;
        display: block;
        font-weight: 600;
        position: relative;
        transition: color 0.3s ease;
    }

    .main-nav a::after {
        content: '';
        position: absolute;
        bottom: 6px;
        left: 16px;
        right: 16px;
        height: 2px;
        background: white;
        transform: scaleX(0);
        transform-origin: center;
        transition: transform 0.3s ease;
    }

    .main-nav a:hover::after {
        transform: scaleX(1);
    }

    .main-nav a:hover {
        color: #ffffff;
    }

    .main-nav a.active {
        color: #ffffff;
    }

    .main-nav a.active::after {
        transform: scaleX(1);
        background: #ffffff;
        /* gold or highlight color for active state */
    }

    .sub-menu {
        position: absolute;
        top: 100%;
        left: 0;
        background: white;
        list-style: none;
        min-width: 200px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        opacity: 0;
        visibility: hidden;
        transform: translateY(-10px);
        transition: all 0.3s ease;
        z-index: 1001;
    }

    .main-nav li:hover .sub-menu {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .sub-menu li {
        margin: 0;
    }

    .sub-menu a {
        color: #333;
        padding: 12px 20px;
        border-radius: 0;
        font-weight: 400;
    }

    .sub-menu a:hover {
        background: #f8f9fa;
        color: #0d4e6b;
        transform: translateX(5px);
    }

    .header-right {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .support-badge {
        background: #94d106;
        /* Soft green background */
        padding: 10px 18px;
        border-radius: 25px;
        color: #ffffff;
        /* Deep green text */
        font-size: 14px;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 8px;

        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }

    .support-badge:hover {
        background: #dcedc8;
        transform: translateY(-1px);
    }

    .header-controls {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 30px;
        flex: 1;
    }

    nav {
        flex-grow: 1;
    }

    .main-nav {
        justify-content: flex-end;
        margin-right: 20px;
    }


    .language-dropdown .language-btn {
        padding: 10px 18px;
        border-radius: 25px;
        font-size: 14px;

    }

    .language-menu {
        min-width: 180px;
    }

    @keyframes pulse {
        0% {
            opacity: 1;
        }

        50% {
            opacity: 0.5;
        }

        100% {
            opacity: 1;
        }
    }

    .language-dropdown {
        position: relative;
    }

    .language-btn {

        color: white;
        padding: 10px 15px;
        border-radius: 6px;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .language-btn:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: translateY(-2px);
    }

    .language-menu {
        position: absolute;
        top: 100%;
        right: 0;
        background: white;
        min-width: 150px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        opacity: 0;
        visibility: hidden;
        transform: translateY(-10px);
        transition: all 0.3s ease;
        z-index: 1002;
    }

    .language-dropdown:hover .language-menu {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .language-menu a {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px 16px;
        color: #333;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .language-menu a:hover {
        background: #f8f9fa;
        color: #0d4e6b;
    }

    .mobile-toggle {
        display: none;
        background: none;
        border: none;
        color: white;
        font-size: 24px;
        cursor: pointer;
        padding: 8px;
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    .mobile-toggle:hover {
        background: rgba(255, 255, 255, 0.1);
    }

    /* Mobile Styles */
    @media (max-width: 1024px) {
        .main-nav {
            display: none;
        }

        .mobile-toggle {
            display: block;
        }

        .header-right {
            gap: 15px;
        }

        .support-badge {
            padding: 6px 12px;
            font-size: 12px;
        }
    }

    @media (max-width: 768px) {
        .container {
            padding: 0 15px;
        }

        .header-content {
            padding: 8px 0;
            min-height: 70px;
        }

        .header-logo img {
            height: 75px;
        }

        /* .support-badge span {
            display: none;
        } */

        .language-btn span {
            display: none;
        }

        body {
            padding-top: 70px;
        }

                  .header-top {
              padding: 10px 0;
          }

          .header-logo img {
              max-height: 40px;
          }

          .menu-area .row {
              padding: 8px 0;
          }
      }

      /* Animations */
      @keyframes fadeInUp {
          from {
              opacity: 0;
              transform: translateY(20px);
          }

          to {
              opacity: 1;
              transform: translateY(0);
          }
      }

      .th-header {
          animation: fadeInUp 0.6s ease-out;
      }

      /* Hover Effects */
      .header-right {
          display: flex;
          align-items: center;
      }

      /* Enhanced Visual Effects */
      .menu-area::before {
          content: '';
          position: absolute;
          top: 0;
          left: 0;
          right: 0;
          height: 1px;
          background: linear-gradient(90deg, transparent, rgba(2, 140, 204, 0.3), transparent);
      }

      /* Sticky Header Enhancement */
      .sticky-wrapper {
          position: relative;
      }

      .sticky-wrapper.is-sticky {
          position: fixed;
          top: 0;
          left: 0;
          right: 0;
          z-index: 999;
          animation: slideDown 0.3s ease-out;
      }

      @keyframes slideDown {
          from {
              transform: translateY(-100%);
          }

          to {
              transform: translateY(0);
          }
      }
    

    /* Demo content */
    .demo-content {
        padding: 50px 20px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .demo-section {
        background: #f8f9fa;
        padding: 40px;
        margin: 20px 0;
        border-radius: 10px;
        text-align: center;
    }
</style>

  <script>
      // Sticky header functionality
      window.addEventListener('scroll', function() {
          const stickyWrapper = document.querySelector('.sticky-wrapper');
          const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

          if (scrollTop > 100) {
              stickyWrapper.classList.add('is-sticky');
          } else {
              stickyWrapper.classList.remove('is-sticky');
          }
      });


      // Smooth scrolling for anchor links
      document.querySelectorAll('a[href^="#"]').forEach(anchor => {
          anchor.addEventListener('click', function(e) {
              e.preventDefault();
              const target = document.querySelector(this.getAttribute('href'));
              if (target) {
                  target.scrollIntoView({
                      behavior: 'smooth',
                      block: 'start'
                  });
              }
          });
      });

      
      
  </script>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> --}}
