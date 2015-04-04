<?php
class product_insert extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	function form_insert($data) {

		$this -> db -> insert('products', $data);
	}

	function show_subjects() {
		$query = $this -> db -> get('products');

		$query_result = $query -> result();

		return $query_result;

	}

}
?>