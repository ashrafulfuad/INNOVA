<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Dashboard</title>
	<link href="dashboard_assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="dashboard_assets/css/font-awesome.min.css" rel="stylesheet">
	<link href="dashboard_assets/css/styles.css" rel="stylesheet">
	<!--Custom Font-->
	<link href="dashboard_assets/css/font.css" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>admin</span>panel</a>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="photos/<?=$_SESSION['profile_photo']?>" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?=$_SESSION['username']?></div>
				<div class="profile-usertitle-status"><?=$_SESSION['email']?></div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
			<li class=""><a href="profile.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li><a href="index.php"><em class="fa fa-book">&nbsp;</em> Website</a></li>
			<li><a href="all_contact_messages.php"><em class="fa fa-envelope">&nbsp;</em> Messages</a></li>

			<!-- for users -->
			<li class="parent "><a data-toggle="collapse" href="#sub-item-1"><em class="fa fa-users">&nbsp;</em> Users <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span></a>
				<ul class="children collapse" id="sub-item-1">
					<li><a href="all_users_list.php"><span class="fa fa-list-ol">&nbsp;</span> Users List</a></li>
					<li><a href="register.php"><span class="fa fa-user">&nbsp;</span> Add User</a></li>
				</ul>
			</li>

			<!-- for services -->
			<li class="parent "><a data-toggle="collapse" href="#sub-item-2"><em class="fa fa-briefcase">&nbsp;</em> Service <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span></a>
				<ul class="children collapse" id="sub-item-2">
					<li><a href="all_services_list.php"><span class="fa fa-list-ol">&nbsp;</span> Service List</a></li>
					<li><a href="add_services.php"><span class="fa fa-briefcase">&nbsp;</span> Add Services</a></li>
				</ul>
			</li>

			<!-- for banner -->
			<li class="parent "><a data-toggle="collapse" href="#sub-item-3"><em class="fa fa-image">&nbsp;</em> Banner <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span></a>
				<ul class="children collapse" id="sub-item-3">
					<li><a href="all_banner_list.php"><span class="fa fa-list-ol">&nbsp;</span> Banners List</a></li>
					<li><a href="add_banner.php"><span class="fa fa-image">&nbsp;</span> Add Banner</a></li>
				</ul>
			</li>

			<!-- for testimonial -->
			<li class="parent "><a data-toggle="collapse" href="#sub-item-4"><em class="fa fa-cube">&nbsp;</em> Testimonial <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span></a>
				<ul class="children collapse" id="sub-item-4">
					<li><a href="all_testimonial_list.php"><span class="fa fa-list-ol">&nbsp;</span> Testimonial List</a></li>
					<li><a href="add_testimonial.php"><span class="fa fa-cube">&nbsp;</span> Add Testimonial</a></li>
				</ul>
			</li>

			<!-- for about -->
			<li class="parent "><a data-toggle="collapse" href="#sub-item-5"><em class="fa fa-address-card">&nbsp;</em> About Us <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span></a>
				<ul class="children collapse" id="sub-item-5">
					<li><a href="all_about_list.php"><span class="fa fa-list-ol">&nbsp;</span> About List</a></li>
					<li><a href="add_about.php"><span class="fa fa-address-card">&nbsp;</span> Add About</a></li>
				</ul>
			</li>

			<li><a type="submit" href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
