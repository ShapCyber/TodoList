/*
TeeLog common function that will useful for futher development
*/
//=============
var CommonKlasses=function(){
//let find out if we are on localhost or remote 
CommonKlasses.prototype.WhichUrl = function(){
var TeeLogAppUrl;	
var TeeLogAppHost=location.protocol+'//'+window.location.hostname+'/';
if(TeeLogAppHost.includes("localhost/")){
TeeLogAppUrl=TeeLogAppHost+"TodoList";
}
else
{
TeeLogAppUrl=TeeLogAppHost;
}
return TeeLogAppUrl;
};	
//=======================================
//
//
//==============Print Error Message=======================
CommonKlasses.prototype.ShowErrors = function(parenTs,Text){
parenTs.find(".ShowMessage").show("slide").html("<span class='label label-danger'>"+Text+"</span>");	
};
//=================Print Success Message====================
CommonKlasses.prototype.ShowSuccess = function(parenTs,Text){
parenTs.find(".ShowMessage").show("slide").html("<span class='label label-success'>"+Text+"</span>");
setTimeout(function(){
parenTs.find(".ShowMessage").hide("slide");	
},3000);
};

//==============================
//
//
};
//============
//Scroll page Function
//===========
$.fn.scrollTubView = function () {
return this.each(function () {
$('html, body').animate({
scrollTop: $(this).offset().top
}, 1000);
});
};
//=================
//
//=========================
function AddZero(i) {
    if (i < 10) {i = "0" + i;}  // add zero in front of numbers < 10
    return i;
}
//
//=====================================
 // Set clock to run using  momenTId
 //=====================================
function startTime(){
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds(); 
//====================	 
    m = AddZero(m);
    s = AddZero(s);
    h = AddZero(h);
  //==================
   var weekday = new Array(7);
    weekday[0] = "Sunday";
    weekday[1] = "Monday";
    weekday[2] = "Tuesday";
    weekday[3] = "Wednesday";
    weekday[4] = "Thursday";
    weekday[5] = "Friday";
    weekday[6] = "Saturday";
	var nday = weekday[today.getDay()];
	var dDt= today.getUTCDate();
	 //===========
   var Perid;
   if (h === "00") {Perid= "It is a new Day !";} 
   else if (h < "12") {Perid= "Good Morning !";} 	 
   else if (h >= "12" && h < "17") {Perid= "Good Afternoon !";} 
   else if (h >= "17" && h < "21") {Perid= "Good Evening !";} 
   else if (h >= "21") {Perid= "We are in late night !"; }
   var TimeStake=document.getElementById("momenT");  
   var AdatesNtime="<span>It&acute;s  "+nday+"  "+dDt+" @    "+ h + ":" + m + ":" + s+ "   "+Perid+"</span>";
   TimeStake.innerHTML =AdatesNtime;	 
   setTimeout(startTime, 500);
}

