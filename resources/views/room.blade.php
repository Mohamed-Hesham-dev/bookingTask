@extends('App.app')
@section('content')

	
@if(isset($rooms))
    

          <div>
                    <nav class="navbar bg-light">
                        <h1>All Available Rooms</h1>
                        <form action="{{url('checkout')}}" method="POST">
                              @csrf 
			<div class="nav-item">
                                        <input class="input-control" type="date" name="start_date" value={{$start_date}}>
				                  <input class="input-control" type="date" name="end_date" value={{$end_date}}>
                   
			</div>

                
                              
                              <ul style="display: flex;
                              padding: 0;"> 
                                  @foreach ($rooms as $key=>$room)
                                  <li class="nav-item" style="list-style: none">
                                        <input type="checkbox" id="{{'mondayOptions-'.$key}}" onclick="selectRoom({{$key}},{{'\''.$room->type.'\''}})" name="{{'rooms['.$key.'][room_id]'}}" value="{{$room->id}}"><label style="display: inline-flex;">
                                        <span style="padding: 0 5px"> <p style="MARGIN: 0;
    line-height: 14px;font-size:16px"> Room Number :</p>{{$room->room_number}} </span> <span style="padding: 0 5px"><p style="MARGIN: 0;
    line-height: 14px;font-size:16px">Type :</p> {{$room->type}}</span><span style="padding: 0 5px"><p style="MARGIN: 0;
    line-height: 14px;font-size:16px">Price:</p> ({{$room->price}}$)</span></label>
                                          <select id="{{'box_g2-'.$key}}" disabled name="{{'rooms['.$key.'][person_number]'}}" >
                                                <option value="1" selected>1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                          </select>
                                  </li>

                                  @endforeach
                              </ul>
                              <button type="submit" class="btn-info" style="width: 30%;
                              height: 40px;
                              border-radius: 2px;">Booking</button>
								
							
                        </form>
                          </nav>
                        </div>
@endif
@endsection

@section('js')


<script>


     function  selectRoom(num , room_type){
           console.log(room_type);
           if(room_type!='single'){
                  $('#box_g2-'+num).attr('disabled',false);
           }
            
      }

	 
</script>

@endsection

