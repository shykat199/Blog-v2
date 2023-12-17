<div class="pb-3">
    <div class="bg-light py-2 px-4 mb-3">
        <h3 class="m-0">Tranding</h3>
    </div>
    @forelse(trendingPosts(5,0,10) as $post)
        <div class="d-flex mb-3">
            <img src="{{asset('storage/images/post/'.$post->featured_image)}}"
                 style="width: 100px; height: 100px; object-fit: cover;">
            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
                 style="height: 100px;">
                <div class="mb-1" style="font-size: 13px;">
                    <a href="{{route('category-details',$post->category->slug)}}">{{$post->category->name}}</a>
                    <span class="px-1">/</span>
                    <span>{{\Carbon\Carbon::parse($post->created_at)->format('F d, Y')}}</span>
                </div>
                <a class="h6 m-0" href="">{{\Illuminate\Support\Str::limit($post->title,24,'...')}}</a>
            </div>
        </div>
    @empty
        <p class="text-danger">No post available</p>
    @endforelse

</div>
