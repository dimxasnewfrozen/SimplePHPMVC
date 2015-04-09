<div class="spacer"></div>

<div class="container">

	<?php echo \core\error::display($error); ?>

	<div class='well login col-md-12' >
	<form action='' method='post'>
		<p>First Name<br><input class="form-control" type="text" name="fname" value="<?php if(isset($error)){ echo $_POST['fname']; }?>"></p>
		<p>Last Name<br><input class="form-control" type="text" name="lname" value="<?php if(isset($error)){ echo $_POST['lname']; }?>"></p>

		<p>Email<br><input class="form-control" type="text" name="email" value="<?php if(isset($error)){ echo $_POST['email']; }?>"></p>
		<p>Password<br><input class="form-control" type="password" name="password" value=""></p>
		<p>Re-enter Password<br><input class="form-control" type="password" name="password2" value=""></p>

		<p><input type="submit" class="btn btn-primary btn-lg" name="submit" value="Signup"></p>

		<a href="#" class="btn btn-default">Forgot Password</a>
	</form>
	</div>

</div>

<div class="spacer"></div>