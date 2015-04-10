<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Cust extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('cart');
		$this -> load -> helper('form');
		$this -> load -> helper('url');
		$this -> load -> helper('security');
		$this -> load -> model('Shop_model');
	}

	public function index() {
		redirect('cust/user_details');
	}

	public function user_details() {
		$this -> load -> library('form_validation');
		$this -> form_validation -> set_error_delimiters();

		// Set validation rules
		$this -> form_validation -> set_rules('cust_first_name', 'cust_first_name', 'required');
		$this -> form_validation -> set_rules('cust_last_name', 'Last Name', 'required');
		$this -> form_validation -> set_rules('email', 'Email Address', 'required|valid_email');
		$this -> form_validation -> set_rules('email_confirm', 'Comfirmation Email Address', 'required|valid_email|matches[email]');
		$this -> form_validation -> set_rules('payment_address', 'Payment Address', 'required');
		$this -> form_validation -> set_rules('delivery_address', 'Delivery Address', '');

		// Begin validation
		if ($this -> form_validation -> run() == FALSE) {
			$this -> load -> view('user_details');
		} else {
			
	

			$config['business'] = 'gavin_murphy1@hotmail.com';
			$config['cpp_header_image'] = '';
			//Image header url [750 pixels wide by 90 pixels high]
			$config['return'] = 'http://localhost:8666/Project/index.php/site/members';
			$config['cancel_return'] = 'http://localhost:8666/Project/index.php/site/members';
			$config['notify_url'] = 'process_payment.php';
			//IPN Post
			$config['production'] = FALSE;
			//Its false by default and will use sandbox
			$config["invoice"] = random_string('numeric', 8);
			//The invoice id

			$this -> load -> library('paypal', $config); 

			#$this->paypal->add(<name>,<price>,<quantity>[Default 1],<code>[Optional]);

			$this -> paypal -> add('Chart stuff', 50000);
			//Second item

			$this -> paypal -> pay();
			//Proccess the payment
			$cust_data = array( 'user_id' => $this -> session -> userdata('id'), 'cust_first_name' => $this -> input -> post('cust_first_name'), 'cust_last_name' => $this -> input -> post('cust_last_name'), 'cust_email' => $this -> input -> post('email'), 'cust_address' => $this -> input -> post('payment_address'), 'cust_created_at' => time());

			$payment_code = mt_rand();

			$order_data = array('order_details' => json_encode($this -> cart -> contents()), 'order_delivery_address' => $this -> input -> post('delivery_address'), 'order_created_at' => time(), 'order_closed' => '0', 'order_fulfilment_code' => $payment_code, 'order_delivery_address' => $this -> input -> post('payment_address'));

			if ($this -> Shop_model -> save_cart_to_database($cust_data, $order_data)) {
				echo 'Order and Customer saved to DB';
					$this->cart->destroy();
			} else {
				echo 'Could not save to DB';
			}
		}
	}
	


}
