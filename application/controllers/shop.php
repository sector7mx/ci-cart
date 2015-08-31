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

	function add(){

		$this->load->model('products_model');
		$product = $this->products_model->get($this->input->post('id'));

		$insert = array(
			'id' => $this->input->post('id'),
			'qty' => 1,
			'price' => $product->price,
			'name' => $product->name
		);
		if ($product->option_name) {
			$insert['options'] = array(
				$product->option_name => $product->option_values[$this->input->post($product->option_name)]

			);
		}

		$this->cart->insert($insert);

		redirect('shop');
	}

	function remove($rowid){

		$this->cart->update(array(
			'rowid' => $rowid,
			'qty' => 0
		));

		redirect('shop');
	}



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */