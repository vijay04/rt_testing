<h1>Add <?php print $type; ?> Node</h1>
<?php if (validation_errors()): ?>
	<div class="alert alert-error">
		<?php echo validation_errors(); ?>
	</div>
	<?php endif; ?>
<?php echo form_open('node/add'); ?>

	<h5>title</h5>
	<input type="text" name="title" value="<?php echo set_value('title'); ?>" size="50" />


	<input type="hidden" name="type" value="<?php print $type; ?>">

	<h5>description</h5>
	<?php echo form_textarea(array('name' => 'description', 'value' => set_value('description'))); ?>

<div><input type="submit" value="Submit" /></div>

</form>
