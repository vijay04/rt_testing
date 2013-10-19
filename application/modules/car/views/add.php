<?php //Logger::debug_var('content', $content); ?>

<?php if (isset($content['message']) && $content['message']) :?>
	<div class="alert alert-error" id="message">
		<?php print $content['message']; ?>
	</div>
<?php endif; ?>
<?php echo form_open("car/add");?>

<p>
	Title : <br />
	<?php echo form_input($content['title']);?>
</p>

<p>
	Type : <br />
	<?php echo form_input($content['type']);?>
</p>

<p>
	Capacity : <br />
	<?php echo form_input($content['capacity']);?>
</p>


<p><?php echo form_submit('submit', 'Create');?></p>

<?php echo form_close();?>
