<?php
class Home extends CI_Controller
{

	function __construct()
	{

		parent::__construct();
		$this->load->model('m_tulisan');
		$this->load->model('m_galeri');
		$this->load->model('m_pengumuman');
		$this->load->model('m_agenda');
		$this->load->model('m_files');
		$this->load->model('m_pengunjung');
		$this->load->model('m_kategori');
		$this->load->model('m_guru');
		$this->m_pengunjung->count_visitor();
	}

	function index()
	{

		$this->data['main_view']   = 'depan/v_home';

		$this->data['kategori'] = $this->m_kategori->get_all_kategori();
		$this->data['berita'] = $this->m_tulisan->get_berita_home();
		$this->data['beritaall'] = $this->m_tulisan->get_all_tulisan();
		$this->data['slide'] = $this->m_tulisan->get_berita_slider();
		$this->data['pengumuman'] = $this->m_pengumuman->get_pengumuman_home();
		$this->data['agenda'] = $this->m_agenda->get_agenda_home();
		$this->data['pengajar'] = $this->m_guru->get_guru_home();
		$this->data['tot_guru'] = $this->db->get('tbl_guru')->num_rows();
		$this->data['tot_siswa'] = $this->db->get('tbl_siswa')->num_rows();
		$this->data['tot_files'] = $this->db->get('tbl_files')->num_rows();
		$this->data['tot_agenda'] = $this->db->get('tbl_agenda')->num_rows();
		$this->data['controller'] = $this; 

		$this->load->view('theme/template', $this->data);
	}

	function get_all_tulisan_by_category($kategori_id) {
		return $this->m_tulisan->get_all_tulisan_by_category($kategori_id)->result();
	}
}
