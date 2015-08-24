<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *	 
	 */
	


	function index()
	{
		$this->load->model('products_model');

		$data['products'] =  $this->products_model->get_all();

		$this->load->view('products',$data);

	}





}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */