<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>NEWSROOM @yield('title')</title>
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
@include('sweetalert::alert')

<!-- Topbar Start -->
@include('frontend.layout.header')
<!-- Topbar End -->


<!-- Navbar Start -->
@include('frontend.layout.navbar')
<!-- Navbar End -->

@if(empty(\Request::segment(1)))

    <!-- Top News Slider Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="owl-carousel owl-carousel-2 carousel-item-3 position-relative">
                @forelse(getLatestPost(4) as $post)
                    <div class="d-flex">
                        <img src="{{asset('storage/images/post/'.$post->featured_image)}}"
                             style="width: 80px; height: 80px; object-fit: cover;">
                        <div class="d-flex align-items-center bg-light px-3" style="height: 80px;">
                            <a class="text-secondary font-weight-semi-bold"
                               href="{{route('news-details',$post->post_url)}}">{{\Illuminate\Support\Str::limit($post->title,30,'...')}}</a>
                        </div>
                    </div>
                @empty
                    <p class="text-transpare">No Data Found</p>
                @endforelse

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
                        @forelse($randomNews as $news)
                            <div class="position-relative overflow-hidden" style="height: 435px;">
                                <img class="img-fluid h-100"
                                     src="{{asset('storage/images/post/'.$news->featured_image)}}"
                                     style="object-fit: cover;">
                                <div class="overlay">
                                    <div class="mb-1">
                                        <a class="text-white"
                                           href="{{route('category-details',$news->category->slug)}}">{{$news->category->name}}</a>
                                        <span class="px-2 text-white">/</span>
                                        <a class="text-white"
                                           href="">{{\Carbon\Carbon::parse($news->created_at)->format('F d,Y')}}</a>
                                    </div>
                                    <a class="h2 m-0 text-white font-weight-bold"
                                       href="{{route('news-details',$post->post_url)}}">{{\Illuminate\Support\Str::limit($news->title,55,'...')}}</a>
                                </div>
                            </div>
                        @empty
                            <p class="text-danger">No data found</p>
                        @endforelse

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Categories</h3>
                    </div>
                    @forelse($categories as $category)
                        <div class="position-relative overflow-hidden mb-3" style="height: 80px;">
                            <img class="img-fluid w-100 h-100"
                                 src="{{asset('storage/images/category/'.$category->image)}}"
                                 style="object-fit: cover;">
                            <a href="{{route('category-details',$category->slug)}}"
                               class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
                                {{$category->name}}
                            </a>
                        </div>
                    @empty
                        <p class="text-danger">No Data Found</p>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
    <!-- Main News Slider End -->
@endif



@if(empty(\Request::segment(1)))
    @include('frontend.index',['randomFeature'=>$randomFeature])
@else
    <!-- Featured News Slider Start -->
    @yield('frontend.content')
    <!-- News With Sidebar End -->
@endif



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
