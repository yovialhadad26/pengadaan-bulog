<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mitra extends CI_Model {
	public function select_all_mitra() {
		$sql = "SELECT * FROM mitra";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_all() {
		$sql = " SELECT mitra.id AS id, 
		mitra.nama AS mitra, 
		mitra.alamat AS alamat, 
		mitra.nama_pemilik AS pemilik, 
		mitra.telephone AS telephone
		FROM mitra";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT mitra.id AS id_mitra, 
		mitra.nama AS nama_mitra, 
		mitra.id_alamat, 
		mitra.id_nama_pemilik, 
		mitra.id_telephone, 
		mitra.telephone AS telephone, 
		alamat.nama AS alamat, 
		nama_pemilik.nama AS nama pemilik, 
		telephone.nama AS telephone FROM mitra, alamat, nama_pemilik, 
		telephone WHERE mitra.id_kota = kota.id 
		AND mitra.id_kelamin = kelamin.id AND mitra.id_posisi = posisi.id AND mitra.id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_posisi($id) {
		$sql = "SELECT COUNT(*) AS jml FROM mitra WHERE id_posisi = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_kota($id) {
		$sql = "SELECT COUNT(*) AS jml FROM mitra WHERE id_kota = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function update($data) {
		$sql = "UPDATE mitra SET mitra='" .$data['mitra'] ."', alamat='" .$data['pemilik'] ."', telephone=" .$data['telephone'] ." WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM mitra WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert($data) {
		// $id = md5(DATE('ymdhms').rand());
		$sql = "INSERT INTO mitra VALUES(
		NULL,
		'" .$data['nama'] ."',
		'" .$data['alamat'] ."',
		'" .$data['nama_pemilik'] ."',
		'" .$data['telephone'] ."'
		)";

		echo '<pre>';
		print_r($sql);
		echo '</pre>';

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('mitra', $data);
		
		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('mitra');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('mitra');

		return $data->num_rows();
	}
}

/* End of file M_mitra.php */
/* Location: ./application/models/M_mitra.php */