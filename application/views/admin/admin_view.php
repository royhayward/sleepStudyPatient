<?php  $this->load->view('html/header_view'); ?>

<style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    <div class="container">
		<?php
			echo form_open('app/login', array('class'=>"form-signin"));
			echo '<h2 class="form-signin-heading">Please sign in</h2>';
			echo form_input(array('type' => 'text', 'name' => 'username', 'placeholder' => 'Email address', 'class'   => 'input-block-level'));
			echo form_input(array('type' => 'password', 'name' => 'username', 'placeholder' => 'Password', 'class' => 'input-block-level'));
			//echo "<label class='checkbox'>";
			echo form_checkbox(array('type' => 'checkbox', 'name' => 'username', 'value' => "remember-me", 'class' => 'input-block-level'));
			//echo " Remember me</label>";
			echo form_label('Remember Me', '', array('class' => 'checkbox' ));	
				
			echo "<button class='btn btn-large btn-primary' type='submit'>Sign in</button>";
				
				
		?>
    </div> <!-- /container -->

   


<?php $this->load->view('html/footer_view'); ?>