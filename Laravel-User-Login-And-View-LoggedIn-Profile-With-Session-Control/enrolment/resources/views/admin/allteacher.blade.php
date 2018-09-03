@extends('layout')
@section('content')


          <div class="card">
            <div class="card-body">
              <h2 class="card-title">Data table</h2>
                    <p class="alert-success">
                  <?php
                  $exception = Session::get('message');
                  if ($exception) {
                      echo $exception;
                      Session::put('message',null);
                  }
                  ?>
              </p>
              <div class="row">
                <div class="col-12">
                  <table id="order-listing" class="table table-striped" style="width:100%;">
                    <thead>
                      <tr>
                          <th>Teacher_Name</th>
                          <th>Phone</th>
                          <th>Image</th>
                          <th>Address</th>
                          <th>Department</th>
                          <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($allteacher_info as $show_info)
                      <tr>
                          <td>{{$show_info->teachers_name}}</td>
                          <td>{{$show_info->teachers_phone}}</td>
                          <td><img src="{{URL::to($show_info->teachers_image)}}" height="80" width="100" style="border-radius: 50%;"></td>
                          <td>{{$show_info->teachers_address}}</td>
                          <td>
                              
                              @if ($show_info->teachers_department == 1)
                              <span class="label-success">{{('CSE')}}</span>
                              @elseif ($show_info->teachers_department == 2)
                              <span class="label-primary">{{('BBA')}}</span>
                              @elseif ($show_info->teachers_department == 3)
                              <span class="label-warning">{{('EEE')}}</span>
                              @elseif ($show_info->teachers_department == 4)
                              <span class="label-info">{{('ECE')}}</span>
                              @elseif ($show_info->teachers_department == 5)
                              <span class="label-info">{{('MBA')}}</span>
                              @else
                              <span class="label-important">{{('Not defined')}}</span>
                              @endif
                              
                          </td>
                          <td>
                              <a href="{{URL::to('/teacher_view/'.$show_info->teachers_id)}}"><button class="btn btn-outline-primary">View</button></a>
                              <a href="{{URL::to('/teacher_edit/'.$show_info->teachers_id)}}"><button class="btn btn-outline-warning">Edit</button></a>
                            <a href="{{URL::to('/teacher_delete/'.$show_info->teachers_id)}}" id="Tdelete"><button class="btn btn-outline-danger">Delete</button></a>
                          </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        

@endsection
