<div id="feature-products-list">

    <h1>Products from {{ $category->name }} category</h1>

    @foreach ($category->products as $product)
 
  	<ul class="all-products display-items-list">
		<li id="headline">{{$product->product_name}}</li>
		@if (File::exists(public_path() . '/product_images/product_'.$product->id.'_0.jpg'))
			<li><img width="150" src="{{asset('product_images/product_'.$product->id.'_0.jpg')}}" /></li>
		@endif
		<li>{{$product->description}}</li>
		<li>{{$product->start_price}}</li>
  		<li><a href="#/view-product/{{$product->id}}">Bid</a></li>
  	</ul>

  	@endforeach
 </div>