<h1>Register</h1>

<?php echo form_open("register");?>

First name :
      <p>
            <?php echo form_input($first_name);?>
      </p>

Last name :
      <p>
            <?php echo form_input($last_name);?>
      </p>


Email
      <p>
            <?php echo form_input($email);?>
      </p>


Password
      <p>
            <?php echo form_input($password);?>
      </p>

Confirm password
      <p>
            <?php echo form_input($password_confirm);?>
      </p>

      <?php print $captcha; ?>


      <p><?php echo form_submit('submit', 'Register');?></p>

<?php echo form_close();?>