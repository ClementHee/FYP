<?php 


switch ($usergroup) {
	case 'member':
		# code...
  echo'
  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="MEMBER">
  <a class="nav-link" href="memeber_view.php">
  <i class="fa fa-fw fa-folder"></i>
  <span class="nav-link-text">Profile</span>
  </li>
  ';
  break;
  case 'staff':
			# code...
  echo'<li class="nav-item" data-toggle="tooltip" data-placement="right" title="STAFF">
  <a class="nav-link" href="staff_view.php">
  <i class="fa fa-fw fa-file"></i>
  <span class="nav-link-text">Profile</span>
  </li>
  ';
  break;

  default:
		# code...
  echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="ADMIN">
  <a class="nav-link" href="admin_view.php">
  <i class="fa fa-fw fa-building"></i>
  <span class="nav-link-text">Profile</span>
  </li>';
  break;
}


?>