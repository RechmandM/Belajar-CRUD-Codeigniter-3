<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Biodata extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Master', 'ms');
		$this->load->library('session');
	}
	public function index()
	{
		if($this->session->flashdata('get')):
			$get = true;
			$del = false;
		elseif($this->session->flashdata('del')):
			$del= true;
			$get = false;
		else:
			$get = false;
			$del = false;
		endif;
		$data = [
			"base" => base_url(),
			"menu" => "biodata",
			"get" => $get,
			"del" => $del
		];
		$data["biodata"] = $this->ms->getAlljoin('biodata', 'jurusan', 'pembimbing')->result();
		$this->load->view('data', $data);
	}
	public function add()
	{
		$data = [
			"base" => base_url(),
			"menu" => "biodata",
			"page" => "add",
			"url_post" => "add_aksi"
		];
		$data["pembimbing"] = $this->ms->getAll('pembimbing')->result();
		$data["jurusan"] = $this->ms->getAll('jurusan')->result();
		$this->load->view('add', $data);
	}
	public function add_aksi()
	{
		$data = [
			'nim' => $this->input->post('nim'),
			'tanggal_lahir' => $this->input->post('tgl'),
			'nama_mahasiswa' => $this->input->post('nama'),
			'id_jurusan' => $this->input->post('jurusan'),
			'id_pa' => $this->input->post('pembimbing'),
			'biaya_kuliah' => $this->input->post('biaya'),
		];
		$this->ms->input_data('biodata', $data);
		$this->session->set_flashdata('get','accept');
		redirect('biodata');
	}
	public function edit($id)
	{
		$data = [
			"base" => base_url(),
			"menu" => "biodata",
			"page" => "edit",
			'url' => '../edit_aksi',
			'row' => $this->ms->getby_id('biodata', $id, 'nim')->row()
		];
		$data["pembimbing"] = $this->ms->getAll('pembimbing')->result();
		$data["jurusan"] = $this->ms->getAll('jurusan')->result();
		$this->load->view('edit', $data);
	}
	public function edit_aksi()
	{
		$nim = $this->input->post('nim');
		$data = [
			'tanggal_lahir' => $this->input->post('tgl'),
			'nama_mahasiswa' => $this->input->post('nama'),
			'id_jurusan' => $this->input->post('jurusan'),
			'id_pa' => $this->input->post('pembimbing'),
			'biaya_kuliah' => $this->input->post('biaya'),
		];
		$this->ms->update_data('biodata', $data, $nim, 'nim');
		$this->session->set_flashdata('get','accept');
		redirect('biodata');
	}
	public function delete($id)
	{
		$this->ms->delete('biodata', $id, 'nim');
		$this->session->set_flashdata('del','accept');
		redirect('biodata');
	}
}
