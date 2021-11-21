@extends('App.app')
@section('content')

<div class="wrap">
	<div class="container">
		<div class="row">
			<div id="availability">
				<form action="{{url('checkroom')}}" method="POST">
					@csrf 

					<div class="a-col alternate">
						<div class="input-field">
							<label for="date-start">Hotels</label>
							
							<select class="form-control" name="hotel_id" id="hotel_dd">
								@foreach($hotels as $hotel)
								<option >choose...</option>
								<option value='{{$hotel->id}}'>{{$hotel->name}}</option>
								@endforeach
							</select>
							
						</div>
					</div>
					<div id="branch_div"  class="a-col alternate">
						<div class="input-field">
						<label for="date-start">Branches</label>
	      
						<select id="branch_dd" tobetranslated="Related" name="branch_id"
						    class="form-control select" required="required" tabindex="null">
	      
						</select>
					      </div>
					</div>
					<div class="a-col alternate">
						<div class="input-field">
							<label for="date-start">Check In</label>
							<input type="date" class="form-control" name="start_date" />
						</div>
					</div>
					<div class="a-col alternate">
						<div class="input-field">
							<label for="date-end">Check Out</label>
							<input type="date" class="form-control" name="end_date" />
						</div>
					</div>
					<div class="a-col action">
						<button type="submit"><span>Check</span>Availability</button>
							
						
					</div>
				</form>
			</div>
		</div>
	</div>

	
</div>


@endsection

@section('js')


<script>
	 $(document).ready(function() {
            $('#hotel_dd').on('change', function() {
                var idHotel = this.value;
	      console.log("here");
                $('#branch_dd').html('');
                $.ajax({
                    url: "{{ url('fetch-branches') }}",
                    type: "GET",
                    data: {
                        hotel_id: idHotel,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
				console.log("ok");
                        if (result.branches.length != 0) {
                            $('#branch_div').removeClass('d-none');
                            $('#branch_dd').html('<option value="">Select Branch</option>');
                            $.each(result.branches, function(key, value) {
                                $("#branch_dd").append(`<option value="${value.id}">  ${value.name}  </option>`);
                            });
                        } else {
                            $('#branch_div').addClass('d-none');
                           
                        }



                    }
                });
            });	
	 });
</script>

@endsection