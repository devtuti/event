@extends('layouts.app')
@section('title' , __("Event Detail"))
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@section('title' , __("Event detail"))</h1>
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body"> 
                    
                    <div class="form-group">
                        <label for="deventHeader">Event header</label>
                        <input type="text" class="form-control" id="deventHeader" value="{{$event->head}}">
                    </div>
                    <div class="form-group">
                        <label for="deventText">Event text</label>
                        <textarea class="form-control" rows="3" id="deventText">{{$event->text}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="dadmin">Admin</label>
                        <input type="text" class="form-control" id="dadmin" value="{{$event->user->nickName}}">
                    </div>

                    
                      @if (count($users)>0)
                        <div class="form-check">
                        <label>Users: </label>
                        @foreach ($users as $user)
                                <p>{{$user->user->nickName ?? ''}}</p>

                                @if (auth()->user()->id != $user->user_id and auth()->user()->id != $event->admin)
                                  <button type="button" class="btn btn-block btn-primary" data-control="join">Join to event</button>
                                @else
                                  <button type="button" class="btn btn-block btn-primary" data-control="leave">Leave to event</button>
                                @endif
                          
                        @endforeach 
                      @else
                        @if (auth()->user()->id != $event->admin)
                          <button type="button" class="btn btn-block btn-primary" data-control="join">Join to event</button>
                        @endif
                        </div>
                      @endif
                    
                  
                   
                </div>
                                  
                </div>
  
              </div>
  
            
            </div>
    
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
  
 @endsection
 @push('js')
   <script>
    $(document.body).on('click','[data-control="join"]', function(){
      $.ajax({
                method: 'POST',
                url: '{{ route('user.join.event') }}',
                dataType: 'json',
                data: {
                    event_id: {{$event->id}}
                 
                },
                success: function(response) {
                  console.log(response);
                  window.location.reload();
                }
              });
    });

    $(document.body).on('click','[data-control="leave"]', function(){
      $.ajax({
                method: 'POST',
                url: '{{ route('user.leave.event') }}',
                dataType: 'json',
                data: {
                    event_id: {{$event->id}}
                 
                },
                success: function(response) {
                  console.log(response);
                  window.location.reload();
                }
              });
    });
   </script>
 @endpush
