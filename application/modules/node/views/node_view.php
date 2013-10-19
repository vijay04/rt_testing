<h1><?php print $content['title']; ?></h1>
<?php if ($this->ion_auth->is_admin()) : ?>
<ul class="nav nav-tabs">
	<li class="active"><?php print anchor('node/view/' . $content['nid'], 'View'); ?></li>
	<li><?php print anchor('node/edit/' . $content['nid'], 'Edit'); ?></li>
	<li><?php print anchor('node/delete/' . $content['nid'], 'Delete'); ?></li>
</ul>
	<?php endif; ?>

<div class="node-wrapper">
	<div  class="node-description"><?php print $content['description']; ?></div>
</div>
