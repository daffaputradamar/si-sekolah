<?php
class Galeri extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_galeri');
		$this->load->model('m_album');
		$this->load->model('m_pengunjung');
		$this->m_pengunjung->count_visitor();
	}
	function index()
	{

		$this->data['main_view']   = 'depan/v_galeri';

		$this->data['all_alb'] = $this->m_album->get_all_album();
		$this->data['all_galeri'] = $this->m_galeri->get_all_galeri();

		$this->load->view('theme/template', $this->data);
	}

	function album()
	{
		$this->data['main_view']   = 'depan/v_galeri_per_album';

		$idalbum = $this->uri->segment(3);
		$this->data['alb'] = $this->m_album->get_album_by_kode($idalbum);
		$this->data['data'] = $this->m_galeri->get_galeri_by_album_id($idalbum);

		$this->load->view('theme/template', $this->data);
	}
}
