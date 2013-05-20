<?php  $this->load->view('html/header_view'); ?>

<style type="text/css">
      

    </style>
    <div class="container">
		
		<?php
			echo form_open('login/validate', array('class'=>"form-signin"));
			echo "<img src='../../bootstrap/img/DAG-logo.png'>";
			echo '<h2 class="form-signin-heading">Please sign in</h2>';
			echo form_input(array('type' => 'text', 'name' => 'username', 'placeholder' => 'Email address', 'class'   => 'input-block-level'));
			echo form_input(array('type' => 'password', 'name' => 'password', 'placeholder' => 'Password', 'class' => 'input-block-level'));
			//echo "<label class='checkbox'>";
			echo form_checkbox(array('type' => 'checkbox', 'name' => 'remember_me', 'value' => "remember_me", 'class' => 'input-block-level'));
			//echo " Remember me</label>";
			echo form_label('Remember Me', '', array('class' => 'checkbox' ));	
				
			echo "<button class='btn btn-large btn-primary' type='submit'>Sign in</button>";
				
				
		?>
    </div> <!-- /container -->

   


<?php $this->load->view('html/footer_view'); ?>