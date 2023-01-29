@extends('staff-directory.staff-layout')

@section('staff-page-content')


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


{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

<div class="card">
    <div class="card-body">
      <h3 class="panel-title" style="text-align:center;">Send Mail Requesting for Permission</h3>
      <br>

      <form action="{{ route('handle-send-mail') }}" method="POST">
        {{ csrf_field() }}

        <div class="form-group row">
            <label for="To_email" class="col-sm-2 col-form-label">To :</label>
            <div class="col-sm-8">
              <select class="form-control"  id="To_email"name = "To_email"   required>

                <option selected disabled>Select a persion</option>
                <option value="sasi@tealorca.com">sasi@tealorca.com</option>

              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="type_of_leave" class="col-sm-2 col-form-label">Bcc :</label>
            <div class="col-sm-8">
              <select class="form-control" name = "Bcc_mail[]" id="type_of_leave"  required multiple>

                <option value="project@tealorca.com">project@tealorca.com</option>
                <option value="bava@tealorca.com">bava@tealorca.com</option>
                <option value="priyanak@tealorca.com">priyanak@tealorca.com</option>

              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="Email_subject" class="col-sm-2 col-form-label">Subject</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="Email_subject" value="" name="Email_subject"
                    placeholder="Subject of Mail" required>
            </div>
        </div>


        <div class="form-group row">
          <label for="Leave_type" class="col-sm-2 col-form-label">Type of Leave</label>
          <div class="col-sm-8">
            <select class="form-control" name = "Leave_type" id="Leave_type" aria-label="Default select example" required>
              <option selected disabled>Select a leave type</option>
              <option value="Sick leave">Sick leave</option>
              <option value="Casual leave">Casual leave</option>
              <option value="Compensatory leave">Compensatory leave</option>
              <option value="Sabbatical leave">Sabbatical leave</option>
              <option value="Sabbatical leave">personal leave</option>
              <option value="Unpaid Leave">other</option>

            </select>
          </div>
        </div>

        <div class="form-group row">
          <label for="Description" class="col-sm-2 col-form-label">Description</label>
          <div class="col-sm-8">

            <textarea class="form-control" name="Description" id="Description" placeholder="Enter the description" required></textarea>

          </div>
        </div>

        <div class="form-group row">
          <label for="Date_of_leave_from" class="col-sm-2 col-form-label">Date of From</label>
          <div class="col-sm-4">
              <input type="date" class="form-control" id="Date_of_leave_from" name="Date_of_leave_from" required>
          </div>
        </div>

        <div class="form-group row">
            <label for="Date_of_leave_to" class="col-sm-2 col-form-label">Date of To</label>
            <div class="col-sm-4">
                <input type="date" class="form-control" id="Date_of_leave_to" name="Date_of_leave_to" required>
            </div>
          </div>

        <div class="form-group row">
          <label style="visibility:hidden;" for="button" class="col-sm-2 col-form-label">button</label>
          <div class="col-sm-8">
            <input class="btn btn-primary col-md-2 col-sm-12" value="Submit" id="button" type="submit">
          </div>
        </div>

      </form>

    </div>
</div>

<br>

<div class="card">
    <div class="card-body">
      <h3 class="panel-title" style="text-align:center;">My Pending Requests</h3>
      <br>

      {{-- @foreach ($leave_pending_data as $key => $data)

          <div class="card text-white bg-dark mb-3">
            <div class="card-header bg-dark ">
              <strong>{{$data->date_of_leave}}</strong>
              <i class="float-right" style="font-size:85%;">Request sent on :- 1</i>
            </div>
            <div class="card-body">
              <h5 class="card-title">{{$data->type_of_leave}}</h5>
              <p class="card-text">{{$data->description}}</p>
              <a class="btn btn-danger float-right confirmation" href="/delete-leave-pending-request-in-staff-account/{{$data->auto_id}}">Delete Request</a>
            </div>
          </div>

      @endforeach --}}



    </div>
</div>



@endsection

