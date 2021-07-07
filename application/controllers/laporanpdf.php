<?php
class Laporanpdf extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
    }


    public function export() {
        $this->load->view('laporanpdf/export');
    }

    function index(){
        $pdf = new FPDF('L','mm','A5');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);

        $pdf->Cell(190,7,'DAFTAR PEGAWAI',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'DISKOMINFO KOTA BATU',0,1,'C');

        $pdf->Cell(10,7,'',0,1,'C');

        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,6,'No',1,0,'C');
        $pdf->Cell(40,6,'NAMA',1,0,'C');
        $pdf->Cell(50,6,'ALAMAT',1,0,'C');
        $pdf->Cell(40,6,'JABATAN',1,0,'C');
        $pdf->Cell(40,6,'EMAIL',1,1,'C');

        $pdf->SetFont('Arial','',10);

        $pegawai = $this->db->get('pegawai')->result();
        $no=0;
        foreach ($pegawai as $row){
            $no++;
            $pdf->Cell(10,6,$no,1,0, 'C');
            $pdf->cell(40,6,$row->nama,1,0);
            $pdf->cell(50,6,$row->alamat,1,0);
            $pdf->cell(40,6,$row->jabatan,1,0);
            $pdf->cell(40,6,$row->email,1,1);
        }
        $pdf->Output();
    }
    
}
