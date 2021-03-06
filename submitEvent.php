<?php

require_once 'users/init.php';
require_once $abs_us_root.$us_url_root.'users/includes/header.php';
require_once $abs_us_root.$us_url_root.'users/includes/navigation.php';
if(isset($user) && $user->isLoggedIn()){
}
?>

<div id="page-wrapper">
<div class="container">

<script>
function popUp(url) {mywin = window.open(url,"win",'toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=1,width=600,height=400');}

function wordCount(string)
{
   var retval = 0;
   if (string != "")
   {
      var a = string.split(/\s+/g); // split the sentence into an array of words
      retval = a.length;
   }
   return retval;
}

function totalWordCount()
{
   var form = document.efs;
   var count = 0;
   // text areas
   count += wordCount(form.desc.value);
   count += wordCount(form.cost_n.value);
   count += wordCount(form.site.value);
   count += wordCount(form.site_r.value);
   count += wordCount(form.dir.value);
   count += wordCount(form.m_act.value);
   count += wordCount(form.as_act.value);
   count += wordCount(form.merch.value);
   count += wordCount(form.other.value);
   count += wordCount(form.feast.value);
   // text boxes
   count += wordCount(form.e_name.value);
   count += wordCount(form.e_date.value);
   count += wordCount(form.sub_email.value);
   count += wordCount(form.payable.value);
   count += wordCount(form.mem_offbd.value);
   count += wordCount(form.mem_onbd.value);
   count += wordCount(form.mem_onst.value);
   count += wordCount(form.nmem_offbd.value);
   count += wordCount(form.nmem_onbd.value);
   count += wordCount(form.nmem_onst.value);
   count += wordCount(form.chld_min_age.value);
   count += wordCount(form.chld_max_age.value);
   count += wordCount(form.chld_offbd.value);
   count += wordCount(form.chld_onbd.value);
   count += wordCount(form.chld_onst.value);
   count += wordCount(form.b_max_age.value);
   count += wordCount(form.b_offbd.value);
   count += wordCount(form.b_onbd.value);
   count += wordCount(form.b_onst.value);
   count += wordCount(form.http.value);
   count += wordCount(form.a_sname.value);
   count += wordCount(form.a_mname.value);
   count += wordCount(form.a_add.value);
   count += wordCount(form.a_city.value);
   count += wordCount(form.a_email.value);
   count += wordCount(form.a_ac.value);
   count += wordCount(form.a_phone.value);
   count += wordCount(form.r_sname.value);
   count += wordCount(form.r_mname.value);
   count += wordCount(form.r_add.value);
   count += wordCount(form.r_city.value);
   count += wordCount(form.r_email.value);
   count += wordCount(form.r_ac.value);
   count += wordCount(form.r_phone.value);
   // select lists
   if (form.h_group.selectedIndex > 0)
   {
      count += wordCount(form.h_group.options[form.h_group.selectedIndex].value);
   }
   if (form.a_state.selectedIndex > 0)
   {
      count += wordCount(form.a_state.options[form.a_state.selectedIndex].value);
   }
   if (form.r_state.selectedIndex > 0)
   {
      count += wordCount(form.r_state.options[form.r_state.selectedIndex].value);
   }
   return count;
}

function  ValidateData()
{
   var MAX_WORD_COUNT = 1250;
   var message = "The following fields are required:  \n";
   if (document.efs.e_name.value == "")
	{
	   message = message + "Event Name\n";
	}
   if (document.efs.e_date.value == "")
	{
	   message = message + "Event Date\n";
	}
   if (document.efs.sub_email.value == "")
	{
	   message = message + "Submitter's E-mail Address\n";
	}
   if (document.efs.h_group.selectedIndex < 1)
	{
	   message = message + "Hosting Group\n";
	}
   if (document.efs.desc.value == "")
	{
	   message = message + "Event Description\n";
	}
   if (document.efs.payable.value == "")
	{
	   message = message + "Make Checks Payable To\n";
	}
   if (document.efs.site.value == "")
	{
	   message = message + "Site\n";
	}
   if (document.efs.dir.value == "")
	{
	   message = message + "Directions\n";
	}
   if (document.efs.a_mname.value == "")
	{
	   message = message + "Autocrat's Legal Name\n";
	}
   if (document.efs.a_add.value == "")
	{
	   message = message + "Autocrat's Address\n";
	}
   if (document.efs.a_city.value == "")
	{
	   message = message + "Autocrat's City\n";
	}
   if (document.efs.a_zip == "")
	{
	   message = message + "Autocrat's Zip-code\n";
	}
   if (document.efs.a_ac.value == "")
	{
	   message = message + "Autocrat's Area Code\n";
	}
   if (document.efs.a_phone.value == "")
	{
	   message = message + "Autocrat's Phone Number\n";
	}
   if (document.efs.perm.checked == false)
 	{
	   message = message + "Publication Permission Needed\n";
	}
   var w_count = totalWordCount();
   if (w_count > MAX_WORD_COUNT)
   {
	   message = message + "The number of words in the flyer (" + w_count + ") exceeds the maximum of " + MAX_WORD_COUNT + "\n";
   }

   // Notify and cancel
   if (message == "The following fields are required:  \n")
   {
      document.efs.submit();
   }
   else
   {
      alert(message);
      return false;
   }
}

