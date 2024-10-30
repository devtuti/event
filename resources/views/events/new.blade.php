@extends('layouts.app')
@section('title' , __("New event"))
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@section('title' , __("New event"))</h1>
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
                    @include('events.error')
                    <form action="{{route('event.store')}}" method="post">
                        @csrf
                    <div class="form-group">
                        <label for="header">Event Header</label>
                        <input type="text" class="form-control" id="header" placeholder="Event Header" name="header">
                    </div>
                    <div class="form-group">
                        <label>Event text</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="text"></textarea>
                    </div>
                    <button type="submit" class="btn btn-info">Create event</button>
                    </form>               
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
