<table class="table table-striped">
    <thead>
      <tr>
        <th style="width: 10px">#</th>
        <th>Event</th>
        <th>User</th>
        <th>Ticket</th>
        <th>Quantity</th>
        <th>Total price</th>
        
      </tr>
    </thead>
    <tbody>
     @foreach ($order_tickets as $order)
         <tr>
            <td> {{$order->id}} </td>
            <td> {{$order->order->event->head}} </td>
            <td> {{$order->order->user->name}} </td>
            <td> {{$order->ticket_type->name}} </td>
            <td> {{$order->quantity}} </td>
            <td> {{$order->order->total_price}} </td>
           
         </tr>
     @endforeach
    </tbody>
  </table>