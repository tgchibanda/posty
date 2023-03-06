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
                    <hr>
                    <table class="table table-striped">
    <thead>
      <tr>
        <th>Post</th>
        <th>User</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
                        @foreach ($posts as $post)

                        
    
      <tr>
        <td>{{$post->user->name}}</td>
        <td>{{$post->body}}</td>
        <td>{{$post->created_at->diffForHumans()}}</td>
      </tr>
   @endforeach

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
