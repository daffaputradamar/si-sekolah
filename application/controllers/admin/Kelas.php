<?php
class Kelas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url('administrator');
            redirect($url);
        };
        $this->load->model('m_kelas');
    }


    function index()
    {

        $this->data['data'] = $this->m_kelas->get_all_kelas();

        $this->data['breadcrumb']  = 'Data Kelas';

        $this->data['main_view']   = 'admin/v_kelas';

        $this->load->view('theme/admintemplate', $this->data);
    }

    function simpan_kelas()
    {

        $kelas_nama = strip_tags($this->input->post('namakelas'));

        $this->m_kelas->simpan_kelas($kelas_nama);

        echo $this->session->set_flashdata('msg', 'success');

        redirect('admin/kelas');
    }

    function update_kelas()
    {

        $kode = strip_tags($this->input->post('kode'));
        $kelas_nama = strip_tags($this->input->post('namakelas'));
        $this->m_kelas->update_kelas($kode, $kelas_nama);
        echo $this->session->set_flashdata('msg', 'info');
        redirect('admin/kelas');
    }

    function hapus_kelas()
    {
        $kode = strip_tags($this->input->post('kode'));
        $this->m_kelas->hapus_kelas($kode);
        echo $this->session->set_flashdata('msg', 'success-hapus');
        redirect('admin/kelas');
    }
}
