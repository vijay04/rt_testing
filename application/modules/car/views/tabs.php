<div id="car-search-tabs">

	<ul class="ui-tabs">
    <li class="search-cabs-text">Search for Cab</li>

		<li><a href="#local_wrapper">Local Usage</a></li>
		<li><a href="#outstation_wrapper">Outstation</a></li>
		<li><a href="#airport_railway_wrapper">Airport/Railway Transfer</a></li>
        
	</ul>

	<div id="local_wrapper">
		<form action="<?php print base_url() . 'car/listing' ?>" method="post">
        <div class="field">
				<label>Trip type</label>
				<label class="radio inline">
					<input type="radio" name="trip_type" id="full_day" value="local_full_day" checked>
					Full Day
				</label>
				<label class="radio inline">
					<input type="radio" name="trip_type" id="half-day" value="local_half_day">
					Half Day
				</label>
			</div>
			<div>
				<label>I want a cab in</label>
				<input type="text" name="local_city" value="" id="local_city" class="cities" placeholder="Select city">
			</div>
			<div>
				<legend>When</legend>
				<label>Pick-up Date(Sunday)</label>
				<input type="text" name="local_pickup_date" value="" id="local_pickup_date" class="datepicker_select">
			</div>
			<div class="controls">

<button type="submit" class="btn btn-success">Search</button>
					

			</div>
		</form>
	</div>

	<div id="outstation_wrapper">
		<form action="<?php print base_url() . 'car/listing' ?>" method="post">
			<div class="field">
				<label>Trip type</label>
				<label class="radio inline">
					<input type="radio" name="trip_type" id="round_trip" value="round_trip" checked>
					Round Trip
				</label>
				<!--<label class="radio inline">
					<input type="radio" name="trip_type" id="one_way_trip" value="one_way_trip">
					One Way Trip
				</label>-->
			</div>

			<div class="field">
				<div class="row">
					<div class="span3">
						<label>I want a cab from</label>
						<input type="text" name="city_from" value="" id="city_from" class="cities" placeholder="Select origin">
					</div>
					<div class="span3 offset1">
						<label>I want to go to</label>
						<input type="text" name="city_to" value="" id="city_to" class="cities" placeholder="Select destination">
					</div>
				</div>
			</div>

			<div class="field">
				<div class="row">
					<div class="span3">
						<label>Pickup date</label>
						<input type="text" name="outstaion_pickup_date" id="outstaion_pickup_date" value="" class="datepicker_select">
					</div>
					<div class="span3 offset1">
						<label>Return date</label>
						<input type="text" name="outstaion_return_date" id="outstaion_return_date" value="" class="datepicker_select">
					</div>
				</div>
			</div>

			<div class="controls">
				
<button type="submit" class="btn btn-success">Search</button>
				
			</div>
		</form>
	</div>

	<div id="airport_railway_wrapper">
		<form action="<?php print base_url() . 'car/listing' ?>" method="post">


			<div class="field">
				<label>Trip type</label>
				<label class="radio inline">
					<input type="radio" name="trip_type" id="airport_round_trip" value="round_trip" checked>
					Drop to Airport/ Railway Station
				</label>
				<label class="radio inline">
					<input type="radio" name="trip_type" id="airport_one_way_trip" value="one_way_trip">
					Pick-up from Airport/ Railway Station
				</label>
			</div>
			<div class="field">
				<div class="row">
					<div class="span3">
						<label>I want a cab from</label>
						<input type="text" name="airport_city_from" value="" id="airport_city_from" class="cities" placeholder="Select origin">
					</div>
					<div class="span3  offset1">
						<label>I want to go to</label>
						<input type="text" name="airport_city_to" value="" id="airport_city_to" class="cities" placeholder="Select destination">
					</div>
				</div>
			</div>

			<div>
				<b>When</b>
				<div class="row">
					<div class="span3">
						<label>Pick-up Date(Sunday)</label>
						<input type="text" name="airport_pickup_date" value="" id="airport_pickup_date" class="datepicker">
					</div>
					<div class="span3  offset1">
						<label>Return Date(Sunday)</label>
						<input type="text" name="airport_return_date" value="" id="airport_return_date" class="datepicker">
					</div>
				</div>
			</div>

			<div class="controls">

					<button type="submit" class="btn btn-success">Search</button>
				
			</div>


		</form>
	</div>
</div>