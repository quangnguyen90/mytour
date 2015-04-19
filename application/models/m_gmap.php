<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_gmap extends CI_Model {

	private $tableMarker = 'markers';

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function get_marker(){
		$m = $this->db->get($this->tableMarker)->result();
		$locations = [];
		foreach ($m as $i => $point) {
			$x = [];
			$x[] = $point->name;
			$x[] = $point->lat;
			$x[] = $point->lng;
			$x[] = $i+1;

			$locations[] = $x; // get all address to location
		}

		$data['c'] = new stdClass; // c: center
		$data['c']->lat = 47.61;
		$data['c']->lng = -122.34;
		$data['zoom']=14;
		$data['locations'] = $locations;

		return $data;
	}

}

/* End of file m_gmap.php */
/* Location: ./application/models/m_gmap.php */