<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Management extends CI_Controller 
{
    //Berlaku untuk digunakan semua methode pada Controller Auth.php
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
    }

    public function myevent()
    {
        $data['title'] = 'My Event';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $myevent = "SELECT * FROM tournament
        WHERE is_active !=0 AND role_id=".$this->session->userdata('role_id')." AND 
              namaPanitia='".$this->session->userdata('nama_yanglogin')."'";
        $this->data['hasil'] = $this->panitia_model_crud->getQuery($myevent);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('panitia/management/myevent', $this->data);
        $this->load->view('templates/footer');
    }

    public function formcreateEvent()
    {
        $this->form_validation->set_rules('namaTurnamen', 'tournament name', 'required|trim|is_unique[tournament.namaTurnamen]', [ 
            'is_unique' => 'Nama turnamen sudah ada, coba dengan nama lain!'
        ]); 
        $this->form_validation->set_rules('jenisTurnamen', 'tournament type', 'required|trim');
        $this->form_validation->set_rules('deskTurnamen', 'tournament description', 'required|trim');
        $this->form_validation->set_rules('batasPendaftaran', 'registration limit', 'required|trim');
        $this->form_validation->set_rules('totalHadiah', 'reward', 'required|alpha_numeric|trim');
        $this->form_validation->set_rules('tanggalTM', 'technical meeting date', 'required|trim');
        $this->form_validation->set_rules('tanggalTurnamen', 'tournament date', 'required|trim');
        $this->form_validation->set_rules('noHP', 'number phone ', 'min_length[11]', 'max_length[13]');
        if (empty($_FILES['fotoTurnamen']['name'])) {      
            $this->form_validation->set_rules('fotoTurnamen','Image','required|xss_clean', 'gif|jpg|png|jpeg'); }

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Event';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            // $this->data['lokasiTurnamen'] = $this->panitia_model_crud->tempatTurnamen();
            $data['biaya_pendaftaran'] = $this->panitia_model_crud->getBiaya();
            $data['lokasi_turnamen'] = $this->panitia_model_crud->getTempat();
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('panitia/management/create-event', $data);
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
            $fotoTurnamen       = $_POST['fotoTurnamen'];
            if ($fotoTurnamen=''){}else{
                $config['upload_path']      = './android/images/turnamen/';
                $config['allowed_types']    = 'jpg|png|jpeg|gif';
    
                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('fotoTurnamen')){
                    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Error, Format foto turnamen tidak valid!</div>');
                    redirect('management/formcreateEvent');
                }else{
                    $fotoTurnamen=$this->upload->data('file_name');
                }
        }
        
		$data = array('namaTurnamen' => $nama_turnamen, 'idGame' => $id_game, 'jenisTurnamen' =>  $jenis_turnamen,'deskTurnamen' =>$desk_turnamen ,'namaPanitia' => $nama_panitia, 'slotMax' => $slot_max, 'biayaPendaftaran' => $biaya_pendaftaran, 'batasPendaftaran' => $batas_pendaftaran, 'totalHadiah' => $total_hadiah, 'tanggalTM' => $tanggal_tm, 'tanggalTurnamen' => $tanggal_turnamen,'tempatTurnamen' => $tempat_turnamen, 'noHP' => $no_hp, 'is_active' => $isActive, 'role_id' => $roleId, 'status_event' => $status_event,'fotoTurnamen' => $fotoTurnamen);
		$tambahEvent = $this->panitia_model_crud->tambahdataEvent('tournament',$data);
		if($tambahEvent > 0)
		{
			echo 'Berhasil disimpan';
		}else{
			echo 'Gagal disimpan';
		}
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New event has been created !</div>');
			redirect('management/notifikasiPembayaran');
        }
    }

    public function insertEvent()
    {
		$nama_turnamen 		= $_POST['namaTurnamen'];
		$id_game		    = $_POST['idGame'];
		$jenis_turnamen	 	= $_POST['jenisTurnamen'];
		$nama_panitia		= $_POST['namaPanitia'];
		$slot_max			= $_POST['slotMax'];
		$biaya_pendaftaran	= $_POST['biayaPendaftaran'];
		$batas_pendaftaran	= $_POST['batasPendaftaran'];
		$tanggal_tm			= $_POST['tanggalTM'];
		$tanggal_turnamen	= $_POST['tanggalTurnamen'];
		$tempat_turnamen	= $_POST['tempatTurnamen'];
		$no_hp				= $_POST['noHP'];
        $tanggal_posting	= $_POST['tanggalPosting'];
        $isActive           = $_POST['is_active'];
        $roleId             = $_POST['role_id'];
        $fotoTurnamen      = $_POST['fotoTurnamen'];
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
        
		$data = array('namaTurnamen' => $nama_turnamen, 'idGame' => $id_game, 'jenisTurnamen' =>  $jenis_turnamen, 'namaPanitia' => $nama_panitia, 'slotMax' => $slot_max, 'biayaPendaftaran' => $biaya_pendaftaran, 'batasPendaftaran' => $batas_pendaftaran, 'tanggalTM' => $tanggal_tm, 'tanggalTurnamen' => $tanggal_turnamen,'tempatTurnamen' => $tempat_turnamen, 'noHP' => $no_hp, 'tanggalPosting' => $tanggal_posting, 'is_active' => $isActive, 'role_id' => $roleId, 'fotoTurnamen' => $fotoTurnamen);
		$tambahEvent = $this->panitia_model_crud->tambahdataEvent('tournament',$data);
		if($tambahEvent > 0)
		{
			echo 'Berhasil disimpan';
		}else{
			echo 'Gagal disimpan';
		}
			redirect('management/notifikasiPembayaran');
    }

    public function formuploadfotoTurnamen($id)
    {
        $this->form_validation->set_rules('namaTurnamen', 'tournament name', 'required|trim');
        if (empty($_FILES['fotoTurnamen']['name'])) {      
            $this->form_validation->set_rules('fotoTurnamen','Image','required|xss_clean'); }

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Upload Foto Turnamen';
            $data['datauploadfotoTurnamen'] = $this->panitia_model_crud->datauploadfotoTurnamen('tournament',$id);
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('panitia/management/upload-fototurnamen', $data);
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
            $insertfotoTurnamen = $this->panitia_model_crud->insertdatafotoTurnamen('tournament',$data, $id);
            if($insertfotoTurnamen > 0)
		{
			echo 'Berhasil disimpan';
		}else{
			echo 'Gagal disimpan';
        }
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Tournament picture has been updated !</div>');
			redirect('management/myevent');
        }
    }

    public function formeditEvent($id)
    {
        $this->form_validation->set_rules('deskTurnamen', 'tournament description', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Event';
            $data['dataeditEvent'] = $this->panitia_model_crud->dataeditEvent('tournament',$id);
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('panitia/management/edit-event', $data);
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

		$data = array('namaTurnamen' => $nama_turnamen, 'jenisTurnamen' =>  $jenis_turnamen, 'deskTurnamen' => $desk_turnamen,'namaPanitia' => $nama_panitia, 'idGame' => $id_game, 'slotMax' => $slot_max, 'biayaPendaftaran' => $biaya_pendaftaran, 'batasPendaftaran' => $batas_pendaftaran, 'totalHadiah' => $total_hadiah, 'tanggalTM' => $tanggal_tm, 'tanggalTurnamen' => $tanggal_turnamen,'tempatTurnamen' => $tempat_turnamen, 'noHP' => $no_hp);
		$editEvent = $this->panitia_model_crud->editdataEvent('tournament',$data, $id);
		if($editEvent > 0)
		{
			echo 'Berhasil disimpan';
		}else{
			echo 'Gagal disimpan';
            }
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">This event has been updated !</div>');
                redirect('management/myevent');
            }
        }

    public function updateEvent($id)
    {
		$nama_turnamen 		= $_POST['namaTurnamen'];
		$jenis_turnamen	 	= $_POST['jenisTurnamen'];
        $nama_panitia		= $_POST['namaPanitia'];
        $id_game            = $_POST['idGame'];
		$slot_max			= $_POST['slotMax'];
		$biaya_pendaftaran	= $_POST['biayaPendaftaran'];
		$batas_pendaftaran	= $_POST['batasPendaftaran'];
		$tanggal_tm			= $_POST['tanggalTM'];
		$tanggal_turnamen	= $_POST['tanggalTurnamen'];
		$tempat_turnamen	= $_POST['tempatTurnamen'];
		$no_hp				= $_POST['noHP'];
        $tanggal_posting	= $_POST['tanggalPosting'];

		$data = array('namaTurnamen' => $nama_turnamen, 'jenisTurnamen' =>  $jenis_turnamen, 'namaPanitia' => $nama_panitia, 'idGame' => $id_game, 'slotMax' => $slot_max, 'biayaPendaftaran' => $biaya_pendaftaran, 'batasPendaftaran' => $batas_pendaftaran, 'tanggalTM' => $tanggal_tm, 'tanggalTurnamen' => $tanggal_turnamen,'tempatTurnamen' => $tempat_turnamen, 'noHP' => $no_hp, 'tanggalPosting' => $tanggal_posting);
		$editEvent = $this->panitia_model_crud->editdataEvent('tournament',$data, $id);
		if($editEvent > 0)
		{
			echo 'Berhasil disimpan';
		}else{
			echo 'Gagal disimpan';
		}
			redirect('management/myevent');
    }

    public function deleteEvent($id)
	{
		$hapusEvent = $this->panitia_model_crud->hapusdataEvent('tournament',$id);
		if($hapusEvent > 0)
		{
			echo 'Berhasil dihapus';
		}else{
			echo 'Gagal dihapus';
		}
			redirect('management/myevent');
    }

    public function insertbuktiPembayaran($id)
    {
		$nama_turnamen 	= $_POST['namaTurnamen'];
        $fotoStruk      = $_POST['fotoStruk'];
        if ($fotoStruk=''){}else{
            $config['upload_path']      = './assets/foto_struk_panitia';
            $config['allowed_types']    = 'jpg|png|jpeg|gif';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('fotoStruk')){
                echo "Upload gagal"; die();
            }else{
                $fotoStruk=$this->upload->data('file_name');
            }
        }
        
		$data = array('namaTurnamen' => $nama_turnamen, 'fotoStruk' => $fotoStruk);
		$insertPembayaran = $this->panitia_model_crud->insertdataPembayaran('tournament',$data, $id);
		if($insertPembayaran > 0)
		{
			echo 'Berhasil disimpan';
		}else{
			echo 'Gagal disimpan';
		}
			redirect('management/myevent');
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
		$insertfotoTurnamen = $this->panitia_model_crud->insertdatafotoTurnamen('tournament',$data, $id);
		if($insertfotoTurnamen > 0)
		{
			echo 'Berhasil disimpan';
		}else{
			echo 'Gagal disimpan';
		}
			redirect('management/myevent');
    }

    public function notifikasiPembayaran()
    {
        $data['title'] = '';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('panitia/management/notifikasi-pembayaran', $data);
        $this->load->view('templates/footer');
    }

    public function formuploadfotoStruk($id)
    {
        $this->form_validation->set_rules('namaTurnamen', 'tournament name', 'required|trim');
        if (empty($_FILES['fotoStruk']['name'])) {      
            $this->form_validation->set_rules('fotoStruk','Image','required|xss_clean'); }

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Upload Struk';
            $data['datauploadStruk'] = $this->panitia_model_crud->datauploadStruk('tournament',$id);
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('panitia/management/upload-struk', $data);
            $this->load->view('templates/footer');
        } else {
            $nama_turnamen 	= $_POST['namaTurnamen'];
            $fotoStruk      = $_POST['fotoStruk'];
            if ($fotoStruk=''){}else{
                $config['upload_path']      = './assets/foto_struk_panitia';
                $config['allowed_types']    = 'jpg|png|jpeg|gif';

                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('fotoStruk')){
                    echo "Upload gagal"; die();
                }else{
                    $fotoStruk=$this->upload->data('file_name');
                }
            }
        
		$data = array('namaTurnamen' => $nama_turnamen, 'fotoStruk' => $fotoStruk);
		$insertPembayaran = $this->panitia_model_crud->insertdataPembayaran('tournament',$data, $id);
		if($insertPembayaran > 0)
		{
			echo 'Berhasil disimpan';
		}else{
			echo 'Gagal disimpan';
		}
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Tournament picture has been updated !</div>');
			redirect('management/myevent');
        }
    }
    
    public function teamList()
    {
        $data['title'] = 'Team List';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $myevent = "SELECT * FROM tournament_regis
        WHERE is_active='1' AND role_id=".$this->session->userdata('role_id')." AND 
              namaPanitia='".$this->session->userdata('nama_yanglogin')."'";
        $this->data['hasil'] = $this->panitia_model_crud->getQuery($myevent);


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('panitia/management/vi_team/team-list', $this->data);
        $this->load->view('templates/footer');
    }

    public function scheduleML()
    {
        $data['title'] = 'Bagan Pertandingan ML';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $myevent = "SELECT * FROM tournament_bagan
        WHERE is_active='1' AND idGame='2' AND status_event='2' AND role_id=".$this->session->userdata('role_id')." AND 
              namaPanitia='".$this->session->userdata('nama_yanglogin')."'";
        $this->data['hasil'] = $this->panitia_model_crud->getQuery($myevent);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('panitia/management/vi_scheduleML/schedule', $this->data);
        $this->load->view('templates/footer');
    }

    public function schedulePUBG()
    {
        $this->form_validation->set_rules('namaTurnamen', 'tournament name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Bagan Pertandingan PUBG';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $baganPUBG = "SELECT * FROM tournament_bagan
                        WHERE is_active='1' AND idGame='1' AND status_event='2' AND role_id=".$this->session->userdata('role_id')." AND 
                        namaPanitia='".$this->session->userdata('nama_yanglogin')."'";
            $this->data['hasil'] = $this->panitia_model_crud->getQuery($baganPUBG);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('panitia/management/vi_schedulePUBG/schedule', $this->data);
            $this->load->view('templates/footer');
        } else {
            $nama_turnamen 	= $_POST['namaTurnamen'];
            $id_game        = $_POST['idGame'];
            $roleId         = $_POST['role_id'];
            $isActive       = $_POST['is_active'];

            $data = array('namaTurnamen' => $nama_turnamen, 'idGame' => $id_game, 'role_id' => $roleId, 'is_active' => $isActive);
            $tambahBagan = $this->panitia_model_crud->tambahdataBagan('tournament_bagan',$data);
            if($tambahBagan > 0)
            {
                echo 'Berhasil disimpan';
            }else{
                echo 'Gagal disimpan';
            }
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New shedule has been added !</div>');
                redirect('management/schedulePUBG');
            }
    }

    public function enambelasBesar($id)
    {
        $data['title'] = 'Bagan 16 Besar';
        $data['databaganEdit'] = $this->panitia_model_crud->databaganEdit('tournament_bagan',$id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('panitia/management/vi_scheduleML/16besar', $data);
        $this->load->view('templates/footer');
    }

    public function delapanBesar($id)
    {
        $data['title'] = 'Bagan 8 Besar';
        $data['databaganEdit'] = $this->panitia_model_crud->databaganEdit('tournament_bagan',$id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('panitia/management/vi_scheduleML/8besar', $data);
        $this->load->view('templates/footer');
    }

    public function semiFinal($id)
    {
        $data['title'] = 'Bagan Semi Final';
        $data['databaganEdit'] = $this->panitia_model_crud->databaganEdit('tournament_bagan',$id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('panitia/management/vi_scheduleML/semi-final', $data);
        $this->load->view('templates/footer');
    }

    public function final($id)
    {
        $data['title'] = 'Bagan Final';
        $data['databaganEdit'] = $this->panitia_model_crud->databaganEdit('tournament_bagan',$id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('panitia/management/vi_scheduleML/final', $data);
        $this->load->view('templates/footer');
    }

    public function finalPUBG($id)
    {
        $data['title'] = 'Bagan Final';
        $data['PUBGdatabaganEdit'] = $this->panitia_model_crud->PUBGdatabaganEdit('tournament_bagan',$id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('panitia/management/vi_schedulePUBG/final', $data);
        $this->load->view('templates/footer');
    }
   
    public function updateFinalPUBG($id)
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
		$PUBGeditFinal = $this->panitia_model_crud->PUBGeditdataFinal('tournament_bagan',$data, $id);
		if($PUBGeditFinal > 0)
		{
			echo 'Berhasil disimpan';
		}else{
			echo 'Gagal disimpan';
        }
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Update tournament bagan has been successfully !</div>');
			redirect('management/schedulePUBG');
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
		$editBagan16B = $this->panitia_model_crud->editdataBagan16B('tournament_bagan',$data, $id);
		if($editBagan16B > 0)
		{
			echo 'Berhasil disimpan';
		}else{
			echo 'Gagal disimpan';
        }
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Update tournament has been successfully !</div>');
			redirect('management/scheduleML');
    }

    public function updateBagan8B($id)
    {
		$hasil_9 		= $_POST['hasil9'];
		$hasil_10 		= $_POST['hasil10'];
		$hasil_11 		= $_POST['hasil11'];
		$hasil_12 		= $_POST['hasil12'];
		$data = array('hasil9' => $hasil_9, 'hasil10' => $hasil_10, 'hasil11' => $hasil_11, 'hasil12' => $hasil_12);
		$editBagan8B = $this->panitia_model_crud->editdataBagan8B('tournament_bagan',$data, $id);
		if($editBagan8B > 0)
		{
			echo 'Berhasil disimpan';
		}else{
			echo 'Gagal disimpan';
        }
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Update tournament has been successfully !</div>');
			redirect('management/scheduleML');
    }

    public function updatesemiFinal($id)
    {
		$hasil_13 		= $_POST['hasil13'];
		$hasil_14 		= $_POST['hasil14'];
		$data = array('hasil13' => $hasil_13, 'hasil14' => $hasil_14);
		$editsemiFinal = $this->panitia_model_crud->editdatasemiFinal('tournament_bagan',$data, $id);
		if($editsemiFinal > 0)
		{
			echo 'Berhasil disimpan';
		}else{
			echo 'Gagal disimpan';
        }
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Update tournament has been successfully !</div>');
			redirect('management/scheduleML');
    }

    public function updateFinal($id)
    {
		$hasil_15 		= $_POST['hasil15'];
		$data = array('hasil15' => $hasil_15);
		$editFinal = $this->panitia_model_crud->editdataFinal('tournament_bagan',$data, $id);
		if($editFinal > 0)
		{
			echo 'Berhasil disimpan';
		}else{
			echo 'Gagal disimpan';
        }
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Update tournament has been successfully !</div>');
			redirect('management/scheduleML');
    }


    public function insertBagan()
    {
        $nama_turnamen 	= $_POST['namaTurnamen'];
        $id_game        = $_POST['idGame'];
        $isActive       = $_POST['is_active'];
        $roleId         = $_POST['role_id'];

		$data = array('namaTurnamen' => $nama_turnamen, 'idGame' => $id_game, 'is_active' => $isActive, 'role_id' => $roleId);
		$tambahBagan = $this->panitia_model_crud->tambahdataBagan('tournament_bagan',$data);
		if($tambahBagan > 0)
		{
			echo 'Berhasil disimpan';
		}else{
			echo 'Gagal disimpan';
		}
			redirect('management/scheduleML');
    }

    public function formeditBagan($id)
    {
        $this->form_validation->set_rules('namaTurnamen', 'tournament name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Bagan';
            $data['databaganEdit'] = $this->panitia_model_crud->databaganEdit('tournament_bagan',$id);
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('panitia/management/vi_scheduleML/edit-bagan', $data);
            $this->load->view('templates/footer');
        } else {
            $nama_turnamen 	= $_POST['namaTurnamen'];
        
            $data = array('namaTurnamen' => $nama_turnamen);
            $editBagan = $this->panitia_model_crud->editdataBagan('tournament_bagan',$data, $id);
            if($editBagan > 0)
            {
                echo 'Berhasil disimpan';
            }else{
                echo 'Gagal disimpan';
            }
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">This tournament bagan has been updated !</div>');
                redirect('management/scheduleML');
            }
        }

    public function deleteBagan($id)
	{
		$hapusBagan = $this->panitia_model_crud->deletedataBagan('tournament_bagan',$id);
		if($hapusBagan > 0)
		{
			echo 'Berhasil dihapus';
		}else{
			echo 'Gagal dihapus';
		}
			redirect('management/scheduleML');
    }

    public function champion()
    {
        $data['title'] = 'Hasil Pertandingan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $myevent = "SELECT * FROM tournament_result
        WHERE is_active='1' AND status_event='3' AND role_id=".$this->session->userdata('role_id')." AND 
              namaPanitia='".$this->session->userdata('nama_yanglogin')."'";
        $this->data['hasil'] = $this->panitia_model_crud->getQuery($myevent);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('panitia/management/vi_champion/champion', $this->data);
        $this->load->view('templates/footer');
    }
    
    public function formviewPemenang($id, $show)
    {
       // $data['dataviewPemenang'] = $this->admin_m_model_crud->dataviewPemenang('tournament_regis',$id);
        // $viewPemenang = "SELECT * FROM tournament_regis WHERE idGame='1'";
        $data['title'] = 'Hasil Pertandingan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['dataviewPemenang'] = $this->panitia_model_crud->get_relasi_viewPemenang($id, $show);
        // echo "<pre>";
        // var_dump(data);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('panitia/management/vi_champion/viewTeam', $data);
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
            $this->load->view('panitia/management/vi_champion/create-champion', $data);
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
		$tambahChampion = $this->panitia_model_crud->tambahdataChampion('tournament_result',$data);
		if($tambahChampion > 0)
		{
			echo 'Berhasil disimpan';
		}else{
			echo 'Gagal disimpan';
		}
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New champion has been added !</div>');
			redirect('management/champion');
        }
    }
    
    public function insertChampion()
    {
        $nama_turnamen 	= $_POST['namaTurnamen'];
        $id_game	    = $_POST['idGame'];
        $nama_panitia	= $_POST['namaPanitia'];
		$juara_pertama	= $_POST['juaraPertama'];
		$juara_kedua 	= $_POST['juaraKedua'];
		$juara_ketiga	= $_POST['juaraKetiga'];
        $roleId	        = $_POST['role_id'];
        
        $data = array('namaTurnamen' => $nama_turnamen, 'idGame' => $id_game, 'juaraPertama' => $juara_pertama, 'juaraKedua' =>  $juara_kedua, 'juaraKetiga' => $juara_ketiga, 'namaPanitia' => $nama_panitia, 'role_id' => $roleId);
		$tambahChampion = $this->panitia_model_crud->tambahdataChampion('tournament_result',$data);
		if($tambahChampion > 0)
		{
			echo 'Berhasil disimpan';
		}else{
			echo 'Gagal disimpan';
		}
			redirect('management/champion');
    }

    public function deletePemenang($id)
	{
		$hapusPemenang = $this->panitia_model_crud->hapusdataPemenang('tournament_result',$id);
		if($hapusPemenang > 0)
		{
			echo 'Berhasil dihapus';
		}else{
			echo 'Gagal dihapus';
		}
			redirect('management/champion');
    }

    public function formeditPemenang($id)
    {
        $this->form_validation->set_rules('namaTurnamen', 'tournament name', 'required|trim');
        $this->form_validation->set_rules('juaraPertama', '1st place name', 'required|trim');
        $this->form_validation->set_rules('juaraKedua', '2nd place name', 'required|trim');
        $this->form_validation->set_rules('juaraKetiga', '3rd place name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Pemenang';
            $data['dataeditPemenang'] = $this->panitia_model_crud->dataeditPemenang('tournament_result',$id);
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('panitia/management/vi_champion/edit-champion', $data);
            $this->load->view('templates/footer');
        } else {
            $nama_turnamen 		= $_POST['namaTurnamen'];
            $nama_panitia 		= $_POST['namaPanitia'];
            $juara_pertama 		= $_POST['juaraPertama'];
            $juara_kedua 		= $_POST['juaraKedua'];
            $juara_ketiga 		= $_POST['juaraKetiga'];

		$data = array('namaTurnamen' => $nama_turnamen, 'namaPanitia' => $nama_panitia, 'juaraPertama' => $juara_pertama, 'juaraKedua' => $juara_kedua, 'juaraKetiga' => $juara_ketiga);
		$editPemenang = $this->panitia_model_crud->editdataPemenang('tournament_result',$data, $id);
		if($editPemenang > 0)
		{
			echo 'Berhasil disimpan';
		}else{
			echo 'Gagal disimpan';
        }
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">This champion data has been updated !</div>');
			redirect('management/champion');
        }
    }

    public function updatePemenang($id)
    {
		$nama_turnamen 		= $_POST['namaTurnamen'];
		$nama_panitia 		= $_POST['namaPanitia'];
		$juara_pertama 		= $_POST['juaraPertama'];
		$juara_kedua 		= $_POST['juaraKedua'];
		$juara_ketiga 		= $_POST['juaraKetiga'];
		$data = array('namaTurnamen' => $nama_turnamen, 'namaPanitia' => $nama_panitia, 'juaraPertama' => $juara_pertama, 'juaraKedua' => $juara_kedua, 'juaraKetiga' => $juara_ketiga);
		$editPemenang = $this->panitia_model_crud->editdataPemenang('tournament_result',$data, $id);
		if($editPemenang > 0)
		{
			echo 'Berhasil disimpan';
		}else{
			echo 'Gagal disimpan';
		}
			redirect('management/champion');
    }

    public function finishTour($id)
    {
        $finishTournament = $this->panitia_model_crud->turnamenSelesai('tournament_bagan',$id);
		if($finishTournament > 0){
                // echo 'Data Turnament Berhasil di Aacc';
          $where = ['idBagan'=> $id];
          $ambil_nama_tour = $this->panitia_model_crud->tampildata_dengankondisi('tournament_bagan', $where);
          foreach ($ambil_nama_tour as $r) {
            $data = [
              'idGame'        => $r['idGame'],
              'namaTurnamen'  => $r['namaTurnamen'],   
              'namaPanitia'   => $r['namaPanitia'],   
              'role_id'       => $r['role_id'],   
              'is_active'     => 4,   
            ];
          }
          $add_sukses = $this->panitia_model_crud->transferData('tournament_result', $data);
          if ($add_sukses == TRUE) {
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Tournament finished ! !</div>');
            redirect('management/scheduleML');
          }else {
            echo "Data req tour berhasil di acc, namun gagal dimasukkan ke tabel tur bagan";
          }
            }
        else{
                echo 'Data tur request gagal di acc';
            }
      }
}