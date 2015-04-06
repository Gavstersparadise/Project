<?php
class categoryController extends CI_Controller {
function __construct() {
parent::__construct();
$this->load->model('category_insert');
}
function index()
{
	
$this->load->view('category', $data);
	
}
	function error(){
// Including Validation Library
$this->load->library('form_validation');
$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

$this->form_validation->set_rules('cat_name', 'cat_name', 'required');






if ($this->form_validation->run() == FALSE)
{
echo "error";
}
else
{
// Setting Values For Tabel Columns
$data = array(
'cat_name' => $this->input->post('cat_name'),


);
// Transfering Data To Model
$this->category_insert->form_insert($data);
// Loading View
echo "success";
}
}


}
?>