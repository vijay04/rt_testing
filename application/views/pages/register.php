<h1>Register</h1>


<?php echo form_open("register");?>

<p>
	First Name : <br />
	<?php echo form_input($first_name);?>
</p>

<p>
	Last Name : <br />
	<?php echo form_input($last_name);?>
</p>

<p>
	Company : <br />
	<?php echo form_input($company);?>
</p>

<p>
	Email : <br />
	<?php echo form_input($email);?>
</p>

<p>
	Phone :  <br />
	<?php echo form_input($phone);?>
</p>

<p>
	Password : <br />
	<?php echo form_input($password);?>
</p>

<p>
	Confirm Password : <br />
	<?php echo form_input($password_confirm);?>
</p>
<?php echo $captcha;?>

<p><?php echo form_submit('submit', 'Register');?></p>

<?php echo form_close();?>
