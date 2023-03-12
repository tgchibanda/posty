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
                        

                        
    
      
    <tr><td colspan="2">{{ $posts->user->name }}</td></tr>
    <tr><td colspan="2">{{ $posts->body }}</td></tr>
        <tr><td colspan="2">{{$posts->created_at->diffForHumans()}}</td></tr>

        @if($posts->postBelongsTo(auth()->user()))
        <tr><td colspan="2">
<form action="{{ route('postdelete', $posts->id) }}" method="post">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-block btn-link btn-sm float-left"> <i class="fa fa-thumbs-up"></i> Delete</button>
</form>
</td></tr>
@endif


        <tr>
        <td>

       
        @auth 

        

@if(!$posts->likedBy(auth()->user()))
    <form action="{{ route('postslike', $posts->id) }}" method="post">
    @csrf
        <button type="submit" class="btn btn-block btn-link btn-sm float-left"> <i class="fa fa-thumbs-up"></i> Like</button>
    </form>
   @else
    <form action="{{ route('postslike', $posts->id) }}" method="post">
    @csrf
    @method('DELETE')
        <button type="submit" class="btn btn-block btn-link btn-sm float-left">UnLike </button>
    </form>
    @endif
    @endauth
        </td>
        <td>
        <td>
    {{ $posts->malike->count() }} {{ Str::plural('like', $posts->malike->count()) }}
   
    </td>
    </td></tr>

 
        
<tr><td colspan="2"></td></tr>


                    @else<p> There are no posts!</p>

                    </tbody>
  </table>
                    @endif


@endsection