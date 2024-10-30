@extends('layouts.app')
@section('title' , __("Dashboard"))
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">@section('title' , __("Dashboard"))</h1>
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
              <div class="card-header">
                <h3>All Users </h3>
              </div>
              <div class="card-body p-0" data-control="user_table">                
              </div>

            </div>

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3>All Events </h3>
              </div>
              <div class="card-body p-0" data-control="event_table">
                
              </div>
            </div><!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3>My Events </h3>
              </div>
              <div class="card-body p-0" data-control="my_event_table">                
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
  @include('users.edit')
  @include('users.detail')

  @include('events.edit')
  
  @endsection
@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    $(document).ready(function(){
      table();
   
    });
    
    let $editModal = $('#modal-lg');
    let $detailModal = $('#modal-detail');

    let $editEventModal = $('#modal-event-edit');
    let $detailEventModal = $('#modal-event-detail');

    function table(){
      $.ajax({
          url: "{{ route('user.data') }}",
          success: function(response) {
            if (response.table !== undefined) {
              $('[data-control="user_table"]').html(response.table)
              $('[data-control="event_table"]').html(response.event_table)
              $('[data-control="my_event_table"]').html(response.my_event_table)
            }
          }
        });
    }


    $(document.body).on('click', '[data-control="user_edit"]', function(){
      $.ajax({
          url: $(this).data('url'),
          success: function(response) {
            $editModal.find('[name="id"]').val(response.id)
            $editModal.find('[name="firstName"]').val(response.firstName)
            $editModal.find('[name="lastName"]').val(response.lastName)
            $editModal.find('[name="nickName"]').val(response.nickName)
            $editModal.find('[name="password"]').val(response.password)
            $editModal.find('[name="birthday"]').val(response.birthday)
            $editModal.modal('show')
          }
        });
    });

    $(document.body).on('click', '[data-control="user_detail"]', function(){
      $.ajax({
          url: $(this).data('url'),
          success: function(response) {
            $detailModal.find('[name="firstName"]').val(response.firstName)
            $detailModal.find('[name="lastName"]').val(response.lastName)
            $detailModal.find('[name="nickName"]').val(response.nickName)
            $detailModal.find('[name="password"]').val(response.password)
            $detailModal.find('[name="birthday"]').val(response.birthday)
            $detailModal.modal('show')
          }
        });
    });

    $(document.body).on('click', '[data-control="user-update-button"]', function() {
            $.ajax({
                method: 'POST',
                url: '{{ route('user.update') }}',
                dataType: 'json',
                data: {
                    id: $editModal.find('[name="id"]').val(),
                    firstName: $editModal.find('[name="firstName"]').val(),
                    lastName: $editModal.find('[name="lastName"]').val(),
                    nickName: $editModal.find('[name="nickName"]').val(),
                    password: $editModal.find('[name="password"]').val(),
                    birthday: $editModal.find('[name="birthday"]').val(),
                },
                success: function(response) {
                    console.log(response);
                    if (response.status) {
                        Swal.fire(
                            'Notification',
                            response.message,
                            'success'
                        ).then((result) => {
                            if (result.value) {
                                $editModal.modal('hide')
                                table();
                            }
                        })
                    } else {
                        Swal.fire(
                            response.message,
                            response.data,
                            'error'
                        )
                    }
                }
            });
        });

        $(document.body).on('click', '[data-control="event_edit"]', function(){
      $.ajax({
          url: $(this).data('url'),
          success: function(response) {
            $editEventModal.find('[name="id"]').val(response.id)
            $editEventModal.find('[name="header"]').val(response.head)
            $editEventModal.find('[name="text"]').val(response.text)
            
            $editEventModal.modal('show')
          }
        });
    });

    $(document.body).on('click', '[data-control="event-update-button"]', function() {
            $.ajax({
                method: 'POST',
                url: '{{ route('event.update') }}',
                dataType: 'json',
                data: {
                    id: $editEventModal.find('[name="id"]').val(),
                    header: $editEventModal.find('[name="header"]').val(),
                    text: $editEventModal.find('[name="text"]').val(),
                    
                },
                success: function(response) {
                    console.log(response);
                    if (response.status) {
                        Swal.fire(
                            'Notification',
                            response.message,
                            'success'
                        ).then((result) => {
                            if (result.value) {
                              $editEventModal.modal('hide')
                                table();
                            }
                        })
                    } else {
                        Swal.fire(
                            response.message,
                            response.data,
                            'error'
                        )
                    }
                }
            });
        });

       
        $(document.body).on('click', '[data-control="event_delete"]', function(){
           
            $.ajax({
                url:$(this).data('url'),
                success: function(res){
                    console.log(res);
                    if(res.status){
                        Swal.fire(
                            'Notification',
                            res.message,
                            'success'
                        )
                        table();
                    }
                }
            })
        });
  </script>
@endpush
  