<!DOCTYPE html>
<html lang="en">

<head>
    <title> Bytrh </title>
    <meta charset="UTF-8">
    <meta name="description" content="Bytrh">
    <meta name="kaywords" content="Bytrh">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="AHMED RASHED" />
    <!-- Favicon -->
    <link href="{{ asset('front/imgs/logo.png')}}" rel="icon">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&family=Tajawal:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('front/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('front/css/style.css')}}">
</head>

    <!-- ready -->
    <div id="ready">
        <i class="fa fa-spinner fa-5x fa-spin"></i>
    </div>

    <!-- back to top -->
    <a id="topBtn" class="position-fixed bottom-0 end-0 translate-middle text-white">
        <i  class="fa-solid fa-chevron-up fs-3 p-3 main-bg rounded-circle"></i>
    </a>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-nav fixed-top py-2">
        <div class="container">
            <a class="navbar-brand">
                <img src="{{ asset('front/imgs/logo.png')}}" alt="bytrh logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-0 ms-lg-5 py-3 py-lg-0 fw-bold">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#screenshots">Screenshots</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#get">Get our app</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link " id="navBlog" href="#blog">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact Us</a>
                    </li> -->
                </ul>
                <div class="custome d-flex justify-content-center align-items-center pb-4 pb-lg-0">
                    <div class="language py-2">
                        <i class="fa-solid fa-globe fs-6"></i>
                        <button class="py-1">العربيـة</button>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- header section -->
    <header id="home" class="home position-relative">
        <div class="vectors">
            <img src="{{ asset('front/imgs/Vector 1.png')}}" class="position-absolute w-25 mx-auto vector start-50 translate-middle"
                alt="vector">
        </div>
        <div class="total-header min-vh-70 d-flex justify-content-center align-items-center">
            <div class="container">
                <div class="row gy-5 d-flex justify-content-center align-items-center">
                    <div class="col-lg-6">
                        <div class="caption">
                            <h1 class="text-capitalize fw-bold mb-4">Save Your Time With One Click</h1>
                            <p class="mb-2 py-1">Bytrh App, we aspire to be the first application and the optimal arm in supporting and developing the bytrh medicine sector in the Kingdom of Saudi Arabia.</p>
                            <p class="mb-4 second-p">We aspire to serve all segments of society from those interested, educators and investors in the field of bytrh medicine and reach them to the highest levels, and to be an example to follow.</p>
                            <div class="buttons">
                                <a href="#get" class="btn rounded-pill main-btn me-lg-3 special-m"><i
                                        class="fa-solid fa-download me-1"></i> Get App</a>
                                <!-- <button type="button" class="modal-btn btn rounded-pill second-btn">
                                    <i class="fa-solid fa-circle-play me-1"></i>Watch Video
                                </button> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="img-header text-center position-relative">
                            <img src="{{ asset('front/imgs/Group 24.png')}}" class="w-60 yellow" alt="Group">
                            <div class="img-phone position-absolute top-50 start-50 translate-middle">
                                <img src="{{ asset('front/imgs/Frame 2.png')}}" alt="iPhone 12 Pro">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="trailer">
                    <iframe src="https://www.youtube.com/embed/0EMTIXkuMOU" frameborder="0"></iframe>
                    <i class="fa-solid fa-xmark close"></i>
                </div>
            </div>
        </div>
    </header>

    <!-- features section -->
    <section id="features" class="features pt-5">
        <div class="container">
            <div class="main-title text-center py-4">
                <h5 class="main-color mb-2">What We Serve?</h5>
                <h2 class="fw-bold fs-1">Our Features</h2>
            </div>
        </div>
        <div class="container-fluid bg-black py-5">
            <div class="row gy-5 d-flex justify-content-center align-items-center">
                <div class="col-lg-5">
                    <div class="feature special">
                        <span><img src="{{ asset('front/imgs/booking (1).png')}}" alt="booking"></span>
                        <p class="one">Enables the beneficiary to pre-book the service, whether in the area in which he is located or outside.</p>
                    </div>
                    <div class="feature special mb-0">
                        <span><img src="{{ asset('front/imgs/drive-thru (1).png')}}" alt="drive-thru"></span>
                        <p class="two">Linkage between beneficiaries, service providers</p>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="img-feature text-center">
                        <img src="{{ asset('front/imgs/Frame 2.png')}}" alt="Frame">
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="feature special-second">
                        <span><img src="{{ asset('front/imgs/offer (1).png')}}" alt="offer"></span>
                        <p class="three">Ensure the validity of the service providers' data.</p>
                    </div>
                    <div class="feature special-second mb-0">
                        <span><img src="{{ asset('front/imgs/fast-time 1.png')}}" alt="fast-time"></span>
                        <p class="four">The speed of access of beneficiaries to the existing service according to the area in which they are located.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- screenshots section -->
    <section id="screenshots" class="screenshots py-5">
        <div class="container">
            <div class="main-title text-center py-4">
                <h5 class="main-color mb-2">Need to see our app?</h5>
                <h2 class="fw-bold fs-1">Screen Shots</h2>
            </div>
            <div class="img-screenshots text-center">
                <img src="{{ asset('front/imgs/Group 2 (2).png')}}" alt="Group" class="w-75">
            </div>
        </div>
    </section>

    <!-- about us section -->
    <section id="about" class="about py-5">
        <div class="container py-4">
            <div class="row gy-5 d-flex justify-content-center align-items-center">
                <div class="col-lg-8">
                    <div class="main-title">
                        <h5 class="main-color mb-2">Do you Know us?</h5>
                        <h2 class="fw-bold fs-1 mb-4">About Bytrh</h2>
                        <p class="fs-5 mb-2">Bytrh application, is the first project of "Bytrh Union Company", a Saudi company, and the idea of the application is based on linking the beneficiaries and service providers, in all regions of the Kingdom according to their locations.</p>
                        <p class="fs-5 mb-0 second-p">The application contributes to re-utilizing minds, assets and idle capital.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="img-about">
                        <img src="{{ asset('front/imgs/about-us.png')}}" alt="about-us">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- get our app section -->
    <section id="get" class="get pt-5">
        <div class="container">
            <div class="main-title text-center pb-5">
                <h5 class="main-color mb-2">Do you have our app?</h5>
                <h2 class="fw-bold fs-1 mb-4">Get Our Applications</h2>
                <p class="fs-5 mb-0">Our applications are available now on App store & Play store..</p>
            </div>
            <div class="row gy-5 gx-0 d-flex justify-content-center align-items-center">
                <div class="col-lg-4">
                    <div class="client text-center d-flex flex-column">
                        <h4 class="mb-4 fw-bold">Bytrh (Client App)</h4>
                        <a target="_blank" href="https://apps.apple.com/ca/app/%D8%A8%D9%8A%D8%B7%D8%B1%D8%A9/id1671621790"
                            class="btn mx-auto rounded-pill main-btn mb-4 d-flex justify-content-center align-items-center">
                            <i class="fa-brands fa-apple me-3 fa-2x"></i>
                            <div class="parag text-start">
                                <p class="mb-0 available">Available on the</p>
                                <p class="mb-0 app">App Store</p>
                            </div>
                        </a>
                        <a target="_blank" href="https://play.google.com/store/apps/details?id=com.zari.bytrh"
                            class="btn mx-auto rounded-pill second-btn mb-4 d-flex justify-content-center align-items-center">
                            <i class="fa-brands fa-google-play me-3 fa-2x"></i>
                            <div class="parag text-start">
                                <p class="mb-0 get-on">Get On</p>
                                <p class="mb-0 app">Google Play</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="img-apps text-center">
                        <img src="{{ asset('front/imgs/700(2).png')}}" alt="Group">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="manager text-center d-flex flex-column">
                        <h4 class="mb-4 fw-bold">Bytrh (Doctor App)</h4>
                        <a target="_blank" href="https://apps.apple.com/eg/app/%D8%A8%D9%8A%D8%B7%D8%B1%D9%87-%D8%AA%D8%B7%D8%A8%D9%8A%D9%82-%D8%A7%D9%84%D8%A3%D8%B7%D8%A8%D8%A7%D8%A1/id1671621936"
                            class="btn mx-auto rounded-pill main-btn mb-4 d-flex justify-content-center align-items-center">
                            <i class="fa-brands fa-apple me-3 fa-2x"></i>
                            <div class="parag text-start">
                                <p class="mb-0 available">Available on the</p>
                                <p class="mb-0 app">App Store</p>
                            </div>
                        </a>
                        <a target="_blank" href="https://play.google.com/store/apps/details?id=com.zari.baytrhdoctor"
                            class="btn mx-auto rounded-pill second-btn mb-4 d-flex justify-content-center align-items-center">
                            <i class="fa-brands fa-google-play me-3 fa-2x"></i>
                            <div class="parag text-start">
                                <p class="mb-0 get-on">Get On</p>
                                <p class="mb-0 app">Google Play</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- blogs section last update -->

    <!-- <section id="blog" class="blog p-5  ">
        <div class="container-fluid py-5">
            <div class="main-title text-center py-4"> 
                <h2 class="fw-bold fs-1 blog__title-h2">Blogging</h2>
            </div>
            <div class="row " id="rowData">

            </div>
        </div>
    
    </section> -->

    <!-- contact us section last update -->
    
    <!-- <section id="contact" class="contact p-5  ">
        <div class="container  py-5">
            <div class="main-title text-center py-4"> 
                <h2 class="fw-bold fs-1 main__title-h2">CONTACT US</h2>
            </div> 
            <form  onsubmit="sendMessage(); reset(); return false" class="contact-screenshots  ">
                        <div  class="mb-3">
                            <label for="label__name" class="form-label label__name ">Name</label>
                            <input type="text" name="" id="label__name" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
    
                        <div class="mb-3">
                            <label for="label__phone" class="form-label label__phone">Phone</label>
                            <input type="number" name="" id="label__phone" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
    
                        <div class="mb-3">
                            <label for="label__email" class="form-label label__email">Email</label>
                            <input type="email" name="" id="label__email" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>

                        <div class="mb-3">
                            <label for="label__company" class="form-label label__company">Company Name</label>
                            <input type="text" name="" id="label__company" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>

                        <div class="mb-3">
                            <label for="label__message" class="form-label label__message">Message</label>
                            <textarea class="form-control" style="resize: none;" id="label__message" rows="7"></textarea>
                        </div>
                        
                        <div class="contact-btn d-flex justify-content-center align-items-center">
                            <button  type='submit'  class="    m-auto btn__message">Send Message</button>
                        </div>
                </form>
        </div>
    </section> -->


    <!-- footer -->
    <footer id="footer" class="footer py-5 bg-black position-relative">
        <a id="btnTopFooter" class="position-absolute top-0 end-0 translate-middle text-white"><i
                class="fa-solid fa-chevron-up fs-3 p-3 main-bg rounded-circle"></i></a>
        <div class="container">
            <div class="row gy-5">
                <div class="col-lg-4">
                    <div class="logo-footer">
                        <img src="{{ asset('front/imgs/logo.png')}}" alt="on time logo">
                        <p>Bytrh App, we aspire to be the first application and the optimal arm in supporting and developing the bytrh medicine sector in the Kingdom of Saudi Arabia.</p>
                        <h5 class="mb-3">Commercial Registration Number</h5>
                        <h6 class="mb-0 text-muted">4030498916</h6>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="navigate w-50 mx-auto">
                        <h5 class="mb-5 first-navigate">navigate</h5>
                        <div class="links-navigate d-flex justify-content-center flex-column">
                            <a href="#home">Home</a>
                            <a href="#features">Features</a>
                            <a href="#screenshots">Screenshots</a>
                            <a href="#about">About Us</a>
                            <a href="#get">Get Our App</a>
                            <!-- <a href="#contact">Contact Us </a> -->
                        </div>
                    </div>
                </div> 
                <div class="col-lg-4">
                    <div class="navigate">
                        <h5 class="mb-5 contact">Contact us</h5>
                        <div class="phone d-flex justify-content-start align-items-center mb-5 text-white">
                            <span class="me-3"><i class="fa-solid fa-phone"></i></span>
                            <a target="_blank" href="tel:0552024945" class="me-2">0552024945</a>
                        </div>
                        <h5 class="mb-5 follow">Follow us </h5>
                        <div class="icons-footer d-flex align-items-center">
                            <a target="_blank" href="https://twitter.com/bytrhapp?s=11&t=NBh68U9do6KtiG0bo1bGhg"><i
                                    class="fa-brands fa-twitter"></i>
                            </a>
                            <a target="_blank" href="https://t.snapchat.com/57B0J53h">
                                <!-- <i class="fa-brands fa-snapchat-ghost"></i> -->
                                <img src="{{ asset('front/imgs/snapchat.png')}}" style="width: 25px; height: 25px;" alt="snapchat">
                            </a>
                            <a target="_blank" href="https://instagram.com/bytrhapp?igshid=YmMyMTA2M2Y="><i
                                    class="fa-brands fa-instagram"></i>
                            </a>
                            <a target="_blank" href="http://www.tiktok.com/@bytrhapp">
                                <!-- <i class="fa-brands fa-tiktok"></i> -->
                                <img src="{{ asset('front/imgs/tiktok.png')}}" style="width: 25px; height: 25px;" alt="tiktok">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- js files -->
    <script src="{{ asset('front/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('front/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ asset('front/js/main.js')}}"></script>
</body>

</html>