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
		<h2>Add New Study</h2>
		<h3><?php echo $p->LastName . ", " . $p->FirstName . " " . $p->MiddleInitial; ?></h3>
		<?php
			echo form_open('patient/addStudy');
			
			echo form_hidden('id', $p->id);
			foreach($indications as $s){
				if($s->active == 1){
					echo "<label>".$s->indication."</label>";
					$input_array = array('type' => 'checkbox', 'name' => $s->id, 'value' => 'indication');

					
					echo form_input($input_array);
					echo "<br />";
				}
			}
			echo form_submit(  array('name' => 'add_study', 'class' => 'btn btn-primary btn-large', 'value'=>'Submit!'));
			echo form_close();
			
		?>
		
		
    </div> <!-- /container -->

   


<?php $this->load->view('html/footer_view'); ?>