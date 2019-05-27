@extends('layouts.blog-home')



@section('content')

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">


            <!-- First Blog Post -->

            @if($posts)

                @foreach($posts as $post)
                <h2>
                    <a href="/post/{{$post->slug}}">{{$post->title}}</a>
                </h2>
                <p class="lead">
                    by {{$post->user->name}}
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>
                <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                <p>{!! str_limit(strip_tags($post->body), 200) !!}</p>
                <a class="btn btn-primary" href="/post/{{$post->slug}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                @endforeach

            @endif


            <!-- Pagination -->
            <div class="row">

                <div class="text-center">
                    {{ $posts->links() }}
                </div>

            </div>



        </div>


        <!-- Blog Sidebar -->
        @include('includes.front_sidebar')


    </div>
    <!-- /.row -->

@endsection
