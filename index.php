<?php 
session_start();


if(!isset($_SESSION['login'])){
	header("location: login.php");
	exit();
}
	$current = 'index';

	include 'includes/header.php';
	include 'includes/sidebar.php';
?>

	<!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li><a href="index.php">Dashboard</a></li>
				<li class="active">users</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Users</h1>
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
	
		</div>

	</div>	<!--/.main-->
<?php
	include 'includes/footer.php';
 ?>