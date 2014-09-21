<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dosen_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}
	function tampil_dosen_semua($nama)
	{
		$q = $this->db->query("select * from tbl_nama_dosen where nama_dosen like '%$nama%'");
		return $q;
	}
	function tampil_dosen_limit($nama)
	{
		$q = $this->db->query("select * from tbl_nama_dosen where nama_dosen like '%$nama%' LIMIT 8");
		return $q;
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
