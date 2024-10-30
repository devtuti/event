<table class="table table-striped">
    <thead>
      <tr>
        <th style="width: 10px">#</th>
        <th>Ticket type</th>
        <th>Price</th>
        <th>Description</th>
        
      </tr>
    </thead>
    <tbody>
     @foreach ($ticketypes as $type)
         <tr>
            <td> {{$type->id}} </td>
            <td> {{$type->name}} </td>
            <td> {{$type->price}} </td>
            <td> {{$type->description}} </td>
          
         </tr>
     @endforeach
    </tbody>
  </table>