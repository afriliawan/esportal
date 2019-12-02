<!--TIDAK DI PAKAI-->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panitia extends CI_Controller 
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
        
		$data = array('namaTurnamen' => $nama_turnamen, 'idGame' => $id_game, 'jenisTurnamen' =>  $jenis_turnamen, 'namaPanitia' => $nama_panitia, 'slotMax' => $slot_max, 'biayaPendaftaran' => $biaya_pendaftaran, 'batasPendaftaran' => $batas_pendaftaran, 'tanggalTM' => $tanggal_tm, 'tanggalTurnamen' => $tanggal_turnamen,'tempatTurnamen' => $tempat_turnamen, 'noHP' => $no_hp, 'tanggalPosting' => $tanggal_posting, 'is_active' => $isActive);
		$tambahEvent = $this->panitia_model_crud->tambahdataEvent('tournament',$data);
		if($tambahEvent > 0)
		{
			echo 'Berhasil disimpan';
		}else{
			echo 'Gagal disimpan';
		}
			redirect('panitia/notifikasiPembayaran');
    }

    // public function konfirmasiPembayaran()
    // {
    //     $email_user         = $_POST['email'];
    //     $foto_struk 		= $_POST['fotoStruk'];
        
	// 	$data = array('email' => $email_user, 'fotoStruk' => $foto_struk);
	// 	$tambahPembayaran = $this->panitia_model_crud->tambahdataPembayaran('tournament',$data);
	// 	if($tambahPembayaran > 0)
	// 	{
	// 		echo 'Berhasil disimpan';
	// 	}else{
	// 		echo 'Gagal disimpan';
	// 	}
	// 		redirect('panitia/index');
    // }

    public function konfirmasiPembayaran()
    {
        $data['title'] = 'Payment Confirm';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();  
        
        $this->form_validation->set_rules('name', 'Full name', 'required|trim');

        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('panitia/management/payment-confirm', $data);
            $this->load->view('templates/footer');
        } else {
            $email = $this->input->post('email');

            //cek gambar yang di akan di upload
            $upload_image = $_FILES['image'];

            if ($upload_image){
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']      = '2048';
                $config['upload_path']   = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['tournament']['image'];
                    if($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name',$name);
            $this->db->where('email',$email);
            $this->db->update('user');

            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            redirect('user');
        }
    }
}