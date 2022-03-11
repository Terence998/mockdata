<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home page
 */
class Pdf extends MY_Controller {

	public function index()
	{
		$this->load->library('pdf_judo_model');
		$data='<h3>pdf judo model</h3>';
		$this->pdf_judo_model->print_out($data);
	}

	public function html(){
		$this->render("pdf_html");
	}
	public function from_html(){
		$html=$this->load->view("pdf_html_plain",'',true);
		$this->load->library('pdf_judo_model');
		$this->pdf_judo_model->print_html($html);

	}
	public function from_svg_repechage(){
		$this->load->library('pdf_from_svg');
		$a=array('athletes'=>array('A','B'));
		$data=$this->load->view("pdf_svg_repechage",$a,true);
		$this->pdf_from_svg->print_out($data);
		//echo $data;
	}
	public function from_svg_64(){
		$this->load->library('pdf_from_svg');
		for($i=1;$i<65;$i++) {
			$athletes[]='Player '.$i;
		}
		for($i=1;$i<6;$i++) {
			$repechage[]='Repe '.$i;
		}
		$a['athletes']=$athletes;
		$a['repechage']=$repechage;

		$data=$this->load->view("pdf_svg_64",$a,true);
		$this->pdf_from_svg->print_out($data);
		//echo $data;
	}
	public function from_svg_32(){
		$this->load->library('pdf_from_svg');
		$a=array('athletes'=>array('A','B'));
		$data=$this->load->view("pdf_svg_32",$a,true);
		$this->pdf_from_svg->print_out($data);
		//echo $data;
	}
	public function from_svg_16(){
		$this->load->library('pdf_from_svg');
		$a=array('athletes'=>array('A','B'));
		$data=$this->load->view("pdf_svg_16",$a,true);
		$this->pdf_from_svg->print_out($data);
		//echo $data;
	}
	public function from_svg_8(){
		$this->load->library('pdf_from_svg');
		$a=array('athletes'=>array('A','B'));
		$data=$this->load->view("pdf_svg_8",$a,true);
		$this->pdf_from_svg->print_out($data);
		//echo $data;
	}
}
