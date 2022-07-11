<?php 
class Employee_controller extends CI_Controller {
	public function __construct(){	
		parent::__construct(); 
		$this->load->library('upload');
		$this->load->library('session');	

                $this->load->helper(array('form', 'url','sendemail','emailcontent'));	
		$this->load->library('form_validation');
		$this->load->model('CrudModel');

		
		$this->load->model('Crud_model');
		// $this->load->model('DatatableModel');
		// $this->load->model('UploadFileModel');
	}

public function login(){
    $this->load->view('employee_login');
}
public function registration(){
	$this->load->view('registration');

}
public function image(){
	$this->load->view('image');
}
public function uploading_file(){
	// if(isset($_FILES["img"]["name"])){
	// 	$config['upload_path']='./assets/uploads/';
	// 	// print_r($config['upload_path']);
	// 	// exit();
	// 	$config['allowed_types']='*';

	// 	$this->upload->initialize($config);
	// 	if(!$this->upload->do_upload("img")){
	// 		echo $this->upload->display_errors();
	// 	}else{
	// 		$data = array('img_upload' => $this->upload->data());
 
	// 		//  print_r($data);
	// 		//  exit();
	// 		 $image= $data['img_upload']['file_name']; 
	// 		 $img_data = array(
			 
	// 		   "image"=>$image
	// 		 );
	// 		 $result= $this->CrudModel->insert('image',$img_data);
			  
	// 		 echo '<img src="'.base_url().'assets/uploads/'.$image.'" width="300" height="225" class="img-thumbnail" />';  
	// 		 }  
	// 			}  
	

}

 



public function newPassword(){
	$this->load->view('newPassword');
}
public function forgetPassword(){
	// print_r($_POST);
	$responseArray = array();
	$responseArray["response_status"]="failed";


	$email =  $this->input->post("email");
	$where = array(
		"employee_email"=>$email,
	  ); 
	   $isEmailExist=$this->CrudModel->get('employee',$where);
	//    print_r($isEmailExist);

	   if($isEmailExist == false){

		$responseArray["message"]="Email id not found";
		
	   }else{
				$responseArray["message"]="Enter New password";
				$responseArray["response_status"]="success";
				//set session data of employee_id
				foreach($isEmailExist as $isEmailExist){
					$employee_id = $isEmailExist['employee_id'];
					// print_r($employee_id);
				$this->session->set_userdata("employee_id",$employee_id);
			// $check=	$this->session->userdata("employee_id");
			// echo ($check);
			// exit();
				}

			}
		
	   
	   echo json_encode($responseArray);
	}
public function new_password(){
	// print_r($_POST);
	$responseArray = array();
	$responseArray["response_status"]="failed";

	$new_Password =  $this->input->post("new_Password");

	$data = array(
	


		"employee_password" =>$new_Password
	  ); 
	  $employee_id=	$this->session->userdata("employee_id");
	  $where = array(
		"employee_id" =>$employee_id
	  );
	  $update_new_password=$this->CrudModel->update('employee',$data,$where);
	  if($update_new_password == false){
		$responseArray["message"]="failed to update password";
	  }else{
		$responseArray["message"]="password updated successfully";
		$responseArray["response_status"]="success";

	  }
	  echo json_encode($responseArray);
}

public function employee_update(){
	$this->load->view('employee_update');
}
public function home(){
	$where = array(
		"deleted" =>'0'
	);
	$data['result'] = $this->CrudModel->get('employee',$where);
	// print_r($data['result']);
	// exit();
		$this->load->view('home', $data);
}
public function firstPage(){
	$this->load->view('inc/header');
	$this->load->view('firstPage');
	$this->load->view('inc/footer');
}
public function edit($employee_id){
	
$where = array(
	"employee_id"=>$employee_id
);

	$getEmployeeDetails=$this->CrudModel->get('employee',$where);
	// print_r($getEmployeeDetails);
	$data = array(
		"employeeDetails"=>	$getEmployeeDetails);
	$this->load->view('employee_update',$data);

}

public function forget_password(){
	$this->load->view('forget_password');
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
	   if($addEmployee != false){
          $from_mail = "a@gmail.com";
          $to_mail = "s@gmail.com";
		  $subject =  "Registration Success Message";
		  
			$moduleFrom = "REGISTRATION SUCCESS-NOTIFICATION";
			$dataArray = array();
			$dataArray["userEmail"] =$email ;
			$dataArray["userPassword"] =$password ;
		    $dataArray["userName"] =$name;
			// print_r($dataArray);
	        // exit;
			$emailContentDataArray = array();
			$emailContentDataArray["dataArray"] = $dataArray;
			
			$message="";
			$message = getEmailContentForRegistrationSuccess($emailContentDataArray);
			echo $message;
			exit;
			$mailDataArray = array();
			$mailDataArray["toId"] = $to_mail;
			$mailDataArray["subject"] = $subject;
			$mailDataArray["message"] = $message;
			$mailDataArray["fromId"] = $from_mail;
			$mailDataArray["cc"] = "";
			$mailDataArray["cc2"] = "";
			
			//SEND EMAIL TO CUSTOMER
			$sentEmailResponseStatusObj = sendEmail($mailDataArray);	
			$responseArray["response_status"]="success";
	   }
  echo json_encode($responseArray);
}
public function single_employee(){
// print_r($data);
	$where = array(
		"employee_id"=>$logged_id
	);
	$view_details = $this->CrudModel->get('employee',$where);
		

		$data= array(
			"view_employee_details"=>$view_details
		);
		$this->load->view('single_employee',$data);

		
}
public function verify_login(){
	$responseArray = array();
	$responseArray["response_status"]="failed";


	
    //print_r($_POST);
  $email =  $this->input->post("emailId");  
  $password =  $this->input->post("password"); 
  
  $where = array(
	"employee_email"=>$email
  ); 
   $isEmailExist=$this->CrudModel->get('employee',$where);
//    print_r($isEmailExist);
   if($isEmailExist == false){

	$responseArray["message"]="Email id not found";
	
   } else{
	foreach($isEmailExist as $isEmailExist){
		if($password == $isEmailExist['employee_password']){
    			$responseArray["response_status"]="success";
			$responseArray["message"]="Logged in successfully";
			
			

			$employee_id = $isEmailExist['employee_id'] ;
			// print_r($employee_id);
			$this->session->set_userdata("loggedin_emp_id",$employee_id);
		
			// print_r($data);
		
		}
		else{
			$responseArray["message"]="password not correct";
		}
	}
   }
   echo json_encode($responseArray);
}
public function update_details(){
	// print_r($_POST);

	$responseArray = array();
	$responseArray["response_status"]="failed";

	$employee_id=$this->input->post("employee_id");
    $name = $this->input->post("name");
    $email = $this->input->post("email");

$data = array(
	"employee_name" => $name,
	"employee_email"=>$email
);
$where = array(
	"employee_id"=>$employee_id);
  $update_details=$this->CrudModel->update('employee',$data,$where);
//   print_r($update_details);
  if($update_details == false){
	$responseArray["message"]="failed to update ";
  }else{
	$responseArray["message"]="updated successfully";
	$responseArray["response_status"]="success";

  }
  echo json_encode($responseArray);
}
public function deleteEmployee($employee_id){
	
	$where = array(
		"employee_id"=>$employee_id
	);
	$data = array(
		"deleted" =>'1'
	);
	$deleteEmployee= $this->CrudModel->update('employee',$data,$where);
	// print_r($deleteEmployee);
	redirect('home');
}


}



?>