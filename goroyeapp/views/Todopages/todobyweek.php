<?php 
$ByWeeks=$this->Todomodel->getTaskByWeek();
if(!is_array($ByWeeks)):
echo($ByWeeks);
else: 
foreach($ByWeeks as $ByWeek) :
$weekName=$ByWeek['name'];
?>
<div class="panel panel-primary">
<div class="panel-heading">
    <h3 class="panel-title"><?php echo $weekName ?></h3>
  </div>
 <div class="panel-body">
<div class="list-group table-of-contents">
 <ul id="toDolist">
 <?php 
$tasks=$this->Todomodel->getTaskList($weekName);
if(!is_array($tasks)):
echo($tasks);
else: 
foreach($tasks as $task) :
$Status="";
//check if task is completed
//status complete will be 1 default is 0 
if($task['taskStatus'] > 0):
$Status="complete";	
endif;
//print date and time
$dateTime=$task['dateTime'];
$upd =explode("@", (string)$dateTime);
$Date=$upd[0];
$Time=$upd[1];
?>
<li class="list-group-item <?php echo $Status; ?>" data-priority="<?php echo strtolower($task['taskPriority']) ?>">
<span class="ShowMessage" ></span> 
<div class="controls">
<!--Assign TaskId to these span for task list update and delet via AjaxCall-->
 <span class="done" data-task-id="<?php echo $task['taskId']; ?>"><i class="fa fa-check-square" ></i></span>
 <span class="remove"  data-task-id="<?php echo $task['taskId']; ?>"><i class="fa fa-minus-square" ></i></span> 
 </div>
<span class="text"><?php echo $task['taskTitle']; ?></span>
  <br/>
<span class="metadata"><i class="fa fa-calendar" ></i> <?php echo $Date; ?> <span class="badge"><?php echo $Time; ?></span></span> 
 </li>
 <?php endforeach; endif;?>
</ul>
</div>
</div>
</div>
<?php endforeach; endif;?>
