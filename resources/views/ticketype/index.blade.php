@extends('layouts.app')
@section('title' , __("New ticket Type"))
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@section('title' , __("New ticket type"))</h1>
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
                  <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#modal-ticketype" data-control="ticket_type" data-url="{{route('ticketype.store')}}">New ticket type</button>
                  @if (count($count)>0)
                  <a href="{{route('newOrder')}}" class="btn btn-outline-info btn-sm" >New order</a>
                  @endif
                  
                    @include('events.error')
                           
                </div>
  
              </div>
  
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h3>All ticket </h3>
                </div>
                <div class="card-body p-0" data-control="ticket_table">
                  
                </div>
              </div><!-- /.card -->


            </div>
    
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
  @include('ticketype.new')
 @endsection

 @push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    $(document).ready(function(){
      table();
   
    });
    
    let $TicketModal = $('#modal-ticketype');

    function table(){
      $.ajax({
          url: "{{ route('ticketype.data') }}",
          success: function(response) {
            if (response.table !== undefined) {
              $('[data-control="ticket_table"]').html(response.table)
              
            }
          }
        });
    }

    $(document.body).on('click', '[data-control="type-button"]', function() {
      /*.log($TicketModal.find('[name="type"]').val())
      console.log($TicketModal.find('[name="price"]').val())*/
            $.ajax({
                method: 'POST',
                url: '{{ route('ticketype.store') }}',
                data: {
                    type: $TicketModal.find('[name="type"]').val(),
                    price: $TicketModal.find('[name="price"]').val(),
                    description: $TicketModal.find('[name="description"]').val(),
                   
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
                              $TicketModal.modal('hide')
                                table();
                            }
                        })
                    } else {
                        Swal.fire(
                            response.message,
                            
                            'error'
                        )
                    }
                }
            });
        });
</script>
@endpush

