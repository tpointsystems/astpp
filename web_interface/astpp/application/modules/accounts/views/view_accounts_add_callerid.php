<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.7.1.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/facebox.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/flexigrid.js"></script>
<script type="text/javascript">
    $("#submit").click(function(){
        submit_form("callerid_form");
    })
 </script>   

<section class="slice gray no-margin">
 <div class="w-section inverse no-padding">
   <div>
     <div>
        <div class="col-md-12 no-padding margin-t-15 margin-b-10">
	        <div class="col-md-10"><b><? echo $page_title; ?></b></div>
	  </div>
     </div>
    </div>
  </div>    
</section>

<div>
  <div>
    <section class="slice color-three no-margin">
	<div class="w-section inverse no-padding">
            <div style="color:red;margin-left: 60px;">
                <?php if (isset($validation_errors)) echo $validation_errors; ?> 
            </div>
            <?php echo $form; ?>
        </div>      
    </section>
  </div>
</div>

