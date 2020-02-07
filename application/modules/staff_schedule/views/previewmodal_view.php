<form class="my_common_form">
	<div class="form-group">
	  <label>Staff Member</label>
	  
	  <?php if(!empty($staffsel))
			{ 
		      foreach ($staffsel as $key => $values) 
				{?>
	  <div class="staf_m_n"><?php echo $values['first_name']." ".$values['last_name']; ?></div>
	   <?php 
			}
			}?>
	</div>
	<div class="form-group">
	  <label>Email:</label>
	  <div class="email_preview_box">
	  <div class="body_message">
		<p>
		 <?php echo $body; ?></p>
	  </div>
	 <div><?php echo $html; ?></div>
	
	  </div>
	</div>
  </form>