<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_ml_model_crud extends CI_Model {

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

	//Data Event - Start\\
	public function tambahdataEvent($table_name, $data)
	{
		$tambahEvent = $this->db->insert($table_name,$data);
		return $tambahEvent;
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

	public function dataeditEvent($table_name,$id)
	{
		$this->db->where('idTurnamen',$id);
		$get_user = $this->db->get($table_name);
		return $get_user->row();
	}
	//Data Event - End\\

	//Data Organizer - Start\\
	public function tambahdataOrganizer($table_name, $data)
	{
		$tambahOrganizer = $this->db->insert($table_name,$data);
		return $tambahOrganizer;
	}

	public function editdataOrganizer($table_name,$data,$id)
	{
		$this->db->where('idPanitia',$id);
		$editOrganizer = $this->db->update($table_name,$data);
		return $editOrganizer;
	}

	public function hapusdataOrganizer($table_name,$id)
	{
		$this->db->where('idPanitia',$id);
		$hapusOrganizer = $this->db->delete($table_name);
		return $hapusOrganizer;
	}

	public function dataeditOrganizer($table_name,$id)
	{
		$this->db->where('idPanitia',$id);
		$get_user = $this->db->get($table_name);
		return $get_user->row();
	}
	//Data Organizer - End\\

	//Data Team - Start\\
	public function tambahdataTeam($table_name, $data)
	{
		$tambahTeam = $this->db->insert($table_name,$data);
		return $tambahTeam;
	}

	public function editdataTeam($table_name,$data,$id)
	{
		$this->db->where('idRegis',$id);
		$editTeam = $this->db->update($table_name,$data);
		return $editTeam;
	}

	public function hapusdataTeam($table_name,$id)
	{
		$this->db->where('idRegis',$id);
		$this->db->set('is_active', 0);
		$hapusTeam = $this->db->update($table_name);
		return $hapusTeam;
	}

	public function datateamEdit($table_name,$id)
	{
		$this->db->where('idRegis',$id);
		$get_user = $this->db->get($table_name);
		return $get_user->row();
	}

	// public function dataeditTeam($id, $namaturnamen)
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('tournament');
	// 	$this->db->where('namaTurnamen', $namaturnamen);
	// 	$this->db->join('tournament_regis', 'tournament_regis.idTurnamen = tournament.idTurnamen', 'left');
	// 	$return = $this->db->get('');
	// 	return $return->result_array();
	// }

	//Data Team - End\\

	public function get_relasi()
	{
		$this->db->select(['b.namaTurnamen', 'a.idGame', 'b.namaPanitia', 'b.juaraPertama', 'b.juaraKedua', 'b.juaraKetiga', 'b.idPemenang', 'b.is_active']) ;
		$this->db->from('tournament a');
		$this->db->where('b.idGame', 2);
		$this->db->where('b.is_active', 1);
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

	//Data Registrasi - Start\\
	public function hapusdataRegis($table_name,$id)
	{
		$this->db->where('idRegis',$id);
		$hapusRegis = $this->db->delete($table_name);
		return $hapusRegis;
	}

	//Data Pembayaran - Start\\
	public function hapusdataPembayaran($table_name,$id)
	{
		$this->db->where('idRegis',$id);
		$hapusPembayaran = $this->db->delete($table_name);
		return $hapusPembayaran;
	}

	public function acceptdataRegis($table_name,$id)
	{
		$this->db->where('idTurnamen',$id);
		$this->db->set('is_active', 1);
		$acceptdataPembayaran = $this->db->update($table_name);
		return $acceptdataPembayaran;
	}

	public function get_relasi_detailEvent($id, $nama_panitia)
	{
		$this->db->select('*');
		$this->db->from('tournament_regis');
		$this->db->where('namaPanitia', $nama_panitia);
        $this->db->join('tournament', 'tournament.namaTurnamen = tournament_regis.namaTurnamen', 'left');
		// $this->db->order_by('namaTurnamen', 'asc');
		$return = $this->db->get('');
		return $return->result_array();
	}

	public function tambahdataChampion($table_name, $data)
	{
		$tambahChampion = $this->db->insert($table_name,$data);
		return $tambahChampion;
	}

	public function databaganEdit($table_name,$id)
	{
		$this->db->where('idBagan',$id);
		$get_user = $this->db->get($table_name);
		return $get_user->row();
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

	public function dataeditPemenang($table_name,$id)
	{
		$this->db->where('idPemenang',$id);
		$get_user = $this->db->get($table_name);
		return $get_user->row();
	}

	public function hapusdataPemenang($table_name,$id)
	{
		$this->db->where('idPemenang',$id);
		$this->db->set('is_active', 0);
		$hapusPemenang = $this->db->update($table_name);
		return $hapusPemenang;
	}

	public function deletedataBagan($table_name,$id)
	{
		$this->db->where('idBagan',$id);
		$this->db->set('is_active', 0);
		$baganTurnamen = $this->db->update($table_name);
		return $baganTurnamen;
	}

	public function editdataPemenang($table_name,$data,$id)
	{
		$this->db->where('idPemenang',$id);
		$editPemenang = $this->db->update($table_name,$data);
		return $editPemenang;
	}

	public function editdataBagan($table_name,$data,$id)
	{
		$this->db->where('idBagan',$id);
		$editBagan = $this->db->update($table_name,$data);
		return $editBagan;
	}

	public function tambahdataBagan($table_name, $data)
	{
		$tambahBagan = $this->db->insert($table_name,$data);
		return $tambahBagan;
	}

	public function insertdatafotoTurnamen($table_name,$data,$id)
	{
		$this->db->where('idTurnamen',$id);
		$insertfotoTurnamen = $this->db->update($table_name,$data);
		return $insertfotoTurnamen;
	}

	public function datauploadfotoTurnamen($table_name,$id)
	{
		$this->db->where('idTurnamen',$id);
		$get_user = $this->db->get($table_name);
		return $get_user->row();
	}

	public function registrasiTutup($table_name,$id)
	{
		$this->db->where('idTurnamen',$id);
		$this->db->set('status_event', 2);
		$clos = $this->db->update($table_name);
		return $clos;
	}

	public function turnamenSelesai($table_name,$id)
	{
		$this->db->where('idTurnamen',$id);
		$this->db->set('status_event', 3);
		$clos = $this->db->update($table_name);
		return $clos;
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

	public function transferupdateData($table_name, $id)
	{
		$this->db->where('idTurnamen',$id);
		$test = $this->db->update($table_name);
		return $test;
	}
	
}
