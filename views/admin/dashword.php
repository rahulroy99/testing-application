<?php include_once('admin_header.php'); ?>
<div class="container">
	<div class="row">
		<div class="col-lg-offset-6 col-lg-6">

		<a class="btn btn-lg btn-primary pull-left xds_frrr">ADD</a>

		<a href="<?= base_url('admin/add_articles'); ?>" class="btn btn-lg btn-primary pull-right xds_frrrd">ADD ARTICLES</a>

		</div>
	</div>
	<?php if( $success=$this->session->flashdata('feedback') ) { ?>
        <div class="row">
        	<div class="col-lg-6">
        		<div class="alert alert-dismissible alert-success">
        			<?php echo $success; ?>
        		</div>
        	</div>
        </div>
    <?php } ?>
    <h2 class="text-center">Listing</h2>
	<table id="" class="display table lisiting-table">
        <thead>
			<!-- table for employee list -->
			<tr>
				<th width="10">S.No</th>
				<th width="20">Title</th>
				<th width="30">Body</th>
				<th width="40">Action</th>
			</tr>
			</thead>
			<tbody>
			<?php if( is_array($articles) && !empty($articles) ) { ?>

			<?php  $counter =$this->uri->segment(3);
			++$counter;
			 foreach($articles as $article) {?>
			<tr>
				<td><?php echo $counter; ?></td>
				<td><?php echo $article->title; ?></td>
				<td><?php echo $article->body; ?></td>
				<td>
				<?= anchor("admin/edit_article/{$article->id}",'Edit',['class'=>'btn btn-primary']); ?>
				<?= anchor("admin/delete_article/{$article->id}",'Delete',['class'=>'btn btn-danger','onclick'=>"return confirm('Are you Sure for Delete?')"]); ?>
				</td>
			</tr>
			<?php
			$counter++;
			}
			}
			else if( empty($all_articles) ) { ?>
			<tr>
			<td>No Results Founds.</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<?= $this->pagination->create_links();?>
</div>
<?php include_once('admin_footer.php'); ?>