/**
 Function: updateYouthMinAge
 Parameters: val - child max age
 Description: Sets the Youth Min Age field to the Child Max Age field plus 1
 */
function updateYouthMinAge(val)
{
   var newval, ageval;
   if (val != "")
   {
      if (typeof(val) == "string")
      {
         newval = parseInt(val);
      }
      else if (typeof(val) == "number")
      {
         newval = val;
      }
      if (typeof(newval) == "number" && newval > 0)
      {
         ageval = newval + 1;
         document.efs.chld_min_age.value = ageval;
      }
   }
}

/**
 Function: updateChildMaxAge
 Parameters: val - youth min age
 Description: Sets the Child Max Age field to the Youth Min Age field minus 1
 */
function updateChildMaxAge(val)
{
   var newval, ageval;
   if (val != "")
   {
      if (typeof(val) == "string")
      {
         newval = parseInt(val);
      }
      else if (typeof(val) == "number")
      {
         newval = val;
      }
      if (typeof(newval) == "number" && newval > 0)
      {
         ageval = newval - 1;
         document.efs.b_max_age.value = ageval;
      }
   }
}

function updatePayable(sel)
{
   var sel_group;
   if (sel.selectedIndex > 0)
   {
      sel_group = sel.options[sel.selectedIndex].value;
      document.efs.payable.value = "SCA, Inc., " + sel_group;
   }
}
</script>

<center>
<p>
<hr><b>
UNDER DEVELOPMENT</b><br>
<hr>
<pre>
@todo: hosting group and state list need to be manageable from the admin screens.
@todo: add a 'event approver' value to the user db tables
@todo: email notifications to event approvers when a new event is submitted
@todo: site location should be address fields. use those to do a gmaps lookup for lat/long.
@todo: if user is logged in, tie this event to their account so they can look it up later in their dashboard.
</pre>
</p><hr>
<!--
EVENT INFORMATION<br>
<hr>
</center>
<form name="efs" action="" method="post">
<table width="100%">
	<tbody><tr>
		<td width="20%"><label for="e_name"><font color="FF0000">Event Name:</font></label></td>
		<td><input type="text" name="e_name" id="e_name" size="30" maxlength="70"></td>
	</tr>
	<tr>
		<td width="20%"><label for="e_date"><font color="FF0000">Event Date:</font></label></td>
		<td><input type="text" name="e_date" id="e_date" size="30" maxlength="30"></td>
	</tr>
	<tr>
		<td width="20%"><label for="sub_email"><font color="FF0000">Submitter's E-mail Address:</font></label></td>
		<td><input type="text" name="sub_email" id="sub_email" size="30" maxlength="50"></td>
	</tr>
	<tr>
		<td width="20%"><label for="h_group"><font color="FF0000">Hosting Group:</font></label></td>
		<td>
		<select name="h_group" id="h_group" onchange="javascript:updatePayable(this);">
		<option value="">--SELECT GROUP--</option>
