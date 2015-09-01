<form class="form-horizontal" id="create_product_form" action="/create-product" method="post">
<div class="form-group">
   <label for="product_name" class="col-lg-2 control-label">Product name</label>
   <input class="form-control" type="text" name="product_name" id="product_name" />
   <div class="error product_name"></div>
</div>
<div class="form-group">
   <label for="start_price" class="col-lg-2 control-label">Start price</label>
   <input class="form-control" type="text" name="start_price" id="start_price" />
   <div class="error start_price"></div>
</div>
<div class="form-group">
   <label for="description" class="col-lg-2 control-label">Description</label>
   <div class="col-lg-10">
   <textarea class="form-control" name="description" id="description"></textarea>
   <div class="error description"></div>
   </div>
</div>
<div class="form-group">

   <label for="selection-menu" class="col-lg-2 control-label">Select categories</label>
   <div class="col-lg-10">
   <select name="categories[]" class="form-control" id="selection-menu" multiple="true">
     @foreach($categories as $category)
     <option value="{{$category->id}}">{{$category->name}}</option>
     @endforeach
   </select>
   </div>
   </div>
   <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
   <input class="btn btn-primary" type="submit" value="Add" />
   <div class="error login"></div>
   </div>
   </div>
</form>

	<div id="example">
    <div id="slide-in-content">
        <div id="slide-in-share">
            <a id="slide-in-handle" href="#">Share</a>
            {{-- image form --}}

<form id="upload" action="{{ action('ProductsController@saveProductImage') }}" method="POST" enctype="multipart/form-data">
  <fieldset>
    <legend>* You can also add a photo to your product *</legend>

    <div>
        <label for="fileselect">Files to upload:</label>
        <input type="file" id="fileselect" name="fileselect[]" multiple="multiple" />
        <div id="filedrag">or drop files here</div>
    </div>
    <div id="submitbutton">
       <button type="submit" class="btn btn-primary">Upload Files</button>
    </div>

  </fieldset>
</form>

        </div>
    </div>
</div>

<div id="messages">
    <p>Status Messages</p>
</div>

{{-- end image form --}}

<div id="messages"></div>

@section('scripts')
{{ HTML::script('js/image-upload.js') }}
{{ HTML::script('js/kendo.all.min.js') }}
{{ HTML::script('js/someScript.js') }}
@stop