@extends('master')

@section('main')
@if(Auth::check() && Auth::user()->id == $user->id)
<form id="profile_form" action="/set-profile" method="post">
   <label for="sex">Select your gender:</label>
   <input type="radio" name="sex" value="0" /> Male
   <input type="radio" name="sex" value="1" /> Female

   <input type="hidden" name="user_id" value="{{$user->id}}" id="user_id" />
   <textarea name="about_me" id="about_me"></textarea>

   <input type="submit" value="Submit" />
</form>

<form id="upload" action="{{ action('UsersController@createProfileImage', $user->id) }}" method="POST" enctype="multipart/form-data">
  <fieldset>
    <legend>HTML File Upload</legend>
 
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
 
<div id="messages">
    <p>Status Messages</p>
</div>
 
{{-- end image form --}}
 
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
@endif

  <div class="profile-holder">
    <p class="first-name">{{$user->first_name}}</p>
    <p class="last-name">{{$user->last_name}}</p>
    <p class="sex">{{$user->sex}}</p>
    <p class="about-me">{{$user->about_me}}</p>
    @if (File::exists(public_path() . '/profile_images/profile_'.$user->id.'.jpg'))
  <img width="200" src="{{asset('profile_images/profile_'.$user->id.'.jpg')}}" />
  @endif
    
  </div>


<!--TODO move the style -->
  <style type="text/css">
   label{display: block;}
  </style>
@stop

@section('scripts')
{{HTML::script('js/image-upload.js')}}
@stop