<option value="Canton of Abhainn Iarthair">Canton of Abhainn Iarthair
</option><option value="Canton of Aire Faucon">Canton of Aire Faucon
</option><option value="Kingdom of Atlantia">Kingdom of Atlantia
</option><option value="Canton of Attilium">Canton of Attilium
</option><option value="Canton of Baelfire Dunn">Canton of Baelfire Dunn
</option><option value="Shire of Berley Cort">Shire of Berley Cort
</option><option value="Barony of Black Diamond">Barony of Black Diamond
</option><option value="Shire of Border Vale Keep">Shire of Border Vale Keep
</option><option value="Barony of Bright Hills">Barony of Bright Hills
</option><option value="Canton of Brockore Abbey">Canton of Brockore Abbey
</option><option value="Canton of Buckston-on-Eno">Canton of Buckston-on-Eno
</option><option value="Canton of Caer Gelynniog">Canton of Caer Gelynniog
</option><option value="Barony of Caer Mear">Barony of Caer Mear
</option><option value="Shire of Cathanar">Shire of Cathanar
</option><option value="Canton of Charlesbury Crossing">Canton of Charlesbury Crossing
</option><option value="Canton of Crois Brigte">Canton of Crois Brigte
</option><option value="Canton of Cydllan Downs">Canton of Cydllan Downs
</option><option value="Barony of Dun Carraig">Barony of Dun Carraig
</option><option value="Canton of Elvegast">Canton of Elvegast
</option><option value="Canton of Falconcree">Canton of Falconcree
</option><option value="Incipient Canton of Greenlion Bay">Incipient Canton of Greenlion Bay
</option><option value="Barony of Hawkwood">Barony of Hawkwood
</option><option value="Barony of Hidden Mountain">Barony of Hidden Mountain
</option><option value="Barony of Highland Foorde">Barony of Highland Foorde
</option><option value="Canton of Iles des Diamants">Canton of Iles des Diamants
</option><option value="Shire of Isenfir">Shire of Isenfir
</option><option value="Canton of Kapellenberg">Canton of Kapellenberg
</option><option value="Barony of Lochmere">Barony of Lochmere
</option><option value="Barony of Marinus">Barony of Marinus
</option><option value="Canton of Middlegate">Canton of Middlegate
</option><option value="Canton of Misty Marsh by the Sea">Canton of Misty Marsh by the Sea
</option><option value="Canton of Moorhaven">Canton of Moorhaven
</option><option value="Canton of Nimenefeld">Canton of Nimenefeld
</option><option value="Barony of Nottinghill Coill">Barony of Nottinghill Coill
</option><option value="Barony of Ponte Alto">Barony of Ponte Alto
</option><option value="Barony of Raven&#39;s Cove">Barony of Raven's Cove
</option><option value="College of Rencester">College of Rencester
</option><option value="Canton of Ritterwald">Canton of Ritterwald
</option><option value="Canton of Rivers Point">Canton of Rivers Point
</option><option value="Shire of Roxbury Mill">Shire of Roxbury Mill
</option><option value="Barony of Sacred Stone">Barony of Sacred Stone
</option><option value="Canton of Saint Georges">Canton of Saint Georges
</option><option value="Canton of Salesberie Glen">Canton of Salesberie Glen
</option><option value="Shire of Seareach">Shire of Seareach
</option><option value="Incipient Canton of Seven Hills">Incipient Canton of Seven Hills
</option><option value="Shire of Spiaggia Levantina">Shire of Spiaggia Levantina
</option><option value="Barony of Stierbach">Barony of Stierbach
</option><option value="Barony of Storvik">Barony of Storvik
</option><option value="Canton of Sudentorre">Canton of Sudentorre
</option><option value="Canton of Tear-Seas Shore">Canton of Tear-Seas Shore
</option><option value="Barony of Tir-y-Don">Barony of Tir-y-Don
</option><option value="Barony of Windmasters&#39; Hill">Barony of Windmasters' Hill
</option><option value="College of Yarnvid">College of Yarnvid
		</option></select>
		</td>
	</tr>
	<tr>
		<td width="20%"><label for="status">Update to existing flyer</label></td>
		<td><input type="radio" name="status" id="status" value="Yes">Yes
		<input type="radio" name="status" id="status" checked="" value="No">No</td>
	</tr>
