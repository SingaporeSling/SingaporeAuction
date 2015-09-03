<div id="feature-products-list">
 <h1>Products from {{ $category->name }} category</h1>
 
<div class="row">
	@foreach ($category->products as $product)
	<div class="col-sm-4 col-lg-4 col-md-4">
		<div class="thumbnail">
			@if (File::exists(public_path() . '/product_images/product_'.$product->id.'_0.jpg'))
			<img width="200" src="{{asset('product_images/product_'.$product->id.'_0.jpg')}}" />
			@endif
			<div class="caption">
				<h4 class="pull-right">{{$product->start_price}}$</h4>
				<h4><a href="#">{{$product->product_name}}</a>
				</h4>
				<p>{{$product->description}}</p>
				<p><a class="view-product" href="#/view-product/{{$product->id}}">Bid</a></p>
			</div>
        </div>
    </div>
	@endforeach
</div>
   

    
 
  