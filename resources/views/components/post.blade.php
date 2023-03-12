   @props(['post' => $post])
    
      <tr><td colspan="2"><h3><a href="{{ route('userposts', $post->user)}}">{{$post->user->name}}</a></h3></td></tr>
        <tr><td colspan="2">{{$post->body}}</td></tr>
        <tr><td colspan="2">{{$post->created_at->diffForHumans()}}</td></tr>

        @if($post->postBelongsTo(auth()->user()))
        <tr><td colspan="2">
<form action="{{ route('postdelete', $post->id) }}" method="post">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-block btn-link btn-sm float-left"> <i class="fa fa-thumbs-up"></i> Delete</button>
</form>
</td></tr>
@endif


        <tr>
        <td>

       
        @auth 

        

@if(!$post->likedBy(auth()->user()))
    <form action="{{ route('postslike', $post->id) }}" method="post">
    @csrf
        <button type="submit" class="btn btn-block btn-link btn-sm float-left"> <i class="fa fa-thumbs-up"></i> Like</button>
    </form>
   @else
    <form action="{{ route('postslike', $post->id) }}" method="post">
    @csrf
    @method('DELETE')
        <button type="submit" class="btn btn-block btn-link btn-sm float-left">UnLike </button>
    </form>
    @endif
    @endauth
        </td>
        <td>
    {{ $post->malike->count() }} {{ Str::plural('like', $post->malike->count()) }}
   
    </td></tr>