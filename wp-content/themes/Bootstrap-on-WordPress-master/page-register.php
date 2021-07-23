<?php BsWp::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<div style="text-align:center"> 
    <input type=button onClick="location.href='http://localhost/customer-registration/'" value='For Customers'> 
    <input type=button onClick="location.href='http://localhost/employee-registration/'" value='For Employees'> 
    <input type=button onClick="location.href='http://localhost/company-registration/'" value='For Companies'> 
</div>

<?php BsWp::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>