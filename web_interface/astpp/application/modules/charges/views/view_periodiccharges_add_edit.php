<?php include(FCPATH.'application/views/popup_header.php'); ?>
<script type="text/javascript">
    $("#submit").click(function(){
        submit_form("charges_form");
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
            <div style="color:red;">
             <?php echo $form; ?>
                <?php if (isset($validation_errors)) echo $validation_errors; ?> 
            </div>
           
        </div>      
    </section>
  </div>
</div>
