var requirejs;
requirejs.config({
    "paths": {
      "jquery": "https://code.jquery.com/jquery-1.11.3.min",
      "moment": "moment",
      "daterangepicker": "daterangepicker"
    }
});

requirejs(['jquery', 'daterangepicker'] , function ($,moment) {
$(document).ready(function() {
//==========
//
//
var todayDate = new Date();
	var day = todayDate.getUTCDay();
    var month = todayDate.getUTCMonth();    
    var year = todayDate.getFullYear(); 
//==============
$('#inputDateTime').daterangepicker({
    "singleDatePicker": true,
    "showDropdowns": true,
    "showWeekNumbers": true,
    "showISOWeekNumbers": true,
    "timePicker": true,
    "timePicker24Hour": true,
	 "minDate": day+"-"+month+"-"+year,
   	"locale": {
    "direction": "ltr",
    "format": "DD-MM-YYYY@HH:mm"
	}

});
});
});
