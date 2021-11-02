<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel extends CI_Controller {

	// Load database
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
		
	}

	public function index() {
		$isi['content'] 	= 'tampil_laporan';
		$isi['judul'] 		= 'Master';
		$isi['sub_judul'] 	= 'Laporan';
		$isi['data']		= $this->db->get('asrama');
		
		$this->load->view('backend/tampil_home', $isi);
	}

	public function import(){
		
		$fileName = $this->input->post('file', TRUE);

		$config['upload_path'] = FCPATH.'uploads/excel/'; 
		$config['file_name'] = $fileName;
		$config['allowed_types'] = 'xls|xlsx';
		$config['max_size'] = 10000;

		$this->load->library('upload', $config);
		$this->upload->initialize($config); 
		
		if (!$this->upload->do_upload('file')) {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('error','Ada kesalahan dalam upload'); 
			redirect('admin/alumni'); 
		} else {
			$media = $this->upload->data();
			$inputFileName = $this->upload->data('full_path');
			
			try {
				$inputFileType = IOFactory::identify($inputFileName);
				$objReader = IOFactory::createReader($inputFileType);
				$objPHPExcel = $objReader->load($inputFileName);
			} catch(Exception $e) {
				die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
			}

			$sheet = $objPHPExcel->getSheet(0);
			$highestRow = $sheet->getHighestRow();
			$highestColumn = $sheet->getHighestColumn();

			for ($row = 2; $row <= $highestRow; $row++){  
				$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
					NULL,
					TRUE,
					FALSE);

				$data = array(
					"id"=> $rowData[0][0],
					"username"=> $rowData[0][1]
				);
				$key = $data['id'];
				$this->load->model('model_alumni');
				$query = $this->model_alumni->getdata($key);
				if($query->num_rows() > 0)
				{
					$this->model_alumni->getupdate_username($key,$data);
				}else{
					$this->model_alumni->getinsert_username($data);
				}
			} 
			$this->session->set_flashdata('Pesan','File Excel Berhasil di upload.'); 
			redirect('admin/alumni');
		}  
	} 
	
	public function export(){
    	//membuat objek
		$objPHPExcel = new PHPExcel();
		$this->db->select('id,username');
		$data = $this->db->get('alumni');

    	//nama field baris pertama
		$fields = $data->list_fields();
		$col = 0;
		foreach ($fields as $field) {
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col,1,$field);
			$col++;
		}

    	//mengambil data
		$row = 2;
		foreach ($data->result() as $data ) {
			$col = 0;
			foreach ($fields as $field) {
				$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col,$row,$data->$field);
				$col++;
			}
			$row++;
		}
		$objPHPExcel->setActiveSheetIndex(0);

    	//set title
		$objPHPExcel->getActiveSheet()->setTitle('Data username');

    	//save ke .xlsx, kalau ingin .xls ubah 'Excel2007' menjadi 'Excel5'
		$objWriter = IOFactory::createWriter($objPHPExcel,'Excel2007');

    	//header
		header("Last-Modified:" .gmdate("D,d M Y H:i:s")."GMT");
		header("Cache-Control:no-store, no-cache, must-revalidate");
		header("Cache-Control:post-check=0, pre-check=0",false);
		header("Pragma:no-cache");
		header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

    	//nama file
		header('Content-Disposition:attachment;filename="data_username.xlsx" ');

    	//download
		$objWriter->save('php://output');
	}

}