<div class="modal fade" id="modal-event-edit">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Event Edit</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('event.update')}}" method="POST">
            @csrf
            <input type="hidden" id="eid" name="id">
            <div class="form-group">
                <label for="eventHeader">Event header</label>
                <input type="text" class="form-control" id="eventHeader" name="header">
            </div>
            <div class="form-group">
                <label for="eventText">Event text</label>
                <textarea class="form-control" rows="3" name="text" id="eventText"></textarea>
            </div>
          </form>

        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" data-control="event-update-button">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->