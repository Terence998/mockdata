<?php 
require_once APPPATH.'third_party/TCPDF/tcpdf.php';

class Pdf_card {
	protected $centerLine;
	protected $no_card;	

    public function print_out($data=null){
    	$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Hubis');
		$pdf->SetTitle('Staff Card');
		$pdf->SetSubject('Judo competition staff card');
		$pdf->SetKeywords('Hubis, Judo, School, Academic, Staff Card');
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(0);
		$pdf->SetFooterMargin(0);

		// remove default footer
		$pdf->setPrintFooter(false);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
		    require_once(dirname(__FILE__).'/lang/eng.php');
		    $pdf->setLanguageArray($l);
		}

		// ---------------------------------------------------------


		$this->no_card="在此賽期間請放入\n學生證或身份證";
		$this->centerLine=44;
		// set font
		$pdf->SetFont('times', '', 48);
		//$i=0;
		$dataSize=count($data);
		 for ($i=0; $i <$dataSize; $i+=2){

			// add a page
			$pdf->AddPage();
			// -- set new background ---

			// get the current page break margin
			$bMargin = $pdf->getBreakMargin();
			// get current auto-page-break mode
			$auto_page_break = $pdf->getAutoPageBreak();
			// disable auto-page-break
			$pdf->SetAutoPageBreak(false, 0);
			// restore auto-page-break status
			$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
			// set the starting point for the page content
			$pdf->setPageMark();

			// set bacground image
			$img_file = base_url('/images/card.jpg');
			$pdf->Image($img_file, 5, 13, 200, 0, '', '', '', false, 300, '', false, false, 0);
			$pdf->Image($img_file, 5, 150, 200, 0, '', '', '', false, 300, '', false, false, 0);

			$baseY=50;
			$this->draw($pdf,$data[$i],$baseY);
			if(!isset($data[$i+1])){
				break;
			};
			$baseY=188;
			$this->draw($pdf,$data[$i+1],$baseY);

		 } 
		//Close and output PDF document
		$pdf->Output('example_051.pdf', 'I');

	//============================================================+
	// END OF FILE
	//============================================================+}

    }

    private function draw($pdf, $data, $baseY=0){
		$no_card=$this->no_card;
		$centerLine=$this->centerLine;

		$pdf->SetFont('msungstdlight', 'B', 20);
		$pdf->setXY($centerLine+72,$baseY+50);
		$pdf->MultiCell(80, 10, $no_card, 0,'C');

		$pdf->setXY($centerLine,$baseY+5);
		$pdf->Cell(20,10,$data['school_name'],0,1,'C');
		$pdf->setXY($centerLine,$baseY+30);
		$pdf->Cell(20,10,$data['name_zh'],0,1,'C');

		$pdf->SetFont('kozgopromedium', 'B', 20);
		$pdf->setXY($centerLine,$baseY+40);
		$pdf->Cell(20,10,$data['name_pt'],0,1,'C');

		$pdf->SetFont('kozgopromedium', 'B', 20);
		$pdf->setXY($centerLine,$baseY+15);
		$pdf->Cell(20,10,$data['school_abbr'],0,1,'C');

		if($data['gender']=='F'){
			$pdf->SetTextColor(255, 0, 0);
		}else{
			$pdf->SetTextColor(0, 0, 255);
		}
		$pdf->SetFont('kozgopromedium', 'B', 50);
		$pdf->setXY($centerLine,$baseY+50);
		$pdf->Cell(20,10,$data['weight'],0,1,'C');
		$pdf->SetTextColor(0, 0, 0);
    }
}
