<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class adminML extends CI_Controller 
{
    //Berlaku untuk digunakan semua methode pada Controller Auth.php
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function event()
    {
        $data['title'] = 'Event';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $ML = "SELECT * FROM tournament WHERE idGame='2' && is_active='1'";
        $this->data['hasil'] = $this->admin_ml_model_crud->getQuery($ML);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminML/vi_event/event', $this->data);
        $this->load->view('templates/footer');
    }

    public function teamData()
    {
        $data['title'] = 'Data Tim';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $teamML = "SELECT * FROM tournament_regis WHERE idGame='2' && is_active='1'";
        $this->data['hasil'] = $this->admin_ml_model_crud->getQuery($teamML);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminML/vi_team/team-data', $this->data);
        $this->load->view('templates/footer');
    }

    public function schedule()
    {
        $this->form_validation->set_rules('namaTurnamen', 'tournament name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Bagan Pertandingan';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $baganML = "SELECT * FROM tournament_bagan WHERE idGame='2' && is_active='1'";
            $this->data['hasil'] = $this->admin_ml_model_crud->getQuery($baganML);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/adminML/vi_schedule/schedule', $this->data);
            $this->load->view('templates/footer');
        } else {
            $nama_turnamen 	= $_POST['namaTurnamen'];
            $id_game        = $_POST['idGame'];
            $roleId         = $_POST['role_id'];
            $isActive       = $_POST['is_active'];

            $data = array('namaTurnamen' => $nama_turnamen, 'idGame' => $id_game, 'role_id' => $roleId, 'is_active' => $isActive);
            $tambahBagan = $this->admin_ml_model_crud->tambahdataBagan('tournament_bagan',$data);
            if($tambahBagan > 0)
            {
                echo 'Berhasil disimpan';
            }else{
                echo 'Gagal disimpan';
            }
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New shedule has been added !</div>');
                redirect('adminML/schedule');
            }
    }

    public function champion()
    {
        $data['title'] = 'Hasil Pertandingan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->data['hasil'] = $this->admin_ml_model_crud->get_relasi(); 

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminML/vi_champion/champion', $this->data);
        $this->load->view('templates/footer');
    }

    public function registrasiMasuk()
    {
        $data['title'] = 'Registrasi Masuk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $regmasukML = "SELECT * FROM tournament_regis WHERE idGame='2' && is_active='3'";
        $this->data['hasil'] = $this->admin_ml_model_crud->getQuery($regmasukML);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminML/vi_registrasi_masuk/registrasi-masuk', $this->data);
        $this->load->view('templates/footer');
    }

    public function pembayaranMasuk()
    {
        $data['title'] = 'Pembayaran  Masuk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $pembmasukML = "SELECT * FROM tournament_regis WHERE idGame='2' && is_active='2'";
        $this->data['hasil'] = $this->admin_ml_model_crud->getQuery($pembmasukML);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminML/vi_pembayaran_masuk/pembayaran-masuk', $this->data);
        $this->load->view('templates/footer');
    }
    
    //--------------------------------------------- START CRUD UNTUK MENU EVENT----------------------------------------------------\\
    public function formcreateEvent()
    {
        $this->form_validation->set_rules('namaTurnamen', 'tournament name', 'required|trim');
        $this->form_validation->set_rules('jenisTurnamen', 'tournament type', 'required|trim');
        $this->form_validation->set_rules('deskTurnamen', 'tournament description', 'required|trim');
        $this->form_validation->set_rules('slotMax', 'maximum slot', 'required|trim');
        $this->form_validation->set_rules('biayaPendaftaran', 'registration fee', 'required|trim');
        $this->form_validation->set_rules('batasPendaftaran', 'registration limit', 'required|trim');
        $this->form_validation->set_rules('totalHadiah', 'reward', 'required|trim');
        $this->form_validation->set_rules('tanggalTM', 'technical meeting date', 'required|trim');
        $this->form_validation->set_rules('tanggalTurnamen', 'tournament date', 'required|trim');
        $this->form_validation->set_rules('tempatTurnamen', 'place of tournament', 'required|trim');
        $this->form_validation->set_rules('noHP', 'number phone ', 'required|regex_match[/^[0-9]$/]');
        if (empty($_FILES['fotoTurnamen']['name'])) {      
            $this->form_validation->set_rules('fotoTurnamen','Image','required|xss_clean'); }

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Event';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/adminML/vi_event/create-event', $data);
            $this->load->view('templates/footer');
        } else {
            $nama_turnamen 		= $_POST['namaTurnamen'];
            $id_game		    = $_POST['idGame'];
            $jenis_turnamen	 	= $_POST['jenisTurnamen'];
            $desk_turnamen	 	= $_POST['deskTurnamen'];
            $nama_panitia		= $_POST['namaPanitia'];
            $slot_max			= $_POST['slotMax'];
            $biaya_pendaftaran	= $_POST['biayaPendaftaran'];
            $batas_pendaftaran	= $_POST['batasPendaftaran'];
            $total_hadiah   	= $_POST['totalHadiah'];
            $tanggal_tm			= $_POST['tanggalTM'];
            $tanggal_turnamen	= $_POST['tanggalTurnamen'];
            $tempat_turnamen	= $_POST['tempatTurnamen'];
            $no_hp				= $_POST['noHP'];
            $tanggal_posting	= $_POST['tanggalPosting'];
            $isActive           = $_POST['is_active'];
            $roleId             = $_POST['role_id'];
            $status_event       = $_POST['status_event'];
            $fotoTurnamen       = $_POST['fotoTurnamen'];
            if ($fotoTurnamen=''){}else{
                $config['upload_path']      = './android/images/turnamen/';
                $config['allowed_types']    = 'jpg|png|jpeg|gif';

                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('fotoTurnamen')){
                    echo "Upload gagal"; die();
                }else{
                    $fotoTurnamen=$this->upload->data('file_name');
                }
        }
        
		$data = array('namaTurnamen' => $nama_turnamen,'fotoTurnamen' => $fotoTurnamen, 'idGame' => $id_game, 'jenisTurnamen' =>  $jenis_turnamen, 'deskTurnamen' => $desk_turnamen, 'namaPanitia' => $nama_panitia, 'slotMax' => $slot_max, 'biayaPendaftaran' => $biaya_pendaftaran, 'batasPendaftaran' => $batas_pendaftaran, 'totalHadiah' => $total_hadiah, 'tanggalTM' => $tanggal_tm, 'tanggalTurnamen' => $tanggal_turnamen,'tempatTurnamen' => $tempat_turnamen, 'noHP' => $no_hp, 'tanggalPosting' => date('Y-m-d'), 'is_active' => $isActive, 'status_event' => $status_event,'role_id' => $roleId);
		$tambahEvent = $this->admin_ml_model_crud->tambahdataEvent('tournament',$data);
		if($tambahEvent > 0)
		{
			echo 'Berhasil disimpan';
		}else{
			echo 'Gagal disimpan';
        }
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New event has been created !</div>');
			redirect('adminML/event');
        }
    }

    public function battleTurnamen($id){
        $closeRegistration = $this->admin_ml_model_crud->registrasiTutup('tournament',$id);
		if($closeRegistration > 0){
                // echo 'Data Turnament Berhasil di Aacc';
          $where = ['idTurnamen'=> $id];
          $ambil_nama_tour = $this->admin_ml_model_crud->tampildata_dengankondisi('tournament', $where);
          foreach ($ambil_nama_tour as $r) {
            $data = [
              'idGame'        => $r['idGame'],
              'idTurnamen'    => $r['idTurnamen'],
              'namaTurnamen'  => $r['namaTurnamen'],   
              'namaPanitia'   => $r['namaPanitia'],   
              'role_id'       => $r['role_id'],   
              'is_active'     => $r['is_active'],   
              'status_event'  => $r['status_event'],   
            ];
          }
          $add_sukses = $this->admin_ml_model_crud->transferData('tournament_bagan', $data);
          if ($add_sukses == TRUE) {
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Tournament registration has been closed !</div>');
            redirect('adminML/event');
          }else {
            echo "Data req tour berhasil di acc, namun gagal dimasukkan ke tabel tur bagan";
          }
            }
        else{
                echo 'Data tur request gagal di acc';
            }
      }

      public function finishTurnamen($id){
        $finishTour = $this->admin_ml_model_crud->turnamenSelesai('tournament',$id);
		if($finishTour > 0){
                // echo 'Data Turnament Berhasil di Aacc';
          $where = ['idTurnamen'=> $id];
          $ambil_nama_tour = $this->admin_ml_model_crud->tampildata_dengankondisi('tournament', $where);
          foreach ($ambil_nama_tour as $r) {
            $data = [
              'idGame'        => $r['idGame'],
              'idTurnamen'    => $r['idTurnamen'],
              'namaPanitia'   => $r['namaPanitia'],
              'namaTurnamen'  => $r['namaTurnamen'],   
              'role_id'       => $r['role_id'],   
              'is_active'     => $r['is_active'],   
              'status_event'  => $r['status_event'],   
            ];
          }
          $add_sukses = $this->admin_ml_model_crud->transferData('tournament_result', $data);
          if ($add_sukses == TRUE) {
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Tournament has been finished !</div>');
            redirect('adminML/event');
          }else {
            echo "Data req tour berhasil di acc, namun gagal dimasukkan ke tabel tur bagan";
          }
            }
        else{
                echo 'Data tur request gagal di acc';
            }
      }

    public function deleteEvent($id)
	{
		$hapusEvent = $this->admin_ml_model_crud->hapusdataEvent('tournament',$id);
		if($hapusEvent > 0)
		{
			echo 'Berhasil dihapus';
		}else{
			echo 'Gagal dihapus';
        }
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Delete tournament has been successfully !</div>');
			redirect('adminML/event');
    }

    public function formeditEvent($id)
    {
        $this->form_validation->set_rules('namaTurnamen', 'tournament name', 'required|trim');
        $this->form_validation->set_rules('jenisTurnamen', 'tournament type', 'required|regex_match[/[a-zA-Z]$/]');
        $this->form_validation->set_rules('deskTurnamen', 'tournament description', 'required|trim');
        $this->form_validation->set_rules('slotMax', 'maximum slot', 'required|trim');
        $this->form_validation->set_rules('biayaPendaftaran', 'registration fee', 'required|trim');
        $this->form_validation->set_rules('batasPendaftaran', 'registration limit', 'required|trim');
        $this->form_validation->set_rules('totalHadiah', 'reward', 'required|regex_match[/^[0-9]/]');
        $this->form_validation->set_rules('tanggalTM', 'technical meeting date', 'required|trim');
        $this->form_validation->set_rules('tanggalTurnamen', 'tournament date', 'required|trim');
        $this->form_validation->set_rules('tempatTurnamen', 'place of tournament', 'regex_match[/[a-zA-Z]$/]');
        $this->form_validation->set_rules('noHP', 'number phone ', 'required|regex_match[/^[0-9]{12}$/]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Event';
            $data['dataeditEvent'] = $this->admin_ml_model_crud->dataeditEvent('tournament',$id);
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/adminML/vi_event/edit-event', $data);
            $this->load->view('templates/footer');
        } else {
            $nama_turnamen 		= $_POST['namaTurnamen'];
            $id_game		    = $_POST['idGame'];
            $jenis_turnamen	 	= $_POST['jenisTurnamen'];
            $desk_turnamen      = $_POST['deskTurnamen'];
            $nama_panitia		= $_POST['namaPanitia'];
            $slot_max			= $_POST['slotMax'];
            $biaya_pendaftaran	= $_POST['biayaPendaftaran'];
            $batas_pendaftaran	= $_POST['batasPendaftaran'];
            $total_hadiah   	= $_POST['totalHadiah'];
            $tanggal_tm			= $_POST['tanggalTM'];
            $tanggal_turnamen	= $_POST['tanggalTurnamen'];
            $tempat_turnamen	= $_POST['tempatTurnamen'];
            $no_hp				= $_POST['noHP'];
            $isActive           = $_POST['is_active'];
            $roleId             = $_POST['role_id'];
        
            $data = array('namaTurnamen' => $nama_turnamen, 'jenisTurnamen' =>  $jenis_turnamen, 'deskTurnamen' => $desk_turnamen,'namaPanitia' => $nama_panitia, 'slotMax' => $slot_max, 'biayaPendaftaran' => $biaya_pendaftaran, 'batasPendaftaran' => $batas_pendaftaran, 'totalHadiah' => $total_hadiah, 'tanggalTM' => $tanggal_tm, 'tanggalTurnamen' => $tanggal_turnamen,'tempatTurnamen' => $tempat_turnamen, 'noHP' => $no_hp);
            $editEvent = $this->admin_ml_model_crud->editdataEvent('tournament',$data, $id);
            if($editEvent > 0)
            {
                echo 'Berhasil disimpan';
            }else{
                echo 'Gagal disimpan';
            }
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">This event has been updated !</div>');
                redirect('adminML/event');
            }
        }

    //--------------------------------------------- END CRUD UNTUK MENU EVENT-----------------------------------------------\\

    public function deleteTeam($id)
	{
		$hapusTeam = $this->admin_ml_model_crud->hapusdataTeam('tournament_regis',$id);
		if($hapusTeam > 0)
		{
			echo 'Berhasil dihapus';
		}else{
			echo 'Gagal dihapus';
        }
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Delete team has been successfully !</div>');
			redirect('adminML/teamdata');
    }

    public function formeditTeam($id)
    {
        $this->form_validation->set_rules('namaTim', 'team name', 'required|trim');
        $this->form_validation->set_rules('usrKetua', 'leader username', 'required|trim');
        $this->form_validation->set_rules('noKetua', 'number phone ', 'required|regex_match[/^[0-9]{12}$/]');
        $this->form_validation->set_rules('ignKetua', 'leader nickname', 'required|trim');
        $this->form_validation->set_rules('ignAng1', 'member nickname 1', 'required|trim');
        $this->form_validation->set_rules('ignAng2', 'member nickname 2', 'required|trim');
        $this->form_validation->set_rules('ignAng3', 'member nickname 3', 'required|trim');
        $this->form_validation->set_rules('ignAng4', 'member nickname 4', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Team';
            $data['datateamEdit'] = $this->admin_ml_model_crud->datateamEdit('tournament_regis',$id);
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/adminML/vi_team/edit-team', $data);
            $this->load->view('templates/footer');
        } else {
            $nama_turnamen  = $_POST['namaTurnamen'];
            $nama_tim 	    = $_POST['namaTim'];
            $user_ketua     = $_POST['usrKetua'];
            $no_ketua		= $_POST['noKetua'];
            $ign_ketua   	= $_POST['ignKetua'];
            $ign_ang1       = $_POST['ignAng1'];
            $ign_ang2       = $_POST['ignAng2'];
            $ign_ang3       = $_POST['ignAng3'];
            $ign_ang4       = $_POST['ignAng4'];

		$data = array('namaTim' => $nama_tim, 'namaTurnamen' => $nama_turnamen, 'usrKetua' => $user_ketua, 'noKetua' =>  $no_ketua, 'ignKetua' => $ign_ketua, 'ignAng1' => $ign_ang1, 'ignAng2' => $ign_ang2, 'ignAng3' => $ign_ang3, 'ignAng4' => $ign_ang4);
        $editTeam = $this->admin_ml_model_crud->editdataTeam('tournament_regis',$data, $id);
		if($editTeam > 0)
		{
			echo 'Berhasil disimpan';
		}else{
			echo 'Gagal disimpan';
        }
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Update team has been successfully !</div>');
			redirect('adminML/teamdata');
            }
        }

    public function updateTeam($id)
    {
        $nama_tim 	    = $_POST['namaTim'];
        $user_ketua     = $_POST['usrKetua'];
  	    $no_ketua		= $_POST['noKetua'];
        $ign_ketua   	= $_POST['ignKetua'];
        $ign_ang1       = $_POST['ignAng1'];
        $ign_ang2       = $_POST['ignAng2'];
        $ign_ang3       = $_POST['ignAng3'];
        $ign_ang4       = $_POST['ignAng4'];

		$data = array('namaTim' => $nama_tim, 'usrKetua' => $user_ketua, 'noKetua' =>  $no_ketua, 'ignKetua' => $ign_ketua, 'ignAng1' => $ign_ang1, 'ignAng2' => $ign_ang2, 'ignAng3' => $ign_ang3, 'ignAng4' => $ign_ang4);
        $editTeam = $this->admin_ml_model_crud->editdataTeam('tournament_regis',$data, $id);
		if($editTeam > 0)
		{
			echo 'Berhasil disimpan';
		}else{
			echo 'Gagal disimpan';
		}
			redirect('adminML/teamdata');
    }

    //---------------------------------------- START MENU HASIL PERTANDINGAN ---------------------------------------------\\
    
    public function formviewPemenang($id, $show)
    {
       // $data['dataviewPemenang'] = $this->admin_ml_model_crud->dataviewPemenang('tournament_regis',$id);
        // $viewPemenang = "SELECT * FROM tournament_regis WHERE idGame='1'";
        $data['title'] = 'Hasil Pertandingan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['dataviewPemenang'] = $this->admin_ml_model_crud->get_relasi_viewPemenang($id, $show);
        // echo "<pre>";
        // var_dump(data);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminML/vi_champion/viewTeam', $data);
        $this->load->view('templates/footer');
    }

    // public function formViewPemenang()
    // {
    //     $data['title'] = 'Jadwal Pertandingan';
    //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('admin/adminML/vi_champion/viewTeam', $data);
    //     $this->load->view('templates/footer');
    // }
    //---------------------------------------- START MENU JADWAL PERTANDINGAN ---------------------------------------------\\

    public function delapanBesar($id)
    {
        $data['title'] = 'Bagan 8 Besar';
        $data['databaganEdit'] = $this->admin_ml_model_crud->databaganEdit('tournament_bagan',$id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminML/vi_schedule/8besar', $data);
        $this->load->view('templates/footer');
    }

    public function semiFinal($id)
    {
        $data['title'] = 'Bagan Semi Final';
        $data['databaganEdit'] = $this->admin_ml_model_crud->databaganEdit('tournament_bagan',$id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminML/vi_schedule/semi-final', $data);
        $this->load->view('templates/footer');
    }

    public function final($id)
    {
        $data['title'] = 'Bagan Final';
        $data['databaganEdit'] = $this->admin_ml_model_crud->databaganEdit('tournament_bagan',$id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminML/vi_schedule/final', $data);
        $this->load->view('templates/footer');
    }

    //---------------------------------------- START MENU REGISTRASI MASUK ---------------------------------------------\\

    public function deleteRegis($id)
	{
		$hapusRegis = $this->admin_ml_model_crud->hapusdataRegis('tournament_regis',$id);
		if($hapusRegis > 0)
		{
			echo 'Berhasil dihapus';
		}else{
			echo 'Gagal dihapus';
        }
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Delete tournament registration has been successfully !</div>');
			redirect('adminML/registrasimasuk');
    }

    public function acceptRegis($id)
    {
        $acceptRegis = $this->admin_ml_model_crud->acceptdataRegis('tournament_regis',$id);
		if($acceptRegis > 0){
            $this->db->set('slotTerisi', 'slotTerisi + 1', FALSE);
            $transferSuccess = $this->admin_ml_model_crud->transferupdateData('tournament', $id);
            //mentransfer atau meng-insert data sesuai kebutuhan, cek pada bagian $data
            if ($transferSuccess == TRUE) 
            {
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Accept team has been successfully !</div>');
                redirect('adminML/pembayaranmasuk');
            }else {
                echo "Gagal !";
            }
        }else{
            echo 'Gagal !';
        }
    }

    public function forminfoEvent($id, $show)
    {
       // $data['dataviewPemenang'] = $this->admin_ml_model_crud->dataviewPemenang('tournament_regis',$id);
        // $viewPemenang = "SELECT * FROM tournament_regis WHERE idGame='1'";
        $data['title'] = 'Detail Tim';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['datadetailEvent'] = $this->admin_ml_model_crud->get_relasi_detailEvent($id, $show);
        
        // echo "<pre>";
        // var_dump(data);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminML/vi_event/viewInfo', $data);
        $this->load->view('templates/footer');
    }

    public function formcreateChampion()
    {
        $this->form_validation->set_rules('namaTurnamen', 'tournament name', 'required|trim');
        $this->form_validation->set_rules('juaraPertama', '1st place name', 'required|trim');
        $this->form_validation->set_rules('juaraKedua', '2nd place name', 'required|trim');
        $this->form_validation->set_rules('juaraKetiga', '3rd place name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Pemenang';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/adminML/vi_champion/create-champion', $data);
            $this->load->view('templates/footer');
        } else {
            $nama_turnamen 	= $_POST['namaTurnamen'];
            $id_game	    = $_POST['idGame'];
            $nama_panitia	= $_POST['namaPanitia'];
            $juara_pertama	= $_POST['juaraPertama'];
            $juara_kedua 	= $_POST['juaraKedua'];
            $juara_ketiga	= $_POST['juaraKetiga'];
            $roleId         = $_POST['role_id'];
            $isActive       = $_POST['is_active'];
        
		$data = array('namaTurnamen' => $nama_turnamen, 'idGame' => $id_game, 'juaraPertama' => $juara_pertama, 'juaraKedua' =>  $juara_kedua, 'juaraKetiga' => $juara_ketiga, 'namaPanitia' => $nama_panitia, 'role_id' => $roleId, 'is_active' => $isActive);
		$tambahChampion = $this->admin_ml_model_crud->tambahdataChampion('tournament_result',$data);
		if($tambahChampion > 0)
		{
			echo 'Berhasil disimpan';
		}else{
			echo 'Gagal disimpan';
        }
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Added champion has been successfully !</div>');
			redirect('adminML/champion');
        }
    }

    public function formeditBagan($id)
    {
        $this->form_validation->set_rules('namaTurnamen', 'tournament name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Bagan';
            $data['databaganEdit'] = $this->admin_ml_model_crud->databaganEdit('tournament_bagan',$id);
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/adminML/vi_schedule/edit-bagan', $data);
            $this->load->view('templates/footer');
        } else {
            $nama_turnamen 	= $_POST['namaTurnamen'];
        
            $data = array('namaTurnamen' => $nama_turnamen);
            $editBagan = $this->admin_ml_model_crud->editdataBagan('tournament_bagan',$data, $id);
            if($editBagan > 0)
            {
                echo 'Berhasil disimpan';
            }else{
                echo 'Gagal disimpan';
            }
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">This tournament bagan has been updated !</div>');
                redirect('adminML/schedule');
            }
        }
    
        public function enambelasBesar($id)
        {
            $data['title'] = 'Bagan 16 Besar';
            $data['databaganEdit'] = $this->admin_ml_model_crud->databaganEdit('tournament_bagan',$id);
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/adminML/vi_schedule/16besar', $data);
            $this->load->view('templates/footer');
        }

        public function updateBagan16B ($id)
        {
            $team_1 		= $_POST['team1'];
            $team_2 		= $_POST['team2'];
            $team_3 		= $_POST['team3'];
            $team_4 		= $_POST['team4'];
            $team_5 		= $_POST['team5'];
            $team_6 		= $_POST['team6'];
            $team_7 		= $_POST['team7'];
            $team_8 		= $_POST['team8'];
            $team_9 		= $_POST['team9'];
            $team_10 		= $_POST['team10'];
            $team_11 		= $_POST['team11'];
            $team_12 		= $_POST['team12'];
            $team_13 		= $_POST['team13'];
            $team_14 		= $_POST['team14'];
            $team_15 		= $_POST['team15'];
            $team_16 		= $_POST['team16'];
            $hasil_1 		= $_POST['hasil1'];
            $hasil_2 		= $_POST['hasil2'];
            $hasil_3 		= $_POST['hasil3'];
            $hasil_4 		= $_POST['hasil4'];
            $hasil_5 		= $_POST['hasil5'];
            $hasil_6 		= $_POST['hasil6'];
            $hasil_7 		= $_POST['hasil7'];
            $hasil_8 		= $_POST['hasil8'];
            $data = array('team1' => $team_1, 'team2' =>  $team_2, 'team3' => $team_3, 'team4' => $team_4, 'team5' => $team_5, 'team6' => $team_6, 'team7' => $team_7, 'team8' => $team_8, 'team9' => $team_9, 'team10' => $team_10, 'team11' => $team_11, 'team12' => $team_12, 'team13' => $team_13, 'team14' => $team_14, 'team15' => $team_15, 'team16' => $team_16, 'hasil1' => $hasil_1, 'hasil2' => $hasil_2,'hasil3' => $hasil_3, 'hasil4' => $hasil_4, 'hasil5' => $hasil_5, 'hasil6' => $hasil_6, 'hasil7' => $hasil_7, 'hasil8' => $hasil_8);
            $editBagan16B = $this->admin_ml_model_crud->editdataBagan16B('tournament_bagan',$data, $id);
            if($editBagan16B > 0)
            {
                echo 'Berhasil disimpan';
            }else{
                echo 'Gagal disimpan';
            }
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Update tournament has been successfully !</div>');
                redirect('adminML/schedule');
        }
    
        public function updateBagan8B($id)
        {
            $hasil_9 		= $_POST['hasil9'];
            $hasil_10 		= $_POST['hasil10'];
            $hasil_11 		= $_POST['hasil11'];
            $hasil_12 		= $_POST['hasil12'];
            $data = array('hasil9' => $hasil_9, 'hasil10' => $hasil_10, 'hasil11' => $hasil_11, 'hasil12' => $hasil_12);
            $editBagan8B = $this->admin_ml_model_crud->editdataBagan8B('tournament_bagan',$data, $id);
            if($editBagan8B > 0)
            {
                echo 'Berhasil disimpan';
            }else{
                echo 'Gagal disimpan';
            }
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Update tournament has been successfully !</div>');
                redirect('adminML/schedule');
        }
    
        public function updatesemiFinal($id)
        {
            $hasil_13 		= $_POST['hasil13'];
            $hasil_14 		= $_POST['hasil14'];
            $data = array('hasil13' => $hasil_13, 'hasil14' => $hasil_14);
            $editsemiFinal = $this->admin_ml_model_crud->editdatasemiFinal('tournament_bagan',$data, $id);
            if($editsemiFinal > 0)
            {
                echo 'Berhasil disimpan';
            }else{
                echo 'Gagal disimpan';
            }
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Update tournament has been successfully !</div>');
                redirect('adminML/schedule');
        }
    
        public function updateFinal($id)
        {
            $hasil_15 		= $_POST['hasil15'];
            $data = array('hasil15' => $hasil_15);
            $editFinal = $this->admin_ml_model_crud->editdataFinal('tournament_bagan',$data, $id);
            if($editFinal > 0)
            {
                echo 'Berhasil disimpan';
            }else{
                echo 'Gagal disimpan';
            }
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Update tournament has been successfully !</div>');
                redirect('adminML/schedule');
        }

    public function deletePemenang($id)
	{
		$hapusPemenang = $this->admin_ml_model_crud->hapusdataPemenang('tournament_result',$id);
		if($hapusPemenang > 0)
		{
			echo 'Berhasil dihapus';
		}else{
			echo 'Gagal dihapus';
        }
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Delete champion has been successfully !</div>');
			redirect('adminML/champion');
    }

    // public function doneEvent($id)
    // {
    //     $doneEvent = $this->admin_ml_model_crud->donedataEvent('tournament_regis',$id);
	// 	if($doneEvent > 0)
	// 	{
	// 		echo 'Berhasil dihapus';
	// 	}else{
	// 		echo 'Gagal dihapus';
	// 	}
	// 		redirect('adminML/pembayaranmasuk');
    // }

    public function formcreateBagan()
    {
        //MASIH BELUM BERFUNGSI
        $this->form_validation->set_rules('namaTurnamen', 'NamaTurnamen', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Bagan';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/adminML/vi_schedule/create-bagan', $data);
            $this->load->view('templates/footer');
        } else {
            echo 'Data berhasil di tambahkan!';
        }
        
    }
    public function insertBagan()
    {
        $nama_turnamen 	= $_POST['namaTurnamen'];
        $id_game        = $_POST['idGame'];
        $roleId         = $_POST['role_id'];
        $isActive       = $_POST['is_active'];

		$data = array('namaTurnamen' => $nama_turnamen, 'idGame' => $id_game,'role_id' => $roleId, 'is_active' => $isActive);
		$tambahBagan = $this->admin_ml_model_crud->tambahdataBagan('tournament_bagan',$data);
		if($tambahBagan > 0)
		{
			echo 'Berhasil disimpan';
		}else{
			echo 'Gagal disimpan';
		}
			redirect('adminML/schedule');
    }

    public function deleteBagan($id)
	{
		$hapusBagan = $this->admin_ml_model_crud->deletedataBagan('tournament_bagan',$id);
		if($hapusBagan > 0)
		{
			echo 'Berhasil dihapus';
		}else{
			echo 'Gagal dihapus';
        }
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Delete tournament bagan has been successfully !</div>');
			redirect('adminML/schedule');
    }

    public function formeditPemenang($id)
    {
        $this->form_validation->set_rules('namaTurnamen', 'tournament name', 'required|trim');
        $this->form_validation->set_rules('juaraPertama', '1st place name', 'required|trim');
        $this->form_validation->set_rules('juaraKedua', '2nd place name', 'required|trim');
        $this->form_validation->set_rules('juaraKetiga', '3rd place name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Pemenang';
            $data['dataeditPemenang'] = $this->admin_ml_model_crud->dataeditPemenang('tournament_result',$id);
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/adminML/vi_champion/edit-champion', $data);
            $this->load->view('templates/footer');
        } else {
            $nama_turnamen 		= $_POST['namaTurnamen'];
            $nama_panitia 		= $_POST['namaPanitia'];
            $juara_pertama 		= $_POST['juaraPertama'];
            $juara_kedua 		= $_POST['juaraKedua'];
            $juara_ketiga 		= $_POST['juaraKetiga'];
            $data = array('namaTurnamen' => $nama_turnamen, 'namaPanitia' => $nama_panitia, 'juaraPertama' => $juara_pertama, 'juaraKedua' => $juara_kedua, 'juaraKetiga' => $juara_ketiga);
            $editPemenang = $this->admin_ml_model_crud->editdataPemenang('tournament_result',$data, $id);
            if($editPemenang > 0)
		{
			echo 'Berhasil disimpan';
		}else{
			echo 'Gagal disimpan';
        }
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Update winner has been successfully !</div>');
			redirect('adminML/champion');
        }
    }

    public function formuploadfotoTurnamen($id)
    {
        $this->form_validation->set_rules('namaTurnamen', 'tournament name', 'required|trim');
        if (empty($_FILES['fotoTurnamen']['name'])) {      
            $this->form_validation->set_rules('fotoTurnamen','Image','required|xss_clean'); }

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Upload Foto Turnamen';
            $data['datauploadfotoTurnamen'] = $this->admin_ml_model_crud->datauploadfotoTurnamen('tournament',$id);
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/adminML/vi_event/upload-fototurnamen', $data);
            $this->load->view('templates/footer');
        } else {
            $nama_turnamen 		= $_POST['namaTurnamen'];
            $fotoTurnamen       = $_POST['fotoTurnamen'];

            if ($fotoTurnamen=''){}else{
                $config['upload_path']      = './android/images/turnamen/';
                $config['allowed_types']    = 'jpg|png|jpeg|gif';

                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('fotoTurnamen')){
                    echo "Upload gagal"; die();
                }else{
                    $fotoTurnamen=$this->upload->data('file_name');
                }
            }
            
            $data = array('namaTurnamen' => $nama_turnamen, 'fotoTurnamen' => $fotoTurnamen);
            $insertfotoTurnamen = $this->admin_ml_model_crud->insertdatafotoTurnamen('tournament',$data, $id);
            if($insertfotoTurnamen > 0)
		{
			echo 'Berhasil disimpan';
		}else{
			echo 'Gagal disimpan';
        }
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Tournament picture has been updated !</div>');
			redirect('adminML/event');
        }
    }
}

    