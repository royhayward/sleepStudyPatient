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
		<form class="navbar-form pull-right">
			<a class="btn btn-primary btn-large" onclick="window.location = '/index.php/patient/newPatient';"><span>Add New Patient</span></a>
        </form>
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
		<table class="table table-boardered table-hover table-condensed">
			<thead>
				<th><strong>Patient Name</strong></th>
				<th><strong>Patient State</strong></th>
				<th><strong>Patient Phone Number</strong></th>
				<th><strong>Last Update Date</srong></th>
			</thead>
			<tbody>
				<?php
					foreach($patients as $p):
						
				?>
				<tr>
					<td><a href="<?php echo base_url(); ?>index.php/patient/single?id=<?php echo $p->id;?>"><?php echo $p->LastName . ", " . $p->FirstName; ?></td>
					<td><?php echo $p->State; ?></td>
					<td><?php echo $p->Phone; ?></td>
					<td><?php echo $p->last_updated; ?></td>
					
					<td>
							<form class="navbar-form pull-right">
								<a class="btn btn-primary btn-small" onclick="window.location = '/index.php/patient/editPatient?id=<?php echo $p->id;?>'"><span>Edit User</span></a>
					        </form>
					</td>	
					
					
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
    </div> <!-- /container -->

   


<?php $this->load->view('html/footer_view'); ?>