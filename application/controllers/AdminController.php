<?php

class AdminController extends CI_Controller {
	

	public function index() {

		$data["myValue"] = "Some String";
		$data["anotherValue"] = "Another String";

		$this -> load -> view("home", $data);

	}
	
	public function adminSIgnIn() {

	
		$this -> load -> view("adminSignIn");

	}
	
	
	
	

	public function validate_credentials() {

	$this -> load -> model("model_admin");

		if ($this -> model_admin -> can_log_in())//this function will evaluate if you can log in with the correct codentials
		{

			return true;
		} else {

			$this -> form_validation -> set_message('validate_credentials', 'incorrect username/password');
			echo "error admin ";
			return FALSE;

		}
	}
	
	public function signUp_validation() {
		require ('C:\xampp\htdocs\Project\application\libraries\PHPMailer-master\PHPMailerAutoload.php');
		//sigleton as the class is distributing one instabnce of itself

		$this -> load -> library('form_validation');

		$this -> form_validation -> set_rules("email", "Email", "required|trim|valid_email|is_unique[admin.email]");

		$this -> form_validation -> set_rules("password", "Password", "required|trim");

		$this -> form_validation -> set_rules("cpassword", "Confirm Password", "required|trim|matches[password]");

		$this -> form_validation -> set_message('is_unique', "That Email already exists");

		if ($this -> form_validation -> run()) {
		//chain-of-command pattern

			$m = new PHPMailer;
			$m -> isSMTP();
			$m -> SMTPAuth = true;
			//	$m->SMTPDebug=2;
			$m -> Host = 'smtp.gmail.com';
			$m -> Username = 'gavstersparadise@gmail.com';
			$m -> Password = 'Gav101xzaq123';
			$m -> SMTPSecure = 'ssl';
			$m -> Port = 465;
			$this -> load -> model("model_admin");

			$m -> From = 'gavstersparadise@gmail.com';
			$m -> FromName = 'Gavin Murphy';
			$m -> addAddress($this -> input -> post("email"));

			$m -> isHTML(TRUE);

			$key = md5(uniqid());

			$m -> Subject = "Thank You For joining";
			$m -> Body = "<p><a href=" . base_url() . "AdminController/registerUser/$key>Click here </a>to confirm your account</p>";
			$m -> AltBody = "this is the body";

			if ($this -> model_admin -> add_temp_user($key)) {
				if ($m -> send()) {

					echo "email sent";

				} else
					echo "error";

			} else
				echo "error";

		} else {

			$this -> load -> view("home");

		}

	}
	

	public function login_validation() {
		

		$this -> load -> library('form_validation');
		$this -> form_validation -> set_rules('email', "Email", "required|trim|xss_clean|callback_validate_credentials");
		$this -> form_validation -> set_rules('password', "Password", "required|md5|trim");

		if ($this -> form_validation -> run()) {

			$user_id = $this -> model_admin -> get_userID($this -> input -> post('email'));

			$lovely = array("id" => $user_id, "email" => $this -> input -> post("email"), "admin" => "TRUE", "is_logged_in" => 1);

			$this -> session -> set_userdata($lovely);
			redirect('site/admin');
		} else {
			echo "error";
		}

	}
	
	public function registerUser($key) {

		$this -> load -> model("model_admin");

		if ($this -> model_admin -> is_key_valid($key)) {
			if ($newemail = $this -> model_admin -> add_user($key)) {

				$user_id = $this -> model_admin -> get_userID($this -> input -> post('email'));

				$data = array("id" => $user_id, 'email' => $newemail, "admin" => "TRUE", "is_logged_in" => 1);

				$this -> session -> set_userdata($data);
				redirect('site/admin');

			} else
				echo "error";
		} else
			echo "error";

	}
	
	
	}

	