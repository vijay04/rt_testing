<h1>Edit <?php print $content['title']; ?></h1>

<ul class="nav nav-tabs">
	<li><?php print anchor('node/view/' . $content['nid'], 'View'); ?></li>
	<li class="active"><?php print anchor('node/edit/' . $content['nid'], 'Edit'); ?></li>
	<li><?php print anchor('node/delete/' . $content['nid'], 'Delete'); ?></li>
</ul>

<?php if (validation_errors()): ?>
<div class="alert alert-error">
	<?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php echo form_open(); ?>

<h5>title</h5>
<input type="text" name="title" value="<?php echo (set_value('title')) ? set_value('title') : $content['title']; ?>" size="50" />


<h5>description</h5>
<textarea name="description" cols="40" rows="10"><?php print set_value('description') ? set_value('description') : $content['description']; ?></textarea>
<input type="hidden" name="type" value="<?php print $content['type']; ?>">

<div><input type="submit" value="Submit" class="btn btn-success"/></div>

</form>
