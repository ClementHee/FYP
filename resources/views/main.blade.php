<?php 
$memberinfo=getMemberInfo();
$usergroup=$memberinfo['group'];
switch ($usergroup) {
	case 'member':
		# code...
	include'memview.php';
	break;
	case 'staff':
			# code...
	include'staffview.php';
	break;
	
	default:
		# code...
	include'admview.php';
	break;
}
?>