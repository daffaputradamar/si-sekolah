<?php
class buku_tamu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_bukutamu');
    }


    function index()
    {
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url('administrator');
            redirect($url);
        };

        $this->data['data'] = $this->m_bukutamu->get_all_bukutamu();

        $this->data['breadcrumb']  = 'Buku Tamu';

        $this->data['main_view']   = 'admin/v_bukutamu';

        $this->load->view('theme/admintemplate', $this->data);
    }

    function simpan_pesan()
    {
        $nama_tamu = strip_tags($this->input->post('namatamu'));
        $telp_tamu = strip_tags($this->input->post('telptamu'));
        $pesan_tamu = strip_tags($this->input->post('pesan'));

        $this->m_bukutamu->simpan_bukutamu($nama_tamu, $telp_tamu, $pesan_tamu);

        echo $this->session->set_flashdata('msg', 'success');

        redirect('');
    }

    function hapus_pesan()
    {
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url('administrator');
            redirect($url);
        };
        $kode = strip_tags($this->input->post('kode'));
        $this->m_bukutamu->hapus_bukutamu($kode);
        echo $this->session->set_flashdata('msg', 'success-hapus');
        redirect('admin/bukutamu');
    }
}
