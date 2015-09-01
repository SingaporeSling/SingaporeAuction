<form class="form-horizontal" id="login_form" action="#/login-user" method="post">
  <fieldset>
    <legend>Please Login</legend>
    <div class="form-group">
      <label for="email" class="col-lg-2 control-label">Email</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
      </div>
    </div>
    <div class="form-group">
      <label for="password" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-10">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
      </div>
    </div>
    <div class="form-group">
	  <div class="error"></div>
	</div>
	<div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Cancel</button>
      	<input type="submit" class="btn btn-primary" value="Submit" />
        <p>* Or <a href="#/register">Register</a></p>
      </div>
    </div>
  </fieldset>
</form>

<!--TODO move the style -->
  <style type="text/css">
   label{display: block;}
  </style>