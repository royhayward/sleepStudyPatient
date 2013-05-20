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
		<div class="patient">
			<h3><?php echo $p->LastName . ", " . $p->FirstName . " " . $p->MiddleInitial ; ?> </h3>
			<div class="data">
				<p>Date of Birth: <?php echo $p->DOB; ?></p>
				<p>VirtOXID: <?php echo $p->VirtOXID; ?></p>
				<p>Address: <?php echo $p->ShippingAddress ;?> <br/> <?php echo $p->City . ", " . $p->State . " " . $p->Zip; ?></p>
				<p>Phone:  <?php echo $p->Phone?></p>
				<p>Gender: <?php if($p->Gender == 'M'){echo "Male";}else{echo "Female";} ?></p>
				<p>Height: <?php echo $p->Height_feet; ?> Feet, <?php echo $p->Height_inch; ?> Inches</p>
				<p>Neck Size: <?php echo $p->NeckSize; ?></p>
				<p>Insurance Carrier:  <?php echo $p->Name; ?> ID: <?php echo $p->Insurance_ID; ?></p>
			</div>
			<div class="doctors">
				<?php //var_dump($doctors); ?>
				<p>Primary Care Physician: 
					<?php
						if($doctors['pcp']){
							echo $doctors['pcp'][0]->FirstName . " " . $doctors['pcp'][0]->LastName;
							echo "   NPI: " . $doctors['pcp'][0]->NPI . "   EIN:  " . $doctors['pcp'][0]->EIN;
						}
					?>
					
					 </p>
				<?php
					if($doctors['pcp']):
				?>
				<form class="navbar-form ">
					<a class="btn btn-primary btn-small" onclick="window.location = '/index.php/patient/changeDoctor?id=<?php echo $p->id;?>&type=pcp'"><span>Change Primary Care Physician</span></a>
		        </form>
				<?php endif; ?>
				<?php if(!$doctors['pcp']): ?>
					<form class="navbar-form ">
						<a class="btn btn-primary btn-small" onclick="window.location = '/index.php/patient/changeDoctor?id=<?php echo $p->id;?>&type=pcp'"><span>Add Primary Care Physician</span></a>
			        </form>
				<?php endif; ?>
				<p>Dentist: 
					<?php
						if($doctors['dentist']){
							echo $doctors['dentist'][0]->Name ;
							echo "   NPI: " . $doctors['dentist'][0]->NPI . "   EIN:  " . $doctors['dentist'][0]->EIN;
						}
					?>
					 </p>
					<?php
						if($doctors['dentist']):
					?>
					<form class="navbar-form ">
						<a class="btn btn-primary btn-small" onclick="window.location = '/index.php/patient/changeDoctor?id=<?php echo $p->id;?>&type=dentist'"><span>Change Dentist</span></a>
			        </form>
					<?php endif; ?>
					<?php if(!$doctors['dentist']): ?>
						<form class="navbar-form ">
							<a class="btn btn-primary btn-small" onclick="window.location = '/index.php/patient/changeDoctor?id=<?php echo $p->id;?>&type=dentist'"><span>Add Dentist</span></a>
				        </form>
					<?php endif; ?>
				<p>Sleep Center: 
					<?php
						if($doctors['sleepCenter']){
							echo $doctors['sleepCenter'][0]->Name ;
							echo "   NPI: " . $doctors['sleepCenter'][0]->NPI . "   EIN:  " . $doctors['sleepCenter'][0]->EIN;
						}
					?>
					 </p>
					<?php
						if($doctors['sleepCenter']):
					?>
					<form class="navbar-form ">
						<a class="btn btn-primary btn-small" onclick="window.location = '/index.php/patient/changeDoctor?id=<?php echo $p->id;?>&type=sleepCenter'"><span>Change Sleep Center</span></a>
			        </form>
					<?php endif; ?>
					<?php if(!$doctors['sleepCenter']): ?>
						<form class="navbar-form ">
							<a class="btn btn-primary btn-small" onclick="window.location = '/index.php/patient/changeDoctor?id=<?php echo $p->id;?>&type=sleepCenter'"><span>Add Sleep Center</span></a>
				        </form>
					<?php endif; ?>
				<p>DME: 
					<?php
						if($doctors['dme']){
							echo $doctors['dme'][0]->Name ;
							echo "   NPI: " . $doctors['dme'][0]->NPI . "   EIN:  " . $doctors['dme'][0]->EIN;
						}
					?>
					 </p>
					<?php
						if($doctors['dme']):
					?>
					<form class="navbar-form ">
						<a class="btn btn-primary btn-small" onclick="window.location = '/index.php/patient/changeDoctor?id=<?php echo $p->id;?>&type=dme'"><span>Change DME</span></a>
			        </form>
					<?php endif; ?>
					<?php if(!$doctors['dme']): ?>
						<form class="navbar-form ">
							<a class="btn btn-primary btn-small" onclick="window.location = '/index.php/patient/changeDoctor?id=<?php echo $p->id;?>&type=dme'"><span>Add DME</span></a>
				        </form>
					<?php endif; ?>
			</div>
			<div class="documents">
				<h4>Documents:</h4>
				<form class="navbar-form ">
					<a class="btn btn-primary btn-small" onclick="window.location = '/index.php/patient/addDocument?id=<?php echo $p->id;?>'"><span>Add Document</span></a>
		        </form>
				<?php
					foreach($docs as $d):
				?>
					<p><a href="<?php echo base_url(); ?>index.php/patient/getDoc?id=<?php echo $d->id; ?>"><?php echo $d->title; ?></a>:  <?php echo $d->date_loaded; ?></p>
				<?php endforeach; ?>
			</div>
			<div class="symptoms">
				<p>Symptoms:  </p>
				<ul>
				<?
					//var_dump($symptoms);
					foreach($symptoms as $s){
						if(isset($s->id_Patient)){
							echo "<li>".$s->symptom."</li>";
						}
						
					}
				?>
				</ul>
				<form class="navbar-form ">
					<a class="btn btn-primary btn-small" onclick="window.location = '/index.php/patient/addSymptom?id=<?php echo $p->id;?>'"><span>Add Symptom</span></a>
		        </form>
			</div>
			<div class="study">
				<p>Study:  </p>
				<ul>
				<?
					$lastDate = '';
					foreach($study as $s){
						if($s->date == $lastDate){
							echo "<li>".$s->indication."</li>";
						} else {
							if(!$lastDate == ''){
								echo "</ul>";
								echo "</li>";
							}
							echo "<li>".$s->date;
							
							echo "<ul>";
				
							$lastDate = $s->date;
							echo "<li>".$s->indication."</li>";
						}
						
							//echo "<li>".$s->date." - ".$s->indication."</li>";
						
					}
					echo "</ul>";
					echo "</li>";
				?>
				</ul>
				<form class="navbar-form ">
					<a class="btn btn-primary btn-small" onclick="window.location = '/index.php/patient/addStudy?id=<?php echo $p->id;?>'"><span>Add Study</span></a>
		        </form>
			</div>
			<div class="notes">
				<h4>Notes</h4>
				<form class="navbar-form ">
					<a class="btn btn-primary btn-small" onclick="window.location = '/index.php/patient/addNote?id=<?php echo $p->id;?>'"><span>Add Note</span></a>
		        </form>
				<?php
					foreach($notes as $n):
				?>
					<p><?php echo $n->date; ?>  :: <?php echo $n->Note?></p>
				<?php endforeach; ?>
			</div>
		</div>
    </div> <!-- /container -->

   


<?php $this->load->view('html/footer_view'); ?>