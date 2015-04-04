<?php
class ProductController extends CI_Controller {
function __construct() {
parent::__construct();
$this->load->model('product_insert');
}
function index()
{
	
	$data['product'] = $this->category_insert->show_students();
$this->load->view('product', $data);
	
}
	function error(){
// Including Validation Library
$this->load->library('form_validation');
$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

$this->form_validation->set_rules('title', 'title', 'required');
$this->form_validation->set_rules('manufacturer', 'manufacturer.', 'required');
$this->form_validation->set_rules('price', 'price', 'required');
$this->form_validation->set_rules('category_id', 'info.', 'required');




if ($this->form_validation->run() == FALSE)
{
echo "error";
}
else
{
// Setting Values For Tabel Columns
$data = array(
'title' => $this->input->post('title'),
'manufacturer' => $this->input->post('manufacturer'),
'price' => $this->input->post('price'),
'category_id' => $this->input->post('category_id'),


);
// Transfering Data To Model
$this->product_insert->form_insert($data);
// Loading View
echo "success";
}
}


}
?>