@extends('layout.mainlayout')
@section('content')
<section id="hero">
        <div class="hero-container">
            <div class="container">
                <div class="row" id="hero-row">
                    <div class="col-lg-6">
                        <a id="lost-pet" class="btn-get-started">
                            Izgubio sam ljubimca
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a id="found-pet" class="btn-get-started">
                            Pronašao sam ljubimca
                        </a>
                    </div>
                </div>
            </div>
            <div class="container" id="search-container">
                <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-2">
                        <div class="outline">
                            <select name="type" class="type">
                                <option>
                                    Kojeg?
                                </option>
                                <option>
                                    Pas
                                </option>
                                <option>
                                    Mačka
                                </option>
                                <option>
                                    Ptica
                                </option>
                                <option>
                                    Glodar
                                </option>
                                <option>
                                    Gmizavac
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="outline">
                            <select name="type" class="type">
                                <option>
                                    Koje boje?
                                </option>
                                <option>
                                    Crni
                                </option>
                                <option>
                                    Beli
                                </option>
                                <option>
                                    Braon
                                </option>
                                <option>
                                    Crno-beli
                                </option>
                                <option>
                                    Zuti
                                </option>
                                <option>
                                    Zuto-beli
                                </option>
                                <option>
                                    Sivi
                                </option>
                                <option>
                                    Sivo-beli
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="outline">
                            <select name="type" class="type">
                                <option>
                                    Gde?
                                </option>
                                <option>
                                    Beograd
                                </option>
                                <option>
                                    Pančevo
                                </option>
                                <option>
                                    Novi Sad
                                </option>
                                <option>
                                    Kragujevac
                                </option>
                                <option>
                                    Nis
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="outline">
                            <input type="date" id="search-date">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <a href="#about" class="btn-get-started orange-btn">
                            Pretraži
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main id="main">

        <!-- Portfolio -->
        <section id="portfolio">
            <div class="container wow fadeInUp">
                <div class="section-header">
                    <h3 class="section-title">Ljubimci</h3>
                    <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                        accusantium doloremque</p>
                </div>
                <div class="row">
                    <!-- <div class="col-lg-12">
                        <ul id="portfolio-flters">
                            <li data-filter=".filter-app, .filter-card, .filter-logo, .filter-web"
                                class="filter-active">All</li>
                            <li data-filter=".filter-app">App</li>
                            <li data-filter=".filter-card">Card</li>
                            <li data-filter=".filter-logo">Logo</li>
                            <li data-filter=".filter-web">Web</li>
                        </ul>
                    </div> -->
                </div>

                <div class="row" id="portfolio-wrapper">
                    <div class="col-lg-3 col-md-6 portfolio-item filter-app">
                        <a href="">
                            <img src="img/portfolio/app1.jpg" alt="" class="portfolio-img">
                            <div class="details">
                                <h4>App 1</h4>
                                <span>Alored dono par</span>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-6 portfolio-item filter-web">
                        <a href="">
                            <img src="img/portfolio/web2.jpg" alt="" class="portfolio-img">
                            <div class="details">
                                <h4>Web 2</h4>
                                <span>Alored dono par</span>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-6 portfolio-item filter-app">
                        <a href="">
                            <img src="img/portfolio/app3.jpg" alt="" class="portfolio-img">
                            <div class="details">
                                <h4>App 3</h4>
                                <span>Alored dono par</span>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-6 portfolio-item filter-card">
                        <a href="">
                            <img src="img/portfolio/card1.jpg" alt="" class="portfolio-img">
                            <div class="details">
                                <h4>Card 1</h4>
                                <span>Alored dono par</span>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-6 portfolio-item filter-card">
                        <a href="">
                            <img src="img/portfolio/card2.jpg" alt="" class="portfolio-img">
                            <div class="details">
                                <h4>Card 2</h4>
                                <span>Alored dono par</span>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-6 portfolio-item filter-web">
                        <a href="">
                            <img src="img/portfolio/web3.jpg" alt="" class="portfolio-img">
                            <div class="details">
                                <h4>Web 3</h4>
                                <span>Alored dono par</span>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-6 portfolio-item filter-card">
                        <a href="">
                            <img src="img/portfolio/card3.jpg" alt="" class="portfolio-img">
                            <div class="details">
                                <h4>Card 3</h4>
                                <span>Alored dono par</span>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-6 portfolio-item filter-app">
                        <a href="">
                            <img src="img/portfolio/app2.jpg" alt="" class="portfolio-img">
                            <div class="details">
                                <h4>App 2</h4>
                                <span>Alored dono par</span>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-6 portfolio-item filter-logo">
                        <a href="">
                            <img src="img/portfolio/logo1.jpg" alt="" class="portfolio-img">
                            <div class="details">
                                <h4>Logo 1</h4>
                                <span>Alored dono par</span>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-6 portfolio-item filter-logo">
                        <a href="">
                            <img src="img/portfolio/logo3.jpg" alt="" class="portfolio-img">
                            <div class="details">
                                <h4>Logo 3</h4>
                                <span>Alored dono par</span>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-6 portfolio-item filter-web">
                        <a href="">
                            <img src="img/portfolio/web1.jpg" alt="" class="portfolio-img">
                            <div class="details">
                                <h4>Web 1</h4>
                                <span>Alored dono par</span>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-6 portfolio-item filter-logo">
                        <a href="">
                            <img src="img/portfolio/logo2.jpg" alt="" class="portfolio-img">
                            <div class="details">
                                <h4>Logo 2</h4>
                                <span>Alored dono par</span>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-12" id="load-more">
                        <button type="submit" class="orange-btn">
                            Učitaj još
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- About us -->
        <section id="about">
            <div class="container">
                <div class="row about-container">

                    <div class="col-lg-6 content order-lg-1 order-2">
                        <h2 class="title">Nekoliko reči o nama</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                    </div>
                    <div class="col-lg-6 content order-lg-1 order-2">
                        <div class="icon-box wow fadeInUp">
                            <div class="icon"><i class="fa fa-paw" aria-hidden="true"></i></div>
                            <h4 class="title"><a href="">Misija</a></h4>
                            <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero
                                tempore, cum soluta nobis est eligendi</p>
                        </div>

                        <div class="icon-box wow fadeInUp" data-wow-delay="0.2s">
                            <div class="icon"><i class="fa fa-heart" aria-hidden="true"></i></div>
                            <h4 class="title"><a href="">Vizija</a></h4>
                            <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                                officia deserunt mollit anim id est laborum</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="contact">
                <div class="container wow fadeInUp">
                    <div class="section-header">
                        <h3 class="section-title">Contact</h3>
                        <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                            accusantium doloremque</p>
                    </div>
                </div>

                <!-- Uncomment below if you wan to use dynamic maps -->
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22864.11283411948!2d-73.96468908098944!3d40.630720240038435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbg!4v1540447494452"
                    width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>

                <div class="container wow fadeInUp mt-5">
                    <div class="row justify-content-center">

                        <div class="col-lg-3 col-md-4">

                            <div class="info">
                                <div>
                                    <i class="fa fa-map-marker"></i>
                                    <p>A108 Adam Street<br>New York, NY 535022</p>
                                </div>

                                <div>
                                    <i class="fa fa-envelope"></i>
                                    <p>info@example.com</p>
                                </div>

                                <div>
                                    <i class="fa fa-phone"></i>
                                    <p>+1 5589 55488 55s</p>
                                </div>
                            </div>

                            <div class="social-links">
                                <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                                <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                                <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                            </div>

                        </div>

                        <div class="col-lg-5 col-md-8">
                            <div class="form">
                                <div id="sendmessage">Your message has been sent. Thank you!</div>
                                <div id="errormessage"></div>
                                <form action="" method="post" role="form" class="contactForm">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Your Name" data-rule="minlen:4"
                                            data-msg="Please enter at least 4 chars" />
                                        <div class="validation"></div>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Your Email" data-rule="email"
                                            data-msg="Please enter a valid email" />
                                        <div class="validation"></div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="subject" id="subject"
                                            placeholder="Subject" data-rule="minlen:4"
                                            data-msg="Please enter at least 8 chars of subject" />
                                        <div class="validation"></div>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="message" rows="5" data-rule="required"
                                            data-msg="Please write something for us" placeholder="Message"></textarea>
                                        <div class="validation"></div>
                                    </div>
                                    <div class="text-center"><button type="submit">Send Message</button></div>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            </section><!-- #contact -->

        </main>
@endsection