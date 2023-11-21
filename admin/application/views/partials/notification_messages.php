<div class="container">
	<div class="row">	
		<div class="">
			<?php if ( $this->session->flashdata('flash_success_msg') != '' ){ ?>
			    <div class="success-msg"><i class="fa fa-check fa-lg"></i>&nbsp;&nbsp;<?php echo $this->session->flashdata('flash_success_msg'); ?></div>
			<?php } else if ( $this->session->flashdata('flash_error_msg') != '' ){ ?>
			    <div class="error-msg"><i class="fa fa-exclamation-triangle fa-lg"></i>&nbsp;&nbsp;<?php echo $this->session->flashdata('flash_error_msg'); ?></div>
			<?php } else{ }?>
			
			<?php if ( isset($success_notification_msg) ){ ?>
			    <div class="success-msg"><i class="fa fa-check fa-lg"></i>&nbsp;&nbsp;<?php echo $success_notification_msg; ?></div>
			<?php  } else if ( isset($error_notification_msg) ){ ?>
			    <div class="error-msg"><i class="fa fa-exclamation-triangle fa-lg"></i>&nbsp;&nbsp;<?php echo $error_notification_msg; ?></div>
			<?php } else { }?>
		</div>
	</div>
</div>