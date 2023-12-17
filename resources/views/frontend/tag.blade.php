<div class="pb-3">
    <div class="bg-light py-2 px-4 mb-3">
        <h3 class="m-0">Tags</h3>
    </div>
    <div class="d-flex flex-wrap m-n1">

        @forelse(getAllTags(10,'desc') as $tag)
            <a href="{{route('tag-details',$tag->tag_slug)}}" class="btn btn-sm btn-outline-secondary m-1">{{$tag->tag_name}}</a>
        @empty
            <p class="text-danger">No Data Found</p>
        @endforelse
    </div>
</div>
