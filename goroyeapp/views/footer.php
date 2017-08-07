<?php
 // We keep the modal here so that it can be accessable any where
?>


<div class="container">
   <!-- Modal -->
  <div class="modal fade" id="TaskManager" role="dialog">
    
    <div class="modal-dialog"> 
       
      <!-- Modal content-->
      <div class="modal-content">
       <span class="ShowMessage" ></span> 
        <div class="modal-header">
           <h4 class="modal-title">Task Manager</h4> 			      
        </div>
        <div class="modal-body">
           <?php $this->load->view('todopages/addtolist');?>
        </div>
        <div id="taskManInfo" class="col-lg-12">The task manger let you add new task and update task.  Simply select task to manage from the dropdowm <br/> <strong class="">Select Task To Manage</strong></div>
        <div class="modal-footer">         
         <div class="form-group">     
      <div class="col-lg-10">
        <select class="form-control" id="selectTask">
         <option value="">Select Task To Manage</option>
         <?php 
			$tasks=$this->Todomodel->getTaskList(FALSE);
			if(!is_array($tasks)):
             ?>
			<option value=""><?php echo $tasks ?></option>
			<?php
			else:
			foreach($tasks as $task) :
			?>
          <option value="<?php echo $task['taskId']; ?>">&para;    <?php echo $task['taskTitle']; ?></option>
            <?php endforeach;  endif;?>
        </select>
       </div>
    </div> 
        </div>
      </div>
      
    </div>
  </div>
  
</div>
</div>
<?php
 // closed main view element here
//which is open in the views/header.php
?>
</div><?php // closed main wrapper element here ?>
 <footer class="footer">
 <div class="row">
 <div class="col-lg-12">
<ul class="list-unstyled">
<li class="pull-left"><a href="#">By Ade Owolabi</a></li>
<li class="pull-right"><a href="#top">Back to top</a></li>
<li><a href="<?php echo base_url(); ?>">Home</a></li>
<li><a href="#">RSS</a></li>
<li><a href="#">Twitter</a></li>
<li><a href="#">GitHub</a></li>
<li><a href="<?php echo base_url(); ?>help">Support</a></li>
</ul>
</div>
</div>
</footer>

<!--End all elements-->
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="<?php echo design_url();?>js/require.js" data-main="<?php echo design_url();?>js/datetime.js"></script>
<script type="text/javascript" src="<?php echo design_url();?>js/todo.js"></script>
</body>
</html>