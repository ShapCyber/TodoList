<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<form id="addNewTaskForm" class="form-horizontal">
  <fieldset>    
	   <div class="form-group">
      <input type="hidden" name="selectTask">
      <label for="inputTitile" class="col-lg-4 control-label">Title</label>
      <div class="col-lg-6">
        <input type="text" name="inputTitile" class="form-control" id="inputTitile" placeholder="Todo Title ..." required>
      </div>
    </div>      
      
      <div class="form-group">
      <label class="col-lg-4 control-label">Priority</label>
      <div class="col-lg-6">
        <div class="radio">
          <label>
            <input type="radio" name="priorityOption"  value="High" checked="">
            High
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="priorityOption"  value="Medium">
            Medium
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="priorityOption"  value="Low">
            Low
          </label>
        </div>
      </div>
    </div>
    
    
    <div class="form-group">
      <label for="inputDateTime" class="col-lg-4 control-label">DateTime</label>
      <div class="col-lg-6">
        <input type="text" name="inputDateTime" class="form-control" id="inputDateTime" readonly placeholder="Datetime ...">
      </div>
    </div>
    
    <div class="form-group">
      <label for="inputWeek" class="col-lg-4 control-label">Week Of Year</label>
      <div class="col-lg-6">
            <select name="inputWeek" id="inputWeek" class="form-control" required>
		   <option value="">Select Week Number</option>
       	<?= PrintWeekNumber(); ?>
       </select>
       
      </div>
    </div> 
    
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-3">
        <button type="reset" id="cancel" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" data-action="AddNew" class="submitdata btn btn-primary">Add New</button>
         </div>
    </div>
  </fieldset>
</form>
