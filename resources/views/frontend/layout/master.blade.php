<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>NEWSROOM</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{asset('frontend/img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">
</head>

<body>
<!-- Topbar Start -->
@include('frontend.layout.header')
<!-- Topbar End -->


<!-- Navbar Start -->
@include('frontend.layout.navbar')
<!-- Navbar End -->


<!-- Top News Slider Start -->
<div class="container-fluid py-3">
    <div class="container">
        <div class="owl-carousel owl-carousel-2 carousel-item-3 position-relative">
            <div class="d-flex">
                <img src="img/news-100x100-1.jpg" style="width: 80px; height: 80px; object-fit: cover;">
                <div class="d-flex align-items-center bg-light px-3" style="height: 80px;">
                    <a class="text-secondary font-weight-semi-bold" href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                </div>
            </div>
            <div class="d-flex">
                <img src="img/news-100x100-2.jpg" style="width: 80px; height: 80px; object-fit: cover;">
                <div class="d-flex align-items-center bg-light px-3" style="height: 80px;">
                    <a class="text-secondary font-weight-semi-bold" href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                </div>
            </div>
            <div class="d-flex">
                <img src="img/news-100x100-3.jpg" style="width: 80px; height: 80px; object-fit: cover;">
                <div class="d-flex align-items-center bg-light px-3" style="height: 80px;">
                    <a class="text-secondary font-weight-semi-bold" href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                </div>
            </div>
            <div class="d-flex">
                <img src="img/news-100x100-4.jpg" style="width: 80px; height: 80px; object-fit: cover;">
                <div class="d-flex align-items-center bg-light px-3" style="height: 80px;">
                    <a class="text-secondary font-weight-semi-bold" href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Top News Slider End -->


<!-- Main News Slider Start -->
<div class="container-fluid py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="owl-carousel owl-carousel-2 carousel-item-1 position-relative mb-3 mb-lg-0">
                    <div class="position-relative overflow-hidden" style="height: 435px;">
                        <img class="img-fluid h-100" src="img/news-700x435-1.jpg" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-1">
                                <a class="text-white" href="">Technology</a>
                                <span class="px-2 text-white">/</span>
                                <a class="text-white" href="">January 01, 2045</a>
                            </div>
                            <a class="h2 m-0 text-white font-weight-bold" href="">Sanctus amet sed amet ipsum lorem. Dolores et erat et elitr sea sed</a>
                        </div>
                    </div>
                    <div class="position-relative overflow-hidden" style="height: 435px;">
                        <img class="img-fluid h-100" src="img/news-700x435-2.jpg" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-1">
                                <a class="text-white" href="">Technology</a>
                                <span class="px-2 text-white">/</span>
                                <a class="text-white" href="">January 01, 2045</a>
                            </div>
                            <a class="h2 m-0 text-white font-weight-bold" href="">Sanctus amet sed amet ipsum lorem. Dolores et erat et elitr sea sed</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                    <h3 class="m-0">Categories</h3>
                    <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                </div>
                <div class="position-relative overflow-hidden mb-3" style="height: 80px;">
                    <img class="img-fluid w-100 h-100" src="img/cat-500x80-1.jpg" style="object-fit: cover;">
                    <a href="" class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
                        Business
                    </a>
                </div>
                <div class="position-relative overflow-hidden mb-3" style="height: 80px;">
                    <img class="img-fluid w-100 h-100" src="img/cat-500x80-2.jpg" style="object-fit: cover;">
                    <a href="" class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
                        Technology
                    </a>
                </div>
                <div class="position-relative overflow-hidden mb-3" style="height: 80px;">
                    <img class="img-fluid w-100 h-100" src="img/cat-500x80-3.jpg" style="object-fit: cover;">
                    <a href="" class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
                        Entertainment
                    </a>
                </div>
                <div class="position-relative overflow-hidden" style="height: 80px;">
                    <img class="img-fluid w-100 h-100" src="img/cat-500x80-4.jpg" style="object-fit: cover;">
                    <a href="" class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
                        Sports
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main News Slider End -->


<!-- Featured News Slider Start -->
@yield('frontend.content')
<!-- News With Sidebar End -->

<!-- Footer Start -->
@include('frontend.layout.footer')
<!-- Footer End -->

<!-- Back to Top -->
<a href="#" class="btn btn-dark back-to-top"><i class="fa fa-angle-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('frontend/lib/easing/easing.min.js')}}"></script>
<script src="{{asset('frontend/lib/owlcarousel/owl.carousel.min.js')}}"></script>

<!-- Contact Javascript File -->
<script src="{{asset('frontend/mail/jqBootstrapValidation.min.js')}}"></script>
<script src="{{asset('frontend/mail/contact.js')}}"></script>

<!-- Template Javascript -->
<script src="{{asset('frontend/js/main.js')}}"></script>
</body>

</html>
