{{-- {{ dd($staff_data->staff_id) }} --}}

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

          $("#errorBox").delay(300).fadeOut("slow");

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

        <h3 class="panel-title" style="text-align:center;">Edit Staffs</h3>
        <br>

        <form action="{{route('updated-staff')}}" method="POST">

          {{ csrf_field() }}

          <div class="form-row">

            <div class="col-md-4 mb-3">
              <label for="first_name">First Name</label>
              <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" value="{{$staff_data->first_name}}" required>
            </div>

            <div class="col-md-4 mb-3">
              <label for="last_name">Last Name</label>
              <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" value="{{$staff_data->last_name}}" required>
            </div>

            <div class="col-md-4 mb-3">
              <label for="date_of_birth">Date of Birth</label>
              <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{$staff_data->date_of_birth}}" required>
            </div>

            <div class="col-md-4 mb-3">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address" value="{{$staff_data->email}}" required>
            </div>

            <div class="col-md-4 mb-3">
              <label for="phone_number">Phone Number</label>
              <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Enter Phone Number" value="{{$staff_data->phone_number}}" required>
            </div>

            <div class="col-md-4 mb-3">
              <label for="position">Position</label>
              <input type="text" class="form-control" id="position" name="position" placeholder="Enter Position/Role" value="{{$staff_data->position}}" required>
            </div>

            <div class="col-md-4 mb-3">
                <label for="staff_id">Staff id</label>
                <input type="text" class="form-control" id="staff_id" name="staff_id" placeholder="staff id" value="{{$staff_data->staff_id}}" required>
              </div>

          </div>

          <input type="hidden" name="id" value="{{$staff_data->id}}" />

          <input class="btn btn-lg btn-primary float-right"   type="submit">
          {{-- <a class="btn btn-lg btn-primary float-right" href="{{ route('updated-staff') }}">Edit</a> --}}
        </form>

      </div>
</div>

@endsection

{{-- <script>

    window.onload=function(){
      $(".nav-item:eq(0)").addClass("active");
    }
</script> --}}
