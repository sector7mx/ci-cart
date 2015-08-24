<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart_test extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 */



	/**
	*
	* Agrega un item al carrito de compra 
	* Codeigniter genera un rowid UNICO cada vez que detecta que ingresa un item al carrito de compra
	*
	*/
	function add()
	{
		
		$data = array(
			'id' => '42' ,
			'name' => 'Pants',
			'qty' => 1,
			'price' => 19.99,
			'options' => array('Size' => 'medium')
		);

		$this->cart->insert($data);
		echo "add() called";
	}

	/** 
	*
	* Muestra el Contenido del Carrito de Compra con los items agregados con las funcion add y add2
	*
	*/
	function show(){

		$cart =  $this->cart->contents();

		echo "<pre>";
		print_r($cart);

	}

	/**
	*
	* Agrega un SEGUNDO item al carrito de compra 
	*
	*/
	function add2()
	{
		
		$data = array(
			'id' => '12' ,
			'name' => 'T-Shirt',
			'qty' => 2,
			'price' => 7.99,
			'options' => array('Size' => 'large')
		);

		$this->cart->insert($data);
		echo "add2() called";
	}

	/**
	*
	* Actualiza el carrito de compra. Se para como parametro el rowid generado con el add y add2
	*
	*/
	function update(){

		$data = array(
			'rowid' => '456efa2d671ecce94aff804002e2047f',
			'qty' => 1
		);

		$this->cart->update($data);
		echo "update() called";

	}

	/**
	*
	* Calcula el total del pedido en el carrito
	*
	*/
	function total(){

		echo $this->cart->total();
	}

	/**
	*
	* Remueve items del carrito
	*
	*/
	function remove(){

		$data = array(
			'rowid' => '456efa2d671ecce94aff804002e2047f',
			'qty' => 0
		);

		$this->cart->update($data);
		echo "remove() called";
	}


	/**
	*
	* Vacia todo el carrito
	*
	*/
	function destroy(){

		$this->cart->destroy();
		echo "destroy() called";
	}




}




/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */