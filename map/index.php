<?php


require_once '../users/init.php';
require_once $abs_us_root.$us_url_root.'users/includes/header.php';
require_once $abs_us_root.$us_url_root.'users/includes/navigation.php';
if(isset($user) && $user->isLoggedIn()){
}
?>

<div id="page-wrapper">
<div class="container">

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:500,400" />
    <link rel="stylesheet" type="text/css" href="./style.css" />
<br><br>
<table style="width:100%;height:600px;" border=0>
<tr><td style="width:70px;vertical-align:top;padding:25px;">
    <form id="search">
        <input type="text" id="searchInput" name="searchInput" placeholder="Search for a place&hellip; "  class="shadow_box"/>
    </form>
<br/>
    <form id="options" class="shadow_box">
        <label for="radiusInput">Radius</label> <input type="number" value="50" min="0" id="radiusInput" name="radiusInput" autofocus />
        <label for="unitSelector">Units</label> <select id="unitSelector" name="unitSelector">
            <option value="mi">Miles</option>
            <option value="km">Kilometers</option>
            <option value="ft">Feet</option>
            <option value="mt">Metres</option>
            <option value="in">Inches</option>
            <option value="yd">Yards</option>
            <option value="fa">Fathoms</option>
            <option value="na">Nautical miles</option>
            <option value="ch">Chains</option>
            <option value="rd">Rods</option>
            <option value="fr">Furlongs</option>
        </select>
        <p>Click to place a circle, right click to remove</p>
    </form>
<br>
<div id="date_range"  class="shadow_box">
@todo: from and to
</div>
<br>
<div id="your_events"  class="shadow_box">
Events in your area will be displayed here.
</div>
</td><td style="width:*;">
<div id="map"></div>
</td>
</tr>
</table>



    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyDnhaAkDZBE6-44f56sMRVJd2fiOV9M7K8&amp;libraries=places,geometry"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/zepto/1.0/zepto.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/lodash/4.12.0/lodash.min.js"></script>
    <script type="text/javascript" src="./app.js"></script>
    <script type="text/javascript" src="./map.js"></script>

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-915572-8', 'auto');
      ga('send', 'pageview');
    </script>
</div> <!-- /container -->

</div> <!-- /#page-wrapper -->

<!-- footers -->
<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

<!-- Place any per-page javascript here -->


<?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>
