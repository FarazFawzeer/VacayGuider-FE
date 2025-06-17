@extends('frontend.layouts.app')

@section('title', 'Home')

@section('content')

<style>
      
    
   
        
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }
        
        .airline-logos {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 20px;
            justify-content: center;
        }
        
        .airline-logo-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        
        .airline-logo-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .logo-container {
            width: 140px;
            height: 140px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
        }
        
        .airline-logo {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }
        
        .airline-name {
            text-align: center;
            font-weight: bold;
            margin-top: 10px;
            color: #333;
            font-size: 16px;
        }
        
        @media (max-width: 992px) {
            .airline-logos {
                grid-template-columns: repeat(3, 1fr);
            }
            
            .logo-container {
                width: 120px;
                height: 120px;
            }
        }
        
        @media (max-width: 768px) {
            .airline-logos {
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
            }
            
            .logo-container {
                width: 100px;
                height: 100px;
            }
        }
        
        @media (max-width: 480px) {
            .airline-logos {
                grid-template-columns: repeat(1, 1fr);
                gap: 10px;
            }
            
            .logo-container {
                width: 80px;
                height: 80px;
            }
            
            .airline-logo-item {
                padding: 10px;
            }
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
     
        
 
        

        
        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            text-decoration: none;
            color: white;
            display: flex;
            align-items: center;
        }
        
        .logo-icon {
            margin-right: 10px;
            font-size: 2rem;
        }
        
        nav ul {
            display: flex;
            list-style: none;
        }
        
        /* nav ul li {
            margin-left: 1.5rem;
        } */
        
        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }
        
        nav ul li a:hover {
            color: #ffd700;
        }
        
        /* Hero Section */
        .hero {
            background-image: url('/api/placeholder/1200/400');
            background-size: cover;
            background-position: center;
            height: 400px;
            display: flex;
            align-items: center;
            position: relative;
        }
        
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
        }
        
        .hero-content {
            position: relative;
            z-index: 1;
            color: white;
            max-width: 600px;
        }
        
        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        
        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }
        
        /* Search Section */
        .search-section {
            background-color: white;
            padding: 2rem 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: relative;
            margin-top: -50px;
            border-radius: 10px;
            margin-bottom: 2rem;
        }
        
        .search-container {
            width: 90%;
            max-width: 1100px;
            margin: 0 auto;
        }
        
        .search-tabs {
            display: flex;
            margin-bottom: 1.5rem;
        }
        
        .tab {
            padding: 1rem 1.5rem;
            background-color: #e9ecef;
            cursor: pointer;
            border-radius: 5px 5px 0 0;
            font-weight: 500;
            margin-right: 5px;
        }
        
        .tab.active {
            background-color: #0062cc;
            color: white;
        }
        
        .search-box {
            background-color: white;
            padding: 1.5rem;
            border-radius: 0 5px 5px 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }
        
        .search-row {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 1rem;
        }
        
        .search-group {
            flex: 1;
            min-width: 200px;
        }
        
        .search-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
            color: #555;
        }
        
        .search-group input,
        .search-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }
        
        .search-btn {
            background-color: #ff6b00;
            color: white;
            border: none;
            padding: 12px 30px;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 1rem;
        }
        
        .search-btn:hover {
            background-color: #e05f00;
        }
        
        /* Features Section */
        .features {
            padding: 3rem 0;
            background-color: white;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 2.5rem;
            color: #0033a0;
        }
        
        .features-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;        
        }
        
        .feature-card {
            flex-basis: calc(33.333% - 20px);
            background: linear-gradient(to bottom right, #fff8eb, #fff2d9);
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
            border-left: 4px solid #f39c12;
            transition: transform 0.3s, box-shadow 0.3s;
            text-align: center;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }
        
        .feature-icon {
            font-size: 2.5rem;
            color: #0062cc;
            margin-bottom: 1rem;
        }
        
        .feature-card h3 {
            margin-bottom: 0.8rem;
            color: #333;
        }
        



   
        
        /* Responsive Design */
        @media (max-width: 992px) {
            .feature-card {
                flex-basis: calc(50% - 15px);
            }
            
           
        }
        
        @media (max-width: 768px) {
        
     
            
        
            
            .search-row {
                flex-direction: column;
                gap: 10px;
            }
            
            .feature-card {
                flex-basis: 100%;
            }
            
     
        }
    </style>
</style>

<div class="container-fluid about-hero text-white position-relative" 
     style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('assets/img/avenue-815297_1920.jpg') center center / cover no-repeat; 
     display: flex;
     align-items: center;">
  <div class="container text-center">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="hero-style7">
          <span class="sub-title style1 text-white d-block mb-2">Air Line</span>
          <h1 class="hero-title text-white display-4 mb-0" style="font-weight: 700;">Choose Your Airline</h1>
        </div>
      </div>
    </div>
  </div>
</div>


    <section class="partner-airlines">
        <div class="container">

            <div class="title-area text-center mb-5" style="margin-top: -60px; padding-top: 100px;">
            
                <!-- <h2 class="sec-title" style="font-family: 'Montserrat', sans-serif; font-size: 42px; font-weight: 700; color: #1a2b49; margin-bottom: 20px;">Choose Your Airline</h2>
                <div class="title-separator" style="width: 80px; height: 3px; background: linear-gradient(90deg, #0069d9, #00a2ff); margin: 0 auto;"></div> -->
            </div>
            <div class="airline-logos">
                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/Air Asia.png" alt="Air Asia" class="airline-logo">
                    </div>
                    <p class="airline-name">Air Asia</p>
                </div>
            
                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/air india.png" alt="Air India" class="airline-logo">
                    </div>
                    <p class="airline-name">Air India</p>
                </div>
            
                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/Airarabia.png" alt="Air Arabia" class="airline-logo">
                    </div>
                    <p class="airline-name">Air Arabia</p>
                </div>
            
                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/azur air.png" alt="Azur Air" class="airline-logo">
                    </div>
                    <p class="airline-name">Azur Air</p>
                </div>
            
                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/china.png" alt="China Airlines" class="airline-logo">
                    </div>
                    <p class="airline-name">China Airlines</p>
                </div>
            
                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/Emirates.png" alt="Emirates" class="airline-logo">
                    </div>
                    <p class="airline-name">Emirates</p>
                </div>
            
                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/Etihad.png" alt="Etihad" class="airline-logo">
                    </div>
                    <p class="airline-name">Etihad</p>
                </div>
            
                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/FitsAir.png" alt="FitsAir" class="airline-logo">
                    </div>
                    <p class="airline-name">FitsAir</p>
                </div>
            
                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/flydubai.png" alt="Flydubai" class="airline-logo">
                    </div>
                    <p class="airline-name">Flydubai</p>
                </div>
            
                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/indigo.png" alt="IndiGo" class="airline-logo">
                    </div>
                    <p class="airline-name">IndiGo</p>
                </div>
            
                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/jazeera.png" alt="Jazeera Airways" class="airline-logo">
                    </div>
                    <p class="airline-name">Jazeera Airways</p>
                </div>
            
                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/malaysia.png" alt="Malaysia Airlines" class="airline-logo">
                    </div>
                    <p class="airline-name">Malaysia Airlines</p>
                </div>
            
                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/Qatar Airways.jpeg" alt="Qatar Airways" class="airline-logo">
                    </div>
                    <p class="airline-name">Qatar Airways</p>
                </div>
            
                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/salam air.png" alt="Salam Air" class="airline-logo">
                    </div>
                    <p class="airline-name">Salam Air</p>
                </div>
            
                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/seychelle.png" alt="Air Seychelles" class="airline-logo">
                    </div>
                    <p class="airline-name">Air Seychelles</p>
                </div>
            
                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/singapore.png" alt="Singapore Airlines" class="airline-logo">
                    </div>
                    <p class="airline-name">Singapore Airlines</p>
                </div>
            
                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/SriLankan.png" alt="SriLankan Airlines" class="airline-logo">
                    </div>
                    <p class="airline-name">SriLankan Airlines</p>
                </div>
            
                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/thai.png" alt="Thai Airways" class="airline-logo">
                    </div>
                    <p class="airline-name">Thai Airways</p>
                </div>
            
                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/turkish.png" alt="Turkish Airlines" class="airline-logo">
                    </div>
                    <p class="airline-name">Turkish Airlines</p>
                </div>
            </div>
            
        </div>
    </section>
<!-- Features Section -->
<section class="features">
    <div class="container">

        <div class="title-area text-center mb-5" style="margin-top: -60px; padding-top: 100px;">
            
            <h2 class="sec-title" style="font-family: 'Montserrat', sans-serif; font-size: 42px; font-weight: 700; color: #1a2b49; margin-bottom: 20px;">Why Choose Us</h2>
            <div class="title-separator" style="width: 80px; height: 3px; background: linear-gradient(90deg, #0069d9, #00a2ff); margin: 0 auto;"></div>
        </div>
        <div class="features-container">
            <div class="feature-card">
                <div class="feature-icon">🔄</div>
                <h3>Free Date Change</h3>
                <p>Enjoy flexibility with our free date change policy on select flights. Plans change, and we understand.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">💰</div>
                <h3>Best Price </h3>
                <p>Find a lower price elsewhere? We'll match it and give you extra discount.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🎁</div>
                <h3>Loyalty Rewards</h3>
                <p>Earn points with every flight and redeem them for free flights, upgrades, and more.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🛡️</div>
                <h3>Secure Payment</h3>
                <p>Book with confidence using our secure payment system with multiple payment options.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🌎</div>
                <h3>Global Coverage</h3>
                <p>Flying to over 150 destinations worldwide with convenient connections.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🎫</div>
                <h3>Instant E-Tickets</h3>
                <p>Receive your electronic tickets instantly upon confirmation of your booking.</p>
            </div>
        </div>
    </div>
</section>




<section class="bg-gradient-to-r from-blue-50 to-white py-12 px-4 sm:px-6 lg:px-8">
        
    <!-- 🔁 How It Works -->
    <div class="text-center " style="margin-bottom: 70px;">
        <h2 class="sec-title" style="font-weight: bold;">How It Works</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto px-4">
          
          <!-- Step 1 -->
          <div class="rounded-2xl shadow-md p-6 transition hover:shadow-lg"  style="background: linear-gradient(135deg, #e6f7e9 0%, #c8e6d2 100%);">
            <div class="text-black-700 font-bold text-lg mb-2">1. Submit Your Request</div>
            <p class="text-gray-600 text-base">Use the form below to tell us your travel dates and preferences.</p>
          </div>
      
          <!-- Step 2 -->
          <div class=" rounded-2xl shadow-md p-6 transition hover:shadow-lg" style="background: linear-gradient(135deg, #e6f7e9 0%, #c8e6d2 100%);">
            <div class="text-black-700 font-bold text-lg mb-2">2. Get a Quote</div>
            <p class="text-gray-600 text-base">We’ll send you a personalized package and price within 24 hours.</p>
          </div>
      
          <!-- Step 3 -->
          <div class=" rounded-2xl shadow-md p-6 transition hover:shadow-lg" style="background: linear-gradient(135deg, #e6f7e9 0%, #c8e6d2 100%);">
            <div class="text-black-700 font-bold text-lg mb-2">3. Confirm & Travel</div>
            <p class="text-gray-600 text-base">Once confirmed, we handle everything so you can enjoy your trip worry-free.</p>
          </div>
      
        </div>
      </div>
      

        <div class="max-w-4xl mx-auto">


          <div class="bg-white rounded-2xl shadow-xl p-6 sm:p-8">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-center text-blue-900 mb-4">Check Your Reservation</h2>
            <p class="text-center text-gray-600 mb-6 sm:mb-8">Fill out the form below to check availability and receive a personalized quote.</p>
            

            
            <form class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Full Name -->
                <div class="md:col-span-2">
                  <label for="fullName" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                  <input type="text" id="fullName" name="fullName" required placeholder="John Doe"
                    class="w-full px-4 py-3 border border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none" />
                </div>
              
                <!-- Email -->
                <div>
                  <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                  <input type="email" id="email" name="email" required placeholder="example@mail.com"
                    class="w-full px-4 py-3 border border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none" />
                </div>
              
                <!-- Phone -->
                <div>
                  <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                  <input type="tel" id="phone" name="phone" required placeholder="+1 123-456-7890"
                    class="w-full px-4 py-3 border border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none" />
                </div>
              
                <!-- WhatsApp -->
                <div>
                  <label for="whatsapp" class="block text-sm font-medium text-gray-700 mb-1">WhatsApp</label>
                  <input type="text" id="whatsapp" name="whatsapp" required placeholder="+1 123-456-7890"
                    class="w-full px-4 py-3 border border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none" />
                </div>
              
                <!-- Country -->
                <div>
                  <label for="country" class="block text-sm font-medium text-gray-700 mb-1">Country</label>
                  <input type="text" id="country" name="country" required placeholder="USA"
                    class="w-full px-4 py-3 border border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none" />
                </div>
              
                <!-- Trip Type -->
                <div>
                  <label for="tripType" class="block text-sm font-medium text-gray-700 mb-1">Trip Type</label>
                  <select id="tripType" name="tripType" required
                    class="w-full px-4 py-3 border border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    <option value="">Select Trip Type</option>
                    <option value="oneway">One Way</option>
                    <option value="roundtrip">Round Trip</option>
                  </select>
                </div>
              
                <!-- From Airport -->
                <div>
                  <label for="from" class="block text-sm font-medium text-gray-700 mb-1">From</label>
                  <input type="text" id="from" name="from" required placeholder="e.g., Colombo (CMB)"
                    class="w-full px-4 py-3 border border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none" />
                </div>
              
                <!-- To Airport -->
                <div>
                  <label for="to" class="block text-sm font-medium text-gray-700 mb-1">To</label>
                  <input type="text" id="to" name="to" required placeholder="e.g., Dubai (DXB)"
                    class="w-full px-4 py-3 border border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none" />
                </div>
              
                <!-- Departure Date -->
                <div>
                  <label for="departureDate" class="block text-sm font-medium text-gray-700 mb-1">Departure Date</label>
                  <input type="date" id="departureDate" name="departureDate" required
                    class="w-full px-4 py-3 border border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none" />
                </div>
              
                <!-- Return Date (optional; show conditionally via JS if round trip) -->
                <div>
                  <label for="returnDate" class="block text-sm font-medium text-gray-700 mb-1">Return Date</label>
                  <input type="date" id="returnDate" name="returnDate"
                    class="w-full px-4 py-3 border border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none" />
                </div>
              
                <!-- Passengers -->
                <div>
                  <label for="passengers" class="block text-sm font-medium text-gray-700 mb-1">Passengers</label>
                  <input type="number" id="passengers" name="passengers" required min="1" value="1"
                    class="w-full px-4 py-3 border border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none" />
                </div>
              
                <!-- Message -->
                <div class="md:col-span-3">
                  <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                  <textarea id="message" name="message" rows="4" placeholder="Any special requests or instructions..."
                    class="w-full px-4 py-3 border border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none"></textarea>
                </div>
              
                <!-- Submit Button -->
                <div class="md:col-span-3 text-center pt-4">
                  <button type="submit"
                    class="w-full md:w-auto px-10 py-3 bg-black text-white font-bold rounded-xl transition duration-300">
                    Submit Request
                  </button>
                </div>
              </form>
              
        
       
      </div>

      <div class="text-center  style="style="margin-top: 45px;">
        <p class="text-sm text-gray-500">🌟 Rated 4.8/5 by over 1,200 happy travelers</p>
        <p class="text-xs text-gray-400 mt-1">Your data is secure and never shared. We value your privacy.</p>
      </div>


     
</div>






</section>


@endsection