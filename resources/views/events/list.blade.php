<table class="table table-striped">
    <thead>
      <tr>
        <th style="width: 10px">#</th>
        <th>Event Header</th>
        <th>Event Admin</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
     @foreach ($events as $event)
         <tr>
            <td> {{$event->id}} </td>
            <td> {{$event->head}} </td>
            <td> {{$event->user->nickName}} </td>
            <td> 
                <button type="button" class="btn btn-outline-info btn-sm">
                  <a href="{{route('event.detail',$event->id)}}">Detail</a>
                </button>
            </td>
         </tr>
     @endforeach
    </tbody>
  </table>