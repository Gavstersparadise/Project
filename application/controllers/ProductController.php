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

$this->form_validation->set_rules('product_name', 'product_name', 'required');
$this->form_validation->set_rules('product_code', 'product_code.', 'required');
$this->form_validation->set_rules('product_description', 'product_description', 'required');
$this->form_validation->set_rules('category_id', 'info.', 'required');
$this->form_validation->set_rules('product_price', 'product_price', 'required');




if ($this->form_validation->run() == FALSE)
{
echo "error";
}
else
{
// Setting Values For Tabel Columns
$data = array(
'product_name' => $this->input->post('product_name'),
'product_code' => $this->input->post('product_code'),
'product_description' => $this->input->post('product_description'),
'category_id' => $this->input->post('category_id'),
'product_price' => $this->input->post('product_price'),


);
// Transfering Data To Model
$this->product_insert->form_insert($data);
// Loading View
echo "success";
}
}


}
?>