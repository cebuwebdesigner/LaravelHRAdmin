<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<style type="text/css">
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
}
.s4 {color: black; font-family:Calibri, sans-serif; font-style: normal; font-weight: bold; text-decoration: none; font-size: 12pt; }
.s5 {color: black; font-family:Calibri, sans-serif; font-style: normal; font-weight: normal; text-decoration: none; font-size: 9pt; }
.s6 {color: black; font-family:Calibri, sans-serif; font-style: normal; font-weight: normal; text-decoration: none; font-size: 10pt; }
</style>

<script type='text/javascript' src='//code.jquery.com/jquery-1.9.1.js'></script>

<script type='text/javascript'>//<![CDATA[
$(window).load(function(){
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#imgInp").change(function(){
        readURL(this);
    });
});//]]> 

</script>


<script language="javascript">
	var name = "#floatMenu";
	var menuYloc = null;
	
		$(document).ready(function(){
			menuYloc = parseInt($(name).css("top").substring(0,$(name).css("top").indexOf("px")))
			$(window).scroll(function () { 
				offset = menuYloc+$(document).scrollTop()+"px";
				$(name).animate({top:offset},{duration:500,queue:false});
			});
		}); 
	 </script>
     
     
<style type="text/css">

	input,
  textarea {
	background-color:#FFC
  }


@media print
{    
    .no-print, .no-print *
    {
        display: none !important;
    }
	
	
	input,
  textarea {
    border: none !important;
    box-shadow: none !important;
    outline: none !important;
	background-color:#FFF;
  }
}

	#floatMenu {
		position:absolute;
		top:10px;
		right:0px;
		margin-right:0px;
		width:251px;
		}
		#floatMenu ul {
			margin-bottom:20px;
			}
			#floatMenu ul li a {
				display:block;
				border:1px solid #999;
				background-color:#222;
				border-left:6px solid #999;
				text-decoration:none;
				color:#ccc;
				padding:5px 5px 5px 25px;
			}
			#floatMenu ul li a:hover {
				color:#fff;
				background-color:#333333;
			}
			#floatMenu ul.menu1 li a:hover {
				border-color:#09f;
			}
			#floatMenu ul.menu2 li a:hover {
				border-color:#9f0;
			}
			#floatMenu ul.menu3 li a:hover {
				border-color:#f09;
			}




</style>
</head>

<body>




<?php 
$admin=2;
include 'zconfig.php';
error_reporting(0);
include 'db.php'; 
?>



<?php if($_GET['emplcode']!=""){ ?>
<div id="floatMenu" class="no-print">
<button onclick="myFunction()">Click Here to Print</button>
<br />&nbsp;<br />&nbsp;<br />
<?php echo $familyname.' '.$firstname.', '.$middlename; ?><br />
<?php echo '<h2>REF.CODE: <span style="color:RED">'.$ucode.'</span></h2>'; ?>
<br />&nbsp;<br />&nbsp;<br />

<?php 

if($_GET['update']!=""){
$stats = $_GET['update'];
$result = mysqli_query($con,"UPDATE emplpage1 SET stats='$stats' WHERE ucode='$ucode'");
}


$changestatus = '<a href="?update=process&emplcode='.$ucode.'">CHANGE STATUS TO PROCESS</a><br />&nbsp;<br />&nbsp;<br />
<a href="?update=hired&emplcode='.$ucode.'">CHANGE STATUS TO HIRED</a>';



if($stats=="process"){
$changestatus = '<a href="?update=hired&emplcode='.$ucode.'">CHANGE STATUS TO HIRED</a><br />&nbsp;<br />&nbsp;<br />
<a href="?update=unhire&emplcode='.$ucode.'">CHANGE STATUS BACK TO APPLICANT</a>';
}

if($stats=="hired"){
$changestatus = '<a href="?update=unhire&emplcode='.$ucode.'">CHANGE STATUS BACK TO APPLICANT</a><br />&nbsp;<br />&nbsp;<br />
<a href="?update=process&emplcode='.$ucode.'">CHANGE STATUS BACK TO PROCESS</a>';
}



echo $changestatus;



?>

<script>
function myFunction() {
    window.print();
}
</script> 
</div>
<?php } ?>


