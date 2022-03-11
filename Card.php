<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home page
 */
class Card extends MY_Controller {

	public function test(){
		$num=7;
		echo round(7/2)*2;
	}

	public function index()
	{
		$this->load->library('pdf_card');
		$data=array(
			array(
				'school_name'=>'鮑思高粵華中小學',
				'school_abbr'=>'CDBYW',
				'name_zh'=>'陳大民',
				'name_pt'=>'CHAN DAI MAN',
				'gender'=>'M',
				'weight'=>'E -27KG',
				'student_card'=>''
			),
			array(
				'school_name'=>'嘉諾撒聖心英文小學',
				'school_abbr'=>'SCJ I',
				'name_zh'=>'李美麗',
				'name_pt'=>'LEI MEI LAI',
				'gender'=>'F',
				'weight'=>'E +48KG',
				'student_card'=>'student_card.jpg'
			),
			array(
				'school_name'=>'鮑思高粵華中小學',
				'school_abbr'=>'CDBYW',
				'name_zh'=>'陳大民2',
				'name_pt'=>'CHAN DAI MAN',
				'gender'=>'M',
				'weight'=>'E -27KG',
				'student_card'=>'student_card.jpg'
			),
			array(
				'school_name'=>'嘉諾撒聖心英文小學',
				'school_abbr'=>'SCJ I',
				'name_zh'=>'李美麗2',
				'name_pt'=>'LEI MEI LAI',
				'gender'=>'F',
				'weight'=>'E +48KG',
				'student_card'=>''
			),
			array(
				'school_name'=>'鮑思高粵華中小學',
				'school_abbr'=>'CDBYW',
				'name_zh'=>'陳大民3',
				'name_pt'=>'CHAN DAI MAN',
				'gender'=>'M',
				'weight'=>'E -27KG',
				'student_card'=>'student_card.jpg'
			),
		);
		$this->pdf_card->print_out($data);
	}

}
