<?php
class Todopages extends CI_Controller {

        public function view($todo = 'home')
        {


        	if ( ! file_exists(APPPATH.'views/todopages/'.$todo.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
		//$data['tasks'] =$this->Todomodel->getTaskList(FALSE);	
        $data['title'] = ucfirst($todo); 
        $data['AppName'] ="TeeLog"; 
		$data["SiteDescription"]="<h3>Simple Todo List App. The easiest way  to plan, organize, and track daily assignments.</h3>";
        $this->load->view('header', $data);
        $this->load->view('todopages/'.$todo, $data);
        $this->load->view('footer', $data);
        }
}