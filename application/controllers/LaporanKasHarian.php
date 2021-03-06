<?php

class LaporanKasHarian extends CI_Controller {

  public function __construct(){
    parent::__construct();
    is_logged_in();
    $this->load->model('LaporanKasHarian_model', 'laporan_kas_harian');
  }
  
  public function index(){
    $data['judul'] = 'Laporan Kas Harian';
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();

    
    $this->load->library('pagination');

    $config['base_url'] = base_url() . 'LaporanKasHarian/index';
    $config['total_rows'] = $this->laporan_kas_harian->countAllLaporanKas();
    $config['per_page'] = 10;
    $config['num-links'] = 3;

    // Initialize
    $data['start'] = $this->uri->segment(3);
    $this->pagination->initialize($config);

    if($this->input->post('submit')){
      $data['keyword'] = $this->input->post('keyword');
      $this->session->set_userdata('keyword', $data['keyword']);
    } else {
      $data['keyword'] = $this->session->set_userdata('keyword');
    }

    $data['laporan'] = $this->laporan_kas_harian->getAllDataLaporan($config['per_page'], $data['start'], $data['keyword']);

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('laporan_kas_harian/index', $data);
    $this->load->view('templates/footer');
  }

  public function deleteLaporan($id){
    $this->db->where('id', $id);
    $this->db->delete('laporan_kas_harian');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>');
    redirect('LaporanKasHarian');
  }

  public function setorKeBank(){
    $this->load->library('form_validation');

    $data['judul'] = 'Laporan Kas Harian';
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();
    
    $this->form_validation->set_rules('total_setor', 'Jumlah Setoran', 'required|numeric');
    $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
    
    if($this->form_validation->run() == false){
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('laporan_kas_harian/setor_ke_bank', $data);
      $this->load->view('templates/footer');
    } else {
      $this->laporan_kas_harian->setorKeBank();
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambah</div>');
      redirect('LaporanKasHarian');
    }
    
  }


  




}