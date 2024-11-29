<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mitra extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_pegawai');
        $this->load->model('M_mitra');
		$this->load->model('M_posisi');
		$this->load->model('M_kota');
	}

	public function index() {
		$data['userdata'] = $this->userdata;
		// $data['dataMitra'] = $this->M_Mitra->select_all();
		// $data['dataPosisi'] = $this->M_posisi->select_all();
		// $data['dataKota'] = $this->M_kota->select_all();
        $data['dataMitra'] = $this->M_mitra->select_all();

		$data['page'] = "mitra";
		$data['judul'] = "Data Mitra";
		$data['deskripsi'] = "Manage Data Mitra";

		$data['modal_tambah_mitra'] = show_my_modal('modals/modal_tambah_mitra', 'tambah-mitra', $data);

		$this->template->views('mitra/home', $data);
	}

    public function tampil() {
		$data['dataMitra'] = $this->M_mitra->select_all();
		$this->load->view('mitra/list_data', $data);
	}
	public function prosesTambah() {
		$this->form_validation->set_rules('nama', 'Nama Mitra', 'trim|required');
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
		$this->form_validation->set_rules('nama_pemilik', 'nama pemilik', 'trim|required');
		$this->form_validation->set_rules('telephone', 'Nomor Telephone', 'trim|required');

		$data = $this->input->post();

		echo '<pre>';
		print_r($data);
		echo '</pre>';

		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_mitra->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Mitra Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Mitra Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

}

/* End of file Mitra.php */
/* Location: ./application/controllers/Mitra.php */