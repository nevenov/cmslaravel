@extends('layouts.admin')



@section('content')

    <div class="row">
<<<<<<< HEAD

=======
    
>>>>>>> dev
        <div class="col-sm-3">

            <img src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400'}}" alt="" class="img-responsive img-rounded">

        </div>
<<<<<<< HEAD


=======
    
    
>>>>>>> dev
        <div class="col-sm-9">

            <h1>Edit User</h1>


            {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::email('email', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('role_id', 'Role:') !!}
                {!! Form::select('role_id', $roles, null, ['class'=>'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::label('is_active', 'Status:') !!}
                {!! Form::select('is_active', array(1=>'Active', 0=>'Not Active'), null , ['class'=>'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::label('file', 'Image:') !!}
                {!! Form::file('file', null, ['class'=>'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password', ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update User', ['class'=>'btn btn-primary col-sm-4']) !!}
            </div>

            {!! Form::close() !!}



            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}

                <div class="form-group">
                    {!! Form::submit('Delete user', ['class'=>'btn btn-danger col-sm-4 col-md-offset-4']) !!}
                </div>

            {!! Form::close() !!}


        </div>

    </div>


    <div class="row">
        @include('includes.form_errors')
    </div>



@endsection