@extends('layouts.admin')




@section('content')


    @if(Session::has('deleted_photo'))

        <p class="bg-danger">{{session('deleted_photo')}}</p>

    @endif

    <h1>Media</h1>

    @if($photos)

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Name</th>
          <th scope="col">Created</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>

      @foreach($photos as $photo)
        <tr>
          <th scope="row">{{$photo->id}}</th>
          <td><img height="50" src="{{$photo->file}}" alt=""></td>
          <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'no date' }}</td>
          <td>

              {!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediasController@destroy', $photo->id]]) !!}

                  <div class="form-group">
                      {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                  </div>

              {!! Form::close() !!}

          </td>
        </tr>
      @endforeach

      </tbody>
    </table>

    @endif

@stop