<form method="post" id="form1" runat="server" enctype="multipart/form-data">
 <input type="hidden" name="op" id="textfield" style="width:100%" value="add"  />

<div style="width:935px">




<!---header001 open-->


<div style="width:190px; padding:15px; height:250px; float:left; margin-top:-30px; text-align:center">
<img width="92" height="85" alt="image" src="Image_001.png"/><br />
UPDATED: SEPTEMBER 2015<br />RECRUITING FORM<br />
<span style="font-size:44px"><strong>AIP-L</strong></span><br />
APPLICANT INFORMATION<br />
& PROFILE<br />&nbsp;<br />
This form is to be ﬁlled-out and signed by applicant.
<br />&nbsp;<br />
<strong>PLEASE WRITE IN CAPITAL LETTERS. </strong></div>

<div style="width:710px; height:250px; float:left; padding-top:0px">
  <table width="98%" border="1" cellspacing="0">
    <tr>
    <td colspan="2" align="center" bgcolor="#DCDEE0" style="font-size:16px"><strong>APPLICANT'S NAME</strong></td>
    <td width="33%" align="center" bgcolor="#DCDEE0" style="font-size:16px"><strong>DATE OF APPLICATION</strong></td>
  </tr>
  <tr>
    <td width="28%" align="right">FAMILY NAME</td>
    <td width="39%">
      <input type="text" name="familyname" id="textfield" style="width:100%" value="<?php echo $familyname ; ?>"  /></td>
    <td style="text-align:center" ><input type="hidden" name="dateapply" id="textfield2"value="<?php  
	
	if($dateapply==""){
	date_default_timezone_set('Asia/Manila');
$dateapply =  date('Y-m-d'); echo $dateapply; 
	}
 //H:i:s?>"/> <?php echo $dateapply; ?></td>
  </tr>
  <tr>
    <td align="right">FIRST NAME</td>
    <td><input type="text" name="firstname" id="textfield2" style="width:100%" value="<?php echo $firstname ; ?>"  /></td>
    <td rowspan="5" align="center"><strong><img id="blah" src="photo<?php if($urcode!=""){echo 's/'.$urcode;}?>.jpg" alt="no image"  style="width:150px; min-height:150px"/><br />
        <input type='file' id="imgInp" name="fileToUpload" class="no-print"/></strong></td>
  </tr>
  <tr>
    <td align="right">MIDDLE NAME<br />(PLEASE SPELL OUT)</td>
    <td><input type="text" name="middlename" id="textfield3" style="width:100%" value="<?php echo $middlename ; ?>"  /></td>
    </tr>
  <tr>
    <td align="right">NICKNAME</td>
    <td><input type="text" name="nickname" id="textfield4" style="width:100%" value="<?php echo $nickname ; ?>"  /></td>
    </tr>
  <tr>
    <td align="right">SUFFIX<br />(JR., III, etc.)</td>
    <td><input type="text" name="suffix" id="textfield5" style="width:100%" value="<?php echo $suffix ; ?>"  /></td>
    </tr>
  <tr>
    <td align="right"><span class="s2" style="padding-top: 7pt;padding-left: 11pt;text-indent: 0pt;text-align: left;">POSITION APPLIED FOR</span></td>
    <td><input type="text" name="position" id="textfield6" style="width:100%" value="<?php 
	
	if($_GET['position']!=""){echo $_GET['position'];}else{	echo $position ;}
	
	
	 ?>"  /></td>
    </tr>
</table>
</div>

<!---header001 close-->






