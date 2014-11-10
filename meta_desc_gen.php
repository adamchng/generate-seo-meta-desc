<?php

if($_POST[v] || $_GET[v]) {


	// Generate Unique Meta Description

/*
Train in .net Framework with NetCom Learning. We use authorized Official Microsoft Curriculum and Certified Microsoft Instructors, with flexible schedules in our friendly and comfortable locations in NYC midtown New York, Las Vegas, Nevada, Arlington, Washington DC and Philadelphia facilities.

Take your Windows Server 2008 Training with NetCom Learning. We use authorized Official Microsoft Curriculum and Certified Microsoft Instructors, with flexible schedules in our friendly and comfortable locations in NYC midtown New York, Las Vegas, Nevada, Arlington, Washington DC and Philadelphia facilities.

Clients trust NetCom Learning to deliver top quality Microsoft SharePoint 2010 training and certifications. Learn SharePoint 2010 training with Microsoft Official Curriculum and Microsoft Certified Trainers in New York, NY, Sterling, VA, Las Vegas, NV, Washington DC, Philadelphia PA and live online.

Microsoft Gold Partner authorized training taught by certified Microsoft trainers for IT professionals who are interested in Microsoft Forefront training courses and certification is available at NetCom Learning with locations in NYC, New York, Washington DC, Las Vegas, Philadelphia and Live Online.
*/

	if($_GET[a]) {
		$title = $_GET[a];
		$vendor = $_GET[v];
	} else {
		if($_POST[a]) {
			$title = $_POST[a];
			$vendor = $_POST[v];
		} else {
			$title = 'Microsoft Virtualization';
			$vendor = 'Microsoft';
		}
	}

	require($_SERVER[DOCUMENT_ROOT] . '/lib/seo.inc.php');

	$meta_desc = MetaDescOne($title,$vendor);
	// not more than 156
	$chars = strlen($meta_desc);

	print "<h1>$chars characters</h1><div style='padding:20px;'>$meta_desc<p><a href=\"$_SERVER[SCRIPT_URI]?a=$title&v=$vendor\">Generate new description again</a> | <a href=$_SERVER[SCRIPT_URI]>Restart</a></div>";

} else {
	print "<form method=post action=$_SERVER[SCRIPT_URI]>
		Course/Class/Product/Package: <input type=text size=50 name=a><p>
		Vendor: <input type=text size=50 name=v><p>
		<input type=submit name=submit value='Submit'>
		</form>
		";
}


exit;

?>
