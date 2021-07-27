<?php BsWp::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>


<div class="tab">
  <button class="tablinks active" onclick="openCity(event, 'For Customers')">For Customers</button>
  <button class="tablinks" onclick="openCity(event, 'For Employees')">For Employees</button>
  <button class="tablinks" onclick="openCity(event, 'For Companies')">For Companies</button>
</div>

<!-- Tab content -->
<div id="For Customers" class="tabcontent" style="display:block;">
  
  <?php echo do_shortcode('[user_registration_form id="22"]'); ?>
</div>

<div id="For Employees" class="tabcontent">
  
  
  <?php echo do_shortcode('[user_registration_form id="23"]'); ?>
</div>

<div id="For Companies" class="tabcontent">
  
  
  <?php echo do_shortcode('[user_registration_form id="21"]'); ?>
</div>
<?php BsWp::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>