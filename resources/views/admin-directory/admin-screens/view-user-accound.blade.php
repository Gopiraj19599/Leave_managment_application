{{-- {{ dd($staff_data) }} --}}
{{-- {{ dd($user_list[0]) }} --}}

@extends('admin-directory.admin-templete')

@section('dashboard-admin-content')


@if($errors->any())
  @foreach ($errors->all() as $error)
      <div id="errorBox" style="text-align:center;margin-top:20px;" class="alert alert-danger col-md-12 alert-dismissible fade show" role="alert">
          <strong style="color:white;">{!!$error!!}</strong>
          <button type="button" style="color:white;" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true" style="color:white;" >&times;</span>
          </button>
      </div>

      <script>

        window.onload=function(){

          $("#errorBox").delay(3000).fadeOut("slow");

        }

      </script>

  @endforeach
@endif


@if(session()->has('message'))

    <div id="successBox" style="text-align:center;margin-top:20px;" class="alert alert-success col-md-12 alert-dismissible fade show" role="alert">
        <strong> {{ session()->get('message') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <script>

        setTimeout(
        function()
        {
            $("#successBox").delay(3000).fadeOut("slow");

        }, 1000);

    </script>

@endif

<div class="card">
    <div class="card-body">
      <h3 class="panel-title" style="text-align:center;">Create User Accounts</h3>
      <br>

      <form action="{{ route('create-user-account') }}" method="POST">

        {{ csrf_field() }}

        <div class="form-group row">
          <label for="username" class="col-sm-2 col-form-label">Staff ID</label>
          <div class="col-sm-8">
            <select class="form-control" name = "staff_id" id="staff_id" aria-label="Default select example">

              <option selected disabled>Select a staff</option>
              @foreach ($staff_data as $key => $data)
                <option value="{{ $data->id }},{{$data->email}}">{{$data->staff_id}} ({{ $data->email }})</option>
              @endforeach

            </select>
          </div>
        </div>

        <div class="form-group row">
            <label for="user_name" class="col-sm-2 col-form-label">User Name</label>
            <div class="col-sm-8">
              <input type="tex" class="form-control" id="user_name" name="user_name" placeholder="User Name" required>
            </div>
          </div>

        <div class="form-group row">
          <label for="password" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-8">
            <input type="tex" class="form-control" id="password" name="password" placeholder="Enter password" required>
          </div>
        </div>




        <div class="form-group row">
          <label style="visibility:hidden;" for="button" class="col-sm-2 col-form-label">button</label>
          <div class="col-sm-8">
            <input class="btn btn-primary col-md-2 col-sm-12" value="Create" id="button" type="submit">
          </div>
        </div>

      </form>

    </div>
</div>

<br>

<div class="card">
      <div class="card-body">

          <table class="table table-bordered table-hover table-dark">
              <thead>
                <tr>
                  <th scope="col">S ID</th>
                  <th scope="col">Username</th>
                  <th scope="col">Email</th>
                  <th scope="col">Password</th>
                  {{-- <th scope="col">Accound type</th> --}}
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($user_list as $key => $data)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{$data->user_name}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{$data->password}}</td>
                        {{-- <td>{{$data->account_type}}</td> --}}
                        <td><a class="btn btn-primary" href="/edit-user-account/{{$data->id}}">Edit</a> <a class="btn btn-danger confirmation" href="/delete-user-account/{{$data->id}}">Delete</a></td>
                    </tr>

                @endforeach

              </tbody>
          </table>

      </div>
</div>



@endsection

<script>

    window.onload=function(){
      $(".nav-item:eq(3)").addClass("active");

      $('.confirmation').on('click', function () {
          return confirm('Are you sure to delete?');
      });

    }

</script>
