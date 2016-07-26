<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">    <title>
ASTPP - Open Source Voip Billing Solution</title>
<link rel="icon" href="<?php echo base_url(); ?>/assets/images/favicon.ico">

<link href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url() ?>assets/fonts/font-awesome-4.5.0/css/font-awesome.css" rel="stylesheet"/>
<link href="<?php echo base_url(); ?>/assets/css/global-style.css" rel="stylesheet" type="text/css">

<!-- IE -->
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/respond.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/respond.src.js"></script>
<!-- -->    

<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/module_js/generate_grid.js"></script>
<noscript>
<div id="noscript-warning">
ASTPP work best with JavaScript enabled
</div>
</noscript>

</script>

</head>
<? extend('master.php') ?>
<?php error_reporting(E_ERROR); ?>
<? startblock('extra_head') ?>
<body style="overflow-x:hidden;background:#343434 none repeat scroll 0% 0%;">

<section class="slice">
	<div class="w-section inverse">
		<div class="container">
			<div class="row">

<div class="col-md-4 col-md-offset-4">
				&nbsp;
			</div>
					<br/>
                    <br/>
                    <br/>
                    <br/>
					
                    <br/>
                    
                      <div class="col-lg-4 col-md-offset-4" >
          <div class="w-section inverse no-padding margin-t-20">                       
             <div class="w-box dark sign-in-wr box_shadow margin-b-10">
		    	<div class="col-md-12 no-padding">


	      <? if($this->session->userdata('userlevel_logintype') != '0'){?>
			<a class="col-md-9" href="<?php echo base_url();?>">
                	<img id="logo" alt="dashboard" src="<?php echo base_url();?>assets/images/logo.png">
	      <? } else{?> 
                	<a class="col-md-9" href="<?php echo base_url();?>user/user/">
                	<img id="logo" alt="user_logo" src="<?php echo base_url();?>assets/images/logo.png">
		<? }?>
                </a>
      
	
		<div class="col-md-3"><a href="<?php echo base_url();?>"><input type="submit" value="Login" name="Login" class="btn btn-success col-md-12"></a></div>
	
</div>


<div class="row">

<form class="form-light col-md-12 no-padding" action="<?php echo base_url(); ?>signup/successpassword/" method="post" accept-charset="utf-8" id="customer_form" name="customer_form">

<input type="hidden" name="email" value=<?php echo $email;?>>
<div class="col-md-12 margin-t-20 padding-r-32 padding-l-32">
<h3 style="color: #37A137 !important; padding: 0 0 10px;"><i class="fa fa-check-circle" style="color:#37A137;"></i> Your password successfully changed</h3>
</div> 
</form></div>				     

</div>  
</section>
</div>
</div>
</center>
</form>


</div></div></div>
</div></div></div>
</section>

</body>
</html>
<script type="text/javascript">
$("#country_id").val(<?=$country_id?>);
$("#timezone_id").val(<?=$timezone_id?>);
$("#currency_id").val(<?=$currency_id?>);
</script>
