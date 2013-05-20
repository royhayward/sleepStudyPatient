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
		<p>This is the admin homepage content.</p>
		<p><strong>The database has <?php echo $users; ?> users.</strong></p>
		<p><strong>The database has <?php echo $patients; ?> patients.</strong></p>
    </div> <!-- /container -->

   


<?php $this->load->view('html/footer_view'); ?>