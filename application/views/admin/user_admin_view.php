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
			<a class="btn btn-primary btn-large" onclick="window.location = '/index.php/admin/newUser';"><span>Add New User</span></a>
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
				<th><strong>User Name</strong></th>
				<th><strong>User Role</strong></th>
				<th><strong>User Status</srong></th>
			</thead>
			<tbody>
				<?php
					foreach($users as $u):
						
				?>
				<tr>
					<td><?php echo $u->username; ?></td>
					<td><?php echo $u->role; ?></td>
					<td>
						<?php echo $u->status; ?>
					</td>
					<td>
							<form class="navbar-form pull-right">
								<a class="btn btn-primary btn-small" onclick="window.location = '/index.php/admin/editUser?id=<?php echo $u->id;?>'"><span>Edit User</span></a>
					        </form>
					</td>	
					<td>
						
						<?php if($u->status == 1): ?>
						<form class="navbar-form pull-right">
							<a class="btn btn-primary btn-small" onclick="window.location = '/index.php/admin/disableUser?id=<?php echo $u->id;?>'"><span>Disable User</span></a>
				        </form>
						<?php endif; ?>
						<?php if($u->status == 0): ?>
						<form class="navbar-form pull-right">
							<a class="btn btn-primary btn-small" onclick="window.location = '/index.php/admin/enableUser?id=<?php echo $u->id;?>'"><span>Enable User</span></a>
				        </form>
						<?php endif; ?>
					</td>
					
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
    </div> <!-- /container -->

   


<?php $this->load->view('html/footer_view'); ?>