<br style="clear:both"/>
<!---body0002 openm-->
<div style="width:900px; padding:15px; margin-top:-30px; text-align:center">
  <table width="100%" border="1" cellspacing="0">
    <tr>
      <td colspan="18" align="center" bgcolor="#DCDEE0" style="font-size:16px"><strong>GENERAL PERSONAL INFORMATION</strong></td>
      </tr>
    <tr>
      <td colspan="4" align="center">SSS  NO.</td>
      <td colspan="3" align="center">TIN</td>
      <td colspan="4" align="center">PHILHEALTH 
        NO.</td>
      <td colspan="4" align="center"> HDMF NO. </td>
      <td colspan="3" align="center"> ACR 
        NO., 
        IF 
        ALIEN</td>
    </tr>
    <tr>
      <td colspan="4"><input type="text" name="sss" id="textfield7" style="width:100%" value="<?php echo $sss ; ?>"  /></td>
      <td colspan="3"><input type="text" name="tin" id="textfield8" style="width:100%" value="<?php echo $tin ; ?>"  /></td>
      <td colspan="4"><input type="text" name="philhealth" id="textfield9" style="width:100%" value="<?php echo $philhealth ; ?>"  /></td>
      <td colspan="4"><input type="text" name="hdmf" id="textfield10" style="width:100%" value="<?php echo $hdmf ; ?>"  /></td>
      <td colspan="3"><input type="text" name="acr" id="textfield11" style="width:100%" value="<?php echo $acr ; ?>"  /></td>
    </tr>
    <tr>
      <td colspan="2" align="center">GENDER</td>
      <td colspan="2" align="center">CIVIL STATUS </td>
      <td colspan="3" align="center">DATE 
        OF 
        BIRTH <br />
        (month/date/year)<br /></td>
      <td colspan="4" align="center">PLACE OF BIRTH</td>
      <td colspan="2" align="center">AGE</td>
      <td width="6%" align="center">BLOOD TYPE</td>
      <td width="9%" align="center">HEIGHT<br />(m. &amp; in.)</td>
      <td colspan="2" align="center">WEIGHT(lb.)</td>
      <td width="6%" align="center">RELIGION<br />
        (optional)&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><select name="gender">
        <option value="select">select</option>
        <option value="male" <?php if($gender=='male'){echo 'selected="selected"';} ?>>male</option>
        <option value="female" <?php if($gender=='female'){echo 'selected="selected"';} ?>>female</option>
      </select></td>
      <td colspan="2"><input type="text" name="civilstatus" id="textfield13" style="width:100%" value="<?php echo $civilstatus ; ?>"  /></td>
      <td colspan="3"><input type="text" name="dateofbirth" id="textfield14" style="width:100%" value="<?php echo $dateofbirth ; ?>"  /></td>
      <td colspan="4"><input type="text" name="placeofbirth" id="textfield15" style="width:100%" value="<?php echo $placeofbirth ; ?>"  /></td>
      <td colspan="2"><input type="text" name="age" id="textfield16" style="width:100%" value="<?php echo $age ; ?>"  /></td>
      <td><input type="text" name="bloodtype" id="textfield17" style="width:100%" value="<?php echo $bloodtype; ?>"  /></td>
      <td><input type="text" name="height" id="textfield18" style="width:100%" value="<?php echo $height ; ?>"  /></td>
      <td colspan="2"><input type="text" name="weight" id="textfield19" style="width:100%" value="<?php echo $weight ; ?>"  /></td>
      <td><input type="text" name="religion" id="textfield20" style="width:100%" value="<?php echo $religion ; ?>"  /></td>
    </tr>
    <tr>
      <td height="17" colspan="4">CITY 
 ADDRESS <br />
 (OR 
 PRESENT 
 ADDRESS)<br /></td>
      <td colspan="10"><input type="text" name="cityaddress" id="textfield21" style="width:100%" value="<?php echo $cityaddress ; ?>"  /></td>
      <td>LANDLINE</td>
      <td colspan="3"><input type="text" name="citylandline" id="textfield22" style="width:100%" value="<?php echo $citylandline ; ?>"  /></td>
    </tr>
    <tr>
      <td colspan="4">PROVINCIAL 
 ADDRESS  (IF 
 CITY 
 ADDRESS 
 IS TEMPORARY)<br /></td>
      <td colspan="10"><input type="text" name="provincialaddress" id="textfield23" style="width:100%" value="<?php echo $provincialaddress ; ?>"  /></td>
      <td>LANDLINE</td>
      <td colspan="3"><input type="text" name="provinciallandline" id="textfield24" style="width:100%" value="<?php echo $provinciallandline ; ?>"  /></td>
    </tr>
    <tr>
      <td colspan="2">MOBILE 
 NOS. <br />
 (ALL)<br /></td>
      <td colspan="4"><input type="text" name="mobileno" id="textfield25" style="width:100%" value="<?php echo $mobileno ; ?>"  /></td>
      <td width="9%">EMAIL  ADDRESS</td>
      <td colspan="7"><input type="text" name="emailaddress" id="textfield26" style="width:100%" value="<?php echo $emailaddress ; ?>"  /></td>
      <td>FACEBOOK</td>
      <td colspan="3"><input type="text" name="facebook" id="textfield27" style="width:100%" value="<?php echo $facebook ; ?>"  /></td>
    </tr>
    <tr>
      <td colspan="3">LENGTH 
 OF 
 STAY 
 IN 
 CITY 
 OR 
  PRESENT  ADDRESS<br /></td>
      <td width="1%"><input type="text" name="lengthofstay" id="textfield28" style="width:100%" value="<?php echo $lengthofstay ; ?>"  /></td>
      <td colspan="3">NAME 
 &amp; CONTACT 
 NOS. 
 OF
 RELATIVES 
  IF 
 STAYING  WITH 
 THEM<br /></td>
      <td colspan="4"><input type="text" name="nameandcontactofrelatives" id="textfield29" style="width:100%" value="<?php echo $nameandcontactofrelatives ; ?>"  /></td>
      <td colspan="4">NAME        &amp; CONTACT 
        NOS. 
        OF 
        LANDLORD/LADY 
        IF 
        RENTING<br /></td>
      <td colspan="3"><input type="text" name="nameandcontactlandlord" id="textfield30" style="width:100%" value="<?php echo $nameandcontactlandlord ; ?>"  /></td>
    </tr>
    <tr>
      <td colspan="18">HOW 
 WERE 
 YOU 
 SEPARATED 
 FROM 
 YOUR 
 MOST 
 RECENT 
 EMPLOYMENT?<br /></td>
      </tr>
    <tr>
      <td width="4%"><input name="resignation" type="checkbox" id="checkbox" <?php if($resignation=='on'){echo 'checked="checked"';} ?> />
       </td>
      <td colspan="3">Resignation</td>
      <td width="5%"><input name="retrenchment" type="checkbox" id="checkbox2" <?php if($retrenchment=='on'){echo 'checked="checked"';} ?> /></td>
      <td colspan="2">Retrenchment</td>
      <td width="2%"><input name="redundancy" type="checkbox" id="checkbox3" <?php if($redundancy=='on'){echo 'checked="checked"';} ?> /></td>
      <td colspan="3">Redundancy</td>
      <td width="3%"><input name="retirement" type="checkbox" id="checkbox4" <?php if($retirement=='on'){echo 'checked="checked"';} ?> /></td>
      <td width="6%">Retirement</td>
      <td align="right"><input name="dismissal" type="checkbox" id="checkbox5" <?php if($dismissal=='on'){echo 'checked="checked"';} ?> /></td>
      <td>Dismissal</td>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="10">HAVE 
 YOU 
 EVER 
 BEEN 
 CHARGED, 
 PENDING 
 FOR, 
 HELD 
 LIABLE, 
 OR 
 CONVICTED 
 OF 
 CIVIL 
 OR 
 CRIMINAL 
  CHARGES?<br /></td>
      <td width="6%"><input name="criminalchargesyes" type="checkbox" id="checkbox6" <?php if($criminalchargesyes=='on'){echo 'checked="checked"';} ?> /></td>
      <td>YES</td>
      <td align="right"><input name="criminalchargesno" type="checkbox" id="checkbox10" <?php if($criminalchargesno=='on'){echo 'checked="checked"';} ?> /></td>
      <td>NO</td>
      <td colspan="4" align="center">IF 
 YES, 
 PLEASE 
 PROVIDE 
 INFO 
 &amp; EXPLANATION 
  BELOW</td>
      </tr>
    <tr>
      <td colspan="18"><input type="text" name="criminalchargesinfo" id="textfield12" style="width:100%" value="<?php echo $criminalchargesinfo ; ?>"  /></td>
    </tr>
    <tr>
      <td colspan="10">HAVE	
  YOU	
  FILED	
  ANY	
  LABOR	
  CASE	
  AGAINST	
  PREVIOUS	
  EMPLOYER/S?<br /></td>
      <td><input name="laborcaseyes" type="checkbox" id="checkbox7" <?php if($laborcaseyes=='on'){echo 'checked="checked"';} ?> /></td>
      <td>YES</td>
      <td align="right"><input name="laborno" type="checkbox" id="checkbox11" <?php if($laborno=='on'){echo 'checked="checked"';} ?> /></td>
      <td>NO</td>
      <td colspan="4" align="center">IF 
        YES, 
        PLEASE 
        PROVIDE 
        INFO 
        &amp; EXPLANATION 
        BELOW</td>
    </tr>
    <tr>
      <td colspan="18"><input type="text" name="laborinfo" id="textfield31" style="width:100%" value="<?php echo $laborinfo ; ?>"  /></td>
      </tr>
    <tr>
      <td colspan="10">HAVE	
  YOU	
  EVER	
  BEEN	
  HOSPITALIZED	
  RECENTLY	
  (WITHIN	
  THE	
  LAST	
  6	
  MONTHS)	
  DUE	
  TO	
  ANY	
  ILLNESS	
  OR	
   DISEASE	
  OF	
  ANY	
  KIND?
