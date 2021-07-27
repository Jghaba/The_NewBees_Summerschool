
jQuery(function($){
    // jQuery here
});

function create_request(company, employee){
    jQuery.ajax({
        type: "POST",
    url: '../functions.php',
    dataType: 'json',
    data: {functionname: 'add', arguments: [1, 2]},

    success: function (obj, textstatus) {
                  if( !('error' in obj) ) {
                      yourVariable = obj.result;
                  }
                  else {
                      console.log(obj.error);
                  }
            }
});
}

//ok deci la onclick, apelez la functia asta in js, care trimite o cerere la fucntia aia din php, care creeaza postarea