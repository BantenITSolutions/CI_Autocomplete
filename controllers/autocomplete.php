<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class autocomplete extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('dosen_model');
		$this->load->database();
	}
	function index()
	{
		$this->load->view('auto/home');
	}
	function tampil()
	{
		$nama = $this->input->post('kirimNama');
		$data['hasil_semua']=$this->dosen_model->tampil_dosen_semua($nama);
		$data['hasil_limit']=$this->dosen_model->tampil_dosen_limit($nama);
		if($nama!="")
		{
			echo '<ul>';
				foreach($data['hasil_limit']->result() as $result)
				{
			 		echo '<li onClick="pilih(\''.$result->nama_dosen.'\');">
					<img src="'.base_url().'images/orang.jpg" style="padding-right:10px; float:left;">
					<b>'.$result->nama_dosen.'</b><br>NIDN : '.$result->NIDN.'</li>';
				}
				echo '<li id="total">
				<a href="'.base_url().'index.php/autocomplete/detail/'.$nama.'" class="thickbox">
				Terdapat <b>'.$data['hasil_semua']->num_rows().'</b> hasil pencarian dengan kata "<b>'.$nama.'</b>"</a></li>';
			echo '</ul>';
		}
		else
		{
			echo "error";
		}
	}
	function detail()
	{
		$nama = $this->uri->segment(3);
		$data['hasil_semua']=$this->dosen_model->tampil_dosen_semua($nama);
		echo '<ul>';
		foreach($data['hasil_semua']->result() as $result)
			{
	         		echo '<li onClick="pilih(\''.$result->nama_dosen.'\');">
				<img src="'.base_url().'images/orang.jpg" style="padding-right:10px; float:left;">
				<b>'.$result->nama_dosen.'</b><br>NIDN : '.$result->NIDN.'</li>';
			}
		echo '</ul>';
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
