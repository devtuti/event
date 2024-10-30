<div class="modal fade" id="modal-ticketype">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New ticket type</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         
            <form method="post">
                @csrf
            <div class="form-group">
                <label for="type">Type</label>
                <input type="text" class="form-control" id="type" placeholder="New ticket Type" name="type">
            </div>

            <div class="form-group">
              <label for="price">Price</label>
              <input type="number" class="form-control" id="price" placeholder="Price" name="price">
          </div>

            <div class="form-group">
                <label>Ticket type description</label>
                <textarea class="form-control" rows="3" placeholder="Description" name="description"></textarea>
            </div>
            <button type="button" class="btn btn-info" data-control="type-button">Create ticket type</button>
            </form>       

        </div>
       
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->