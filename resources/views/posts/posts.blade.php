@extends('layouts.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Posts') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('getposts') }}">
                        @csrf

                        <div class="row mb-3">
                        
                            <div class="col-md-6 offset-md-3">
                                <textarea placeholder="Say something!" class="form-control @error('post') is-invalid @enderror" value="{{ old('post') }}" autofocus name="post" rows="5" id="post" name="post"></textarea>

                                @error('post')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Post') }}
                                </button>
                            </div>
                        </div>
                    </form>

                    @if ($posts->count())
                    
                    <table class="table table-borderless" width="100%">
    <thead>
      <tr>
      <th></th>
      <th></th>
      </tr>
    </thead>
    <tbody>
                        @foreach ($posts as $post)

                        
    
      <tr><td colspan="2"><h3>{{$post->user->name}}</h3></td></tr>
        <tr><td colspan="2">{{$post->body}}</td></tr>
        <tr><td colspan="2">{{$post->created_at->diffForHumans()}}</td></tr>

        
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
