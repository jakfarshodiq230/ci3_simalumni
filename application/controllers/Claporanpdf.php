<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Claporanpdf extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('model_laporan');
        $this->load->library('dompdf_gen');
    }
    
    public function index()
    {
        $isi['content']     = 'backend/laporan/tampil_laporan';
        $isi['judul']       = 'Master';
        $isi['sub_judul']   = 'Laporan';
        $isi['alumni']      = $this->model_laporan->semua_alumni();
        
        $this->load->view('backend/tampil_home', $isi);
    }
    
    public function cetakpdf(){
        $data['title'] = 'Cetak PDF Data Alumni'; 
        $data['alumni'] = $this->model_laporan->semua_alumni();
        
        $this->load->view('backend/laporan/vcetaklaporan', $data);
        
        $paper_size  = 'legal'; 
        $orientation = 'landscape'; 
        $html = $this->output->get_output();
        
        $this->dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_alumni_stkip_riau.pdf", array('Attachment'=>0));
    }

    public function cetaktahun(){
        $data['title'] = 'Cetak PDF Data Alumni Berdasarkan Tahun Lulus';
        $tahun = $this->input->get('tahun_lulus');
        $data['alumni'] = $this->model_laporan->semua_alumni_tahun($tahun); 
        
        $this->load->view('backend/laporan/vcetaklaporan', $data);
        
        $paper_size  = 'legal'; 
        $orientation = 'landscape'; 
        $html = $this->output->get_output();
        
        $this->dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_alumni_stkip_riau.pdf", array('Attachment'=>0));
    }

    public function cetakasrama(){
        $data['title'] = 'Cetak PDF Data Alumni Berdasarkan Jurusan';
        $asrama = $this->input->get('nama_asrama');
        $data['alumni'] = $this->model_laporan->semua_alumni_asrama($asrama); 
        
        $this->load->view('backend/laporan/vcetaklaporan', $data);
        
        $paper_size  = 'legal'; 
        $orientation = 'landscape'; 
        $html = $this->output->get_output();
        
        $this->dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_alumni_stkip_riau.pdf", array('Attachment'=>0));
    }
}