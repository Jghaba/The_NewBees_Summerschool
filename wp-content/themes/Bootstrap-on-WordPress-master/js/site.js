console.log("string");
function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;
  
    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
  
    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
  
    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
  }

function create_request(r_company, r_employee){
    jQuery.ajax({
      type: "POST",
      action: "request",
      data: {company:r_company, employee:r_employee},
      
    success: function (obj, textstatus) {
                  if( !(false) ) {
                      yourVariable = obj.result;
                  }
                  else {
                      console.log(obj.error);
                  }
            } 
});}

function mark_as_seen(notification_id){
  jQuery.ajax({
    type: "POST",
    action: "mark_as_seen",
    data: {notif_id:notification_id},
});} 
//ok deci la onclick, apelez la functia asta in js, care trimite o cerere la fucntia aia din php, care creeaza postarea
