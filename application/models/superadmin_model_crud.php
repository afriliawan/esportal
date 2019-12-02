<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Superadmin_model_crud extends CI_Model {

	public function getUser($table_name) //PERHATIKAN getUser
	{
		$get_user = $this->db->get($table_name); //get_user ?
		return $get_user->result_array();
	}

	public function getALLdata_fromtable($table_name){ //di funct ini kan make this->db->get. nah fun "get" itu buat ambil smua data yang ada di tabel itu.
		$result = $this->db->get($table_name); //funt db->get, utk ambil smua data. cek user_guide database refference
		return $result->result_array();
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

	public function getQuery($query) //PERHATIKAN getQuery
	{
		$get_user = $this->db->query($query);
		return $get_user->result_array();
	}   
	
	public function getQuery2($query) //PERHATIKAN getQuery
	{
		$get_user = $this->db->query($query);
		return $get_user->result_array();
    }   

    public function acceptdatareqTour($table_name,$id)
	{
		$this->db->where('idTurnamen',$id);
		$this->db->set('is_active', 1);
		$this->db->set('tanggalPosting', date('Y-m-d'));
		$acceptdataConfirm = $this->db->update($table_name);
		return $acceptdataConfirm;
	}

	public function jika_tourrequest_diacc_automasuktabel_turbagan($table,$data)
	{
		$this->db->insert($table,$data);
    	return TRUE;
	}

	public function hapusdatareqTour($table_name,$id)
	{
		$this->db->where('idTurnamen',$id);
		$hapusRegis = $this->db->delete($table_name);
		return $hapusRegis;
	}
	
	public function hapusdataGathering($table_name,$id)
	{
		$this->db->where('id',$id);
		$this->db->set('is_active', 0);
		$hapusGath = $this->db->update($table_name);
		return $hapusGath;
	}
	

	public function dataviewStruk($table_name,$id)
	{
		$this->db->where('idTurnamen',$id);
		$get_user = $this->db->get($table_name);
		return $get_user->row();
	}

	public function activeAccount($table_name,$id)
	{
		$this->db->where('id',$id);
		$this->db->set('is_active', 1);
		$activeAcc = $this->db->update($table_name);
		return $activeAcc;
	}

	public function deleteAccount($table_name,$id)
	{
		$this->db->where('id',$id);
		$deleteAcc = $this->db->delete($table_name);
		return $deleteAcc;
	}

	public function deactiveAccount($table_name,$id)
	{
		$this->db->where('id',$id);
		$this->db->set('is_active', 0);
		$deactiveAcc = $this->db->update($table_name);
		return $deactiveAcc;
	}

	public function rewardlimaribuPoint($table_name,$id)
	{
		$this->db->where('id',$id);
		$this->db->set('userPoint', 'userPoint + 5000', FALSE);
		$limaribuP = $this->db->update($table_name);
		return $limaribuP;
	}

	public function rewardtigaribuPoint($table_name,$id)
	{
		$this->db->where('id',$id);
		$this->db->set('userPoint', 'userPoint + 3000', FALSE);
		$limaribuP = $this->db->update($table_name);
		return $limaribuP;
	}

	public function rewardduaribuPoint($table_name,$id)
	{
		$this->db->where('id',$id);
		$this->db->set('userPoint', 'userPoint + 2000', FALSE);
		$limaribuP = $this->db->update($table_name);
		return $limaribuP;
	}

	public function get_relasi()
	{
		$this->db->select(['b.namaTurnamen', 'a.idGame', 'b.namaPanitia', 'b.juaraPertama', 'b.juaraKedua', 'b.juaraKetiga', 'b.idPemenang', 'b.is_active', 'b.role_id', 'b.status_event']) ;
		$this->db->from('tournament a');
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

	// public function tambahbiayaPendaftaran($table_name, $data)
	// {
	// 	$tambahBiaya = $this->db->insert($table_name,$data);
	// 	return $tambahBiaya;
	// }

	public function hapusbiayaPendaftaran($table_name,$id)
	{
		$this->db->where('idBiaya',$id);
		$hapusBiaya = $this->db->delete($table_name);
		return $hapusBiaya;
	}

	public function dataeditbiayaPendaftaran($table_name,$id)
	{
		$this->db->where('idBiaya',$id);
		$get_user = $this->db->get($table_name);
		return $get_user->row();
	}

	public function editdatabiayaPendaftaran($table_name,$data,$id)
	{
		$this->db->where('idBiaya',$id);
		$editBiaya = $this->db->update($table_name,$data);
		return $editBiaya;
	}

	public function hapuslokasiTurnamen($table_name,$id)
	{
		$this->db->where('idTempat',$id);
		$hapusLokasi = $this->db->delete($table_name);
		return $hapusLokasi;
	}

	public function dataeditlokasiTurnamen($table_name,$id)
	{
		$this->db->where('idTempat',$id);
		$get_user = $this->db->get($table_name);
		return $get_user->row();
	}

	public function editdatalokasiTurnamen($table_name,$data,$id)
	{
		$this->db->where('idTempat',$id);
		$editLokasi = $this->db->update($table_name,$data);
		return $editLokasi;
	}
}