@extends('layouts.admin')




@section('content')


    @if(Session::has('deleted_photo'))

        <p class="bg-danger">{{session('deleted_photo')}}</p>

    @endif

    <h1>Media</h1>

    @if($photos)


    <form action="delete/media" method="post" class="form-inline">

        {!! method_field('delete') !!}
        {!! csrf_field() !!}

        <div class="form-group">
            <select name="checkBoxArray" id="" class="form-control">
                <option value="">Delete</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" name="delete_all" value="Submit" class="btn btn-primary">
        </div>

    <table class="table">
      <thead>
        <tr>
          <th scope="col"><input type="checkbox" id="options"></th>
          <th scope="col">Id</th>
          <th scope="col">Name</th>
          <th scope="col">Created</th>
        </tr>
      </thead>
      <tbody>

      @foreach($photos as $photo)
        <tr>
          <th scope="row"><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></th>
          <th scope="row">{{$photo->id}}</th>
          <td><img height="50" src="{{$photo->file}}" alt=""></td>
          <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'no date' }}</td>
        </tr>
      @endforeach

      </tbody>
    </table>

    </form>

    @endif

@stop


@section('scripts')

    <script>

        $(document).ready(function () {
            
            
            $('#options').click(function () {

                if(this.checked){

                    $('.checkBoxes').each(function () {
                        this.checked = true;
                    });

                } else {

                    $('.checkBoxes').each(function () {
                        this.checked = false;
                    });

                }

            });


        });

    </script>


@stop