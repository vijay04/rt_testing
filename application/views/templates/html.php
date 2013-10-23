<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php print isset($view['title']) ? $view['title'] : 'Welcome'; ?></title>
<meta name="description" content="Round Trip Cab - Book a Taxi on rent provides Online Cab Booking facility to user in Mumbai India.">
<meta name="keyword" content="Round Trip Cab,Book a Taxi,Book a cab on rent,Hire Taxi,Taxi Hire on rent,">
    <meta name="viewport" content="width=device-width">


	  <style type="text/css">
		  body {
			  /*padding-top: 60px;*/
			  padding-bottom: 40px;
		  }
		  .sidebar-nav {
			  padding: 9px 0;
		  }

		  @media (max-width: 980px) {
			  /* Enable use of floated navbar text */
			  .navbar-text.pull-right {
				  float: none;
				  padding-left: 5px;
				  padding-right: 5px;
			  }
		  }
	  </style>
	  <?php $this->carabiner->display('basics_css'); ?>
	  <?php $this->carabiner->display('css'); ?>
	  <script type="text/javascript">var base_url = '<?php print base_url(); ?>';</script>
</head>

<body ng-app="roundtripApp">


  <!--[if lt IE 7]>
  <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
  <![endif]-->
	<div id="wrap">
	  <?php $this->load->view('templates/menu'); ?>

	  <div class="container" id="section-content">

	    <?php if(get_message() && !isset($nomessage)): ?>
	    <?php $message_array = get_message(); ?>
		  <div class="alert alert-<?php echo $message_array['type']; ?>" id="message">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
	      <?php echo $message_array['message']; ?>
		  </div>
	    <?php elseif (isset($view['data']['message']) && $view['data']['message']): ?>
				<div class="alert alert-error" id="message">
					<?php echo $view['data']['message']; ?>
				</div>
			<?php endif; ?>

	    <div class="" id="content-region-container">
	      <?php
	        if (isset($view['layout']) && !isset($view['data'])) {
	          $this->load->view($view['layout']);
	        } elseif (isset($view['layout']) && is_array($view['data'])) {
	          $this->load->view($view['layout'], $view['data']);
	        } else {
	          show_error('View file not defined. You cannot access a page without a view');
	        }
	      ?>
	    </div>
	  </div>
	  <div class="row" id="footer-region-container"></div>
  </div>
  <?php $this->load->view('templates/footer'); ?>
  <?php $this->carabiner->display('basics_js'); ?>
  <?php $this->carabiner->display('js'); ?>

  <script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-44829005-1', 'roundtripcab.com');
	  ga('send', 'pageview');

  </script>
</body>

</html>