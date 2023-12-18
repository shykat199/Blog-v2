<!-- Comment List Start -->
@php
$getPostComments = getPostComments($post_id);
 @endphp

<div class="bg-light mb-3" style="padding: 30px;">
    <h3 class="mb-4">{{count($getPostComments)}} Comments</h3>
    @forelse($getPostComments as $comment)
        <div class="media mb-4">
            <img src="{{isset($comment->user_image) && !empty($comment->user_image) ? asset('storage/images/user/'.$comment->user_image) : (asset('back_office/images/avatar-1.jpg'))}}"
                 alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
            <div class="media-body">
                <h6><a href="">{{$comment->name}}</a> <small><i>{{\Carbon\Carbon::parse($comment->created_at)->format('d M Y')}} at {{\Carbon\Carbon::parse($comment->created_at)->format('g:i A')}}</i></small></h6>
                <p>{{strip_tags($comment->comment)}}</p>
            </div>
        </div>
    @empty
        <span class="text-danger">No data found</span>
    @endforelse

</div>
<!-- Comment List End -->

<!-- Comment Form Start -->
<div class="bg-light mb-3" style="padding: 30px;">
    <h3 class="mb-4">Leave a comment</h3>
    @if(!Auth::check())
        <a href="{{route('login-page')}}" type="submit"
           class="btn btn-primary font-weight-semi-bold py-2 px-3">Log in </a>
    @endif

    @if(Auth::check())
        <form action="{{route('post-comment',$post_id)}}" method="post">
            @csrf
            <div class="form-group">
                <label for="message">Message *</label>
                <textarea id="message" cols="30" name="comment" rows="5" class="form-control"></textarea>
            </div>
            <div class="form-group mb-0">
                <input type="submit" value="Leave a comment"
                       class="btn btn-primary font-weight-semi-bold py-2 px-3">
            </div>
        </form>
    @endif

</div>
