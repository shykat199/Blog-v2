<!-- Topbar Start -->
<div class="container-fluid">
    <div class="row align-items-center bg-light px-lg-5">
        <div class="col-12 col-md-8">
            <div class="d-flex justify-content-between">
                <div class="bg-primary text-white text-center py-2" style="width: 100px;">Tranding</div>
                <div class="owl-carousel owl-carousel-1 tranding-carousel position-relative d-inline-flex align-items-center ml-3" style="width: calc(100% - 100px); padding-left: 90px;">
                    @forelse(trendingPosts(3) as $post)
                        <div class="text-truncate"><a class="text-secondary" href="">{{\Illuminate\Support\Str::limit($post->title,'84','...')}}</a></div>
                    @empty
                        <p class="text-danger">No Data Found</p>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="col-md-4 text-right d-none d-md-block">
            {{\Carbon\Carbon::now()->format('l, F d, Y')}}
        </div>
    </div>
    <div class="row align-items-center py-2 px-lg-5">
        <div class="col-lg-4">
            <a href="" class="navbar-brand d-none d-lg-block">
                <h1 class="m-0 display-5 text-uppercase"><span class="text-primary">News</span>Room</h1>
            </a>
        </div>
        <div class="col-lg-8 text-center text-lg-right">
            <img class="img-fluid" src="img/ads-700x70.jpg" alt="">
        </div>
    </div>
</div>
<!-- Topbar End -->
