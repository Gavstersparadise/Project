<?php
class Category_insert extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	function form_insert($data) {

		$this -> db -> insert('categories', $data);
	}

	function show_subjects() {
		$query = $this -> db -> get('categories');

		$query_result = $query -> result();

		return $query_result;

	}

}
?>