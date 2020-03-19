<?php include('public_header.php');?>
<div class="container">
    <h2 class="text-center">All Article List</h2>
	<table id="" class="display table lisiting-table">
        <thead>
			<!-- table for employee list -->
			<tr>
				<th width="10">S.No</th>
				<th width="20">Title</th>
				<th width="30">Body</th>
				<th width="10">Image</th>
				<th width="20">Published On</th>
			</tr>
			</thead>
			<tbody>
			<?php if( is_array($all_articles) && !empty($all_articles) ) { ?>
			<?php  $counter =$this->uri->segment(3);
			++$counter;
			 foreach($all_articles as $all_article) {?>
			<tr>
				<td><?php echo $counter; ?></td>
				<td><?= anchor("user/articles/{$all_article->id}",$all_article->title); ?></td>
				<td><?php echo $all_article->body; ?></td>
				<td><img class='article_body' src='<?php echo $all_article->image_path;?>' alt='image not found'></td>
				<td>
				<?php echo date('d M y H:i:s',strtotime($all_article->created_on) );?>
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
<?php include('public_footer.php');?>
        