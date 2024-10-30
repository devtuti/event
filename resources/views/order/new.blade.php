<div class="modal fade" id="modal-order">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New order</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         
            <form method="post">
                @csrf
            <div class="form-group">
                <label for="event_id">Event</label>
                <select class="form-control" id="event_id" name="event_id">
                  @foreach ($events as $event)
                    <option value="{{$event->id}}">{{$event->head}}</option>
                  @endforeach
                </select>
            </div>

            <div class="form-group">
              <label for="type_id">Type</label>
              <select class="form-control" id="type_id" name="tickets['type_id'][]">
                @foreach ($types as $type)
                  <option value="{{$type->id}}">{{$type->name}}</option>
                @endforeach
              </select>
            </div>
           
              <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" id="quantity" placeholder="Quantity" name="tickets['quantity'][]">
              </div>


              <div class="form-group">
                <label for="type_id">Type</label>
                <select class="form-control" id="type_id" name="tickets['type_id'][]">
                  @foreach ($types as $type)
                    <option value="{{$type->id}}">{{$type->name}}</option>
                  @endforeach
                </select>
              </div>
             
                <div class="form-group">
                  <label for="quantity">Quantity</label>
                  <input type="number" class="form-control" id="quantity" placeholder="Quantity" name="tickets['quantity'][]">
                </div>
           
            <button type="button" class="btn btn-info" data-control="order-button">Create order</button>
            </form>       

        </div>
       
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->