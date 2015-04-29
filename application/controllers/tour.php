<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tour extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('m_tour');
	}

	public function index()
	{
		redirect('tour/show/1/x');
	}

	//======================================================================================================================================
	public function show(){
		$data = array();
		$sg4 = $this->uri->segment(4);
		$sg3 = $this->uri->segment(3);

		$data['current_place_id']   = $sg3;
		$data['places']             = $this->m_tour->places();
		$data['current_place_name'] = $this->m_tour->current_place_name($data['current_place_id']);
		$data['current_tour_id']    = $this->m_tour->current_tour_id($data['current_place_id']);
		$data['current_tour_name']  = $this->m_tour->current_tour_name($data['current_tour_id']);
		$data['current_tour_price'] = $this->m_tour->current_tour_price($data['current_tour_id']);
		$data['current_place_pics'] = $this->m_tour->current_place_pics($data['current_place_id']);
		$data['small_pics']         = $this->m_tour->small_pics($data['current_place_id']);
		$data['tours']              = $this->m_tour->tours();
		$data['all_tours']          = $this->m_tour->all_tours();

		$data['c'] = new stdClass; // c: center
		$data['c']->lat = 47.61;
		$data['c']->lng = -122.34;
		$data['zoom']=14;

		$data['locations'] = [];

		$i = 1;

		foreach ($data['places'] as $key => $p) 
		{
			if($p->tour == $data['current_tour_id'])
			{
				$r = [];
				$r[] = $p->name;
				$r[] = $p->lat;
				$r[] = $p->lng;
				$r[] = $i+1;
				$r[] =  $p->id;

				$data['locations'][] = $r; // get all address to location
			}
		}
		//================== SHOW CARTS
		if($sg4 == 'x' || !$sg4){
			$data['cart'] = ' ';
			$data['total'] = '';
		}
		else {
			$data['allCarts'] = $this->m_tour->get_all_cart($sg4);
			$json = $data['allCarts'][0]->json;
			$json = explode(',', $json);
			$json = array_count_values($json);
			$cart=[];
			$total= 0;
			foreach ($json as $p_id => $count) {
				$obj['tour_id'] = $p_id;
				$obj['tour_name']  = $this->m_tour->tour_name_by_id($obj['tour_id']);
				$obj['tour_price'] = $this->m_tour->tour_price_by_id($obj['tour_id']);
				$obj['count'] = $count;
				$obj['sub_total'] = $count*$obj['tour_price'];
				$total += $obj['sub_total'];
				$cart[] = $obj; 
			}

			$data['total'] = $total;
			$data['cart'] = $cart;
		}

		$this->load->view('v_tour', $data);
	}

	//=====================================================================================================
	public function addCart(){
		$sg3 = $this->uri->segment(3);
		$sg4 = $this->uri->segment(4);

		if($sg4 == 'x'){
			$obj = array(
				'json' => $sg3
			);
			$this->db->insert('carts', $obj);
			$id=$this->db->insert_id();
			redirect('http://localhost/mytour/index.php/tour/show/'.$this->m_tour->first_place_of_tour($sg3).'/'.$id,'refresh');
		}
		else {
			$this->db->where('id', $sg4);
			$json = $this->db->get('carts')->result()[0]->json;
			$obj = array(
				'json' => $json.','.$sg3
			);
			$this->db->update('carts', $obj);
			redirect('http://localhost/mytour/index.php/tour/show/'.$this->m_tour->first_place_of_tour($sg3).'/'.$sg4,'refresh');
		}
	}
}

/* End of file tour1.php */
/* Location: ./application/controllers/tour1.php */