@extends('layouts.app')
@section('title' , __("New Order"))
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@section('title' , __("New order"))</h1>
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
                  <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#modal-order" data-control="order">New order</button>

                    @include('events.error')
                           
                </div>
  
              </div>
  
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h3>All order </h3>
                </div>
                <div class="card-body p-0" data-control="order_table">
                  
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
  @include('order.new')
 @endsection

 @push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    $(document).ready(function(){
      table();

   
    });

            $(document).on('click', '.remove', function(){
                    var last = $('#typeRow .form-group').length;
                    if(last==1){
                        alert("no deleted one row");
                    }else{
                        $(this).parent().parent().remove();
                    }
                    
            });
    
    let $OrderModal = $('#modal-order');

    function table(){
      $.ajax({
          url: "{{ route('order.data') }}",
          success: function(response) {
            if (response.table !== undefined) {
              $('[data-control="order_table"]').html(response.table)
              
            }
          }
        });
    }

    $(document.body).on('click', '[data-control="order-button"]', function() {
      
            $.ajax({
                method: 'POST',
                url: '{{ route('order.store') }}',
                data: {
                    event_id: $OrderModal.find('[name="event_id"]').val(),
                    quantity: $OrderModal.find('[name="quantity"]').val(),
                    
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
                              $OrderModal.modal('hide')
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

