<?php
class M_guru extends CI_Model
{

	function get_all_guru()
	{
		$hsl = $this->db->query("SELECT * FROM tbl_guru");
		return $hsl;
	}

	function get_guru_home()
	{
		$hsl = $this->db->query("SELECT * FROM tbl_guru LIMIT 10");
		return $hsl;
	}

	function simpan_guru($nip, $nama, $photo, $jabatan)
	{
		$hsl = $this->db->query("INSERT INTO tbl_guru (guru_nip,guru_nama,guru_photo,jabatan) VALUES ('$nip','$nama','$photo','$jabatan')");
		return $hsl;
	}
	function simpan_guru_tanpa_img($nip, $nama, $jabatan)
	{
		$hsl = $this->db->query("INSERT INTO tbl_guru (guru_nip,guru_nama,guru_jenkel,guru_tmp_lahir,guru_tgl_lahir,guru_mapel,jabatan) VALUES ('$nip','$nama','$jabatan')");
		return $hsl;
	}

	function update_guru($kode, $nip, $nama, $photo, $jabatan)
	{
		$hsl = $this->db->query("UPDATE tbl_guru SET guru_nip='$nip',guru_nama='$nama',guru_photo='$photo',jabatan='$jabatan' WHERE guru_id='$kode'");
		return $hsl;
	}
	function update_guru_tanpa_img($kode, $nip, $nama, $jabatan)
	{
		$hsl = $this->db->query("UPDATE tbl_guru SET guru_nip='$nip',guru_nama='$nama',jabatan='$jabatan' WHERE guru_id='$kode'");
		return $hsl;
	}
	function hapus_guru($kode)
	{
		$hsl = $this->db->query("DELETE FROM tbl_guru WHERE guru_id='$kode'");
		return $hsl;
	}

	//front-end
	function guru()
	{
		$hsl = $this->db->query("SELECT * FROM tbl_guru");
		return $hsl;
	}
	function guru_perpage($offset, $limit)
	{
		$hsl = $this->db->query("SELECT * FROM tbl_guru limit $offset,$limit");
		return $hsl;
	}
}
