<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->db->cache_off();
		$this->load->model('esg_model');
		$this->load->model('admin_model');
		$this->load->library('esg');
		$this->load->library('ZEA/zea');
		$this->esg_model->init();
	}

	public function index()
	{
		$this->load->view('index');
	}

	public function clear_list()
	{
		$this->load->view('member/index');
	}

	public function edit()
	{
		$id = !empty($_GET['id']) ? intval($_GET['id']) : 0;
		$name = $this->db->query('SELECT name FROM member WHERE id = ? ',$id)->row_array();
		$name = !empty($name['name']) ? $name['name'] : '';
		$this->load->view('index',['name'=>$name,'id'=>$id]);
	}
}