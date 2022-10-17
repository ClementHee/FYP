<?php 
function CheckMemeberDetails(){
	require'conn.php';
	$data=getMemberInfo();
	$group=$data['group'];
	$name=$data['username'];
	if ($group=="students") {
		# code...
		$checkdetails=mysqli_query($con,"SELECT * FROM membership_userrecords WHERE memberID='$name' AND tableName='student_details'");
	}
}
?>