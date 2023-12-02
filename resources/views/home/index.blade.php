<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CertifyRecruit</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{url('storage/css/style.css')}}">
    <link rel="stylesheet" href="{{url('storage/css/responsive.css')}}">
</head>
<body>
     <div class="header">
        <div class="container">
            <div class="header_inner">
                <div class="logo">
                    <a href="#">
                        <img src="{{url('storage/images/logo.svg')}}">
                    </a>
                </div>
                <div class="header_menu">
                    <div class="navigation">
                        <div class="menu_inner">
                            <a href="#home" class="menu_link active" data-target="home">Home</a>
                            <a href="#about-us" class="menu_link" data-target="about-us">About Us</a>
                            <a href="#our-services" class="menu_link" data-target="our-services">Services</a>
                            <a href="#contact-us" class="menu_link" data-target="contact-us">Contact Us</a>
                        </div>
                        <div class="header_btn">
                            <a href="{{ route('login') }}" class="theme-btn">Log In</a>
                        </div>
                    </div>
                    <button class="menu" onclick="this.classList.toggle('opened');this.setAttribute('aria-expanded', this.classList.contains('opened'))" aria-label="Main Menu">
                        <svg  viewBox="0 0 100 100">
                          <path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
                          <path class="line line2" d="M 20,50 H 80" />
                          <path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
                        </svg>
                   </button>
                </div>
            </div>
        </div>
    </div>     
    <div class="hero-banner" id="home">
        <div class="container">
            <div class="banner_inner">
                <div class="banner_left">
                    <div class="banner_left_inner">
                        <div class="banner_content">
                            <h2>Unlock Your Potential with Our Cutting-edge</h2>
                            <h1>Recruitment Assessment Platform</h1>
                        </div>
                        <div class="banner_btn">
                            <a href="{{ route('register') }}"" class="theme-btn">Register Now</a>
                        </div>
                    </div>
                    
                </div>
                <div class="banner_right">
                    <img src="{{url('storage/images/girl_with_laptop.png')}}">
                </div>
            </div>
        </div>
    </div>
    <div class="steps">
        <div class="container">
            <div class="step_parent">
                <div class="step">
                    <img src="{{url('storage/images/01.png')}}">
                    <h3>Pioneering Proficiency Assessment</h3>
                </div>
                <div class="step">
                    <img src="{{url('storage/images/02.svg')}}">
                    <h3>Diverse Assessment Toolkit</h3>
                </div>
                <div class="step">
                    <img src="{{url('storage/images/03.png')}}">
                    <h3>Empowering Individuals</h3>
                </div>
                <div class="step">
                    <img src="{{url('storage/images/04.png')}}">
                    <h3>Enabling Informed Decisions</h3>
                </div>

                
            </div>
        </div>
    </div>
    <div class="about_us_section" id="about-us">
        <div class="about_us_inner">
            <div class="about_left">
                <img src="{{url('storage/images/about.png')}}">
            </div>
            <div class="about_right">
                <h2>About us</h2>
                <h3>CertifyRecruit - Elevating Recruitment Proficiency</h3>
                <div class="custom_scroll about_content">
                    <p>The premier online platform is designed to revolutionize the way individuals and organizations approach the art and science of recruitment. Our mission is to empower individuals seeking to enhance their recruitment skills and enable employers to identify top-tier talent. At CertifyRecruit, we believe that recruitment excellence is not just a goal; it's a journey that we are committed to guiding you through</p>
                    <p>Certify Recruit is an online platform designed to assess and evaluate individuals' capabilities, knowledge, and understanding of the recruitment process. It’s offers various tools and assessments to help gauge a person's proficiency in different aspects of recruiting, such as sourcing candidates, conducting interviews, evaluating resumes, and making hiring decisions.</p>
                    <p>This platform may employ different types of assessments, such as multiple-choice tests, scenario-based simulations, or even interactive exercises to mimic real-world recruitment scenarios. By using CertifyRecruit, individuals seeking to improve their recruitment skills can gain valuable insights into their strengths and areas for improvement.</p>
                </div>
                
            </div>
        </div>
    </div>
    <div class="telent_section">
        <div class="container">
            <div class="telent_inner">
                <div class="telent_left">
                    <!-- <svg xmlns="http://www.w3.org/2000/svg" width="546" height="296" viewBox="0 0 546 296" fill="none">
                        <g style="mix-blend-mode:color-dodge">
                        <path d="M317.559 0C311.644 114.816 216.928 206.087 100.952 206.087C64.5024 206.087 30.1529 197.072 0 181.144V296H423.573C497.013 218.528 542.99 114.632 545.857 0H317.559Z" fill="#D9D9D9"/>
                        <path d="M317.559 0C311.644 114.816 216.928 206.087 100.952 206.087C64.5024 206.087 30.1529 197.072 0 181.144V296H423.573C497.013 218.528 542.99 114.632 545.857 0H317.559Z" fill="url(#paint0_linear_1_381)"/>
                        </g>
                        <defs>
                        <linearGradient id="paint0_linear_1_381" x1="-193.336" y1="81.0032" x2="361.997" y2="315.389" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#07E2FA"/>
                        <stop offset="1" stop-color="#3650F1"/>
                        </linearGradient>
                        </defs>
                        </svg> -->
                </div>
                <div class="telent_right">
                    <div class="telent_right_inner">
                        <h1>Connecting Talents, Empowering Futures</h1>
                        <div class="talent_content">
                            <p>Reach Out to Us Today</p>
                            <a href="{{ route('register') }}" class="theme-btn theme-white-btn">Register Now</a>
                        </div>  
                        
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <div class="our_services_section" id="our-services">
        <div class="service_inner">
            <div class="service_left">
                <img src="{{url('storage/images/service_left.png')}}">
            </div>
            <div class="service_right">
                <div class="theme-title">
                    <h2>Our Services</h2>
                </div>
                <div class="owl-carousel service_slider">
                    <div class="item">
                        <a href="#">
                            <div class="service_box">
                                <div class="service_image">
                                    <img src="{{url('storage/images/service_1.png')}}">
                                </div>
                                <div class="service_title">
                                    <h3>KPI Model for Data- Driven Staffing & Recruitment Company</h3>
                                </div>
                                <div class="service_des">
                                </div>
                                <div class="service_btn">
                                    <p class="theme-btn theme-white-btn open-modal">Contact Us</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <div class="service_box">
                                <div class="service_image">
                                    <img src="{{url('storage/images/service_2.png')}}">
                                </div>
                                <div class="service_title">
                                    <h3>Training Program</h3>
                                </div>
                                <div class="service_des">
                                    <p>Empower Your Recruiting Success with our Comprehensive Training Program</p>
                                </div>
                                <div class="service_btn">
                                    <p class="theme-btn theme-white-btn open-modal">Contact Us</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <div class="service_box">
                                <div class="service_image">
                                    <img src="{{url('storage/images/service_3.png')}}">
                                </div>
                                <div class="service_title">
                                    <h3>Recruitment Community</h3>
                                </div>
                                <div class="service_des">
                                    <p>Where Recruitment Proficiency Meets Community Excellence.</p>
                                </div>
                                <div class="service_btn">
                                    <p class="theme-btn theme-white-btn open-modal">Contact Us</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <div class="service_box">
                                <div class="service_image">
                                    <img src="{{url('storage/images/service_4.png')}}">
                                </div>
                                <div class="service_title">
                                    <h3>Recruiter Assessment</h3>
                                </div>
                                <div class="service_des">
                                    <p>Engage with a range of assessment formats, from multiple-choice tests to scenario-based simulations, mimicking real-world recruitment scenarios.</p>
                                </div>
                                <div class="service_btn">
                                    <a href="{{url('/register')}}" class="theme-btn theme-white-btn">Register Now</a>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-overlay">
        <div class="modal">
            <span class="close-modal">&times;</span>
            <h2>Contact Us</h2>
            <form id="contact-form" action="/contact/store" method="POST">
                @csrf <!-- Add the CSRF token for security -->
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>
                    @error('name')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                    @error('email')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="tel" id="phone" name="phone" required pattern="[0-9]{10}">
                    @error('phone')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="company">Company Name</label>
                    <input type="text" id="company" name="company">
                    @error('company')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="4" required></textarea>
                    @error('message')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="theme-btn">Submit</button>
            </form>
        </div>
    </div>

    <div class="contact_us" id="contact-us">
        <div class="container">
            <div class="contact_deatil">
                <div class="contact_left">
                    <div class="theme_title">
                        <h2>Contact Us Now</h2>
                    </div>
                    <p>Feel free to drop us a message or give us a call, and we'll make sure to respond as quickly as possible. Your success is our priority, and we're committed to providing you with the best recruitment assessment solutions.</p>
                    <div class="contact_detail_wrap">
                        <div class="contact_nub">
                            <div class="contact_img">
                                <img src="{{url('storage/images/mail.png')}}">
                            </div>
                            <a href="#">+91 2657964176</a>
                        </div>
                        <div class="contact_mail">
                            <div class="contact_img">
                                <img src="{{url('storage/images/nub.png')}}">
                            </div>
                            <a href="mailto:info@certifyrecruit.com">info@certifyrecruit.com</a>
                        </div>
                    </div>
                </div>
                <div class="contact_right">
                    <img src="{{url('storage/images/contact.png')}}">
                </div>
            </div>
            
        </div>
    </div>
    <div class="footer">
        <div class="container">
            <div class="footer_inner">
                <div class="footer_one">
                    <div class="footer_logo">
                        <a href="#"><img src="{{url('storage/images/logo.svg')}}"></a>
                    </div>
                    <div class="footer_one_detail">
                        <p>CertifyRecruit is an online platform for assessing recruitment skills. It offers tools to evaluate sourcing, interviewing, and decision-making. Users get insights into strengths and areas to improve. Employers can certify candidates and employees in recruitment tasks, aiding role suitability decisions.</p>
                    </div>
                    <div class="footer_social">
                        <a href="#"><img src="{{url('storage/images/social-1')}}.svg"></a>
                        <a href="https://www.linkedin.com/company/certifyrecruit"><img src="{{url('storage/images/social-2')}}.svg"></a>
                        <a href="https://www.instagram.com/certifyrecruit"><img src="{{url('storage/images/social-3')}}.svg"></a>
                    </div>
                </div>
                <div class="footer_two">
                    <div class="theme_title">
                        <h2>Quick Links</h2>
                    </div>
                    <div class="footer_link">
                        <a href="#home" class="menu_link active" data-target="home">Home</a>
                        <a href="#about-us" class="menu_link" data-target="about-us">About Us</a>
                        <a href="#our-services" class="menu_link" data-target="our-services">Services</a>
                    </div>
                </div>
                <div class="footer_three">
                    <div class="theme_title">
                        <h2>Contact Us</h2>
                    </div>
                    <div class="contact_nub">
                        <img src="{{url('storage/images/mail.png')}}">
                        <a href="#">+91 2657964176</a>
                    </div>
                    <div class="contact_mail">
                        <img src="{{url('storage/images/nub.png')}}">
                        <a href="mailto:info@certifyrecruit.com">info@certifyrecruit.com</a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @if(session('success'))
    <script>
        toastr.options.timeOut = 10000;
        toastr.success("{{ session('success') }}", 'Success');
    </script>
    @endif

    @if(session('error'))
    <script>
        toastr.options.timeOut = 10000;
        toastr.error("{{ session('error') }}", 'Error');
    </script>
    @endif

    <script src="{{url('storage/js/main.js')}}"></script>
</body>
</html>