<?php

if(file_exists("install/index.php")){
	//perform redirect if installer files exist
	//this if{} block may be deleted once installed
	header("Location: install/index.php");
}

require_once 'users/init.php';
require_once $abs_us_root.$us_url_root.'users/includes/header.php';
require_once $abs_us_root.$us_url_root.'users/includes/navigation.php';
if(isset($user) && $user->isLoggedIn()){
}
?>

<div id="page-wrapper">
<div class="container">
<div class="row">
	<div class="col-xs-12">

		<div class="jumbotron">
			<h1>Welcome to <?php echo $settings->site_name;?></h1>
			<p>
			This application is designed for SCAdians, by a SCAdian. EventSpice aims to make event and calendar management easier, improve
			available functionality, and be easy for any group to take advantage of. I'm Atlantian so this demo system is setup as such.
			However, there is NOTHING to stop any other Kingdom, Barony, Shire, whatever from modifing this system to meet your needs. I even provide
			how-to information to get you going.
			</p><p>
			There is no need to create an account, just hit up one of the links below to explore our services.
			</p>
		</div>
	</div>
</div>
<div class="row">
<?php
// To generate a sample notification, uncomment the code below.
// It will do a notification everytime you refresh index.php.
// $msg = 'This is a sample notification! <a href="'.$us_url_root.'users/logout.php">Go to Logout Page</a>';
// $notifications->addNotification($msg, $user->data()->id);
 ?>
<div class="col-md-6">
	<div class="panel panel-default">
		<div class="panel-heading"><strong>You can get there from here</strong></div>
		<div class="panel-body">
		There are some things that we want to be available to everybody! In fact, the majority of this 'site' only exists to provide
		public users with some services. The public services that EventSpice provides are:
		 <ul>
		  <li><a href="submitEvent.php">Submit your event</a> <br/><b style="margin-left:10px;">(under development)</b></li>
		  <li><a onclick="alert('coming soon')">Full Featured Calendar Widget</a> <br/><b style="margin-left:10px;">(coming soon)</b></li>
	 	  <li><a onclick="alert('coming soon')">Minimal Calendar Widget</a> <br/><b style="margin-left:10px;">(coming soon)</b></li>
		  <li><a href="currentEvents.php">JSON event feed for integrating with your favorite site</a> <br/><b style="margin-left:10px;">(coming soon - currently mock data)</b></li>
		  <li><a href="/map/">Event Mapping</a><br/><b style="margin-left:10px;">(working mockup)</b></li>
		 </ul>
		</div>
	</div><!-- /panel -->
</div><!-- /.col -->
<div class="col-md-6">
	<div class="panel panel-default">
		<div class="panel-heading"><strong>Do you want to stay up to date?</strong></div>
		<div class="panel-body">
		EventSpice is 100% open source, based on open source, for open source. Feel free to fork me on github! <br/><br/>
		<a href="https://github.com/kevinbaun/EventSpice" target="_blank">https://github.com/kevinbaun/EventSpice</a>
		</div>
	</div><!-- /panel -->
</div><!-- /.col -->
</div><!-- /.row -->
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading"><strong>What does the workflow looklike? (v0.1)</strong></div>
			<div class="panel-body">
				<img src="./EventManager.jpg"/>
			</div>
		</div>
	</div>
</div>

<!-- ------- -->
</div> <!-- /container -->

</div> <!-- /#page-wrapper -->

<!-- footers -->
<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

<!-- Place any per-page javascript here -->


<?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>
