@if(Auth::check() && Auth::user()->id == $user->id)
<form id="profile_form" class="form-horizontal" action="/#/set-profile/{{ $user->id }}" method="post">
  <fieldset>
    <legend>Change your account settings</legend>
		<div class="form-group">
			<label for="sex" class="col-lg-2 control-label">Select your gender:</label>
			<div class="col-lg-10">
					<div class="radio">
						<label>
							<input type="radio" name="sex" id="optionsRadios1" value="0" checked="">
							Male
						</label>
					</div>
					<div class="radio">
						<label>
							<input type="radio" name="sex" id="optionsRadios2" value="1">
							Female
						</label>
					</div>
			</div>
		</div>
		<div class="form-group">
			<label for="about_me" class="col-lg-2 control-label">About me</label>
			<div class="col-lg-10">
				<input type="hidden" name="user_id" value="{{$user->id}}" id="user_id" />
				<textarea name="about_me" class="form-control" id="about_me"></textarea>
		    </div>
    </div>
	<div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Cancel</button>
      	<input type="submit" class="btn btn-primary" value="Submit" />
      </div>
    </div>
  </fieldset>
</form>

<form id="upload" class="form-horizontal" action="{{ action('UsersController@createProfileImage', $user->id) }}" method="POST" enctype="multipart/form-data">
  <fieldset>
    <legend>HTML File Upload</legend>
		<div class="form-group">
			<label class="col-lg-2 control-label" for="fileselect">Files to upload:</label>
			<input type="file" id="fileselect" name="fileselect[]" multiple="multiple" />
			<div id="filedrag">or drop files here</div>
		</div>
		<div class="form-group">
			<div class="col-lg-10 col-lg-offset-2">
				<button type="reset" class="btn btn-default">Cancel</button>
				<button type="submit" class="btn btn-primary" id="submitbutton">Upload Files</button>
			</div>
		</div> 
  </fieldset>
</form>
 
<div id="messages"></div>
 
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
  <hr>
  <h4>Your account details:</h4>
    <p  class="text-info">First name: {{$user->first_name}}</p>
    <p  class="text-info">Last name: {{$user->last_name}}</p>
    <p  class="text-info sex">Sex: {{$user->sex}}</p>
    <p  class="text-info about-me">About me: {{$user->about_me}}</p>
    <p  class="text-info">Profile image:</p>
    @if (File::exists(public_path() . '/profile_images/profile_'.$user->id.'.jpg'))
  <img class="profile-image" width="200" src="{{asset('profile_images/profile_'.$user->id.'.jpg')}}?{{rand()}}" />
  @endif
    
  </div>


<!--TODO move the style -->
  <style type="text/css">
   label{display: block;}
  </style>

{{HTML::script('js/image-upload.js')}}
