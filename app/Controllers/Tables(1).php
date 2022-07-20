<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use App\Models\ProductModel; 
class Tables extends CI_Controller
{
// construct function
Public function __construct()
{
parent::__construct();
// $this->load->model('productmodel');
}
 
// index function
public function index()
{
	$productmodel = new ProductModel();
$datas['posts'] = $this->productmodel->posts();
 

return view('tablepage',$datas);
}
 
// datasave function
public function datasave()
{
If( $_SERVER['REQUEST_METHOD']  != 'POST'  )
{
redirect('table');
}
 
$id = $this->input->post('id',true);
$title = $this->input->post('title',true);
 
$fields_val = array(
'title' => $title,
);
 
$this->productmodel->posts_save($id,$fields_val);
 
echo "Successfully data saved";
 
}
 
}



