  <div class="th-menu-wrapper onepage-nav">
      <div class="th-menu-area text-center">
          <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
          <div class="mobile-logo">
              <a href="home-travel.html"><img src="{{ asset('assets/img/logolatest1.png') }}" alt="Tourm"></a>
          </div>
          <div class="th-mobile-menu">
              <ul>
                  <li>
                      <a href="{{ url('/') }}">Home</a>
                  </li>
                  <li>
                      <a href="{{ url('/about') }}">About Us</a>
                  </li>

                  <li class="menu-item-has-children">
                      <a href="#">Tour Packages</a>
                      <ul class="sub-menu">
                          <li><a href="{{ url('/inbound-tours') }}">Inbound</a></li>

                      </ul>
                  </li>

                  <li>
                      <a href="{{ url('/rent') }}">Rent Vehicle</a>
                  </li>
                  <li>
                      <a href="{{ url('/transportation') }}">Transportation</a>
                  </li>
                  <li>
                      <a href="{{ url('/airline') }}">Air Line</a>
                  </li>
                  <li>
                      <a href="{{ url('/contact') }}">Contact</a>
                  </li>
              </ul>
          </div>

      </div>
  </div>

  <header class="th-header header-layout1">
      <div class="header-top">
          <div class="container th-container">
              <div class="row justify-content-center justify-content-xl-between align-items-center">
                  <div class="col-auto d-none d-md-block">
                      <!-- Left side content can go here -->
                  </div>
                  <div class="col-auto">
                      <div class="header-right">
                          <div class="currency-menu">
                              <select class="form-select">
                                  <option selected="">Language</option>
                                  <option>English</option>
                                  <option>中文</option>
                                  <option>Español</option>
                                  <option>Français</option>
                              </select>
                          </div>
                          <div class="header-links">
                              <ul>
                                  <li>
                                      <a href="faq.html">
                                          <i class="fas fa-clock"></i>
                                          24/7 Service
                                      </a>
                                  </li>
                                  <li>
                                      <a href="tel:+94114272372">
                                          <i class="fas fa-phone"></i>
                                          Call Now
                                      </a>
                                  </li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <div class="sticky-wrapper">
          <div class="menu-area">
              <div class="container">
                  <div class="row align-items-center justify-content-between">
                      <div class="col-auto">
                          <div class="header-logo">
                              <a href="home-travel.html">
                                  <img src="{{ asset('assets/img/logolatest1.png') }}" alt="Travel Company Logo">
                                  
                              </a>
                          </div>
                      </div>
                      <div class="col-auto d-flex justify-content-end">
                          <nav class="main-menu d-none d-xl-inline-block">
                              <ul>
                                  <li>
                                      <a href="/">Home</a>
                                  </li>
                                  <li>
                                      <a href="/about">About Us</a>
                                  </li>
                                  <li>
                                      <a href="#">Tour Packages</a>
                                      <ul class="sub-menu">
                                          <li><a href="/inbound-tours">Inbound Tours</a></li>
                                          {{-- <li><a href="/outbound-tours">Outbound Tours</a></li>
                                          <li><a href="/custom-tours">Custom Tours</a></li> --}}
                                      </ul>
                                  </li>
                                  <li>
                                      <a href="/rent">Rent Vehicle</a>
                                  </li>
                                  <li>
                                      <a href="/transportation">Transportation</a>
                                  </li>
                                  <li>
                                      <a href="/airline">Airlines</a>
                                  </li>
                                  <li>
                                      <a href="/contact">Contact</a>
                                  </li>
                              </ul>
                          </nav>
                          <button type="button" class="th-menu-toggle d-block d-xl-none">
                              <i class="fas fa-bars"></i>
                          </button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </header>


  <style>
      * {
          margin: 0;
          padding: 0;
          box-sizing: border-box;
      }

      body {
          font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
          line-height: 1.6;
      }

      /* Header Styles */
      .th-header {
          position: relative;
          box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
          background: #fff;
      }

      /* Top Header */
      .header-top {
          background: linear-gradient(135deg, #028ccc 0%, #0066a0 100%);
          padding: 8px 0;
          position: relative;
          overflow: hidden;
      }

      .header-top::before {
          content: '';
          position: absolute;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 20"><defs><pattern id="pattern" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100%" height="100%" fill="url(%23pattern)"/></svg>');
          opacity: 0.3;
      }

      .header-top .container {
          position: relative;
          z-index: 1;
      }

      .header-top .row {
          align-items: center;
      }

      /* Language Selector */
      .currency-menu {
          margin-right: 20px;
      }

      .currency-menu select {
          background: rgba(255, 255, 255, 0.15);
          border: 1px solid rgba(255, 255, 255, 0.3);
          color: white;
          padding: 0px 15px;
          border-radius: 20px;
          backdrop-filter: blur(10px);
          transition: all 0.3s ease;
      }

      .currency-menu select:hover {
          background: rgba(255, 255, 255, 0.25);
          transform: translateY(-1px);
      }

      .currency-menu select option {
          background: #028ccc;
          color: white;
      }

      /* Header Links */
      .header-links ul {
          list-style: none;
          display: flex;
          align-items: center;
          margin: 0;
          padding: 0;
      }

      .header-links li {
          margin-left: 20px;
      }

      .header-links a {
          color: white;
          text-decoration: none;
          font-size: 14px;
          font-weight: 500;
          display: flex;
          align-items: center;
          transition: all 0.3s ease;
          padding: 5px 10px;
          border-radius: 15px;
      }

      .header-links a:hover {
          background: rgba(255, 255, 255, 0.2);
          transform: translateY(-1px);
      }

      .header-links a i {
          margin-right: 5px;
          font-size: 16px;
      }

      /* Main Menu Area */
      /* Main Menu Area */
      .menu-area {
          background: #fff;
          padding: 0px;
          transition: all 0.3s ease;
          border-bottom: 1px solid rgba(0, 0, 0, 0.05);
      }

      .sticky-wrapper.is-sticky .menu-area {
          box-shadow: 0 2px 20px rgba(0, 0, 0, 0.15);
      }

      .menu-area .container {
          padding: 0 15px;
      }

      .menu-area .row {
          align-items: center;
          padding: 5px 0;
      }


      /* Logo Styles */
      .header-logo {
          transition: all 0.3s ease;
      }

      .header-logo:hover {
          transform: scale(1.05);
      }

      .header-logo img {
          max-height: 50px;
          width: auto;
          transition: all 0.3s ease;
      }

      /* Navigation Styles */
      /* Navigation Styles */
      .main-menu ul {
          list-style: none;
          display: flex;
          align-items: center;
          margin: 0;
          padding: 0;
      }

      .main-menu>ul>li {
          position: relative;
          margin: 0 5px;
      }

      .main-menu a {
          color: #333;
          text-decoration: none;
          font-weight: 700;
          font-size: 15px;
          padding: 8px 16px;
          display: block;
          transition: all 0.3s ease;
          position: relative;
          border-radius: 25px;
      }

      .main-menu>ul>li>a {
          padding: 24.5px 0;
      }

      .main-menu>ul>li>a::before {
          content: '';
          position: absolute;
          bottom: 0;
          left: 50%;
          width: 0;
          height: 2px;
          background: linear-gradient(135deg, #028ccc, #0066a0);
          transition: all 0.3s ease;
          transform: translateX(-50%);
      }

      .main-menu>ul>li:hover>a::before {
          width: 80%;
      }

      .main-menu>ul>li:hover>a {
          color: #028ccc;
          background: rgba(2, 140, 204, 0.05);
      }

      /* Dropdown Menu */
      .sub-menu {
          position: absolute;
          top: 100%;
          left: 0;
          background: white;
          min-width: 200px;
          box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
          border-radius: 10px;
          opacity: 0;
          visibility: hidden;
          transform: translateY(10px);
          transition: all 0.3s ease;
          z-index: 1000;
          padding: 10px 0;
      }

      .main-menu li:hover .sub-menu {
          opacity: 1;
          visibility: visible;
          transform: translateY(0);
      }

      .sub-menu li {
          margin: 0;
      }

      .sub-menu a {
          padding: 12px 20px;
          font-weight: 500;
          border-radius: 0;
          transition: all 0.3s ease;
      }

      .sub-menu a:hover {
          background: linear-gradient(135deg, #028ccc, #0066a0);
          color: white;
          padding-left: 30px;
      }

      /* Mobile Menu Toggle */
      .th-menu-toggle {
          background: linear-gradient(135deg, #028ccc, #0066a0);
          border: none;
          color: white;
          border-radius: 8px;
          padding: 10px;
          transition: all 0.3s ease;
          box-shadow: 0 4px 15px rgba(2, 140, 204, 0.3);
      }

      .th-menu-toggle:hover {
          transform: translateY(-2px);
          box-shadow: 0 6px 20px rgba(2, 140, 204, 0.4);
      }

      .th-menu-toggle i {
          font-size: 18px;
      }

      .header-layout1 .currency-menu {
          border: none !important;
          border-radius: 100px;
          padding: 0 !important;
          max-width: 98px !important;
          text-transform: none;
      }

      select,
      .form-control,
      .form-select,
      textarea,
      input {
          height: 23px;

      }

      /* Responsive Design */
      @media (max-width: 1199px) {
          .header-links {
              display: none;
          }

          .currency-menu {
              margin-right: 0;
          }
      }

      @media (max-width: 767px) {
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
  </style>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
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
