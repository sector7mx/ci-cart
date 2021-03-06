<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products_model extends CI_Model {

	function get_all(){

		$results =  $this->db->get('products')->result();

		foreach ($results as &$result) {
			
			if ($result->option_values) {
				$result->option_values = explode(',', $result->option_values);
			}
		}
		
		return $results;
	}

	function get($id){

		$results = $this->db->get_where('products',array('id' => $id))->result();
		$result = $results[0];
		
		if ($result->option_values) {
				$result->option_values = explode(',', $result->option_values);
		}

		return $result;

	}





}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */