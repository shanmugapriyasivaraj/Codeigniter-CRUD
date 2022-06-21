<?php 
class Employee_controller extends CI_Controller {
	public function __construct(){	
		parent::__construct(); 
		$this->load->library('session');	
        $this->load->helper(array('form', 'url'));	
		$this->load->library('form_validation');
		$this->load->model('CrudModel');
		// $this->load->model('DatatableModel');
		// $this->load->model('UploadFileModel');
	}

public function login(){
    $this->load->view('employee_login');
}
public function registration(){
	$this->load->view('registration');

}
public function addRegistration(){
//   print_r($_POST);
	$responseArray = array();
	$responseArray["response_status"]="failed";

	$name =  $this->input->post("name");
	$email =  $this->input->post("email");  
	$password =  $this->input->post("password");
	
	$data = array(
		"employee_name"=>$name,
		"employee_email"=>$email,
		"employee_password" =>$password
	  ); 
	   $addEmployee=$this->CrudModel->insert('employee',$data);
	   $responseArray["response_status"]="success";

	   echo json_encode($responseArray);
	   
}
public function verify_login(){
	$responseArray = array();
	$responseArray["response_status"]="failed";

	
    //print_r($_POST);
  $email =  $this->input->post("emailId");  
  $password =  $this->input->post("password"); 
  $where = array(
	"employee_email"=>$email,
  ); 
   $isEmailExist=$this->CrudModel->get('employee',$where);
   //print_r($isEmailExist);
   if($isEmailExist == false){

	$responseArray["message"]="Email id not found";
	
   } else{
	foreach($isEmailExist as $isEmailExist){
		if($password == $isEmailExist['employee_password']){
			$responseArray["response_status"]="success";
			$responseArray["message"]="Logged in successfully";
		}
		else{
			$responseArray["message"]="password not correct";
		}
	}
   }
   echo json_encode($responseArray);
}
}
?>