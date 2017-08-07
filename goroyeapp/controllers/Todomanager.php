<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Todomanager extends CI_Controller {
	
	// Todomanager index page
       public function index(){
       $this->load->view("todopages/addtolist");
         }
	//=====================
	// function to add new task
	//=======================	
        public function Add()
        {
		$inputTitile = $this->input->post('inputTitile');
		$priorityOption = $this->input->post('priorityOption');       	
		$inputDateTime = $this->input->post('inputDateTime');
        $inputWeek = $this->input->post('inputWeek');	
		 	
		//==========Contact Todomodel To Add New Task
        if(!$result=$this->Todomodel->addNewTask())
        {
        $result= "There is an error adding new task";
        }
       else
        {
        $result ="New task added successfully";
        }
       echo $result;       

        }
	//=====================
	// function to update task list Status
	//=======================	
        public function updateStatus()
        {
		$result ="No Id Sent!";
		if(isset($_REQUEST["id"])){
		$id=$_REQUEST["id"];		
		if(!$result=$this->Todomodel->updateTaskStatus($id))
        {
        $result= "There is an error updating this  Task Status";
        }
       else
        {
        $result ="Task Status Updated successfully";
        }
       echo $result; 
        }
		}	
    //=====================
	// function to update task list
	//=======================	
        public function update()
        {
		$inputId= $this->input->post('selectTask');
		$inputTitile = $this->input->post('inputTitile');
		$priorityOption = $this->input->post('priorityOption');       	
		$inputDateTime = $this->input->post('inputDateTime');
        $inputWeek = $this->input->post('inputWeek');
			
		if(!$result=$this->Todomodel->updateTask($inputId))
        {
        $result= "There is an error updating this Task";
        }
       else
        {
        $result ="Task Updated successfully";
        }
       echo $result; 
        
        }
	
	//=====================
	// function to delete task list
	//=======================	
        public function delete()
        {
		$result ="No Id Sent!";
		if(isset($_REQUEST["id"])){
		$id=$_REQUEST["id"];		
		if(!$result=$this->Todomodel->deleteTask($id))
        {
        $result= "There is an error deleting task list";
        }
       else
        {
        $result ="Task Deleted  successfully";
        }
       echo $result; 
        }
        }
	//=====================
	// function to delete task list
	//=======================	
        public function getTask()
        {
		$result ="No Id Sent!";
		if(isset($_REQUEST["id"])){
		$id=$_REQUEST["id"];		
		if(!$result=$this->Todomodel->getTaskById($id))
        {
        $result= "There is an error getting the task";
        }       
        }
		 echo $result; 
        }
	
//=====================	
}//Todomanager
//====================