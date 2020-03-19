<?php  include_once('admin_header.php'); ?>
<div class="container">
        <div class="row">
            <div class="col-sm-12">
	            <div class="admin-form">
	                <!-- <form class="form-horizontal" action="" method="post"  enctype="multipart/form-data" id="addemployee_form" name="form1"> -->
	                <?php  echo form_open("admin/update_article/{$article->id}",['class'=>'form-horizontal']); ?>
	                    <style> span.error p{  color:red; } 
						</style>
	                    <div class="col-sm-6"> 
	                        <?php if( $error=$this->session->flashdata('failed') ) { ?>
	                        <div class="row">
	                        	<div class="col-lg-12">
	                        		<div class="alert alert-dismissible alert-danger">
	                        			<?php echo $error; ?>
	                        		</div>
	                        	</div>
	                        </div>
	                        <?php } ?>
	                        <!-- Add new employee form -->
	                        <h2>Edit Articles</h2>
		                    <div class="form-group col-sm-12">
			                    <label for="fname">Title</label>			        
			                    <?php echo form_input(['name'=>'title','class'=>'form-control','placeholder'=>'Title', 'value'=>set_value('title',$article->title)]); ?>
			                    <span class="error"><?php echo form_error('title'); ?></span>
		                    </div>
							<div class="form-group col-sm-12">
								<label for="fname">Article Body</label>
								<?php echo form_textarea(['name'=>'body','class'=>'form-control','placeholder'=>'Article Body', 'value'=>set_value('body',$article->body)]); ?>
								<span class="error"><?php echo form_error('body'); ?></span>
							</div>
							<div class="form-group col-sm-12">
							    <?php echo form_submit(['name'=>'submit','class'=>'btn btn-primary','value'=>'Submit']), 
							        form_reset(['name'=>'reset','class'=>'btn btn-default','value'=>'Reset']);
							    ?>
			                </div>
	                    </div>
	                </form>
	            </div>
	        </div>
        </div>
    </div>
<?php  include_once('admin_footer.php'); ?>