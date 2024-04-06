<?php
class Pengumuman extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_pengumuman');
		$this->load->model('m_pengunjung');
		$this->m_pengunjung->count_visitor();
	}
	function index()
	{
		$jum = $this->m_pengumuman->pengumuman();
		$page = $this->uri->segment(3);
		if (!$page) :
			$offset = 0;
		else :
			$offset = $page;
		endif;
		$limit = 7;
		$config['base_url'] = base_url() . 'pengumuman/index/';
		$config['total_rows'] = $jum->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		//Tambahan untuk styling
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center align-items-center">';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link border-0 px-3" style="font-size: 20px;">';
		$config['num_tag_close']    = '</span></li>';

		$config['cur_tag_open']     = '<li class="page-item"><span class="page-link border-0 px-3" style="font-size: 20px;">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';

		$config['next_tag_open']    = '<li class="page-item"><span class="page-link border-0 px-3" style="font-size: 20px;">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link border-0 px-3" style="font-size: 20px;">';
		$config['prev_tagl_close']  = '</span>Next</li>';

		$config['first_tag_open']   = '<li class="page-item"><span class="page-link border-0 px-3" style="font-size: 20px;">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link border-0 px-3" style="font-size: 20px;">';
		$config['last_tagl_close']  = '</span></li>';

		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['next_link'] = '<svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
						<rect x="0.5" y="0.5" width="29" height="29" rx="14.5" stroke="#343a40"/>
						<path d="M12 21L18 15L12 9" stroke="#343a40" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
						';
		$config['prev_link'] = '<svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
						<rect x="0.5" y="0.5" width="29" height="29" rx="14.5" stroke="#343a40"/>
						<path d="M18 21L12 15L18 9" stroke="#343a40" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
						';
		$this->pagination->initialize($config);

		$this->data['page'] = $this->pagination->create_links();

		$this->data['data'] = $this->m_pengumuman->pengumuman_perpage($offset, $limit);

		$this->data['main_view']   = 'depan/v_pengumuman';

		$this->load->view('theme/template', $this->data);
	}
}
