<?php 
require_once APPPATH.'third_party/TCPDF/tcpdf.php';

class Pdf_card {

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
		// set bacground image
		//$img_file = K_PATH_IMAGES.'image_demo.jpg';
		$img_file = base_url('/images/card.jpg');
		$pdf->Image($img_file, 5, 13, 200, 0, '', '', '', false, 300, '', false, false, 0);
		$pdf->Image($img_file, 5, 150, 200, 0, '', '', '', false, 300, '', false, false, 0);
		// restore auto-page-break status
		$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
		// set the starting point for the page content
		$pdf->setPageMark();
		$pdf->text(50,50,count($data));

		$no_card="在此賽期間請放入\n學生證或身份證";
		$centerLine=44;
		$baseY=50;

		$pdf->SetFont('msungstdlight', 'B', 20);
		if($data[$i]['student_card']==''){
			$pdf->setXY($centerLine+72,$baseY+50);
			$pdf->MultiCell(80, 10, $no_card, 0,'C');
		}else{
			$pdf->Image(base_url('/images/'.$data[$i]['student_card']), $centerLine+71, $baseY+35, 80, 0, '', '', '', false, 300, '', false, false, 0);	
		}
		$pdf->setXY($centerLine,$baseY+5);
		$pdf->Cell(20,10,$data[$i]['school_name'],0,1,'C');
		$pdf->setXY($centerLine,$baseY+30);
		$pdf->Cell(20,10,$data[$i]['name_zh'],0,1,'C');

		$pdf->SetFont('times', 'B', 20);
		$pdf->setXY($centerLine,$baseY+40);
		$pdf->Cell(20,10,$data[$i]['name_pt'],0,1,'C');
		//$pdf->SetFont('helvetica', 'B', 40);
		//$pdf->SetFont('kozminproregular', 'B', 40);
		//$pdf->SetFont('pdfahelvetica', 'B', 40);
		//$pdf->SetFont('stsongstdlight', 'B', 40);

		$pdf->SetFont('kozgopromedium', 'B', 20);
		$pdf->setXY($centerLine,$baseY+15);
		$pdf->Cell(20,10,$data[$i]['school_abbr'],0,1,'C');

		if($data[$i]['gender']=='F'){
			$pdf->SetTextColor(255, 0, 0);
		}else{
			$pdf->SetTextColor(0, 0, 0);
		}
		$pdf->SetFont('kozgopromedium', 'B', 50);
		$pdf->setXY($centerLine,$baseY+50);
		$pdf->Cell(20,10,$data[$i]['weight'],0,1,'C');

		//block 2 , second card at below
		if(!isset($data[$i+1])){
			break;
		};
		$baseY=188;
		$pdf->SetFont('msungstdlight', 'B', 20);
		if($data[$i+1]['student_card']==''){
			$pdf->setXY($centerLine+72,$baseY+50);
			$pdf->MultiCell(80, 10, $no_card, 0,'C');
		}else{
			$pdf->Image(base_url('/images/'.$data[$i+1]['student_card']), $centerLine+71, $baseY+35, 80, 0, '', '', '', false, 300, '', false, false, 0);	
		}

		$pdf->setXY($centerLine,$baseY+5);
		$pdf->Cell(20,10,$data[$i+1]['school_name'],0,1,'C');
		$pdf->setXY($centerLine,$baseY+30);
		$pdf->Cell(20,10,$data[$i+1]['name_zh'],0,1,'C');


		$pdf->SetFont('times', 'B', 20);
		$pdf->setXY($centerLine,$baseY+40);
		$pdf->Cell(20,10,$data[$i+1]['name_pt'],0,1,'C');
		//$pdf->SetFont('helvetica', 'B', 40);
		//$pdf->SetFont('kozminproregular', 'B', 40);
		//$pdf->SetFont('pdfahelvetica', 'B', 40);
		//$pdf->SetFont('stsongstdlight', 'B', 40);

		$pdf->SetFont('kozgopromedium', 'B', 20);
		$pdf->setXY($centerLine,$baseY+15);
		$pdf->Cell(20,10,$data[$i+1]['school_abbr'],0,1,'C');

		if($data[$i]['gender']=='F'){
			$pdf->SetTextColor(255, 0, 0);
		}else{
			$pdf->SetTextColor(0, 0, 0);
		}
		$pdf->SetFont('kozgopromedium', 'B', 50);
		$pdf->setXY($centerLine,$baseY+50);
		$pdf->Cell(20,10,$data[$i+1]['weight'],0,1,'C');


		// Print a text
	//	$html = '<span style="color:Red;text-align:center;font-weight:bold;font-size:80pt;">PAGE 3</span>';
	//	$pdf->writeHTML($html, true, false, true, false, '');

		// ---------------------------------------------------------

	 } 
	//Close and output PDF document
	$pdf->Output('example_051.pdf', 'I');

	//============================================================+
	// END OF FILE
	//============================================================+}


    }

}