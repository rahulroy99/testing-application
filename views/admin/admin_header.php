<!DOCTYPE html>
<html lang="en">
    <head>
	    <meta charset="utf-8">
	    <title>Admin Panel</title>
	    <!-- Bootstrap core CSS -->
	    <?= link_tag('assets/css/bootstrap.min.css') ?>
    </head>
    <body>
		<nav class="navbar navbar-default">
		  <div class="container-fluid">
			    <div class="navbar-header">
			        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
			        </button>
			        <a href="#" class="navbar-brand">Admin Panel</a>
			        <h3><?php //echo $_SESSION['admin_login']['fname']; ?></h3>
			    </div>
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				    
				    <ul class="nav navbar-nav navbar-right">
					    <li>
					    <a href="<?= base_url('login/logout'); ?>">logout</a>
					    </li>
				    </ul>
			    </div>
	        </div>
        </nav>