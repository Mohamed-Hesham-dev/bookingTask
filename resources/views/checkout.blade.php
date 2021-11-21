@extends('App.app')
@section('content')

<div class="container" style="margin: 15% 5% 5%;">
          <div class="row">
                    <h1>your booking room</h1>

<div>
 <form action="{{url('confirm',$data->id)}}" method="POST" >
          @csrf 
<table class="table table-bordered">
          <thead >
              <tr>

                 
                  <th>room_number</th>
                  <th>start_date</th>
                  <th>end_date</th>
                  <th>price</th>
                  <th>price_after_discount</th>
                  <th>status</th>
                 
              </tr>
          </thead>
         
          <tbody class="align-middle">

              <tr>
                  
                  <td>
                    @foreach ($data->rooms as $room)
                    <div>
                        <p>{{$room->room_number}}</p>
                    </div>
                    @endforeach
                </td>
                  <td>
                      <div>
                              <p>{{$data->start_date}}</p>
                      </div>
                  </td>
                  <td> <div>
                    <p>{{$data->end_date}}</p>
                    </div>
                 </td>
                 <td> <div>
                    <p>{{$data->price}}</p>
                    </div>
                 </td>
                 <td> <div>
                    <p>{{$data->price_after_discount}}</p>
                    </div>
                 </td>
                 <td> <div>
                    <p>{{$data->status}}</p>
                    </div>
                 </td>
              </tr>
          </tbody>
                   

       

</table>
<button type="submit" class="btn-info" style="width: 30%;
height: 40px;
border-radius: 2px;">Confirm</button>
 </form>
</div>
          </div>
</div>


@endsection