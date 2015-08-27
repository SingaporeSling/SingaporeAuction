@extends('master')

@section('main')
<form id="create_product_form" action="/create-product" method="post">
   <label for="product_name">Product name</label>
   <input type="text" name="product_name" id="product_name" />
   <div class="error product_name"></div>

   <label for="start_price">Start price</label>
   <input type="text" name="start_price" id="start_price" />
   <div class="error start_price"></div>

   <label for="description">Description</label>
   <textarea name="description" id="description"></textarea>
   <div class="error description"></div>
   
   <input type="submit" value="Add" />
   <div class="error login"></div>
</form>

<form id="upload" action="upload.php" method="POST" enctype="multipart/form-data">

<fieldset>
<legend>HTML File Upload</legend>

<input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="300000" />

<div>
 <label for="fileselect">Files to upload:</label>
 <input type="file" id="fileselect" name="fileselect[]" multiple="multiple" />
 <div id="filedrag">or drop files here</div>
</div>

<div id="submitbutton">
 <button type="submit">Upload Files</button>
</div>

</fieldset>

</form>

<div id="messages"></div>


<!--TODO move the style -->
  <style type="text/css">
   label{display: block;}
   #filedrag
{
 display: none;
 font-weight: bold;
 text-align: center;
 padding: 1em 0;
 margin: 1em 0;
 color: #555;
 border: 2px dashed #555;
 border-radius: 7px;
 cursor: default;
}

#filedrag.hover
{
 color: #f00;
 border-color: #f00;
 border-style: solid;
 box-shadow: inset 0 3px 4px #888;
}
  </style>
@stop

@section('scripts')
{{ HTML::script('js/image-upload.js') }}
@stop