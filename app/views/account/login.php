<div class="spacer"></div>
<div class="container">

	<div class="row">

		<div class="col-md-12">
			<?php echo \core\error::display($error); ?>

			<div class='well login'>
			<form action='' method='post'>

			<p>Email Address<br><input type="text" class='form-control' name="email" value=""></p>
			<p>Password<br><input type="password" class='form-control' name="password" value=""></p>
			<p><input type="submit" name="submit" class='btn btn-primary btn-lg' value="Sign in"></p>
			
			<a href="#" class="btn btn-default">Forgot Password</a>
			<a href="<?php echo DIR; ?>signup" class="btn btn-default">Create Account</a>

			</form>
			</div>
		</div>

	</div>
</div>