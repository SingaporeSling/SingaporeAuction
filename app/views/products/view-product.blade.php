<div class="row">
	<div class="col-sm-12 col-lg-12 col-md-12">
		<div class="thumbnail">
			@foreach($files as $file)
				@if (File::exists(public_path() . '/product_images/'.$file))
					<img width="300" src="{{asset('product_images/'.$file)}}" />
				@endif
			@endforeach 
		<div class="caption">
			<h4 class="pull-right">Start price: {{$product->start_price}}.00$</h4>
			
			<h4>{{$product->product_name}}</h4>
			
			<p>Item specifications: {{$product->description}}</p>
			<h3 class='highest-bid'>Highest bid price is <span id="highest-bid">{{$highest_bid}}.00$</span></h3>
			<hr>
			<div class="pull-right">
				<h4>Bids for this product end in:</h4>
				<div id="defaultCountdown"></div>
				</div>
			<form action="/#/save-bid" method="post" id="bid_form">
				<label for="bid" class="col-lg-2 control-label">Outbid</label>
				<input type="hidden" name="product_id" value="{{$product->id}}"/>
				<input type="text" class="form-control" name="bid" id="bid" />
				<div class="error bid"></div>
				<input type="submit" class="btn btn-primary" value="bid" />
			</form>
		</div>
       </div>
  </div>
</div>
	<div id="successful_bid"></div>
	
	<script type="text/javascript">
$(function () {
	var austDay = new Date();
	austDay = new Date(austDay.getFullYear() + 1, 1 - 1, 26);
	$('#defaultCountdown').countdown({until: austDay});
	$('#year').text(austDay.getFullYear());
});
</script>