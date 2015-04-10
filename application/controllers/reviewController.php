<?php
class reviewController extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('review_insert');
		  $this->load->helper('form');
        $this->load->helper('url');
	}

	function index() {

		$this -> load -> view('review_insert', $data);

	}

	function error() {
		// Including Validation Library
		$this -> load -> library('form_validation');
		
		$this -> form_validation -> set_rules("Rating", "SRating", "required");
		$this -> form_validation -> set_rules("Review", "Review", "required");
		

		if ($this -> form_validation -> run() == FALSE) {
			echo "error";
		} else {
			// Setting Values For Tabel Columns
			$data = array(
			'user_id' => $this -> session -> userdata('id'),
			'product_id' => $this -> session -> userdata('product'),
			'Rating' => $this -> input -> post('Rating'),
			'Review' => $this -> input -> post('Review') );
			// Transfering Data To Model
			$this -> review_insert -> form_insert($data);
			// Loading View
			echo "success";
		}
	}

}
?>