<br /></td>
      <td><input name="hospitalizedyes" type="checkbox" id="checkbox8" <?php if($hospitalizedyes=='on'){echo 'checked="checked"';} ?> /></td>
      <td>YES</td>
      <td align="right"><input name="hospitalizedno" type="checkbox" id="checkbox12" <?php if($hospitalizedno=='on'){echo 'checked="checked"';} ?> /></td>
      <td>NO</td>
      <td colspan="4" align="center">IF 
        YES, 
        PLEASE 
        PROVIDE 
        INFO 
        &amp; EXPLANATION 
        BELOW</td>
    </tr>
    <tr>
      <td colspan="18"><input type="text" name="hospitalizedinfo" id="textfield32" style="width:100%" value="<?php echo $hospitalizedinfo ; ?>"  /></td>
      </tr>
    <tr>
      <td colspan="10">IF	
  NOT	
  HOSPITALIZED,	
  WERE	
  YOU	
  UNDER	
  ANY	
  MEDICATION	
  OR	
  ANY	
  FORM	
  OF	
  MAINTENANCE	
  MEDICINE,	
   PALLIATIVE	
  MEDICATION,	
  CORRECTIVE	
  DEVICES	
  FOR	
  ANY	
  ILLNESS/DISEASE?
<br /></td>
      <td><input name="ifnothospitalizedyes" type="checkbox" id="checkbox9" <?php if($ifnothospitalizedyes=='on'){echo 'checked="checked"';} ?> /></td>
      <td>YES</td>
      <td align="right"><input name="ifnothospitalizedno" type="checkbox" id="checkbox13" <?php if($ifnothospitalizedno=='on'){echo 'checked="checked"';} ?> /></td>
      <td>NO</td>
      <td colspan="4" align="center">IF 
        YES, 
        PLEASE 
        PROVIDE 
        INFO 
        &amp; EXPLANATION 
        BELOW</td>
    </tr>
    <tr>
      <td colspan="18"><input type="text" name="ifnothospitalizedinfo" id="textfield33" style="width:100%" value="<?php echo $ifnothospitalizedinfo ; ?>"  /></td>
      </tr>
    <tr>
      <td colspan="18">HAVE 
 YOU 
 UNDERGONE 
 MEDICATION 
 FOR 
 ANY 
 OF 
 THE 
 FF: 
 ILLNESSES? 
 (PLEASE 
 INDICATE 
 YOUR 
 YES 
 OR 
 NO 
 IN 
 THE 
 APPROPRIATE 
 BOXES):<br /></td>
      </tr>
    <tr>
      <td><input name="highblood" type="checkbox" id="checkbox14" <?php if($highblood=='on'){echo 'checked="checked"';} ?> /></td>
      <td colspan="3">HIGH 
        BLOOD 
        PRESSURE/ HEART 
        PROBLEM <br /></td>
      <td colspan="2" align="right"><input name="disease" type="checkbox" id="checkbox15" <?php if($disease=='on'){echo 'checked="checked"';} ?> /></td>
      <td>DISEASE</td>
      <td colspan="2" align="right"><input name="asthma" type="checkbox" id="checkbox16" <?php if($asthma=='on'){echo 'checked="checked"';} ?> /></td>
      <td colspan="6">ASTHMA / PULMONARY DISEASE OR OTHER COMMUNICABLE DISEASES</td>
      <td width="5%"><input name="epilepsy" type="checkbox" id="checkbox17" <?php if($epilepsy=='on'){echo 'checked="checked"';} ?> /></td>
      <td colspan="2">EPILEPSY</td>
      </tr>
    <tr>
      <td colspan="4" align="right"><strong>
        <input type="text" name="allergies" id="textfield34" style="width:100%" value="<?php echo $allergies ; ?>"  />
      </strong></td>
      <td colspan="3">ALLERGIES,	
  PLEASE	
 SPECIFY </td>
      <td colspan="4">&nbsp;</td>
      <td colspan="4"><input type="text" name="others" id="textfield35" style="width:100%" value="<?php echo $others ; ?>"  /></td>
      <td colspan="3">OTHERS,	
  PLEASE	
  SPECIFY
