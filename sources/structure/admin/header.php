<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $sitetitle.$pb; ?></title>
<link rel="icon" href="favicon.ico" type="image/x-icon" />
<link href="<?php echo $siteurl; ?>assets/css/<?php echo $theme; ?>.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $siteurl; ?>assets/css/addon.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $siteurl; ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
  min-height: 200px;
  padding-top: 90px;
}        
.nav > li > a { color: #787878 }  
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $siteurl; ?>assets/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo $siteurl; ?>assets/js/login.js"></script>
<script type='text/javascript'>
$(document).ready(function() {
	$('[data-toggle=collapse]').click(function(){
		$(this).find("i").toggleClass("fa-chevron-right fa-chevron-down");
	});
 });
function goBack() {window.history.back()}
</script>
</head>

<body>
<nav class="<?php echo getNav(); ?> navbar-fixed-top" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="#"><?php echo $servername; ?></a>
	</div>	
	<div class="navbar-collapse collapse">
		<ul class="nav navbar-nav">
              <li><a href="?base=main">Home</a></li>
			<?php
				if(!isset($_SESSION['id'])){
					echo "<li><a href=\"?base=main&amp;page=register\">Register</a></li>";
				}
			?>
              <li><a href="?base=main&amp;page=download">Download</a></li>
			  <li><a href="?base=main&amp;page=rankings">Rankings</a></li>
			  <li><a href="?base=main&amp;page=vote">Vote</a></li>
			  <li><a href="<?php echo $forumurl; ?>">Forums</a></li>
			<?php
			$getpages = $mysqli->query("SELECT * from ".$prefix."pages WHERE visible = 1");
			while ($fetchpages = $getpages->fetch_assoc()){ 
				echo "<li><a href=\"?base=main&amp;page=".$fetchpages['slug']."\">" . $fetchpages['title'] . "</a>";
			}
			?>
			
            </ul>
		<?php	
			if(isset($_SESSION['id'])){
			$name = $_SESSION['name'];
		?>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $name; ?><b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="?cype=main&amp;page=members&amp;name=<?php echo $_SESSION['pname'] ?>">Profile</a></li>
						<li><a href="?cype=ucp&page=mail&s=3"><?php mailStats(3)?> Unread Mail</a></li>
						<li><a href="?cype=ucp&amp;page=charfix">Character Fix</a></li>
						<li class="divider"></li>
						<li><a href="?cype=misc&amp;script=logout">Log Out</a></li>
					</ul>
				</li>
			</ul>
		<?php } ?>
	</div>
</nav>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <!-- Left column -->
                <h2 class="text-left">Panel</h2>
                <hr/>
                <ul class="nav nav-pills nav-stacked">
					<li>
						<a href="#" data-toggle="collapse" data-target="#menu1">
						Site Settings <i class="fa fa-chevron-right"></i>
                        </a>
					</li>
					<ul class="nav nav-pills nav-stacked collapse" id="menu1">
						<li><a href="?base=admin&amp;page=properties"><i class="fa fa-cogs"></i> Site Configuration</a></li>
						<li><a href="?base=admin&amp;page=voteconfig"><i class="fa fa-arrow-circle-o-up"></i> Vote Configuration</a></li>
						<li><a href="?base=admin&amp;page=nxpacks"><i class="fa fa-shopping-cart"></i> NX Packs</a></li>
						<li><a href="?base=admin&page=bannedmaps"><i class="fa fa-ban"></i> Jailed Maps</a></li>
						<li><a href="?base=admin&amp;page=theme"><i class="fa fa-eye"></i> Theme</a></li>
						<li><a href="?base=admin&amp;page=banner"><i class="fa fa-eye"></i> Banner</a></li>
						<li><a href="?base=admin&amp;page=background"><i class="fa fa-eye"></i> Background</a></li>
					</ul>
					<li>
						<a href="#" data-toggle="collapse" data-target="#menu2">
							Manage Content <i class="fa fa-chevron-right"></i>
						</a>
					</li>
					<ul class="nav nav-pills nav-stacked collapse" id="menu2">
						<li><a href="?base=admin&amp;page=homeconfig"><i class="fa fa-home"></i> Home Content</a></li>
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-pencil"></i> News <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="?base=admin&amp;page=mannews&amp;action=add">Add News</a></li>
								<li><a href="?base=admin&amp;page=mannews&amp;action=edit">Edit News</a></li>
								<li><a href="?base=admin&amp;page=mannews&amp;action=del">Delete News</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-pencil"></i> Events <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="?base=admin&amp;page=manevent&amp;action=add">Add Event</a></li>
								<li><a href="?base=admin&amp;page=manevent&amp;action=edit">Edit Event</a></li>
								<li><a href="?base=admin&amp;page=manevent&amp;action=del">Delete Event</a></li>
							</ul>
						</li>
						<li><a href="?base=gmcp"><i class="fa fa-pencil"></i> GM Blogs</a> </li>
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-file-text"></i> Pages <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="?base=admin&amp;page=pages&amp;action=add">Add Page</a></li>
								<li><a href="?base=admin&amp;page=pages&amp;action=edit">Edit Page</a></li>
								<li><a href="?base=admin&amp;page=pages&amp;action=del">Delete Page</a></li>
							</ul>
						</li>
					</ul>
					<li>
						<a href="#" data-toggle="collapse" data-target="#menu3">
							Manage Users <i class="fa fa-chevron-right"></i>
						</a>
					</li>
					<ul class="nav nav-pills nav-stacked collapse" id="menu3">
						<li><a href="?base=admin&amp;page=ticket"><i class="fa fa-ticket"></i> View Tickets</a></li>
						<li><a href="?base=admin&amp;page=banned"><i class="fa fa-ban"></i> Banned Users</a></li>
						<li><a href="?base=admin&amp;page=muteuser"><i class="fa fa-microphone-slash"></i> Mute User</a></li>
						<li><a href="?base=admin&amp;page=unmuteuser"><i class="fa fa-microphone"></i> Unmute User</a></li>
					</ul>
                </ul>
				<hr/>
				<h2 class="text-left">Resources</h2>
                <hr/>
                <ul class="nav nav-pills nav-stacked">
					<li class="nav-header"></li>
					<li><a href="?base=admin"><i class="fa fa-tachometer"></i>  Admin Dashboard</a></li>
                    <li><a href="https://github.com/greenelf/MapleBit/"><i class="fa fa-github"></i> GitHub</a></li>
                    <li><a href="http://forum.ragezone.com/f690/beta-maplebitcms-977439/"><i class="fa fa-comment"></i> Ragezone Thread</a></li>
                </ul>
                <hr/>
            </div>
            <!-- /col-3 -->
			<div class="col-md-9">