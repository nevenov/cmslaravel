@extends('layouts.admin');




@section('content')


    <h1>Edit Category</h1>


    <div class="col-sm-5">


        {!! Form::model($category, ['method'=>'PATCH', 'action'=>['AdminCategoriesController@update', $category->id]]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Update Category', ['class'=>'btn btn-primary col-sm-4']) !!}
        </div>

        {!! Form::close() !!}


        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy', $category->id]]) !!}

            <div class="form-group">
                {!! Form::submit('Delete category', ['class'=>'btn btn-danger col-sm-4 col-md-offset-4']) !!}
            </div>

        {!! Form::close() !!}

    </div>



    <div class="col-sm-6 col-sm-offset-1">

        @if($categories)

            <table class="table">

                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Created</th>
                </tr>
                </thead>

                <tbody>

                @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{$category->id}}</th>
                        <td><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></td>
                        <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'no date'}}</td>
                    </tr>
                @endforeach

                </tbody>

            </table>

        @endif

    </div>





@endsection