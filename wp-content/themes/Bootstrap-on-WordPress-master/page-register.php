<?php BsWp::get_template_parts( array( 'parts/shared/html-header' ) ); ?>
<?php
function get_p_style(){
  return 'custom-register-style';
}
?>

<div class="tab" style="display: flex;">
  <button class="tablinks active" onclick="openCity(event, 'For Customers')" style="flex: 1 1 0%;">For Customers</button>
  <button class="tablinks" onclick="openCity(event, 'For Employees')" style="flex: 1 1 0%;">For Employees</button>
  <button class="tablinks" onclick="openCity(event, 'For Companies')" style="flex: 1 1 0%;">For Companies</button>
</div>

<!-- Tab content -->
<div id="For Customers" class="tabcontent" style="display:block;">
  <?php echo do_shortcode('[user_registration_form id="22"]'); ?>
</div>

<div id="For Employees" class="tabcontent">
  <?php echo do_shortcode('[user_registration_form id="23"]'); ?>
</div>

<div id="For Companies" class="tabcontent" style="color: #000;">
  <?php echo do_shortcode('[user_registration_form id="21"]'); ?>
</div>
<?php BsWp::get_template_parts( array('parts/shared/html-footer') ); ?>

