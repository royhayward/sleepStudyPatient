<?php  $this->load->view('html/header_view'); ?>
<?php $this->load->view('admin/nav_admin_view')?>

<style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      

    </style>
<div class="patient">
	<?php $p = $pdata['0']; ?>
	<h3><?php echo $p->LastName . ", " . $p->FirstName . " " . $p->MiddleInitial ; ?> </h3>

	<?php
		echo form_open('patient/addNote');
		echo form_hidden('id', $p->id);
		
		$input_array = array(
			'name' 			=>	'patient_note',
			'id'			=>	'patient_note',
			'placeholder' 	=> 'Type Note Here.',
			'rows'			=>	'10',
			'cols'			=> 	'5',
			'class'			=>	'note'
		);
		echo form_textarea($input_array);
		
		echo "<br/>";
		
		echo form_submit(  array('name' => 'add_note', 'class' => 'btn btn-primary btn-large', 'value'=>'Submit!'));
		echo form_close();
	
	?>
	

</div>