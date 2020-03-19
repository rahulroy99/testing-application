<?php include('public_header.php');?>
<div class="container">
    <h2 class="text-center">Search Result</h2>
	<table id="" class="display table lisiting-table">
        <thead>
			<!-- table for employee list -->
			<tr>
				<th width="10">S.No</th>
				<th width="20">Title</th>
				<th width="30">Body</th>
				<th width="40">Published On</th>
			</tr>
			</thead>
			<tbody>
			<?php //print_r($search_articles); die; 
			if( is_array($search_articles) && !empty($search_articles) ) { ?>
			<?php  $counter =$this->uri->segment(4);
			++$counter;
			 foreach($search_articles as $search_article) {?>
			<tr>
				<td><?php echo $counter; ?></td>
				<td><?php echo $search_article->title; ?></td>
				<td><?php echo $search_article->body; ?></td>
				<td>
				<?php echo date('d M y H:i:s',strtotime($search_article->created_on) );?>
				</td>
			</tr>
			<?php
			$counter++;
			}
			}
			else if( empty($search_articles) ) { ?>
			<tr>
			<td>No Results Founds.</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<?= $this->pagination->create_links(); ?>
</div>
<?php include('public_footer.php');?>
        