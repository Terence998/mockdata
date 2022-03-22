<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home page
 */
class Draw extends MY_Controller {

	public function test2(){
		$this->load->library("draw_lots");
		$players=$this->get_players();
		$results=$this->draw_lots->get_result($players);
		foreach($results as $result){
			echo json_encode($result);
			echo '<br>';	
		}
	}
	public function get_players(){
		$data=array(
			array(
				'seq'=>1,
				'seed'=>True,
				'team'=>'TeamA',
				'name_zh'=>'Player 1',
			),
			array(
				'seq'=>2,
				'seed'=>True,
				'team'=>'TeamA',
				'name_zh'=>'Player 2',
			),
			array(
				'seq'=>3,
				'seed'=>True,
				'team'=>'TeamA',
				'name_zh'=>'Player 3',
			),
			array(
				'seq'=>4,
				'seed'=>False,
				'team'=>'TeamA',
				'name_zh'=>'Player 4',
			),
			array(
				'seq'=>5,
				'seed'=>False,
				'team'=>'TeamA',
				'name_zh'=>'Player 5',
			),
			array(
				'seq'=>6,
				'seed'=>False,
				'team'=>'TeamA',
				'name_zh'=>'Player 6',
			),
			array(
				'seq'=>7,
				'seed'=>False,
				'team'=>'TeamA',
				'name_zh'=>'Player 7',
			),
			array(
				'seq'=>8,
				'seed'=>False,
				'team'=>'TeamA',
				'name_zh'=>'Player 8',
			),
			array(
				'seq'=>9,
				'seed'=>False,
				'team'=>'TeamA',
				'name_zh'=>'Player 9',
			),
			array(
				'seq'=>10,
				'seed'=>False,
				'team'=>'TeamA',
				'name_zh'=>'Player 9',
			),
			array(
				'seq'=>11,
				'seed'=>False,
				'team'=>'TeamA',
				'name_zh'=>'Player 9',
			),
		);
		return $data;		
	}
}
