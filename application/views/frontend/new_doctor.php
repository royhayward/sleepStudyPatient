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
			
			if(isset($msg)){
				if($error){
					echo "<div class='user error'>";
				}else{
					echo "<div class='user msg'>";
				}
				echo "<p>".$msg."</p>";
				echo "</div>";
			}
		?>
			<?php
				foreach($pdata as $data){
					$p = $data;
				}
			?>
		<h2>Add a New Primary Care Physician</h2>
		<h3><?php echo $p->LastName . ", " . $p->FirstName . " " . $p->MiddleInitial; ?></h3>
		<?php
			echo form_open('patient/changedoctor');
			
			echo form_hidden('id', $p->id);
			echo form_hidden('doctor_type', $doctor_type);
			if($doctor_type == 'pcp'){
				$input_array = array('type' => 'text', 'name' => 'fname',   'class' => 'name');
				if(isset($post['fname']) && (!$post['fname'] == '' )){
					$input_array['value'] = $post['fname'];
				}else{
					$input_array['placeholder'] = 'First Name';
				}
				echo form_input($input_array);
				$input_array = array('type' => 'text', 'name' => 'lname',   'class' => 'name');
				if(isset($post['lname']) && (!$post['lname'] == '' )){
					$input_array['value'] = $post['lname'];
				}else{
					$input_array['placeholder'] = 'Last Name';
				}
				echo form_input($input_array);
			}else{
				$input_array = array('type' => 'text', 'name' => 'name',   'class' => 'name');
				if(isset($post['name']) && (!$post['name'] == '' )){
					$input_array['value'] = $post['name'];
				}else{
					$input_array['placeholder'] = 'Name';
				}
				echo form_input($input_array);
			}
			$input_array = array('type' => 'text', 'name' => 'npi',   'class' => 'name');
			if(isset($post['npi']) && (!$post['npi'] == '' )){
				$input_array['value'] = $post['npi'];
			}else{
				$input_array['placeholder'] = 'NPI';
			}
			echo form_input($input_array);
			$input_array = array('type' => 'text', 'name' => 'ein',   'class' => 'name');
			if(isset($post['ein']) && (!$post['ein'] == '' )){
				$input_array['value'] = $post['ein'];
			}else{
				$input_array['placeholder'] = 'EIN';
			}
			echo form_input($input_array);
		
			echo form_submit(  array('name' => 'changedoctor', 'class' => 'btn btn-primary btn-large', 'value'=>'Submit!'));
			echo form_close();
		?>
    </div> <!-- /container -->

   


<?php $this->load->view('html/footer_view'); ?>