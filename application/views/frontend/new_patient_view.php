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
			echo form_open('patient/newPatient', array('class'=>"form-patient"));
			$input_array = array('type' => 'text', 'name' => 'fname',   'class' => 'name');
			if(isset($pdata['fname']) && (!$pdata['fname'] == '' )){
				$input_array['value'] = $pdata['fname'];
			}else{
				$input_array['placeholder'] = 'First Name';
			}
			
			echo form_input($input_array);

			$input_array = array('type' => 'text', 'name' => 'mname', 'class' => 'initial');
			if(isset($pdata['mname']) && (!$pdata['mname'] == '' )){
				$input_array['value'] = $pdata['mname'];
			}else{
				$input_array['placeholder'] = 'Middle Initial';
			}
			echo form_input($input_array);

			$input_array = array('type' => 'text', 'name' => 'lname', 'class' => 'name');
			if(isset($pdata['lname']) && (!$pdata['lname'] == '' )){
				$input_array['value'] = $pdata['lname'];
			}else{
				$input_array['placeholder'] = 'Last Name';
			}
			echo form_input($input_array);
			
			echo "<div class='option_group'>";
			echo "<label>Date Of Birth</label>";
			
			echo "<div class='option_left'>";
			$dob_month = array(
				null => '',
				1 => 'January',
				2 => 'February',
				3 => 'March',
				4 => 'April',
				5 => 'May',
				6 => 'June',
				7 => 'July',
				8 => 'August',
				9 => 'September',
				10 => 'October',
				11 => 'November',
				12 => 'December'
			);
			$placeholder = isset($pdata['dob_month'])? $pdata['dob_month'] : '';
			echo "<label>Month</label>".form_dropdown('dob_month', $dob_month, $placeholder);
			
			echo "</div>";
			echo "<div class='option_left'>";
			
			$dob_day[null] = '';
			for($n=1; $n<=31;$n++){
				$dob_day[$n] = $n;
			}
			$placeholder = isset($pdata['dob_day'])? $pdata['dob_day'] : '';
			echo "<label>Day</label>".form_dropdown('dob_day', $dob_day, $placeholder);
			
			echo "</div>";
			echo "<div class='option_left'>";
			
				$dob_yr[null] = '';
				for($n=date('Y'); $n>=1920;$n--){
					$dob_yr[$n] = $n;
				}
				$placeholder = isset($pdata['dob_yr'])? $pdata['dob_yr'] : '';
				echo "<label>Year</label>".form_dropdown('dob_yr', $dob_yr, $placeholder);
			
			echo "</div>";

			echo "</div>";
			echo "<div class='clear'></div>";

			$input_array = array('type' => 'text', 'name' => 'SSN',  'class' => 'numeric');
			if(isset($pdata['SSN']) && (!$pdata['SSN'] == '' )){
				$input_array['value'] = $pdata['SSN'];
			}else{
				$input_array['placeholder'] = 'SSN';
			}
			echo form_input($input_array);

			
			echo "<br />";

			$input_array = array('type' => 'text', 'name' => 'VirtOXID', 'class' => 'numeric');
			if(isset($pdata['VirtOXID']) && (!$pdata['VirtOXID'] == '' )){
				$input_array['value'] = $pdata['VirtOXID'];
			}else{
				$input_array['placeholder'] = 'VirtOXID';
			}
			echo form_input($input_array);

			$input_array = array('type' => 'text', 'name' => 'shipping_Addr', 'class' => 'address');
			if(isset($pdata['shipping_Addr']) && (!$pdata['shipping_Addr'] == '' )){
				$input_array['value'] = $pdata['shipping_Addr'];
			}else{
				$input_array['placeholder'] = 'Shipping Address';
			}
			echo form_input($input_array);

			$input_array = array('type' => 'text', 'name' => 'city', 'class' => 'name');
			if(isset($pdata['city']) && (!$pdata['city'] == '' )){
				$input_array['value'] = $pdata['city'];
			}else{
				$input_array['placeholder'] = 'City';
			}
			echo form_input($input_array);
			$state_list = array(null => 'Select a State',
						'AL'=>"Alabama",  
						'AK'=>"Alaska",  
						'AZ'=>"Arizona",  
						'AR'=>"Arkansas",  
						'CA'=>"California",  
						'CO'=>"Colorado",  
						'CT'=>"Connecticut",  
						'DE'=>"Delaware",  
						'DC'=>"District Of Columbia",  
						'FL'=>"Florida",  
						'GA'=>"Georgia",  
						'HI'=>"Hawaii",  
						'ID'=>"Idaho",  
						'IL'=>"Illinois",  
						'IN'=>"Indiana",  
						'IA'=>"Iowa",  
						'KS'=>"Kansas",  
						'KY'=>"Kentucky",  
						'LA'=>"Louisiana",  
						'ME'=>"Maine",  
						'MD'=>"Maryland",  
						'MA'=>"Massachusetts",  
						'MI'=>"Michigan",  
						'MN'=>"Minnesota",  
						'MS'=>"Mississippi",  
						'MO'=>"Missouri",  
						'MT'=>"Montana",
						'NE'=>"Nebraska",
						'NV'=>"Nevada",
						'NH'=>"New Hampshire",
						'NJ'=>"New Jersey",
						'NM'=>"New Mexico",
						'NY'=>"New York",
						'NC'=>"North Carolina",
						'ND'=>"North Dakota",
						'OH'=>"Ohio",  
						'OK'=>"Oklahoma",  
						'OR'=>"Oregon",  
						'PA'=>"Pennsylvania",  
						'RI'=>"Rhode Island",  
						'SC'=>"South Carolina",  
						'SD'=>"South Dakota",
						'TN'=>"Tennessee",  
						'TX'=>"Texas",  
						'UT'=>"Utah",  
						'VT'=>"Vermont",  
						'VA'=>"Virginia",  
						'WA'=>"Washington",  
						'WV'=>"West Virginia",  
						'WI'=>"Wisconsin",  
						'WY'=>"Wyoming");
			$placeholder = isset($pdata['state'])? $pdata['state'] : '';
			echo form_dropdown('state', $state_list, $placeholder);

			$input_array = array('type' => 'text', 'name' => 'zip',  'class' => 'numeric');
				if(isset($pdata['zip']) && (!$pdata['zip'] == '' )){
					$input_array['value'] = $pdata['zip'];
				}else{
					$input_array['placeholder'] = 'Zipcode';
				}
			echo form_input($input_array);
			echo "<br />";

			$input_array = array('type' => 'text', 'name' => 'phone', 'class' => 'numeric');
				if(isset($pdata['phone']) && (!$pdata['phone'] == '' )){
					$input_array['value'] = $pdata['phone'];
				}else{
					$input_array['placeholder'] = 'Phone Number';
				}
			echo form_input($input_array);
			echo "<br /><hr>";
			echo "<label>Gender</label>";
			$options = array(null => '', 'M' => 'Male', 'F' => 'Female');
			$placeholder = isset($pdata['gender'])? $pdata['gender'] : '';
			echo form_dropdown('gender', $options, $placeholder);
			
			$feet_options[null] = '';
			for($n=0; $n<=9;$n++){
				$feet_options[$n] = $n;
			}
			$placeholder = isset($pdata['height_ft'])? $pdata['height_ft'] : '';
			echo "<label>Height (feet)</label>".form_dropdown('height_ft', $feet_options, $placeholder);
			$inch_options[null] = '';
			for($n=0; $n<=12;$n++){
				$inch_options[$n] = $n;
			}
			$placeholder = isset($pdata['height_inch'])? $pdata['height_inch'] : '';
			echo "<label>Height (inches)</label>".form_dropdown('height_inch', $inch_options, $placeholder);


			$input_array = array('type' => 'text', 'name' => 'weight', 'class' => 'numeric');
				if(isset($pdata['weight']) && (!$pdata['weight'] == '' )){
					$input_array['value'] = $pdata['weight'];
				}else{
					$input_array['placeholder'] = 'Weight (lbs)';
				}
			echo form_input($input_array);
			echo "<br />";

			$neck_options[null] = '';
			$f = .5;
			for($n=10; $n<=30;$n = $n + $f){
				$neck_options[$n] = $n;
			}
			$placeholder = isset($pdata['neck'])? $pdata['neck'] : '';
			echo "<label>Neck Size</label>".form_dropdown('neck', $neck_options, $placeholder);
			
			echo "<br />";

			$insurance_options[null] = '';
			foreach($insurance as $i){
				$insurance_options[$i->id] = $i->Name;
			}

			$placeholder = isset($pdata['insurance'])? $pdata['insurance'] : '';
			echo "<label>Insurance</label>".form_dropdown('insurance', $insurance_options, $placeholder);

			$input_array = array('type' => 'text', 'name' => 'ins_id', 'class' => 'numeric');
				if(isset($pdata['ins_id']) && (!$pdata['ins_id'] == '' )){
					$input_array['value'] = $pdata['ins_id'];
				}else{
					$input_array['placeholder'] = 'Insurance ID';
				}
			echo form_input($input_array);
			echo "<br />";
			
			echo form_submit(  array('name' => 'newPatient', 'class' => 'btn btn-primary btn-large', 'value'=>'Add New Patient!'));
			
		?>
    </div> <!-- /container -->

   


<?php $this->load->view('html/footer_view'); ?>