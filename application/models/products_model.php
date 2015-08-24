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





}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */