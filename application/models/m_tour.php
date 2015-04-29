<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tour extends CI_Model {
	private $tableTour = "tours";
	private $tablePic = "pics";
	private $tableMarker = "markers";
	private $tableCart = "carts";

	public $data = null; 
	public function __construct()
	{
		parent::__construct();
	}
	//========================================================
	public function places (){
		return $this->db->get($this->tableMarker)->result();
	}

	public function current_place_name ($cur_place_id){
		$this->db->where('id', $cur_place_id);
		return $this->db->get($this->tableMarker)->result()[0]->name;
	}

	public function current_tour_id ($cur_place_id){
		return $this->tour_id_by_place_id($cur_place_id);
	}

	public function current_tour_name ($cur_tour_id){
		return $this->tour_name_by_id($cur_tour_id);
	}

	public function current_tour_price ($cur_tour_id){
		return $this->tour_price_by_id($cur_tour_id);
	}

	public function current_place_pics ($cur_place_id){
		$this->db->where('place_id', $cur_place_id);
		return  $this->db->get($this->tablePic)->result();
	}

	public function tours(){
		return $this->db->get($this->tableTour)->result();
	}

	// Get tour name by id
	public function tour_name_by_id($id)
	{
		$this->db->where('tour_id',$id);
		return $this->db->get($this->tableTour)->result()[0]->tour_name;
	}

	public function tour_price_by_id($tour_id)
	{
		$this->db->where('tour_id', $tour_id);
		return $this->db->get($this->tableTour)->result()[0]->tour_price;
	}
	//========================================================
	// Get tour id by place id
	public function tour_id_by_place_id($place_id)
	{
		foreach ($place = $this->places() as $p) 
		{
			if($p->id == $place_id)
			{
				return $p->tour;
			}
		}
	}
	//========================================================
	// Get thumb picture
	public function small_pics($cur_place_id)
	{
		$str = '';
		foreach ($small_pic = $this->current_place_pics($cur_place_id) as $p) 
		{
			$str.= '<img id="'.$p->pic_name.'" class="small" src="http://localhost/mytour/imageTour/'.$p->pic_name.'">';
		}
		return $str;
	}
	//========================================================
	// Get all tour
	public function all_tours()
	{
		$str = '';
		foreach ($tours = $this->tours() as $key => $t) {
			$str .= '<a href="http://localhost/mytour/index.php/tour/addCart/'.$t->tour_id.'/'.$this->uri->segment(4).'" class="btn btn-default">order</a>';
			$str .= '<a href="http://localhost/mytour/index.php/tour/show/'.$this->first_place_of_tour($t->tour_id).'/'.$this->uri->segment(4).'">'.$t->tour_name.'</a><br>';
			$str .= '';
		}

		return $str;
	}
	//========================================================
	public function first_place_of_tour($tour_id)
	{
		foreach ($place = $this->places() as $p) 
		{
			if($tour_id == $p->tour)
			{
				return $p->id;
			}
		}
	}
	//========================================================
	// Get all carts
	public function get_all_cart($cart_id)
	{
		$this->db->where('id', $cart_id);
		$query = $this->db->get($this->tableCart);

		return $query->num_rows() > 0 ? $query->result() : NULL;
	}
}

/* End of file M_tour1.php */
/* Location: ./application/models/M_tour1.php */