</td>
    </tr>
    <tr>
      <td colspan="4" align="center">PERSON	
  TO	
  CONTACT	
  IN	
  CASE	
  OF	
  EMERGENCY </td>
      <td colspan="3" align="center"> RELATIONSHIP </td>
      <td colspan="8" align="center"> ADDRESS </td>
      <td colspan="3" align="center"> MOBILE	
  NOS</td>
    </tr>
    <tr>
      <td colspan="4"><strong>
        <input type="text" name="caseofemergencyname" id="textfield36" style="width:100%" value="<?php echo $caseofemergencyname ; ?>"  />
      </strong></td>
      <td colspan="3"><strong>
        <input type="text" name="caseofemergencyrelationship" id="textfield37" style="width:100%" value="<?php echo $caseofemergencyrelationship; ?>"  />
      </strong></td>
      <td colspan="4">&nbsp;</td>
      <td colspan="4"><strong>
        <input type="text" name="caseofemergencyaddress" id="textfield38" style="width:100%" value="<?php echo $caseofemergencyaddress; ?>"  />
      </strong></td>
      <td colspan="3"><strong>
        <input type="text" name="caseofemergencymobilenos" id="textfield39" style="width:100%" value="<?php echo $caseofemergencymobilenos; ?>"  />
      </strong></td>
    </tr>
  </table>
</div>
<!---body0002 cxlose-->

</div>



<br style="clear:both" />&nbsp;<br style="clear:both" />
<?php include 'page2.php'; ?>
<br style="clear:both" />&nbsp;<br style="clear:both" />
<?php include 'page3.php'; ?>
<br style="clear:both" />&nbsp;<br style="clear:both" />
<?php include 'page4.php'; ?>
<br style="clear:both" />&nbsp;<br style="clear:both" />
<?php include 'page5.php'; ?>
<br style="clear:both" />&nbsp;<br style="clear:both" />
<?php include 'page6.php'; ?>



<?php if($_GET['emplcode']==""){ ?>
 <input type="submit" name="button" id="button" value="Submit" />
<p>&nbsp;</p>
  <p>&nbsp;</p>
</div>

</form>


<?php }else{ ?>
 
<p>&nbsp;</p>
  <p>&nbsp;</p>
</div>

</form>




<?php } ?>



</body>
</html>