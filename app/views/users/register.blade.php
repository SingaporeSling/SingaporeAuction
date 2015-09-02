<form class="form-horizontal" id="register_form" class="register-form" action="#/save-user" method="post">

<fieldset>
    <legend>Please Register</legend>
		<div class="form-group">
			<label for="first_name" class="col-lg-2 control-label">First Name</label>
			<div class="col-lg-10">
				<input type="text" class="form-control" name="first_name" id="first_name" />
				<div class="error first_name"></div>
			</div>
		</div>
		<div class="form-group">
			<label for="last_name" class="col-lg-2 control-label">Last Name</label>
			<div class="col-lg-10">
				<input type="text" class="form-control" name="last_name" id="last_name" />
				<div class="error last_name"></div>
			</div>
		</div>
		<div class="form-group">
			<label for="email" class="col-lg-2 control-label">Email</label>
			<div class="col-lg-10">
				<input type="text" class="form-control" name="email" id="email" />
				<div class="error email"></div>
			</div>
		</div>
		<div class="form-group">
			<label for="password" class="col-lg-2 control-label">Password</label>
			<div class="col-lg-10">
				<input type="password" class="form-control" name="password" id="password" />
				<div class="error password"></div>
			</div>
		</div>
		<div class="form-group">
			<label for="password_confirmation" class="col-lg-2 control-label">Confirm Password</label>
				<input type="password" class="form-control" name="password_confirmation" id="password_confirmation" />
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-10 col-lg-offset-2">
				<input type="submit" class="btn btn-primary" value="Submit" />
				<button type="reset" class="btn btn-default">Cancel</button>
			</div>
		</div>
  </fieldset>
</form>