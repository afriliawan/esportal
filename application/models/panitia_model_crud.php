<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panitia_model_crud extends CI_Model {

	public function getUser($table_name) //PERHATIKAN getUser
	{
		$get_user = $this->db->get($table_name); //get_user ?
		return $get_user->result_array();
	}

	public function getQuery($query) //PERHATIKAN getQuery
	{
		$get_user = $this->db->query($query);
		return $get_user->result_array();
	}

	public function tambahdataEvent($table_name, $data)
	{
		$tambahEvent = $this->db->insert($table_name,$data);
		return $tambahEvent;
	}
	
	public function databaganEdit($table_name,$id)
	{
		$this->db->where('idBagan',$id);
		$get_user = $this->db->get($table_name);
		return $get_user->row();
	}

	public function editdataBagan16B($table_name,$data,$id)
	{
		$this->db->where('idBagan',$id);
		$editBagan16B = $this->db->update($table_name,$data);
		return $editBagan16B;
	}

	public function editdataBagan8B($table_name,$data,$id)
	{
		$this->db->where('idBagan',$id);
		$editBagan8B = $this->db->update($table_name,$data);
		return $editBagan8B;
	}

	public function editdatasemiFinal($table_name,$data,$id)
	{
		$this->db->where('idBagan',$id);
		$editsemiFinal = $this->db->update($table_name,$data);
		return $editsemiFinal;
	}

	public function editdataFinal($table_name,$data,$id)
	{
		$this->db->where('idBagan',$id);
		$editFinal = $this->db->update($table_name,$data);
		return $editFinal;
	}

	public function editdataBagan($table_name,$data,$id)
	{
		$this->db->where('idBagan',$id);
		$editBagan = $this->db->update($table_name,$data);
		return $editBagan;
	}

	public function deletedataBagan($table_name,$id)
	{
		$this->db->where('idBagan',$id);
		$this->db->set('is_active', 0);
		$baganTurnamen = $this->db->update($table_name);
		return $baganTurnamen;
	}

	public function PUBGdatabaganEdit($table_name,$id)
	{
		$this->db->where('idBagan',$id);
		$get_user = $this->db->get($table_name);
		return $get_user->row();
	}

	public function PUBGeditdataFinal($table_name,$data,$id)
	{
		$this->db->where('idBagan',$id);
		$PUBGeditFinal = $this->db->update($table_name,$data);
		return $PUBGeditFinal;
	}
	
	public function MLdatabaganEdit($table_name,$id)
	{
		$this->db->where('idBagan',$id);
		$get_user = $this->db->get($table_name);
		return $get_user->row();
	}

	public function MLeditdataBagan8B($table_name,$data,$id)
	{
		$this->db->where('idBagan',$id);
		$editBagan8B = $this->db->update($table_name,$data);
		return $editBagan8B;
	}

	public function MLeditdatasemiFinal($table_name,$data,$id)
	{
		$this->db->where('idBagan',$id);
		$editsemiFinal = $this->db->update($table_name,$data);
		return $editsemiFinal;
	}

	public function MLeditdataFinal($table_name,$data,$id)
	{
		$this->db->where('idBagan',$id);
		$editFinal = $this->db->update($table_name,$data);
		return $editFinal;
	}

	public function MLeditdataBagan($table_name,$data,$id)
	{
		$this->db->where('idBagan',$id);
		$editBagan = $this->db->update($table_name,$data);
		return $editBagan;
	}
	
	public function MLdeletedataBagan($table_name,$id)
	{
		$this->db->where('idBagan',$id);
		$this->db->set('is_active', 0);
		$baganTurnamen = $this->db->update($table_name);
		return $baganTurnamen;
	}

	public function get_relasi()
	{
		$this->db->select(['b.namaTurnamen', 'a.idGame', 'b.namaPanitia', 'b.juaraPertama', 'b.juaraKedua', 'b.juaraKetiga', 'b.idPemenang', 'b.is_active', 'b.role_id', 'b.status_event']) ;
		$this->db->from('tournament a');
		$this->db->where('b.idGame', 1);
		$this->db->where('b.is_active', 1);
		$this->db->where('b.role_id', 4);
		$this->db->join('tournament_result b', 'a.namaTurnamen = b.namaTurnamen', 'b.idGame = a.idGame', 'left');
		// $this->db->order_by('namaTurnamen', 'asc');
		$return = $this->db->get('');
		return $return->result();
	}

	public function get_relasi_viewPemenang($id, $namatim)
	{
		$this->db->select('*');
		$this->db->from('tournament_result');
		$this->db->where('namaTim', $namatim);
        $this->db->join('tournament_regis', 'tournament_regis.namaTurnamen = tournament_result.namaTurnamen', 'left');
		// $this->db->order_by('namaTurnamen', 'asc');
		$return = $this->db->get('');
		return $return->result_array();
	}

	public function tambahdataChampion($table_name, $data)
	{
		$tambahChampion = $this->db->insert($table_name,$data);
		return $tambahChampion;
	}

	public function hapusdataPemenang($table_name,$id)
	{
		$this->db->where('idPemenang',$id);
		$this->db->set('is_active', 0);
		$hapusPemenang = $this->db->update($table_name);
		return $hapusPemenang;
	}

	public function dataeditPemenang($table_name,$id)
	{
		$this->db->where('idPemenang',$id);
		$get_user = $this->db->get($table_name);
		return $get_user->row();
	}

	public function editdataPemenang($table_name,$data,$id)
	{
		$this->db->where('idPemenang',$id);
		$editPemenang = $this->db->update($table_name,$data);
		return $editPemenang;
	}

	public function tambahdataBagan($table_name, $data)
	{
		$tambahBagan = $this->db->insert($table_name,$data);
		return $tambahBagan;
	}
	
	public function MLget_relasi()
	{
		$this->db->select(['b.namaTurnamen', 'a.idGame', 'b.namaPanitia', 'b.juaraPertama', 'b.juaraKedua', 'b.juaraKetiga', 'b.idPemenang', 'b.is_active', 'b.role_id']) ;
		$this->db->from('tournament a');
		$this->db->where('b.idGame', 2);
		$this->db->where('b.is_active', 1);
		$this->db->where('b.role_id', 4);
		$this->db->join('tournament_result b', 'a.namaTurnamen = b.namaTurnamen', 'b.idGame = a.idGame', 'left');
		// $this->db->order_by('namaTurnamen', 'asc');
		$return = $this->db->get('');
		return $return->result();
	}

	public function MLget_relasi_viewPemenang($id, $namatim)
	{
		$this->db->select('*');
		$this->db->from('tournament_result');
		$this->db->where('namaTim', $namatim);
        $this->db->join('tournament_regis', 'tournament_regis.namaTurnamen = tournament_result.namaTurnamen', 'left');
		// $this->db->order_by('namaTurnamen', 'asc');
		$return = $this->db->get('');
		return $return->result_array();
	}

	public function MLtambahdataChampion($table_name, $data)
	{
		$tambahChampion = $this->db->insert($table_name,$data);
		return $tambahChampion;
	}

	public function MLhapusdataPemenang($table_name,$id)
	{
		$this->db->where('idPemenang',$id);
		$this->db->set('is_active', 0);
		$hapusPemenang = $this->db->update($table_name);
		return $hapusPemenang;
	}

	public function MLdataeditPemenang($table_name,$id)
	{
		$this->db->where('idPemenang',$id);
		$get_user = $this->db->get($table_name);
		return $get_user->row();
	}

	public function MLeditdataPemenang($table_name,$data,$id)
	{
		$this->db->where('idPemenang',$id);
		$editPemenang = $this->db->update($table_name,$data);
		return $editPemenang;
	}

	public function datauploadStruk($table_name,$id)
	{
		$this->db->where('idTurnamen',$id);
		$get_user = $this->db->get($table_name);
		return $get_user->row();
	}

	public function datauploadfotoTurnamen($table_name,$id)
	{
		$this->db->where('idTurnamen',$id);
		$get_user = $this->db->get($table_name);
		return $get_user->row();
	}

	public function dataeditEvent($table_name,$id)
	{
		$this->db->where('idTurnamen',$id);
		$get_user = $this->db->get($table_name);
		return $get_user->row();
	}

	public function editdataEvent($table_name,$data,$id)
	{
		$this->db->where('idTurnamen',$id);
		$editEvent = $this->db->update($table_name,$data);
		return $editEvent;
	}

	public function hapusdataEvent($table_name,$id)
	{
		$this->db->where('idTurnamen',$id);
		$this->db->set('is_active', 0);
		$hapusEvent = $this->db->update($table_name);
		return $hapusEvent;
	}

	public function MLtambahdataBagan($table_name, $data)
	{
		$tambahBagan = $this->db->insert($table_name,$data);
		return $tambahBagan;
	}

	public function insertdataPembayaran($table_name,$data,$id)
	{
		$this->db->where('idTurnamen',$id);
		$insertPembayaran = $this->db->update($table_name,$data);
		return $insertPembayaran;
	}

	public function insertdatafotoTurnamen($table_name,$data,$id)
	{
		$this->db->where('idTurnamen',$id);
		$insertfotoTurnamen = $this->db->update($table_name,$data);
		return $insertfotoTurnamen;
	}

	public function tampildata_dengankondisi($table, $where)
	{
    	$result = $this->db->get_where($table, $where);
    	return $result->result_array();
	}
	  
	public function transferData($table,$data)
	{
		$this->db->insert($table,$data);
		return TRUE;
	}

	public function turnamenSelesai($table_name,$id)
	{
		$this->db->where('idBagan',$id);
		$this->db->set('is_active', 4);
		$selesaiEvent = $this->db->update($table_name);
		return $selesaiEvent;
	}

	public function tempatTurnamen()
	{
		$this->db->select('*');
		$this->db->from('tb_kecamatan');
		$return = $this->db->get('');
		return $return;
	}

	function getTempat(){
		$query = $this->db->query('SELECT * FROM tb_tempat ORDER BY namaTempat ASC');
        return $query->result();
	}

	function getBiaya(){
		$query = $this->db->query('SELECT * FROM biaya_pendaftaran ORDER BY biayaPendaftaran ASC');
        return $query->result();
	}

	function getslotMax(){
		$query = $this->db->query('SELECT * FROM slot_max ORDER BY biayaPendaftaran ASC');
        return $query->result();
	}
}