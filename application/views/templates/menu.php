<?php
$current_url = '/';
if ($url = uri_string()) {
	if ($url != 'car/search') {
		$current_url = uri_string();
	}
}
?>
<div class="header-wrapper">
	<div class="container">
		<div class="row">
			<div class="span4">
				<div id="site-title">Round TRip CAB</div>
			</div>
			<div class="span6 offset2">
				<div class="row">
					<div id="header_contact">24X7 Helpline 9664882395</div>
				</div>
				<div class="row">
					<div class="upmenu"> <ul>
						<li class="<?php print ($current_url == '/') ? 'active' : ''; ?>"><?php print anchor('/', 'Home'); ?></li>
						<li class="<?php print ($current_url == 'car/listing') ? 'active' : ''; ?>"><?php print anchor('car/listing', 'Cars'); ?></li>
						<li><a href="#">Services</a></li>
						<li class="<?php print ($current_url == 'faq') ? 'active' : ''; ?>"><?php print anchor('faq', 'FAQ'); ?></li>
						<li class="<?php print ($current_url == 'about') ? 'active' : ''; ?>"><?php print anchor('about', 'About'); ?></li>
						<li class="<?php print ($current_url == 'feedback') ? 'active' : ''; ?>"><?php print anchor('feedback', 'Contact'); ?></li>
					</ul></div>

				</div>

			</div>
		</div>
	</div>
</div>

