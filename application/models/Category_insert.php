<?php
class Category_insert extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	function form_insert($data) {

		$this -> db -> insert('category', $data);
	}

	function show_subjects() {
		$query = $this -> db -> get('category');

		$query_result = $query -> result();

		return $query_result;

	}

}
?>