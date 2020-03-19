<!DOCTYPE html>
<html lang="en">
    <head>
	    <meta charset="utf-8">
	    <title>Articles List</title>
	    <!-- Bootstrap core CSS -->
	    <?= link_tag('assets/css/bootstrap.min.css') ?>
	    <?= link_tag('assets/css/style.css') ?>
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
			        <a href="#" class="navbar-brand">Articles</a>
			    </div>
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			    <?= form_open('user/search',['class'=>'navbar-form navbar-left','role'=>'search']); ?>
					    <div class="form-group">
					        <input type="text" name="query" class="form-control" placeholder="Search">
					    </div>
					    <!-- <button type="submit" class="btn btn-default">Search</button> -->
					   <?php echo form_submit(['name'=>'submit','class'=>'btn btn-default','value'=>'Search']); ?>
				    <?= form_close(); ?>
				    <?= form_error('query',"<p class='navbar-text text-danger'>", '</p>'); ?>
				    <ul class="nav navbar-nav navbar-right">
					    <li>
					    <?= anchor('login','Login'); ?>
					    </li>
				    </ul>
			    </div>
	        </div>
        </nav>