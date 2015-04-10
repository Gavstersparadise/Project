<?php
class review_insert extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	function form_insert($data) {

		$this -> db -> insert('review', $data);
	}

}
?>