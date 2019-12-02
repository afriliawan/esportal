<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class adminPUBG extends CI_Controller 
{
    //Berlaku untuk digunakan semua methode pada Controller Auth.php
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('admin_pubgm_model_crud', '', TRUE);
        $this->load->helper(array('form', 'url'));
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
        $eventPUBG = "SELECT * FROM tournament WHERE idGame='1' && is_active=1";
        $this->data['hasil'] = $this->admin_pubgm_model_crud->getQuery($eventPUBG);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminPUBG/vi_event/event', $this->data);
        $this->load->view('templates/footer');
    }

    public function teamData()
    {
        $data['title'] = 'Data Tim';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $teamPUBG = "SELECT * FROM tournament_regis WHERE idGame='1' && is_active='1'";
        $this->data['hasil'] = $this->admin_pubgm_model_crud->getQuery($teamPUBG);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminPUBG/vi_team/team-data', $this->data);
        $this->load->view('templates/footer');
    }

    // //DOUBLE FUNCTION, UNTUK READ DATA DAN TAMBAH DATA
    // public function schedule()
    // {
    //     $this->form_validation->set_rules('namaTurnamen', 'tournament name', 'required|trim');

    //     if ($this->form_validation->run() == false) {
    //         $data['title'] = 'Bagan Pertandingan';
    //         $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    //         $baganPUBG = "SELECT * FROM tournament_bagan WHERE idGame='1' && is_active='1'";
    //         $this->data['hasil'] = $this->admin_pubgm_model_crud->getQuery($baganPUBG);

    //         $this->load->view('templates/header', $data);
    //         $this->load->view('templates/sidebar', $data);
    //         $this->load->view('templates/topbar', $data);
    //         $this->load->view('admin/adminPUBG/vi_schedule/schedule', $this->data);
    //         $this->load->view('templates/footer');
    //     } else {
    //         $nama_turnamen 	= $_POST['namaTurnamen'];
    //         $id_game        = $_POST['idGame'];
    //         $roleId         = $_POST['role_id'];
    //         $isActive       = $_POST['is_active'];

    //         $data = array('namaTurnamen' => $nama_turnamen, 'idGame' => $id_game, 'role_id' => $roleId, 'is_active' => $isActive);
    //         $tambahBagan = $this->admin_pubgm_model_crud->tambahdataBagan('tournament_bagan',$data);
    //         if($tambahBagan > 0)
    //         {
    //             echo 'Berhasil disimpan';
    //         }else{
    //             echo 'Gagal disimpan';
    //         }
    //             $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New shedule has been added !</div>');
    //             redirect('adminPUBG/schedule');
    //         }
    // }

    // public function schedule()
    // {
    //     $data['title'] = 'Bagan Pertandingan';
    //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    //     $this->data['hasil'] = $this->admin_pubgm_model_crud->get_relasiSchedule(); 

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('admin/adminPUBG/vi_schedule/schedule', $this->data);
    //     $this->load->view('templates/footer');
    // }

    // public function schedule()
    // {
    //     $data['title'] = 'Bagan Pertandingan';
    //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    //     $this->data['hasil'] = $this->admin_pubgm_model_crud->get_relasiSchedule(); 

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('admin/adminPUBG/vi_schedule/schedule', $this->data);
    //     $this->load->view('templates/footer');
    // }

    public function schedule()
    {
        $data['title'] = 'Bagan Pertandingan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $eventPUBG = "SELECT * FROM tournament_bagan WHERE idGame='1' && is_active=1";
        $this->data['hasil'] = $this->admin_pubgm_model_crud->baganFinalPUBG($eventPUBG);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminPUBG/vi_schedule/schedule', $this->data);
        $this->load->view('templates/footer');
    }

    public function champion()
    {
        $data['title'] = 'Hasil Pertandingan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->data['hasil'] = $this->admin_pubgm_model_crud->get_relasi(); 

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminPUBG/vi_champion/champion', $this->data);
        $this->load->view('templates/footer');
    }

    public function registrasiMasuk()
    {
        $data['title'] = 'Registrasi Masuk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $regmasukPUBG = "SELECT * FROM tournament_regis WHERE idGame='1' && is_active='3'";
        $this->data['hasil'] = $this->admin_pubgm_model_crud->getQuery($regmasukPUBG);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminPUBG/vi_registrasi_masuk/registrasi-masuk', $this->data);
        $this->load->view('templates/footer');
    }

    public function pembayaranMasuk()
    {
        $data['title'] = 'Pembayaran  Masuk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $pembmasukPUBG = "SELECT * FROM tournament_regis WHERE idGame='1' && is_active='2'";
        $this->data['hasil'] = $this->admin_pubgm_model_crud->getQuery($pembmasukPUBG);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminPUBG/vi_pembayaran_masuk/pembayaran-masuk', $this->data);
        $this->load->view('templates/footer');
    }
    
    //--------------------------------------------- START CRUD UNTUK MENU EVENT----------------------------------------------------\\
    public function formcreateEvent()
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
        if (empty($_FILES['fotoTurnamen']['name'])) {      
            $this->form_validation->set_rules('fotoTurnamen','Image','required|xss_clean'); }

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Event';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/adminPUBG/vi_event/create-event', $data);
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
            $isActive           = $_POST['is_active'];
            $roleId             = $_POST['role_id'];
            $status_event       = $_POST['status_event'];
            $tanggal_posting	= $_POST['tanggalPosting'];
            $fotoTurnamen       = $_POST['fotoTurnamen'];
            if ($fotoTurnamen=''){
                
            }else{
                $config['upload_path']      = './android/images/turnamen/';
                $config['allowed_types']    = 'jpg|png|jpeg|gif';

                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('fotoTurnamen')){
                    echo "Upload gagal";
                }else{
                    $fotoTurnamen=$this->upload->data('file_name');
                }
        }
        
		$data = array('namaTurnamen' => $nama_turnamen,'fotoTurnamen' => $fotoTurnamen, 'idGame' => $id_game, 'jenisTurnamen' =>  $jenis_turnamen,'deskTurnamen' => $desk_turnamen ,'namaPanitia' => $nama_panitia, 'slotMax' => $slot_max, 'biayaPendaftaran' => $biaya_pendaftaran, 'batasPendaftaran' => $batas_pendaftaran, 'tanggalTM' => $tanggal_tm, 'tanggalTurnamen' => $tanggal_turnamen,'totalHadiah' => $total_hadiah ,'tempatTurnamen' => $tempat_turnamen, 'noHP' => $no_hp, 'tanggalPosting' => date('Y-m-d'), 'is_active' => $isActive, 'status_event' => $status_event, 'role_id' => $roleId);
		$tambahEvent = $this->admin_pubgm_model_crud->tambahdataEvent('tournament',$data);
		if($tambahEvent > 0)
		{
			echo 'Berhasil disimpan';
		}else{
			echo 'Gagal disimpan';
        }
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New event has been created !</div>');
			redirect('adminPUBG/event');
        }
    }

    public function battleTurnamen($id){
        $closeRegistration = $this->admin_pubgm_model_crud->registrasiTutup('tournament',$id);
		if($closeRegistration > 0){
                // echo 'Data Turnament Berhasil di Aacc';
          $where = ['idTurnamen'=> $id];
          $ambil_nama_tour = $this->admin_pubgm_model_crud->tampildata_dengankondisi('tournament', $where);
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
          $add_sukses = $this->admin_pubgm_model_crud->transferData('tournament_bagan', $data);
          if ($add_sukses == TRUE) {
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Tournament registration has been closed !</div>');
            redirect('adminPUBG/event');
          }else {
            echo "Data req tour berhasil di acc, namun gagal dimasukkan ke tabel tur bagan";
          }
            }
        else{
                echo 'Data tur request gagal di acc';
            }
      }

    public function finishTurnamen($id){
        $finishTour = $this->admin_pubgm_model_crud->turnamenSelesai('tournament',$id);
		if($finishTour > 0){
                // echo 'Data Turnament Berhasil di Aacc';
          $where = ['idTurnamen'=> $id];
          $ambil_nama_tour = $this->admin_pubgm_model_crud->tampildata_dengankondisi('tournament', $where);
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
          $add_sukses = $this->admin_pubgm_model_crud->transferData('tournament_result', $data);
          if ($add_sukses == TRUE) {
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Tournament has been finished !</div>');
            redirect('adminPUBG/event');
          }else {
            echo "Data req tour berhasil di acc, namun gagal dimasukkan ke tabel tur bagan";
          }
            }
        else{
                echo 'Data tur request gagal di acc';
            }
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
            $data['dataeditEvent'] = $this->admin_pubgm_model_crud->dataeditEvent('tournament',$id);
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/adminPUBG/vi_event/edit-event', $data);
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
        
            $data = array('namaTurnamen' => $nama_turnamen, 'jenisTurnamen' =>  $jenis_turnamen, 'deskTurnamen' => $desk_turnamen,'namaPanitia' => $nama_panitia, 'slotMax' => $slot_max, 'biayaPendaftaran' => $biaya_pendaftaran, 'batasPendaftaran' => $batas_pendaftaran, 'totalHadiah' => $total_hadiah,'tanggalTM' => $tanggal_tm, 'tanggalTurnamen' => $tanggal_turnamen,'tempatTurnamen' => $tempat_turnamen, 'noHP' => $no_hp);
            $editEvent = $this->admin_pubgm_model_crud->editdataEvent('tournament',$data, $id);
            if($editEvent > 0)
            {
                echo 'Berhasil disimpan';
            }else{
                echo 'Gagal disimpan';
            }
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Update tournament has been successfully !</div>');
                redirect('adminPUBG/event');
            }
        }

    //--------------------------------------------- END CRUD UNTUK MENU EVENT-----------------------------------------------\\

    public function deleteTeam($id)
	{
		$hapusTeam = $this->admin_pubgm_model_crud->hapusdataTeam('tournament_regis',$id);
		if($hapusTeam > 0)
		{
			echo 'Berhasil dihapus';
		}else{
			echo 'Gagal dihapus';
        }
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Delete team has been successfully !</div>');
			redirect('adminPUBG/teamdata');
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
            $data['datateamEdit'] = $this->admin_pubgm_model_crud->datateamEdit('tournament_regis',$id);
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/adminPUBG/vi_team/edit-team', $data);
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
        $editTeam = $this->admin_pubgm_model_crud->editdataTeam('tournament_regis',$data, $id);
		if($editTeam > 0)
		{
			echo 'Berhasil disimpan';
		}else{
			echo 'Gagal disimpan';
        }
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Update team has been successfully !</div>');
			redirect('adminPUBG/teamdata');
            }
        }

    //---------------------------------------- START MENU HASIL PERTANDINGAN ---------------------------------------------\\
    
    public function formviewPemenang($id, $show)
    {
       // $data['dataviewPemenang'] = $this->admin_pubgm_model_crud->dataviewPemenang('tournament_regis',$id);
        // $viewPemenang = "SELECT * FROM tournament_regis WHERE idGame='1'";
        $data['title'] = 'Hasil Pertandingan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['dataviewPemenang'] = $this->admin_pubgm_model_crud->get_relasi_viewPemenang($id, $show);
        // echo "<pre>";
        // var_dump(data);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminPUBG/vi_champion/viewTeam', $data);
        $this->load->view('templates/footer');
    }

    // public function formViewPemenang()
    // {
    //     $data['title'] = 'Jadwal Pertandingan';
    //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('admin/adminPUBG/vi_champion/viewTeam', $data);
    //     $this->load->view('templates/footer');
    // }
    //---------------------------------------- START MENU JADWAL PERTANDINGAN ---------------------------------------------\\

    public function delapanBesar($id)
    {
        $data['title'] = 'Bagan 8 Besar';
        $data['databaganEdit'] = $this->admin_pubgm_model_crud->databaganEdit('tournament_bagan',$id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminPUBG/vi_schedule/8besar', $data);
        $this->load->view('templates/footer');
    }

    // public function finalTest($id, $show)
    // {
    //    // $data['dataviewPemenang'] = $this->admin_pubgm_model_crud->dataviewPemenang('tournament_regis',$id);
    //     // $viewPemenang = "SELECT * FROM tournament_regis WHERE idGame='1'";
    //     $data['title'] = 'Hasil Pertandingan';
    //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    //     $data['dataviewFinal'] = $this->admin_pubgm_model_crud->get_relasi_dataFinal($id, $show);
    //     // echo "<pre>";
    //     // var_dump(data);

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('admin/adminPUBG/vi_schedule/final', $data);
    //     $this->load->view('templates/footer');
    // }

        
    // public function finalTest($id)
    // {
    //    // $data['dataviewPemenang'] = $this->admin_pubgm_model_crud->dataviewPemenang('tournament_regis',$id);
    //     // $viewPemenang = "SELECT * FROM tournament_regis WHERE idGame='1'";
    //     $data['title'] = 'Bagan Pertandingan';
    //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    //     $data['datafinalPUBG'] = $this->admin_pubgm_model_crud->get_relasi_dataFinal($id);
    //     // echo "<pre>";
    //     // var_dump(data);

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('admin/adminPUBG/vi_schedule/final', $data);
    //     $this->load->view('templates/footer');
    // }

    
    public function finalTest($id)
    {
        $data['title'] = 'Bagan Pertandingan Final';
        $data['tampilkandataFinal'] = $this->admin_pubgm_model_crud->datashowFinal('bagan_pubg',$id);
        $data['ambildatanya'] = $this->admin_pubgm_model_crud->transferkanData('tournament_bagan',$id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['ambil_nama_tim_dari_database'] = $this->admin_pubgm_model_crud->getnamaTim('tournament_regis', $id);

        $this->form_validation->set_rules('namaTim', 'team name', 'required|trim|is_unique[bagan_pubg.namaTim]', [ 
            'is_unique' => 'Nama tim sudah terdaftar!'
        ]); 

        if ($this->form_validation->run() == false){
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminPUBG/vi_schedule/final', $data);
        $this->load->view('templates/footer');
        } else {
            $this->db->insert('bagan_pubg', ['namaTim' => $this->input->post('namaTim')]);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Add new registrasi fee success!</div>');
            redirect('adminPUBG/finalTest');
        }
    }
      
    public function insertnamaTim()
    {
        $this->form_validation->set_rules('namaTim', 'Team name', 'required|trim|is_unique[bagan_pubg.namaTim]', [ 
            'is_unique' => 'Nama team terdaftar!'
        ]); 

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Nama tim sudah tersedia!</div>');
			redirect('adminPUBG/schedule');
        } else {
        $id_turnamen 	= $_POST['idTurnamen'];
        $nama_turnamen	= $_POST['namaTurnamen'];
        $nama_panitia	= $_POST['namaPanitia'];
		$id_game    	= $_POST['idGame'];
        $isActive      = $_POST['is_active'];
        $nama_tim      = $_POST['namaTim'];

		$data = array('idTurnamen' => $id_turnamen, 'namaTurnamen' => $nama_turnamen, 'namaPanitia' => $nama_panitia, 'idGame' =>  $id_game, 'is_active' => $isActive, 'namaTim' => $nama_tim);
		$tambahtimPUBG = $this->admin_pubgm_model_crud->tambahdatatimPUBG('bagan_pubg',$data);
		if($tambahtimPUBG > 0)
		{
			echo 'Berhasil disimpan';
		}else{
			echo 'Gagal disimpan';
        }
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Add new team name has been successfully!</div>');
            $kembalikeURL = $this->input->post('urlsekarang');
			redirect ($kembalikeURL, 'refresh');
        }
    }

    public function deletenamaTim($id)
	{
		$hapusnamaTim = $this->admin_pubgm_model_crud->hapusTim('bagan_pubg',$id);
		if($hapusnamaTim > 0)
		{
			echo 'Berhasil dihapus';
		}else{
			echo 'Gagal dihapus';
        }
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Delete team name has been successfully !</div>');
			redirect('adminPUBG/schedule');
    }

    public function semiFinal($id)
    {
        $data['title'] = 'Bagan Semi Final';
        $data['databaganEdit'] = $this->admin_pubgm_model_crud->databaganEdit('tournament_bagan',$id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminPUBG/vi_schedule/semi-final', $data);
        $this->load->view('templates/footer');
    }

    //---------------------------------------- START MENU REGISTRASI MASUK ---------------------------------------------\\

    public function deleteRegis($id)
	{
		$hapusRegis = $this->admin_pubgm_model_crud->hapusdataRegis('tournament_regis',$id);
		if($hapusRegis > 0)
		{
			echo 'Berhasil dihapus';
		}else{
			echo 'Gagal dihapus';
        }
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Delete tournament registration has been successfully !</div>');
			redirect('adminPUBG/registrasimasuk');
    }

    public function rejectPembayaran($id)
	{
		$hapusPembayaran = $this->admin_pubgm_model_crud->hapusdataPembayaran('tournament_regis',$id);
		if($hapusPembayaran > 0)
		{
			echo 'Berhasil dihapus';
		}else{
			echo 'Gagal dihapus';
        }
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Reject tournament registration has been successfully !</div>');
			redirect('adminPUBG/pembayaranmasuk');
    }

    public function acceptRegis($id)
    {
        $acceptRegis = $this->admin_pubgm_model_crud->acceptdataRegis('tournament_regis',$id);
		if($acceptRegis > 0){
            $this->db->set('slotTerisi', 'slotTerisi + 1', FALSE);
            $transferSuccess = $this->admin_pubgm_model_crud->transferupdateData('tournament', $id);
            //mentransfer atau meng-insert data sesuai kebutuhan, cek pada bagian $data
            if ($transferSuccess == TRUE) 
            {
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Accept team has been successfully !</div>');
                redirect('adminPUBG/pembayaranmasuk');
            }else {
                echo "Gagal !";
            }
        }else{
            echo 'Gagal !';
        }
    }
    
    public function forminfoEvent($id, $show)
    {
       // $data['dataviewPemenang'] = $this->admin_pubgm_model_crud->dataviewPemenang('tournament_regis',$id);
        // $viewPemenang = "SELECT * FROM tournament_regis WHERE idGame='1'";
        $data['title'] = 'Detail Tim';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['datadetailEvent'] = $this->admin_pubgm_model_crud->get_relasi_detailEvent($id, $show);
        
        // echo "<pre>";
        // var_dump(data);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminPUBG/vi_event/viewInfo', $data);
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
            $this->load->view('admin/adminPUBG/vi_champion/create-champion', $data);
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
		$tambahChampion = $this->admin_pubgm_model_crud->tambahdataChampion('tournament_result',$data);
		if($tambahChampion > 0)
		{
			echo 'Berhasil disimpan';
		}else{
			echo 'Gagal disimpan';
        }
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New champion has been added !</div>');
			redirect('adminPUBG/champion');
        }
    }

    public function updateBagan8B($id)
    {
		$team_1 		= $_POST['team1'];
		$team_2 		= $_POST['team2'];
		$team_3 		= $_POST['team3'];
		$team_4 		= $_POST['team4'];
		$team_5 		= $_POST['team5'];
		$team_6 		= $_POST['team6'];
		$team_7 		= $_POST['team7'];
		$team_8 		= $_POST['team8'];
		$hasil_1 		= $_POST['hasil1'];
		$hasil_2 		= $_POST['hasil2'];
		$hasil_3 		= $_POST['hasil3'];
		$hasil_4 		= $_POST['hasil4'];
		$hasil_5 		= $_POST['hasil5'];
		$hasil_6 		= $_POST['hasil6'];
		$hasil_7 		= $_POST['hasil7'];
		$data = array('team1' => $team_1, 'team2' =>  $team_2, 'team3' => $team_3, 'team4' => $team_4, 'team5' => $team_5, 'team6' => $team_6, 'team7' => $team_7, 'team8' => $team_8, 'hasil1' => $hasil_1, 'hasil2' => $hasil_2,'hasil3' => $hasil_3, 'hasil4' => $hasil_4, 'hasil5' => $hasil_5, 'hasil6' => $hasil_6, 'hasil7' => $hasil_7);
		$editBagan8B = $this->admin_pubgm_model_crud->editdataBagan8B('tournament_bagan',$data, $id);
		if($editBagan8B > 0)
		{
			echo 'Berhasil disimpan';
		}else{
			echo 'Gagal disimpan';
        }
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Update tournament bagan has been successfully !</div>');
			redirect('adminPUBG/schedule');
    }

    public function updatesemiFinal($id)
    {
		$hasil_1 		= $_POST['hasil1'];
		$hasil_2 		= $_POST['hasil2'];
		$hasil_3 		= $_POST['hasil3'];
		$hasil_4 		= $_POST['hasil4'];
		$hasil_5 		= $_POST['hasil5'];
		$hasil_6 		= $_POST['hasil6'];
		$hasil_7 		= $_POST['hasil7'];
		$data = array('hasil1' => $hasil_1, 'hasil2' => $hasil_2,'hasil3' => $hasil_3, 'hasil4' => $hasil_4, 'hasil5' => $hasil_5, 'hasil6' => $hasil_6, 'hasil7' => $hasil_7);
		$editsemiFinal = $this->admin_pubgm_model_crud->editdatasemiFinal('tournament_bagan',$data, $id);
		if($editsemiFinal > 0)
		{
			echo 'Berhasil disimpan';
		}else{
			echo 'Gagal disimpan';
        }
         $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Update tournament bagan has been successfully !</div>');
			redirect('adminPUBG/schedule');
    }

    public function updateFinal($id)
    {
		$team1 		    = $_POST['team1'];
		$team2 		    = $_POST['team2'];
		$team3 		    = $_POST['team3'];
		$team4		    = $_POST['team4'];
		$team5 		    = $_POST['team5'];
		$team6 		    = $_POST['team6'];
		$team7 		    = $_POST['team7'];
		$team8 		    = $_POST['team8'];
		$team9 		    = $_POST['team9'];
		$team10 		= $_POST['team10'];
		$team11 		= $_POST['team11'];
		$team12 		= $_POST['team12'];
		$team13 		= $_POST['team13'];
		$team14 		= $_POST['team14'];
		$team15 		= $_POST['team15'];
		$team16 		= $_POST['team16'];
		$team17		    = $_POST['team17'];
		$team18 		= $_POST['team18'];
		$team19 		= $_POST['team19'];
		$team20 		= $_POST['team20'];
		$team21 		= $_POST['team21'];
		$team22 		= $_POST['team22'];
		$team23 		= $_POST['team23'];
		$team24 		= $_POST['team24'];
		$team25 		= $_POST['team25'];
		$data = array('team1' => $team1, 'team2' => $team2, 'team3' => $team3, 'team4' => $team4, 'team5' => $team5, 'team6' => $team6, 'team7' => $team7, 'team8' => $team8, 'team9' => $team9, 'team10' => $team10, 'team11' => $team11, 'team12' => $team12, 'team13' => $team13, 'team14' => $team14, 'team15' => $team15, 'team16' => $team16, 'team17' => $team17, 'team18' => $team18, 'team19' => $team19, 'team20' => $team20, 'team21' => $team21, 'team22' => $team22, 'team23' => $team23, 'team24' => $team24, 'team25' => $team25);
		$PUBGeditFinal = $this->admin_pubgm_model_crud->PUBGeditdataFinal('tournament_bagan',$data, $id);
		if($PUBGeditFinal > 0)
		{
			echo 'Berhasil disimpan';
		}else{
			echo 'Gagal disimpan';
        }
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Update tournament bagan has been successfully !</div>');
			redirect('adminPUBG/schedule');
    }

    public function formeditBagan($id)
    {
        $this->form_validation->set_rules('namaTurnamen', 'tournament name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Bagan';
            $data['databaganEdit'] = $this->admin_pubgm_model_crud->databaganEdit('tournament_bagan',$id);
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/adminPUBG/vi_schedule/edit-bagan', $data);
            $this->load->view('templates/footer');
        } else {
            $nama_turnamen 	= $_POST['namaTurnamen'];
        
            $data = array('namaTurnamen' => $nama_turnamen);
            $editBagan = $this->admin_pubgm_model_crud->editdataBagan('tournament_bagan',$data, $id);
            if($editBagan > 0)
            {
                echo 'Berhasil disimpan';
            }else{
                echo 'Gagal disimpan';
            }
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Update tournament has been successfully !</div>');
                redirect('adminPUBG/schedule');
            }
        }

    public function formeditPemenang($id)
    {
        $this->form_validation->set_rules('namaTurnamen', 'tournament name', 'required|trim');
        $this->form_validation->set_rules('juaraPertama', '1st place name', 'required|trim');
        $this->form_validation->set_rules('juaraKedua', '2nd place name', 'required|trim');
        $this->form_validation->set_rules('juaraKetiga', '3rd place name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Pemenang';
            $data['dataeditPemenang'] = $this->admin_pubgm_model_crud->dataeditPemenang('tournament_result',$id);
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/adminPUBG/vi_champion/edit-champion', $data);
            $this->load->view('templates/footer');
        } else {
            $nama_turnamen 		= $_POST['namaTurnamen'];
            $nama_panitia 		= $_POST['namaPanitia'];
            $juara_pertama 		= $_POST['juaraPertama'];
            $juara_kedua 		= $_POST['juaraKedua'];
            $juara_ketiga 		= $_POST['juaraKetiga'];
            $data = array('namaTurnamen' => $nama_turnamen, 'namaPanitia' => $nama_panitia, 'juaraPertama' => $juara_pertama, 'juaraKedua' => $juara_kedua, 'juaraKetiga' => $juara_ketiga);
            $editPemenang = $this->admin_pubgm_model_crud->editdataPemenang('tournament_result',$data, $id);
            if($editPemenang > 0)
		{
			echo 'Berhasil disimpan';
		}else{
			echo 'Gagal disimpan';
        }
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Update champion has been successfully !</div>');
			redirect('adminPUBG/champion');
        }
    }

    public function deletePemenang($id)
	{
		$hapusPemenang = $this->admin_pubgm_model_crud->hapusdataPemenang('tournament_result',$id);
		if($hapusPemenang > 0)
		{
			echo 'Berhasil dihapus';
		}else{
			echo 'Gagal dihapus';
        }
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Delete champion has been successfully !</div>');
			redirect('adminPUBG/champion');
    }

    // public function doneEvent($id)
    // {
    //     $doneEvent = $this->admin_pubgm_model_crud->donedataEvent('tournament_regis',$id);
	// 	if($doneEvent > 0)
	// 	{
	// 		echo 'Berhasil dihapus';
	// 	}else{
	// 		echo 'Gagal dihapus';
	// 	}
	// 		redirect('adminPUBG/pembayaranmasuk');
    // }
    public function deleteBagan($id)
	{
		$hapusBagan = $this->admin_pubgm_model_crud->deletedataBagan('tournament_bagan',$id);
		if($hapusBagan > 0)
		{
			echo 'Berhasil dihapus';
		}else{
			echo 'Gagal dihapus';
        }
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Delete tournament bagan has been successfully !</div>');
			redirect('adminPUBG/schedule');
    }

    public function updatePemenang($id)
    {
		$nama_turnamen 		= $_POST['namaTurnamen'];
		$nama_panitia 		= $_POST['namaPanitia'];
		$juara_pertama 		= $_POST['juaraPertama'];
		$juara_kedua 		= $_POST['juaraKedua'];
		$juara_ketiga 		= $_POST['juaraKetiga'];
		$data = array('namaTurnamen' => $nama_turnamen, 'namaPanitia' => $nama_panitia, 'juaraPertama' => $juara_pertama, 'juaraKedua' => $juara_kedua, 'juaraKetiga' => $juara_ketiga);
		$editPemenang = $this->admin_pubgm_model_crud->editdataPemenang('tournament_result',$data, $id);
		if($editPemenang > 0)
		{
			echo 'Berhasil disimpan';
		}else{
			echo 'Gagal disimpan';
        }
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Update champion has been successfully !</div>');
			redirect('adminPUBG/champion');
    }

    public function formuploadfotoTurnamen($id)
    {
        $this->form_validation->set_rules('namaTurnamen', 'tournament name', 'required|trim');
        if (empty($_FILES['fotoTurnamen']['name'])) {      
            $this->form_validation->set_rules('fotoTurnamen','Image','required|xss_clean'); }

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Upload Foto Turnamen';
            $data['datauploadfotoTurnamen'] = $this->admin_pubgm_model_crud->datauploadfotoTurnamen('tournament',$id);
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/adminPUBG/vi_event/upload-fototurnamen', $data);
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
            $insertfotoTurnamen = $this->admin_pubgm_model_crud->insertdatafotoTurnamen('tournament',$data, $id);
            if($insertfotoTurnamen > 0)
		{
			echo 'Berhasil disimpan';
		}else{
			echo 'Gagal disimpan';
        }
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Tournament picture has been updated !</div>');
			redirect('adminPUBG/event');
        }
    }

    public function insertfotoTurnamen($id)
    {
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
		$insertfotoTurnamen = $this->admin_pubgm_model_crud->insertdatafotoTurnamen('tournament',$data, $id);
		if($insertfotoTurnamen > 0)
		{
			echo 'Berhasil disimpan';
		}else{
			echo 'Gagal disimpan';
		}
			redirect('adminPUBG/event');
    }

    public function deleteEvent($id)
	{
		$hapusTeam = $this->admin_pubgm_model_crud->hapusdataEvent('tournament',$id);
		if($hapusTeam > 0)
		{
			echo 'Berhasil dihapus';
		}else{
			echo 'Gagal dihapus';
        }
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Delete event has been successfully !</div>');
			redirect('adminPUBG/event');
    }


}