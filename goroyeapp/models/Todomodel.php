<?php
	class Todomodel extends CI_Model{
		
		//we first load the database here
		public function __construct(){
			$this->load->database();
		}
		
		public function addNewTask(){
			// Task List  data array
			$data = array(
				'businessWeekId' => $this->input->post('inputWeek'),
				'taskTitle' => $this->input->post('inputTitile'),
                'dateTime' => $this->input->post('inputDateTime'),
                'taskPriority' => $this->input->post('priorityOption')
			);
			//========Insert New Task=====			
			$SaveTask = $this->db->insert('taskposts', $data);
			//Before creating the category week , we want to check if is not alreay exist
			$query = $this->db->get_where('businessweek', array('name' => $this->input->post('inputWeek')));
			//Check if Insert New Task success and that we don't have category set
			if($SaveTask && !$CheckWeek=$query->result_array()){
			// Set bussinessWeek Number as category 
			//because  we will be printing task on weekly
			$SaveTaskDone =$this->db->insert('businessweek', array('name' => $this->input->post('inputWeek')));
			return true; 	
			}	
			elseif($SaveTask && $CheckWeek){
			// no need to set new cetegory
			return true; 				
			}
			return false;
		    }
	
		
		
		//=========================================
		//get all list from database
		public function getTaskList($name = FALSE){
		//here we can print all task without categorizing them
		if($name === FALSE){
		$query = $this->db->get('taskposts');
		if(!$returnData=$query->result_array()){
			return("<span class='label label-warning'>No Data To Load, Database is empty</span>");	
		}
		return $returnData;
		}
			
			
		//here we print base on week number as category	
		$this->db->order_by('taskposts.taskId', 'DESC');
		$this->db->join('businessweek', 'businessweek.name = taskposts.businessWeekId');
		$query = $this->db->get_where('taskposts', array('businessWeekId' => $name));
		if(!$returnData=$query->result_array()){
		return("<span class='label label-warning'>No Data To Load, Database is empty</span>");
		}
		return $returnData;			
		}
		
		
		//get all list category  from database
		public function getTaskByWeek(){
		$query = $this->db->get('businessweek');
		if(!$returnData=$query->result_array()){
			return("<span class='label label-warning'>No Data To Load, Database is empty</span>");
		}
		return $returnData;			
		}
		
		
		//Update tasklist to is complete
		public function updateTaskStatus($id){
		$query = $this->db->get_where('taskposts', array('taskId' => $id));
		if(!$returnData=$query->row_array()){
			return("<span class='label label-warning'>No Such Data In Database </span>");
		}
		// Task List  data array
			$data = array(
				'businessWeekId' => $returnData['businessWeekId'],
				'taskTitle' => $returnData['taskTitle'],
                'dateTime' => $returnData['dateTime'],
                'taskPriority' => $returnData['taskPriority'],
				'taskStatus' => 1 );	
		$this->db->where('taskId', $id);
		$updateRow=$this->db->update('taskposts', $data);
		if ($updateRow)
         {
        return(true);
         }
       else
         {
         return(false);
         }	
			
		}
//=========================
		
		
		//Update tasklist 
		public function updateTask($id){
		$query = $this->db->get_where('taskposts', array('taskId' => $id));
		if(!$returnData=$query->row_array()){
			return("<span class='label label-warning'>No Such Data In Database </span>");
		}
		// Task List  data array
		$data = array(
				'businessWeekId' => $this->input->post('inputWeek'),
				'taskTitle' => $this->input->post('inputTitile'),
                'dateTime' => $this->input->post('inputDateTime'),
                'taskPriority' => $this->input->post('priorityOption'),
				'taskStatus' => $returnData['taskStatus'] );	
		$this->db->where('taskId', $id);
		$updateRow=$this->db->update('taskposts', $data);
		if ($updateRow)
         {
        return(true);
         }
       else
         {
         return(false);
         }	
			
		}
		
		
		//Update tasklist 
		public function deleteTask($id){
		$query = $this->db->get_where('taskposts', array('taskId' => $id));
		if(!$returnData=$query->row_array()){
			return("<span class='label label-warning'>No Such Data In Database </span>");
		}
		$this->db->where('taskId', $id);
		$updateRow=$this->db->delete('taskposts', array('taskId' => $id));
		if ($updateRow)
         {
        return(true);
         }
       else
         {
         return(false);
         }	
			
		 }
		
		//get  tasklist by Id
		public function getTaskById($id){
		$query = $this->db->get_where('taskposts', array('taskId' => $id));
		if(!$returnData=$query->row_array()){
			return("<span class='label label-warning'>No Such Data In Database </span>");
		}
		// Generat and print Task List array
		
			$ArrayData=array();
            $ArrayData["businessWeekId"]=$returnData['businessWeekId']; 
            $ArrayData["taskTitle"]= $returnData['taskTitle'];
            $ArrayData["dateTime"]=$returnData['dateTime']; 
            $ArrayData["taskPriority"]= $returnData['taskPriority'];

            $jsonData = json_encode($ArrayData);
	
		    return $jsonData;
			
		 }
//=======================
//
// End of Todomanger
//================
	}