</tbody></table>
<table width="100%">
	<tbody><tr>
		<td width="20%"><label for="desc"><font color="FF0000">Event Description:</font></label></td>
		<td><textarea name="desc" cols="40" rows="6" wrap="ON"></textarea></td>
	</tr>
	<tr>
		<td width="20%"><label for="cost"><font color="FF0000">Event Cost:</font></label></td>
		<td><table>
			<tbody><tr>
				<td><br></td>
				<td>Day-Trip</td>
				<td>Feast</td>
				<td>Camping</td>
			</tr>
			<tr>
				<td>Adult, Member Discount Event Registration</td>
				<td><input type="text" name="mem_offbd" id="mem_offbd" value="$0.00" size="6" maxlength="6"></td>
				<td><input type="text" name="mem_onbd" id="mem_onbd" value="$0.00" size="6" maxlength="6"></td>
				<td><input type="text" name="mem_onst" id="mem_onst" value="$0.00" size="6" maxlength="6"></td>
			</tr>
			<tr>
				<td>Adult, Event Registration</td>
				<td><input type="text" name="nmem_offbd" id="nmem_offbd" value="$0.00" size="6" maxlength="6"></td>
				<td><input type="text" name="nmem_onbd" id="nmem_onbd" value="$0.00" size="6" maxlength="6"></td>
				<td><input type="text" name="nmem_onst" id="nmem_onst" value="$0.00" size="6" maxlength="6"></td>
			</tr>
			<tr>
				<td>Youth (<input type="text" name="chld_min_age" id="chld_min_age" size="3" maxlength="2" onblur="javascript:updateChildMaxAge(this.value);">-<input type="text" name="chld_max_age" id="chld_max_age" size="3" maxlength="2">)</td>
				<td><input type="text" name="chld_offbd" id="chld_offbd" value="$0.00" size="6" maxlength="6"></td>
				<td><input type="text" name="chld_onbd" id="chld_onbd" value="$0.00" size="6" maxlength="6"></td>
				<td><input type="text" name="chld_onst" id="chld_onst" value="$0.00" size="6" maxlength="6"></td>
			</tr>
			<tr>
				<td>Child (0-<input type="text" name="b_max_age" id="b_max_age" size="3" maxlength="2" onblur="javascript:updateYouthMinAge(this.value);">)</td>
				<td><input type="text" name="b_offbd" id="b_offbd" value="$0.00" size="6" maxlength="6"></td>
				<td><input type="text" name="b_onbd" id="b_onbd" value="$0.00" size="6" maxlength="6"></td>
				<td><input type="text" name="b_onst" id="b_onst" value="$0.00" size="6" maxlength="6"></td>
			</tr>
		</tbody></table></td>
	</tr>
	<tr>
		<td width="20%"><label for="payable" style="color:red">Make Checks Payable To:</label></td>
      <td><input type="text" name="payable" id="payable" size="40" maxlength="60"></td>
	</tr>
	<tr>
		<td width="20%"><label for="cost_n">Cost Notes:</label></td>
		<td><textarea name="cost_n" cols="40" rows="6" wrap="ON"></textarea></td>
	</tr>
	<tr>
		<td width="20%"><label for="site"><font color="FF0000">Site:</font></label></td>
		<td><textarea name="site" cols="40" rows="6" wrap="ON"></textarea></td>
	</tr>
	<tr>
		<td width="20%"><label for="site_r">Site Restrictions:</label></td>
		<td><textarea name="site_r" cols="40" rows="6" wrap="ON"></textarea></td>
	</tr>
	<tr>
		<td width="20%"><label for="dir"><font color="FF0000">Directions:</font></label></td>
		<td><textarea name="dir" cols="40" rows="6" wrap="ON"></textarea></td>
	</tr>
