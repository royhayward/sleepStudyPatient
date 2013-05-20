<?php  $this->load->view('html/header_view'); ?>
<?php $this->load->view('admin/nav_admin_view')?>

<style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      

    </style>
    <div class="container">
		
	
		<?php
			echo form_open('admin/changeuser', array('class'=>"form-signin"));
			if(isset($msg)){
				if($error){
					echo "<div class='user error'>";
				}else{
					echo "<div class='user msg'>";
				}
				echo "<p>".$msg."</p>";
				echo "</div>";
			}
			foreach($user as $t){
				$u = $t;
			}
			
			
			echo form_input(array('type' => 'hidden', 'name' => 'username', 'value' => $u->username));
			echo "Username:  ". $u->username;
			echo form_input(array('type' => 'password', 'name' => 'pass1', 'placeholder' => 'Password', 'class' => 'input-block-level'));
			echo form_input(array('type' => 'password', 'name' => 'pass2', 'placeholder' => 'Password', 'class' => 'input-block-level'));
			$options = array('0' => 'User', '1' => 'Admin');
			echo form_dropdown('Role',$options,$u->role);
			$options = array('0' => 'disabled', '1' => 'enabled');
			echo form_dropdown('Status',$options,$u->status);
			echo form_submit(  array('name' => 'newUser', 'class' => 'btn btn-primary btn-large', 'value'=>'Update User!'));
			echo form_close();
		
		?>
    </div> <!-- /container -->

   


<?php $this->load->view('html/footer_view'); ?>