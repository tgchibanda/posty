@extends('layouts.index')

@section('content')
@if ($posts->count())
                    
                    <table class="table table-borderless" width="100%">
    <thead>
      <tr>
      <th></th>
      <th></th>
      </tr>
    </thead>
    <tbody>

    <tr><td colspan="2"><h3>{{$user->name}} posted {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }} and received {{$user->receivedLikes->count()}} {{ Str::plural('like', $user->receivedLikes->count()) }}</h3></td></tr>
                        @foreach ($posts as $post)

                        
    
      
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

   @endforeach
        
<tr><td colspan="2"></td></tr>


<tr><td colspan="2"> {{$posts-> links() }}</td></tr>
                    @else<p> There are no posts!</p>

                    </tbody>
  </table>
                    @endif


@endsection