</tbody></table>
<hr>
<center>AUTOCRAT and RESERVATIONIST INFORMATION</center>
<hr>
<table width="100%">
	<tbody><tr>
		<td colspan="4" align="CENTER">Autocrat's Information</td>
	</tr>
	<tr>
                <td><label for="a_same">SCA Name:</label></td>
                <td><input type="text" name="a_sname" id="a_sname" size="30" maxlength="60"></td>
        </tr>
        <tr>
                <td><label for="a_mname"><font color="FF0000">Legal Name:</font></label></td>
                <td><input type="text" name="a_mname" id="a_mname" size="30" maxlength="50"></td>
        </tr>
        <tr>
                <td><label for="a_add"><font color="FF0000">Address:</font></label></td>
                <td><input type="text" name="a_add" id="a_add" size="30" maxlength="50"></td>
        </tr>
        <tr>
                <td><label for="a_city"><font color="FF0000">City:</font></label></td>
                <td><input type="text" name="a_city" id="a_city" size="30" maxlength="30"></td>
                <td><label for="a_state"><font color="FF0000">State:</font></label>
                <select name="a_state">
                   <option>DC
                   </option><option>MD
                   </option><option>GA
                   </option><option>NC
                   </option><option>SC
                   </option><option>VA
                   </option><option>WV
                </option></select>
                </td>
                <td><label for="a_zip"><font color="FF0000">ZIP Code:</font></label>
                <input type="text" name="a_zip" id="a_zip" size="5" maxlength="5"></td>
        </tr>
        <tr>
                <td><label for="autocrats-phone"><font color="FF0000">Phone #:</font></label></td>
                <td><input type="text" name="a_ac" id="a_ac" size="3" maxlength="3">
                <input type="text" name="a_phone" id="a_phone" size="7" maxlength="8"></td>
        </tr>
        <tr>
                <td><label for="a_email">E-mail Address:</label></td>
                <td><input type="text" name="a_email" id="a_email" size="30" maxlength="50"></td>
        </tr>
        <tr>
                <td colspan="4" align="CENTER">Reservationist Information</td>
        </tr>
	<tr>
		<td colspan="4"><input type="checkbox" name="ar_same" value="1">Check here if reservations are to be sent to the autocrat</td>

        </tr><tr>
                <td><label for="r_sname">SCA Name:</label></td>
                <td><input type="text" name="r_sname" id="r_sname" size="30" maxlength="60"></td>
        </tr>
        <tr>
                <td><label for="r_mname">Legal Name:</label></td>
                <td><input type="text" name="r_mname" id="r_mname" size="30" maxlength="50"></td>
        </tr>
        <tr>
                <td><label for="r_add">Address:</label></td>
                <td><input type="text" name="r_add" id="r_add" size="30" maxlength="50"></td>
        </tr>
        <tr>
                <td><label for="r_city">City:</label></td>
                <td><input type="text" name="r_city" id="r_city" size="30" maxlength="30"></td>
                <td><label for="r_state">State:</label>
                <select name="r_state">
                   <option>DC
                   </option><option>MD
                   </option><option>GA
                   </option><option>NC
                   </option><option>SC
                   </option><option>VA
                   </option><option>WV
                </option></select>
                </td>
                <td><label for="r_zip">ZIP Code:</label>
                <input type="text" name="r_zip" id="r_zip" size="5" maxlength="5"></td>
        </tr>
        <tr>
                <td><label for="r_ac">Phone #:</label></td>
                <td><input type="text" name="r_ac" id="r_ac" size="3" maxlength="3">
                <input type="text" name="r_phone" id="r_phone" size="7" maxlength="8"></td>
        </tr>
        <tr>
                <td><label for="r_email">E-mail Address:</label></td>
                <td><input type="text" name="r_email" id="r_email" size="30" maxlength="50"></td>
        </tr>
</tbody></table>
<hr>
<center>ACTIVITIES</center>
<hr>
<table>
	<tbody><tr>
		<td><label for="http">Event Website</label></td>
		<td><input type="text" name="http" id="httpd" size="40" maxlength="70"></td>
	</tr><tr>
		<td><label for="m_act">Martial Activities</label></td>
		<td><textarea name="m_act" cols="40" rows="6" wrap="ON"></textarea></td>
		<td><label for="as_act">Arts and Sciences Activities</label></td>
		<td><textarea name="as_act" cols="40" rows="6" wrap="ON"></textarea></td>
	</tr>
	<tr>
		<td><label for="feast">Feast Information</label></td>
		<td><textarea name="feast" cols="40" rows="6" wrap="ON"></textarea></td>
		<td><label for="merch">Merchanting Information</label></td>
		<td><textarea name="merch" cols="40" rows="6" wrap="ON"></textarea></td>
	</tr>
	<tr>
		<td><label for="other">Other Information</label></td>
		<td><textarea name="other" cols="40" rows="6" wrap="ON"></textarea></td>
	</tr>
</tbody></table>
<input type="checkbox" name="perm" value="YES">By checking this box, I affirm that I have obtained permission from each person listed in this annoucement to publish their personal information electronically. 
<br><br>
<center>
<input type="button" value="Send Event Flyer" onclick="ValidateData();">
<input type="reset" value="Clear Form">


</center></form>
-->
</div> <!-- /container -->

</div> <!-- /#page-wrapper -->

<!-- footers -->
<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

<!-- Place any per-page javascript here -->


<?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>
