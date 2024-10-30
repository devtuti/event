<table class="table table-striped">
    <thead>
      <tr>
        <th style="width: 10px">#</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Nick Name</th>
        <th style="width: 150px">Action</th>
      </tr>
    </thead>
    <tbody>
     @foreach ($users as $user)
         <tr>
            <td> {{$user->id}} </td>
            <td> {{$user->firstName}} </td>
            <td> {{$user->lastName}} </td>
            <td> {{$user->nickName}} </td>
            <td> 
                

                <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#modal-detail" data-id="{{$user->id}}" data-control="user_detail" data-url="{{route('user.detail',$user->id)}}">Detail</button>
            </td>
         </tr>
     @endforeach
    </tbody>
  </table>