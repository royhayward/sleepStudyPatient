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
		<h2>Add or Update Symptoms</h2>
		<h3><?php echo $p->LastName . ", " . $p->FirstName . " " . $p->MiddleInitial; ?></h3>
		<?php
			echo form_open('patient/addSymptom');
			
			echo form_hidden('id', $p->id);
			foreach($symptoms as $s){
				if($s->active == 1){
					echo "<label>".$s->symptom."</label>";
					$input_array = array('type' => 'checkbox', 'name' => $s->id, 'value' => 'symptom');
					if(!$s->id_Patient == null){
						$input_array['checked'] = true;
					}
					
					echo form_input($input_array);
					echo "<br />";
				}
			}
			echo form_submit(  array('name' => 'update_symptoms', 'class' => 'btn btn-primary btn-large', 'value'=>'Submit!'));
			echo form_close();
			//var_dump($symptoms);
		?>
		
		
    </div> <!-- /container -->

   


<?php $this->load->view('html/footer_view'); ?>