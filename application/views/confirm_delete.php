<div class="well">

<h1><?php print $question; ?></h1>
	<div>This action can not be undone.</div>
</div>
<form method="post">
<input type="hidden" name="confirm">
<input type="submit" value="Delete" class="btn btn-danger">
<?php print anchor('/', 'Cancel'); ?>
</form>