//==================
//
//
//
//==================================
(function(){
//Initiating CommonKlasses
var 
TeeLogClass=new CommonKlasses(),
//Action to take such Add and update
actionToTake,
//Get Location Url
urlNow=TeeLogClass.WhichUrl();
//Show Clock
if($("#momenT").length){
startTime();
}
//=====================
 $("a[href='#']").click(function(e) {
    e.preventDefault();
  });
//=================
$(".submitdata").click(function(event) {
event.preventDefault();
//Getting Required Variables
var 
actionType= $(this).data('action'),
TaskTitle = $("input#inputTitile").val(),
parenTs=$(this).parents("div.modal-content"),
//TaskPriority = $("input[name='priorityOption']").val(),
TaskWeekNumber = $("select#inputWeek").val(),
TaskDateTime = $("input#inputDateTime").val();
//===============
var checkTimeIsAdded=TaskDateTime.split("@");
//Form Validation happen Here Before send
if(TaskTitle ==="")
{
//print errors via our 	CommonKlasses()
TeeLogClass.ShowErrors(parenTs,"Add Valid Title");
return;//stop runing
}
//
//
else if(TaskDateTime ==="")
{
//print errors via our 	CommonKlasses()
TeeLogClass.ShowErrors(parenTs,"Select DateTime");
return;//stop runing
}
//
//checkTimeIsAdded
else if(checkTimeIsAdded[1] ==="00:00")
{
//print errors via our 	CommonKlasses()
TeeLogClass.ShowErrors(parenTs,"Select Valid Time");
return;//stop runing
}
else if(TaskWeekNumber ==="")
{
//print errors via our 	CommonKlasses()
TeeLogClass.ShowErrors(parenTs,"Select Week Number");
return;//stop runing
}
//
//

//here we want to detect which control method to use	
switch(actionType){
case "AddNew":
actionToTake="/todomanager/add";
break;
case "Update":
actionToTake="/todomanager/update";	
break;
}
//== Reaching controller with Jquery Ajax
 $.ajax({
 type: "POST",
 dataType: 'text',
  url: urlNow+actionToTake,
  cache: false,    
  data: $('form#addNewTaskForm').serialize(),
  success: function(data){      
 TeeLogClass.ShowSuccess(parenTs,data);
  },
  error: function(MLHttpRequest, textStatus, errorThrown){      
  TeeLogClass.ShowErrors(parenTs,"There is   "+textStatus+"  See >>  "+errorThrown);
  }
 });
//================
});
//=========here we want to update status
//
//
//
//==================================
$("span[data-task-id]").click(function(event) {
event.preventDefault();
var
IdToUp=$(this).data("task-id"),
parenTs=$(this).parents("li"),
actionType=$(this).attr("class");
//here we want to detect which control method to use	
switch(actionType){
case "done":
actionToTake="/todomanager/updateStatus";
break;
case "remove":
actionToTake="/todomanager/delete";	
break;
}
//=====================
//== Reaching controller with Jquery Ajax
 $.ajax({
type: "POST",
url: urlNow+actionToTake,
cache: false,   
dataType: 'text',
data: {id:IdToUp},
success: function(json){      
TeeLogClass.ShowSuccess(parenTs,json);
switch(actionType){
case "done":
parenTs.addClass("complete");	
break;
case "remove":
parenTs.remove();	
break;
}
//=====================  
},
  error: function(MLHttpRequest, textStatus, errorThrown){      
 TeeLogClass.ShowErrors(parenTs,"There is   "+textStatus+"  See >>  "+errorThrown);
  }
 });
//
//
//
//==========================
});
//===========selectTask=======================
//=========here we want to update status
//
//
//
//==================================
$("#selectTask").on("change",function(event) {
event.preventDefault();
//change the submit button to update button
$("button[data-action='AddNew']").attr("data-action", "Update").text("Update");
var
IdToGet=$(this).val(),
parenTs=$(this).parents("div.modal-content");
//=====================
//== Reaching controller with Jquery Ajax
 $.ajax({
 type: "GET",
 url: urlNow+"/todomanager/getTask",
 cache: false,  
 dataType: 'json',
 data: {id:IdToGet},
 success: function(json){ 
 var 
taskTitle=json.taskTitle,
taskPriority=json.taskPriority,
dateTime=json.dateTime,
businessWeekId=json.businessWeekId;
$("input#inputTitile").val(taskTitle);
$("input[value="+taskPriority+"]").prop("checked",true);
$("input#inputDateTime").val(dateTime);
$("select#inputWeek").val(businessWeekId);
$("input[name='selectTask']").val(IdToGet);
TeeLogClass.ShowSuccess(parenTs, "Data ready to send see form display");
},
  error: function(MLHttpRequest, textStatus, errorThrown){      
 TeeLogClass.ShowErrors(parenTs,"There is   "+textStatus+"  See >>  "+errorThrown);
  }
 });
//
//
//
//==========================
});
//
//Change button from update button to AddNew Button
// If not set for AddNew Button
$("#cancel").click(function(event) {
event.preventDefault();
$('form#addNewTaskForm').trigger('reset');
$("button[data-action='Update']").attr("data-action", "AddNew").text("Add New");
});
//
//
//
//Close the jquery ready here
//
//==================================
})();
//==================================
//
//
//
//
//==================================
