<?php
class categoryController extends CI_Controller {
function __construct() {
parent::__construct();
$this->load->model('category_insert');
}
function index()
{
	
	$data['category'] = $this->category_insert->show_students();
$this->load->view('category', $data);
	
}
	function error(){
// Including Validation Library
$this->load->library('form_validation');
$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

$this->form_validation->set_rules('name', 'name', 'required');

$this->form_validation->set_rules('info', 'info.', 'required');




if ($this->form_validation->run() == FALSE)
{
echo "error";
}
else
{
// Setting Values For Tabel Columns
$data = array(
'name' => $this->input->post('name'),
'info' => $this->input->post('info'),

);
// Transfering Data To Model
$this->category_insert->form_insert($data);
// Loading View
echo "success";
}
}


}
?>