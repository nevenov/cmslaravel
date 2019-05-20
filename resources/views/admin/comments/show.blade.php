@extends('layouts.admin')




@section('content')


    @if(Session::has('admin_comment_message'))
        <p class="alert-danger">{{session('admin_comment_message')}}</p>
    @endif


    @if(count($comments) > 0)

        <h1>Comments</h1>




        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Author</th>
                <th scope="col">Email</th>
                <th scope="col">Body</th>
                <th scope="col">Created at</th>
                <th scope="col">on Post</th>
            </tr>
            </thead>

            <tbody>

            @foreach($comments as $comment)
                <tr>
                    <th scope="row">{{$comment->id}}</th>
                    <td>{{$comment->author}}</td>
                    <td>{{$comment->email}}</td>
                    <td>{{str_limit($comment->body, 30)}}</td>
                    <td>{{$comment->created_at->diffForHumans()}}</td>
                    <td><a href="{{route('post.home', $comment->post->id)}}">View Post</a></td>


                    <td>

                        @if($comment->is_active == 1)

                            {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}

                            <input type="hidden" name="is_active" value="0">

                            <div class="form-group">
                                {!! Form::submit('Un-approve', ['class'=>'btn btn-success']) !!}
                            </div>

                            {!! Form::close() !!}

                        @else

                            {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}

                            <input type="hidden" name="is_active" value="1">

                            <div class="form-group">
                                {!! Form::submit('Approve', ['class'=>'btn btn-info']) !!}
                            </div>

                            {!! Form::close() !!}

                        @endif

                    </td>


                    <td>

                        {!! Form::open(['method'=>'DELETE', 'action'=>['PostCommentsController@destroy', $comment->id]]) !!}

                        <div class="form-group">
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        </div>

                        {!! Form::close() !!}

                    </td>

                </tr>
            @endforeach

            </tbody>
        </table>

    @else

        <h2 class="text-center">No comments</h2>

    @endif


@stop