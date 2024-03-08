@extends('layouts.layout')

@section('content')

    <!-- @for($i = 0; $i < count($blogs); $i++) 
        <div class="card">
            <div class="card-body">

                <h5 class="card-title">{{$blogs[$i]['title']}}</h5>

                <p>{{ $blogs[$i]['description'] }}</p>
                <p>{{ $blogs[$i]['likeCount'] }} likes</p>

            </div>
            </div>

    @endfor -->

    @foreach($blogs as $blog)

        @if($blog['active'])
            <div class="card mb-3">
                <div class="card-body">
                    <a href="/blogs/{{$blog['id']}}">
                        <h5 class="card-title">{{$blog['title']}}</h5>
                    </a>
                    <p>{{ $blog['description'] }}</p>
                    <p>{{ $blog['likeCount'] }} likes</p>
                </div>
            </div>
        @endif
        
    @endforeach
    
@endsection