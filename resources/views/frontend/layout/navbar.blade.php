@php
    $title = '';
        $segment = Request::segment(2);
        if ($segment == 'entertainment'){
            $title = 'Entertainment';
        }elseif ($segment == 'sports'){
            $title = 'Sports';
        }elseif ($segment == 'technology'){
            $title = 'Technology';
        }elseif ($segment == 'business'){
            $title = 'Business';
        }elseif($segment == 'news'){
            $title = 'News';
        }else{
            $title = '';
        }
@endphp
<div class="container-fluid p-0 mb-3">
    <nav class="navbar navbar-expand-lg bg-light navbar-light py-2 py-lg-0 px-lg-5">
        <a href="" class="navbar-brand d-block d-lg-none">
            <h1 class="m-0 display-5 text-uppercase"><span class="text-primary">News</span>Room</h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
            <div class="navbar-nav mr-auto py-0">
                <a href="{{route('home')}}" class="nav-item nav-link <?= empty(Request::segment(2)) ? 'active' :'' ?>">Home</a>
                @forelse(getAllCategory() as $category)
                    <a href="{{route('category-details',$category->slug)}}" class="nav-item nav-link <?=$title == $category->name ? 'active' : ''?> ">{{$category->name}}</a>
                @empty
                    <span class="text-danger">No Data found</span>
                @endforelse
            </div>
            <div class="input-group ml-auto" style="width: 100%; max-width: 300px;">
                <input type="text" class="form-control" placeholder="Keyword">
                <div class="input-group-append">
                    <button class="input-group-text text-secondary"><i
                            class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
    </nav>
</div>
