
 <div id="feature-products-list">
  @foreach($products as $product)
 
  <ul class="display-items-list">
  <li id="headline">{{$product->product_name}}</li>
  <li>{{$product->description}}</li>
  <li>{{$product->start_price}}</li>
  @if (File::exists(public_path() . '/product_images/product_'.$product->id.'_0.jpg'))
  <li><img width="200" src="{{asset('product_images/product_'.$product->id.'_0.jpg')}}" /></li>
  @endif
  <li><a class="view-product" href="#/view-product{{$product->id}}">Bid</a></li>
  </ul>
  @endforeach
  </div>