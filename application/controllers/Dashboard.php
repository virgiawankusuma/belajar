<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_barang');
	}

	public function index()
	{
		if ($this->session->userdata('nama') == null) {
			redirect('login', 'refresh');
		}
		$data['barang'] = $this->M_barang->getBarang();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('admin/dashboard', $data);
		$this->load->view('template/footer');
	}


	public function tambah()
	{
		if ($this->session->userdata('nama') == null) {
			redirect('login', 'refresh');
		}
		$data = array(
			'nama_barang' => $this->input->post('nama_barang'),
			'kategori' => $this->input->post('kategori'),
			'stok' => $this->input->post('stok'),
			'harga' => $this->input->post('harga'),
		);

		$this->db->insert('barang', $data);
		$this->session->set_flashdata('info', 'Tambah Data Barang Berhasil !');
		redirect('dashboard', 'refresh');
	}

	public function edit()
	{
	}
}
