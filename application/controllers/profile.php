<?php

class Profile extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

		$meta = new Metaobj();
		$meta->url = base_url();
		$meta->set_title("プロフィール - elzup.com");
		$meta->description = "えるざっぷという人物についてまとめています";

		$this->load->view('head', array('meta' => $meta));
		$this->load->view('bodywrapper_head', array('is_shift' => TRUE));
		$this->load->view('navbar', array('current_path' => PATH_ME));
		$this->load->view('profilepage');
		$this->load->view('bodywrapper_foot');
		$this->load->view('foot');
	}

}
