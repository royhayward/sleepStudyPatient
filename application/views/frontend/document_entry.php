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
		<h2>Add New Document</h2>
		<h3><?php echo $p->LastName . ", " . $p->FirstName . " " . $p->MiddleInitial; ?></h3>
		<?php
			echo form_open_multipart('patient/addDocument');
			echo form_hidden('id', $p->id);

			echo "<label>Document Type</label>";
			$options[null] = '';
			foreach($doctypes as $d){
				$options[$d->id] = $d->Type;
			}
			
			echo form_dropdown('doc_type', $options, '');
						
			echo "<label>Document Name</label>";
			$input_array = array('type' => 'file', 'name' => 'document', 'class' => 'document');
			echo form_input($input_array);
			
			echo "<label>Title:</label>";
			$input_array = array('type' => 'text', 'name' => 'title',   'class' => 'name');
			echo form_input($input_array);
			
			echo "<label>Tags or Keywords:</label>";
			$input_array = array('type' => 'text', 'name' => 'tags',   'class' => 'name');
			echo form_input($input_array);
			
			echo "<br/>";
			
			echo form_submit(  array('name' => 'add_study', 'class' => 'btn btn-primary btn-large', 'value'=>'Submit!'));
			echo form_close();
			
		?>
		
		
    </div> <!-- /container -->

   


<?php $this->load->view('html/footer_view'); ?>