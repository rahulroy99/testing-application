<?php include('public_header.php');?>
<div class="container">
        <div class="row">
            <div class="col-sm-12">
	            <div class="admin-form">
	                <?php  echo form_open('login/admin_login',['class'=>'form-horizontal']); ?>
	                    <div class="col-sm-6"> 
	                        <?php if( $error=$this->session->flashdata('login_failed') ) { ?>
	                        <div class="row">
	                        	<div class="col-lg-12">
	                        		<div class="alert alert-dismissible alert-danger">
	                        			<?php echo $error; ?>
	                        		</div>
	                        	</div>
	                        </div>
	                        <?php } ?>
	                        <h2>Admin Login</h2>
		                    <div class="form-group col-sm-12">
			                    <label for="fname">Email id</label>			        
			                    <?php echo form_input(['name'=>'username','class'=>'form-control','placeholder'=>'Username','value'=>set_value('username')]); ?>
			                    <span class="error"><?php echo form_error('username'); ?></span>
		                    </div>
							<div class="form-group col-sm-12">
								<label for="fname">Password</label>
								<?php echo form_password(['name'=>'password','class'=>'form-control','placeholder'=>'Password']); ?>
								<span class="error"><?php echo form_error('password'); ?></span>
							</div>
							<div class="form-group col-sm-12">
							    <?php echo form_submit(['name'=>'submit','class'=>'btn btn-primary','value'=>'Login']), 
							        form_reset(['name'=>'reset','class'=>'btn btn-default','value'=>'Reset']);
							    ?>
			                </div>
	                    </div>
	                </form>
	            </div>
	        </div>
        </div>
    </div>
   <!--  <?php //echo validation_errors(); ?> -->
<?php include('public_footer.php');?>