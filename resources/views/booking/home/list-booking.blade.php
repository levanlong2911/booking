@extends('template.home.master')

@section('content')
<div class="row ml-5" id="mtr">
    <div>LIST BOOKING</div>
</div>
<br />
<div>
    <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Time start</th>
                    <th>Time end</th>
                    <th>Amount of people</th>
                    <th>user id</th>
                    <th>room list id</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($rooms as $room)
                    <tr>
                      <td>{{ $room->id }}</td>
                      <td>{{ $room->title }}</td>
                      <td>{{ $room->date }}</td>
                      <td><span class="tag tag-success">{{ $room->time_start }}</span></td>
                      <td>{{ $room->time_end }} </td>
                      <td>{{ $room->amount_of_people }} </td>
                      <td>{{ $room->user_id }} </td>
                      <td>{{ $room->room_list_id }} </td>
                    </tr>
                  @endforeach
                  
                  
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
</div>
@endsection