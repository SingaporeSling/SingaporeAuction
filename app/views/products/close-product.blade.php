<div class="row">
	@foreach($products as $product)
	<div class="col-sm-4 col-lg-4 col-md-4" data-id="{{ $product->id }}">
		<div class="thumbnail">
			@if (File::exists(public_path() . '/product_images/product_'.$product->id.'_0.jpg'))
			<img width="200" src="{{asset('product_images/product_'.$product->id.'_0.jpg')}}" />
			@endif
			<div class="caption">
				<h4 class="pull-right">{{ $product->getHighestBid() }}$</h4>
				<h4><a href="#">{{$product->product_name}}</a>
				</h4>
				<p>{{$product->description}}</p>
				<div class="button"><a href="/#/close-product/{{ $product->id }}">Close Product</a></div>
			</div>
        </div>
    </div>
    
	@endforeach
</div>
  
  