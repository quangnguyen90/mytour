<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gmap extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('m_gmap');
	}

	public function index()
	{
		
	}

	public function test(){
		$this->load->library('googlemaps');

		$config['center'] = '37.4419, -122.1419';
		$config['zoom'] = 'auto';
		$config['places'] = TRUE;
		$config['placesAutocompleteInputID'] = 'myPlaceTextBox';
		$config['placesAutocompleteBoundsMap'] = TRUE; 
		// set results biased towards the maps viewport
		$config['placesAutocompleteOnChange'] = 'alert(\'You selected a place\');';
		$this->googlemaps->initialize($config);
		$data['map'] = $this->googlemaps->create_map();

		$this->load->view('v_gmap', $data);
	}

	public function get_geo(){
		$this->load->library('googlemaps');

		$config['center'] = '20.9614, 105.7763';
		$config['zoom'] = 'auto';
		$config['onclick'] = 'alert(\'You just clicked at: \' + event.latLng.lat() + \', \' + event.latLng.lng());';
		$this->googlemaps->initialize($config);
		$data['map'] = $this->googlemaps->create_map();

		$this->load->view('gmap/v_get_geo', $data);
	}

	public function jsmap(){
		$data = $this->m_gmap->get_marker();
		$this->load->view('jsmap/v_jsmap', $data);
	}
}

/* End of file gmap.php */
/* Location: ./application/controllers/gmap.php */