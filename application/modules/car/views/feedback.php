<div class="row">
	<div class="span8">
		<?php if (validation_errors()): ?>
		<div class="alert alert-error">
			<?php echo validation_errors(); ?>
		</div>
		<?php endif; ?>

		<?php echo form_open("feedback");?>
			<fieldset>
				<legend>Comment/Feedback</legend>

				Help us to improve our services by giving us your feedback on our service, website, cabs, Driver, etc using below Form. We appreciate your feedback. Thank you!



				<label>Name</label>
				<input type="text" name="name" value="<?php echo set_value('name'); ?>" placeholder="Enter Your Name…">
				<label>Email ID</label>
				<input type="text" name="email" value="<?php echo set_value('email'); ?>" placeholder="Enter Your Email ID…">
				<label>Phone Number</label>
				<input type="text" name="phone" value="<?php echo set_value('phone'); ?>" placeholder="Enter Phone Number…">
				<label>Comment/Suggestion/Feedback</label>
				<?php echo form_textarea(array('name' => 'description', 'value' => set_value('description'))); ?>
				<span class="help-block"></span>

				<button type="submit" class="btn">Submit</button>
			</fieldset>
		</form>
		<h4>OR</h4>
		<div class="feedback-info-text">
		<p>You can call Us <b><font color="#8DB232" size="+1">966 488 2935</font> / <font color="#8DB232" size="+1">966 492 4348</font></b> OR Email US on <a href="mailto:support@roundtripcab.com" target="_top">support@roundtripcab.com</a></p>
		</div>
	</div>

	<div class="span4"><!--<img src="image/feedback.jpg" width="200" height="200">--></div>


</div>