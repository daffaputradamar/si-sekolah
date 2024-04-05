<?php
class M_bukutamu extends CI_Model
{
    function get_all_bukutamu()
    {
        $hsl = $this->db->query("SELECT tbl_bukutamu.*,DATE_FORMAT(tanggal_tamu,'%d/%m/%Y') AS tanggal FROM tbl_bukutamu ORDER BY tanggal_tamu DESC");
        return $hsl;
    }

    function simpan_bukutamu($nama, $telp, $pesan)
    {
        $hsl = $this->db->query("INSERT INTO tbl_bukutamu(nama_tamu, telp_tamu, pesan_tamu) VALUES ('$nama', '$telp', '$pesan')");
        return $hsl;
    }

    function hapus_bukutamu($kode)
    {
        $hsl = $this->db->query("delete from tbl_bukutamu where id_tamu='$kode'");
        return $hsl;
    }
}
