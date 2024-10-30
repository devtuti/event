<table class="table table-striped">
    <thead>
      <tr>
        <th style="width: 10px">#</th>
        <th>Event Header</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
     @foreach ($my_event as $event)
         <tr>
            <td> {{$event->id}} </td>
            <td> {{$event->head}} </td>
            <td> 
                  <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modal-event-edit" data-id="{{$event->id}}" data-control="event_edit" data-url="{{route('event.edit',$event->id)}}">Edit</button>
                  <button type="button" class="btn btn-outline-danger btn-sm" data-id="{{$event->id}}" data-control="event_delete" data-url="{{route('event.delete',$event->id)}}">Delete</button>
                <button type="button" class="btn btn-outline-info btn-sm">
                  <a href="{{route('event.detail',$event->id)}}">Detail</a>
                </button>
            </td>
         </tr>
     @endforeach
    </tbody>
  </table>