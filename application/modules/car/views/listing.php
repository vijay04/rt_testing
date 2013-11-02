<h1>Cars</h1>
<div ng-controller="listingCtrl"  ng-cloak >
	<div class="row"  ng-init="init(params=<?php print htmlspecialchars(json_encode($params)); ?>)">
		<div class="span3">
			<div class="well well-small">
				<label class="control-label">Capacity</label>
				<label class="checkbox">
					<input type="checkbox" name="capacity4" ng-model="capacity4" ng-change="capacityFilter('capacity4', '4')"> 4
				</label>
				<label class="checkbox">
					<input type="checkbox" name="capacity6" ng-model="capacity6" ng-change="capacityFilter('capacity6', '6')"> 6
				</label>
			</div>

			<div class="well well-small">
				<label class="control-label">Amenities</label>
				<label class="checkbox">
					<input type="checkbox" name="aircondition" ng-model="aircondition" > Air Condition
				</label>
				<label class="checkbox">
					<input type="checkbox" name="stereo" ng-model="stereo"> Stereo
				</label>
			</div>
			<div class="well well-small">
				<label class="control-label">Price</label>
				<div ui-slider="{range: true}" min="0" max="15000" step="100" ng-model="total_price.price_range" id="price_range"></div>
				<div class="row">
					<div class="span1"><input class="input-mini" type="text" ng-model="total_price.price_range.0"></div>
					<div class="span1"><input class="input-mini" type="text" ng-model="total_price.price_range.1"></div>
				</div>
			</div>
		</div>

		<div class="span9">
			<table class="table">
				<thead>
					<tr>
						<th>Images</th>
						<th ng-click="predicate = 'title'; reverse=!reverse">Title</th>
						<th ng-click="predicate = 'capacity'; reverse=!reverse">Capacity</th>
						<th>Aircondition / Stereo</th>
						<th ng-click="predicate = 'price'; reverse=!reverse">Price</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
                <div>
					<tr class="views-row" ng-repeat="car in cars | filter:carFilter | orderBy:predicate:reverse" ng-animate="'animate'">
						<td><img src="<?php print base_url(); ?>{{car.image_path}}" width="150"/></td>
						<td>{{car.title}}</td>
						<td>{{car.capacity}} + driver</td>
						<td>
							<span ng-show={{car.aircondition}}>Yes</span><span ng-show=!{{car.aircondition}}>No</span> /
							<span ng-show={{car.stereo}}>Yes</span><span ng-show=!{{car.stereo}}>No</span>
						</td>
						<td>{{car.price}}<br/>
  Fare Sumary  </td>
						<td><div class="btn btn-success"><?php print anchor('feedback', 'Book'); ?></div></td>
                        

                        </div>
                        

					</tr>
                                     
				</tbody>
			</table>
		</div>
           		
     
	</div>
    <div class="row">
                <div class="span9 offset3">
                <ul class="nav">
          <span style="color:#F00"><b>Note</b></span> 
<li>Per day 250 Km average as per calendar day.</li>

<li>For outstation Trip driver allowance Rs. 250 /- as per calendar day.</li>

<li>K M . Count garage to garage.</li>

<li>For local trip after 11.30 PM in night driver allowance charged Rs. 200/-</li>

<li>Toll, Parking & Entry Charges Pay By Party.</li>

<li>ONLY FOR ONEDAY 300 KMS AVERAGE FOR OUT STATION.</li>
</ul>
                </div>
                </div>

</div>