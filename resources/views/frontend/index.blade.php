{{--@extends('frontend.layout.master')--}}
{{--@section('frontend.content')--}}

<!-- Featured News Slider Start -->
<div class="container-fluid py-3">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
            <h3 class="m-0">Featured</h3>
        </div>
        <div class="owl-carousel owl-carousel-2 carousel-item-4 position-relative">
            @forelse($randomFeature as $key =>$news)

                <div class="position-relative overflow-hidden" style="height: 300px;">
                    <img class="img-fluid w-100 h-100" src="{{asset('storage/images/post/'.$news->featured_image)}}"
                         style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-1" style="font-size: 13px;">
                            <a class="text-white" href="{{route('category-details',$news->category->slug)}}">{{$news->category->name}}</a>
                            <span class="px-1 text-white">/</span>
                            <span class="text-white">{{\Carbon\Carbon::parse($news->created_at)->format('F d,Y')}}</span>
                        </div>
                        <a class="h4 m-0 text-white"
                           href="{{route('news-details',$news->post_url)}}">{{\Illuminate\Support\Str::limit($news->title,24,'...')}}</a>
                    </div>
                </div>

            @empty
                <p class="text-danger">No Data Found</p>

            @endforelse

        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 py-3">
                <div class="bg-light py-2 px-4 mb-3">
                    <h3 class="m-0">Business</h3>
                </div>

                <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                    @forelse(getCategoryData('business',4) as $news)
                        <div class="position-relative">
                            <img class="hello img-fluid w-100" src="{{asset('storage/images/post/'.$news->featured_image)}}" style="object-fit: cover;">
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 13px;">
                                    <a href="{{route('category-details',$news->category->slug)}}">{{$news->category->name}}</a>
                                    <span class="px-1">/</span>
                                    <span>{{\Carbon\Carbon::parse($news->created_at)->format('Y d, y')}}</span>
                                </div>
                                <a class="h4 m-0" href="">{{\Illuminate\Support\Str::limit($news->title,26,'...')}}</a>
                            </div>
                        </div>
                    @empty
                        <p class="text-danger">No Data Fount</p>
                    @endforelse

                </div>
            </div>
            <div class="col-lg-6 py-3">
                <div class="bg-light py-2 px-4 mb-3">
                    <h3 class="m-0">Technology</h3>
                </div>
                <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                    @forelse(getCategoryData('technology',4) as $news)

                        <div class="position-relative">
                            <img class="img-fluid w-100" src="{{asset('storage/images/post/'.$news->featured_image)}}" style="object-fit: cover;">
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 13px;">
                                    <a href="{{route('category-details',$news->category->slug)}}">{{$news->category->name}}</a>
                                    <span class="px-1">/</span>
                                    <span>{{\Carbon\Carbon::parse($news->created_at)->format('Y d, y')}}</span>
                                </div>
                                <a class="h4 m-0" href="">{{\Illuminate\Support\Str::limit($news->title,26,'...')}}</a>
                            </div>
                        </div>
                    @empty
                        <p class="text-danger">No Data Found</p>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 py-3">
                <div class="bg-light py-2 px-4 mb-3">
                    <h3 class="m-0">Entertainment</h3>
                </div>
                <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                    @forelse(getCategoryData('entertainment',4) as $news)

                        <div class="position-relative">
                            <img class="img-fluid w-100" src="{{asset('storage/images/post/'.$news->featured_image)}}" style="object-fit: cover;">
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 13px;">
                                    <a href="{{route('category-details',$news->category->slug)}}">{{$news->category->name}}</a>
                                    <span class="px-1">/</span>
                                    <span>{{\Carbon\Carbon::parse($news->created_at)->format('Y d, y')}}</span>
                                </div>
                                <a class="h4 m-0" href="">{{\Illuminate\Support\Str::limit($news->title,26,'...')}}</a>
                            </div>
                        </div>
                    @empty
                        <p class="text-danger">No Data Found</p>
                    @endforelse
                </div>
            </div>
            <div class="col-lg-6 py-3">
                <div class="bg-light py-2 px-4 mb-3">
                    <h3 class="m-0">Sports</h3>
                </div>
                <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                    @forelse(getCategoryData('sports',4) as $news)
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="{{asset('storage/images/post/'.$news->featured_image)}}" style="object-fit: cover;">
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 13px;">
                                    <a href="{{route('category-details',$news->category->slug)}}">{{$news->category->name}}</a>
                                    <span class="px-1">/</span>
                                    <span>{{\Carbon\Carbon::parse($news->created_at)->format('Y d, y')}}</span>
                                </div>
                                <a class="h4 m-0" href="">{{\Illuminate\Support\Str::limit($news->title,25,'...')}}</a>
                            </div>
                        </div>
                    @empty
                        <p class="text-danger">No Data Fount</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Popular</h3>
                        </div>
                    </div>

                    @php
                        $getPopularPosts = popularPosts(6,10)
                    @endphp

                    <div class="col-lg-6">

                        @if(isset($getPopularPosts[0]) && !empty($getPopularPosts))
                            <div class="position-relative mb-3">
                                <img class="img-fluid w-100"
                                     src="{{asset('storage/images/post/'.$getPopularPosts[0]->featured_image)}}"
                                     style="object-fit: cover;">
                                <div class="overlay position-relative bg-light">
                                    <div class="mb-2" style="font-size: 14px;">
                                        <a href="{{$getPopularPosts[0]->category->slug}}">{{$getPopularPosts[0]->category->name}}</a>
                                        <span class="px-1">/</span>
                                        <span>{{\Carbon\Carbon::parse($getPopularPosts[0]->created_at)->format('F d,Y')}}</span>
                                    </div>
                                    <a class="h4"
                                       href="">{{\Illuminate\Support\Str::limit($getPopularPosts[0]->title,45,'...')}}</a>
                                    <p class="m-0">{!! \Illuminate\Support\Str::limit($getPopularPosts[0]->description,100,'...') !!}</p>
                                </div>
                            </div>
                        @endif
                        @for($i = 2 ; $i <= 3 ; $i ++)
                            @if(isset($getPopularPosts[$i]) && !empty($getPopularPosts[$i]))
                                <div class="d-flex mb-3">
                                    <img src="{{asset('storage/images/post/'.$getPopularPosts[$i]->featured_image)}}"
                                         style="width: 100px; height: 100px; object-fit: cover;">
                                    <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
                                         style="height: 100px;">
                                        <div class="mb-1" style="font-size: 13px;">
                                            <a href="{{route('category-details',$getPopularPosts[$i]->category->slug)}}">{{$getPopularPosts[$i]->category->name}}</a>
                                            <span class="px-1">/</span>
                                            <span>{{\Carbon\Carbon::parse($getPopularPosts[$i]->created_at)->format('Y d, y')}}</span>
                                        </div>
                                        <a class="h6 m-0"
                                           href="">{{\Illuminate\Support\Str::limit($getPopularPosts[$i]->title,55,'...')}}</a>
                                    </div>
                                </div>
                            @endif
                        @endfor
                    </div>
                    <div class="col-lg-6">
                        @if(isset($getPopularPosts[1]) && !empty($getPopularPosts))
                            <div class="position-relative mb-3">
                                <img class="img-fluid w-100"
                                     src="{{asset('storage/images/post/'.$getPopularPosts[1]->featured_image)}}"
                                     style="object-fit: cover;">
                                <div class="overlay position-relative bg-light">
                                    <div class="mb-2" style="font-size: 14px;">
                                        <a href="{{route('category-details',$getPopularPosts[1]->category->slug)}}">{{$getPopularPosts[1]->category->name}}</a>
                                        <span class="px-1">/</span>
                                        <span>{{\Carbon\Carbon::parse($getPopularPosts[1]->created_at)->format('F d,Y')}}</span>
                                    </div>
                                    <a class="h4"
                                       href="">{{\Illuminate\Support\Str::limit($getPopularPosts[1]->title,45,'...')}}</a>
                                    <p class="m-0">{!! \Illuminate\Support\Str::limit($getPopularPosts[1]->description,100,'...') !!}</p>
                                </div>
                            </div>
                        @endif
                        @for($i = 4 ; $i <= 5 ; $i ++)
                            @if(isset($getPopularPosts[$i]) && !empty($getPopularPosts[$i]))
                                <div class="d-flex mb-3">
                                    <img src="{{asset('storage/images/post/'.$getPopularPosts[$i]->featured_image)}}"
                                         style="width: 100px; height: 100px; object-fit: cover;">
                                    <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
                                         style="height: 100px;">
                                        <div class="mb-1" style="font-size: 13px;">
                                            <a href="{{route('category-details',$getPopularPosts[$i]->category->slug)}}">{{$getPopularPosts[$i]->category->name}}</a>
                                            <span class="px-1">/</span>
                                            <span>{{\Carbon\Carbon::parse($getPopularPosts[$i]->created_at)->format('Y d, y')}}</span>
                                        </div>
                                        <a class="h6 m-0"
                                           href="">{{\Illuminate\Support\Str::limit($getPopularPosts[$i]->title,55,'...')}}</a>
                                    </div>
                                </div>
                            @endif
                        @endfor
                    </div>
                </div>

                <div class="mb-3 pb-3">
                    <a href=""><img class="img-fluid w-100" src="{{asset('frontend/img/ads-700x70.jpg')}}" alt=""></a>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Latest</h3>
                        </div>
                    </div>

                    @php
                        $getLatestPosts = getLatestPost(6);
                    @endphp

                    <div class="col-lg-6">
                        @if(isset($getLatestPosts[0]))
                            <div class="position-relative mb-3">
                                <img class="img-fluid w-100"
                                     src="{{asset('storage/images/post/'.$getLatestPosts[0]->featured_image)}}"
                                     style="object-fit: cover;">
                                <div class="overlay position-relative bg-light">
                                    <div class="mb-2" style="font-size: 14px;">
                                        <a href="{{route('category-details',$getLatestPosts[0]->category->slug)}}">{{$getLatestPosts[0]->category->name}}</a>
                                        <span class="px-1">/</span>
                                        <span>{{\Carbon\Carbon::parse($getLatestPosts[0]->created_at)->format('F d,Y')}}</span>
                                    </div>
                                    <a class="h4"
                                       href="">{{\Illuminate\Support\Str::limit($getLatestPosts[0]->title,32,'...')}}</a>
                                    <p class="m-0">{{strip_tags(\Illuminate\Support\Str::limit($getLatestPosts[0]->description,100,'...'))}}</p>
                                </div>
                            </div>
                        @endif
                        @for($i = 2 ; $i <= 3 ; $i ++)
                            @if(isset($getLatestPosts[$i]) && !empty($getLatestPosts[$i]))
                                <div class="d-flex mb-3">
                                    <img src="{{asset('storage/images/post/'.$getLatestPosts[$i]->featured_image)}}"
                                         style="width: 100px; height: 100px; object-fit: cover;">
                                    <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
                                         style="height: 100px;">
                                        <div class="mb-1" style="font-size: 13px;">
                                            <a href="{{route('category-details',$getLatestPosts[$i]->category->slug)}}">{{$getLatestPosts[$i]->category->name}}</a>
                                            <span class="px-1">/</span>
                                            <span>{{\Carbon\Carbon::parse($getLatestPosts[$i]->created_at)->format('Y d, y')}}</span>
                                        </div>
                                        <a class="h6 m-0"
                                           href="">{{\Illuminate\Support\Str::limit($getLatestPosts[$i]->title,60,'...')}}</a>
                                    </div>
                                </div>
                            @endif
                        @endfor

                    </div>
                    <div class="col-lg-6">
                        @if(isset($getLatestPosts[1]))
                            <div class="position-relative mb-3">
                                <img class="img-fluid w-100"
                                     src="{{asset('storage/images/post/'.$getLatestPosts[1]->featured_image)}}"
                                     style="object-fit: cover;">
                                <div class="overlay position-relative bg-light">
                                    <div class="mb-2" style="font-size: 14px;">
                                        <a href="{{route('category-details',$getLatestPosts[1]->category->slug)}}">{{$getLatestPosts[1]->category->name}}</a>
                                        <span class="px-1">/</span>
                                        <span>{{\Carbon\Carbon::parse($getLatestPosts[1]->created_at)->format('F d,Y')}}</span>
                                    </div>
                                    <a class="h4"
                                       href="">{{\Illuminate\Support\Str::limit($getLatestPosts[1]->title,32,'...')}}</a>
                                    <p class="m-0">{{strip_tags(\Illuminate\Support\Str::limit($getLatestPosts[1]->description,100,'...'))}}</p>
                                </div>
                            </div>
                        @endif
                        @for($i = 4 ; $i <= 5 ; $i ++)
                            @if(isset($getLatestPosts[$i]) && !empty($getLatestPosts[$i]))
                                <div class="d-flex mb-3">
                                    <img src="{{asset('storage/images/post/'.$getLatestPosts[$i]->featured_image)}}"
                                         style="width: 100px; height: 100px; object-fit: cover;">
                                    <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
                                         style="height: 100px;">
                                        <div class="mb-1" style="font-size: 13px;">
                                            <a href="{{route('category-details',$getLatestPosts[$i]->category->slug)}}">{{$getLatestPosts[$i]->category->name}}</a>
                                            <span class="px-1">/</span>
                                            <span>{{\Carbon\Carbon::parse($getLatestPosts[$i]->created_at)->format('Y d, y')}}</span>
                                        </div>
                                        <a class="h6 m-0"
                                           href="">{{\Illuminate\Support\Str::limit($getLatestPosts[$i]->title,60,'...')}}</a>
                                    </div>
                                </div>
                            @endif
                        @endfor
                    </div>
                </div>
            </div>

            <div class="col-lg-4 pt-3 pt-lg-0">
                <!-- Social Follow Start -->
                <div class="pb-3">
                    <div class="bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Follow Us</h3>
                    </div>
                    <div class="d-flex mb-3">
                        <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2"
                           style="background: #39569E;">
                            <small class="fab fa-facebook-f mr-2"></small><small>12,345 Fans</small>
                        </a>
                        <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2"
                           style="background: #52AAF4;">
                            <small class="fab fa-twitter mr-2"></small><small>12,345 Followers</small>
                        </a>
                    </div>
                    <div class="d-flex mb-3">
                        <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2"
                           style="background: #0185AE;">
                            <small class="fab fa-linkedin-in mr-2"></small><small>12,345 Connects</small>
                        </a>
                        <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2"
                           style="background: #C8359D;">
                            <small class="fab fa-instagram mr-2"></small><small>12,345 Followers</small>
                        </a>
                    </div>
                    <div class="d-flex mb-3">
                        <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2"
                           style="background: #DC472E;">
                            <small class="fab fa-youtube mr-2"></small><small>12,345 Subscribers</small>
                        </a>
                        <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2"
                           style="background: #1AB7EA;">
                            <small class="fab fa-vimeo-v mr-2"></small><small>12,345 Followers</small>
                        </a>
                    </div>
                </div>
                <!-- Social Follow End -->

                <!-- Newsletter Start -->
                <div class="pb-3">
                    <div class="bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Newsletter</h3>
                    </div>
                    <div class="bg-light text-center p-4 mb-3">
                        <p>Aliqu justo et labore at eirmod justo sea erat diam dolor diam vero kasd</p>
                        <div class="input-group" style="width: 100%;">
                            <input type="text" class="form-control form-control-lg" placeholder="Your Email">
                            <div class="input-group-append">
                                <button class="btn btn-primary">Sign Up</button>
                            </div>
                        </div>
                        <small>Sit eirmod nonumy kasd eirmod</small>
                    </div>
                </div>
                <!-- Newsletter End -->

                <!-- Ads Start -->
                <div class="mb-3 pb-3">
                    <a href=""><img class="img-fluid w-100" src="{{asset('frontend/img/ads-700x70.jpg')}}" alt=""></a>

                </div>
                <!-- Ads End -->

                <!-- Popular News Start -->
                @include('frontend.trending')
                <!-- Popular News End -->

                <!-- Tags Start -->
              @include('frontend.tag')
                <!-- Tags End -->
            </div>
        </div>
    </div>
</div>
<!-- News With Sidebar End -->

{{--@endsection--}}
