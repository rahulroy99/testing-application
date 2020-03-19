<?php include_once('public_header.php'); ?>
<div class="container">
<div class="row">
	<div class="col-sm-6">
		<h2> 
		<?= $detail->title ?>		
		</h2>
	    <hr>
		<span><?= $detail->created_on ?></span><br>
		<span><img src="<?= $detail->image_path ?>" alt="No file is available"></span>
		<hr>
		<p><?= $detail->body ?> </p>
		</div>
	</div>
</div>
<?php include_once('public_footer.php'); ?>