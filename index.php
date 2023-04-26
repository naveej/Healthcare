<?php
session_start();
if(isset($_SESSION['loggedin'])){
    header('location: dashboard.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthConnect</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Crimson+Pro:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/root.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
</head>

<body>
    <header class="header" id="header">
        <nav class="nav">
            <a class="nav__logo-link"><img src="images/logo.png" alt="HealthConnect logo" class="nav__logo" id="logo"
                    data-version-number="1.0" /></a>
            <ul class="nav__links">
                <li class="nav__item">
                    <a class="nav__link" href="#section--1">Features</a>
                </li>
                <li class="nav__item">
                    <a class="nav__link" href="#section--2">Operations</a>
                </li>
                <li class="nav__item">
                    <a class="nav__link" href="#section--3">Testimonials</a>
                </li>
                <li class="nav__item">
                    <a class="nav__link nav__link--btn btn--show-modal" href="#">Register</a>
                </li>
                <li class="nav__item">
                    <a class="nav__link nav__link--btn-login btn--show-modal-login" href="#">Login</a>
                </li>
            </ul>
        </nav>

        <div class="header__title">
            <h1>
                Leading the way in <span class="highlight">Compassionate</span> and innovative <span
                    class="highlight">healthcare</span>


                <!-- red highlight effect -->
                <br />

            </h1>
            <h4>A simpler healthcare experience for a simpler life.</h4>
            <button class="btn--text btn--scroll-to">Learn more &DownArrow;</button>
            <img src="images/healthcareitems.png" class="header__img" alt="Healthcare items" />
        </div>
    </header>

    <section class="section" id="section--1">
        <div class="section__title">
            <h2 class="section__description">Features</h2>
            <h3 class="section__header">
                Everything you need about Health Connect.
            </h3>
        </div>

        <div class="features">
            <img class='features__img' src="images/user_reg_blur.jpg" data-src="images/user-Registration-1.png" alt="Computer" class="features__img lazy-img" />
            <div class="features__feature">
                <div class="features__icon">
                <i class='bx bxs-user'></i>
                </div>
                <h5 class="features__header">User registration</h5>
                <p>
                Allow users to create their own accounts to save their preferences and settings.
                </p>
            </div>

            <div class="features__feature">
                <div class="features__icon">
                <i class='bx bx-search-alt' ></i>
                </div>
                <h5 class="features__header">Search functionality</h5>
                <p>
                Allow users to search for specific lifestyle recommendations, such as food, fitness.
                </p>
            </div>
            <img class='features__img' src="images/search blur.jpg" data-src="images/search.jpg" alt="Search" class="features__img lazy-img" />

            <img src="images/diet blur.jpg" data-src="images/diet.jpg" alt="Diet" class="features__img lazy-img" />
            <div class="features__feature">
                <div class="features__icon">
                <i class='bx bxs-bowl-rice' ></i>
                </div>
                <h5 class="features__header">Diet Recommendations</h5>
                <p>
                    Get customized diet recommendations based on regular food intake
                    
                </p>
            </div>
        </div>
    </section>

    <section class="section" id="section--2">
        <div class="section__title">
            <h2 class="section__description">Operations</h2>
            <h3 class="section__header">
                Everything as simple as possible, but no simpler.
            </h3>
        </div>

        <div class="operations">
            <div class="operations__tab-container">
                <button class="btn operations__tab operations__tab--1 operations__tab--active" data-tab="1">
                    <span>01</span>User Login
                </button>
                <button class="btn operations__tab operations__tab--2" data-tab="2">
                    <span>02</span>User Registration
                </button>
                <button class="btn operations__tab operations__tab--3" data-tab="3">
                    <span>03</span>Search functionality                </button>
            </div>
            <div class="operations__content operations__content--1 operations__content--active">
                <div class="operations__icon operations__icon--1">
                <i class='bx bx-right-arrow-alt' ></i>
                </div>
                <h5 class="operations__header">
                This is the unique identifier that you use to log in to your account. Make sure it is something you can remember easily.
                </h5>
                <p>
                
                </p>
            </div>

            <div class="operations__content operations__content--2">
                <div class="operations__icon operations__icon--2">
                <i class='bx bxs-user' ></i>

                </div>
                <h5 class="operations__header">
                User registration is the process by which a user creates an account or profile on a website.It typically involves providing personal information, such as a name, email address, and password, and agreeing to the terms and conditions of the platform.
                </h5>
                <p>
                    
                </p>
            </div>
            <div class="operations__content operations__content--3">
                <div class="operations__icon operations__icon--3">
                <i class='bx bx-search-alt' ></i>
                </div>
                <h5 class="operations__header">
                Search functionality refers to the ability to search for and retrieve specific information from a database or website. It is a critical component of many websites and applications, allowing users to quickly and easily find the diet plan they are looking for.
                </h5>
                <p>
                    
                </p>
            </div>
        </div>
    </section>

    <section class="section" id="section--3">
        <div class="section__title section__title--testimonials">
            <h2 class="section__description">Not sure yet?</h2>
            <h3 class="section__header">
                Come join us to have healthier diet plan
            </h3>
        </div>

        <div class="slider">
            <div class="slide slide--1">
                <div class="testimonial">
                    <h5 class="testimonial__header">Best diet plan!</h5>
                    <blockquote class="testimonial__text">
                    I gained about 40 pounds in less than 2 years and noticed my cholesterol had rapidly increased. I decided it was time for a change if I wanted to stay fit and healthy. I felt scared being listed as “obese”. I knew the weight had to come off. I didn’t know how fast I would lose weight and was a bit skeptical, but only 5 months later on this program I am a size 6 instead of a size 12. I found a healthy balance with not restricting myself to certain things I like, such as Starbucks or desserts, but just limiting the amount I consumed. I incorporated daily walking into my routine as well as taking the stairs instead of elevators.
                    </blockquote>
                    <address class="testimonial__author">
                        <img src="images/user-1.jpg" alt="" class="testimonial__photo" />
                        <h6 class="testimonial__name">Aarav Lynn</h6>
                        <p class="testimonial__location">San Francisco, USA</p>
                    </address>
                </div>
            </div>

            <div class="slide slide--2">
                <div class="testimonial">
                    <h5 class="testimonial__header">
                        Very health beneficial
                    </h5>
                    <blockquote class="testimonial__text">
                    “I’ve been on the HealthConnect for two weeks. I am really excited, it’s unbelievable! In two weeks, I am just so empowered. Every day I look forward to everything that’s new, so I am excited… on top of everything, I was like, ‘You know what, I’m going to trust HealthConnect!’” 
                    </blockquote>
                    <address class="testimonial__author">
                        <img src="images/user-2.jpg" alt="" class="testimonial__photo" />
                        <h6 class="testimonial__name">Miyah Miles</h6>
                        <p class="testimonial__location">London, UK</p>
                    </address>
                </div>
            </div>


            <!-- <div class="slide"><img src="img/img-1.jpg" alt="Photo 1" /></div>
            <div class="slide"><img src="img/img-2.jpg" alt="Photo 2" /></div>
            <div class="slide"><img src="img/img-3.jpg" alt="Photo 3" /></div>
            <div class="slide"><img src="img/img-4.jpg" alt="Photo 4" /></div> -->
            <button class="slider__btn slider__btn--left">&larr;</button>
            <button class="slider__btn slider__btn--right">&rarr;</button>
            <div class="dots"></div>
        </div>
    </section>

    <section class="section section--sign-up">
        <div class="section__title">
            <h3 class="section__header">
                The best day to join HealthConnect today
            </h3>
        </div>
        <button class="btn btn--show-modal">Register Now...!</button>
    </section>

    <footer class="footer">
        <ul class="footer__nav">
            <li class="footer__item">
                <a class="footer__link" href="#">About</a>
            </li>
            <li class="footer__item">
                <a class="footer__link" href="#">Pricing</a>
            </li>
            <li class="footer__item">
                <a class="footer__link" href="#">Terms of Use</a>
            </li>
            <li class="footer__item">
                <a class="footer__link" href="#">Privacy Policy</a>
            </li>
            <li class="footer__item">
                <a class="footer__link" href="#">Careers</a>
            </li>
            <li class="footer__item">
                <a class="footer__link" href="#">Blog</a>
            </li>
            <li class="footer__item">
                <a class="footer__link" href="#">Contact Us</a>
            </li>
        </ul>
        <img src="images/logo.png" alt="Logo" class="footer__logo" />
        <p class="footer__copyright">
            &copy; Copyright byHO9
        </p>
    </footer>

    <div class="modal hidden">
        <button class="btn--close-modal">&times;</button>
        <h2 class="modal__header">
            Register with &nbsp;<span class="highlight">HealthConnect</span>
        </h2>
        <form class="modal__form" id="registrationForm">
            <label>First Name</label>
            <input type="text"  name="firstName"/>
            <label>Last Name</label>
            <input type="text"  name="lastName"/>
            <label>Email Address</label>
            <input type="email" name="email" />
            <label>Phone Number</label>
            <input type="text"  name="mobile"/>
            <label>Password</label>
            <input type="password" class="login__password" name="password"/>
            <label for="showPassword">Show Password</label>
            <input class="show__password" type="checkbox" id="showPassword" />
            <span class='error__message' id="errorMessage"></span>
            <button type="submit" class="btn">Next step &rarr;</button>
        </form>
    </div>

    <div class="modal-login hidden">
        <button class="btn--close-modal">&times;</button>
        <h2 class="modal__header">
            Login with your <span class="highlight">Account</span>
        </h2>
        <form class="modal__form" id="loginForm">
            <label>Email Address</label>
            <input name="username" type="email" id="inputEmail" />
            <label>Password</label>
            <input name="password" class="login__password" id="inputPassword" type="password" />
            <label for="showPassword">Show Password</label>
            <input class="show__password" type="checkbox" id="showPassword" />
            <button type="submit" class="btn">Login &rarr;</button>
            <span class='error__message' id="errorMessage"></span>
        </form>
    </div>
    <div class="overlay hidden"></div>
    <script src="js/script.js"></script>
</body>

</html>