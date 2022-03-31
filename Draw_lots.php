<?php 

class Draw_lots {
    public function get_result($players){
		$players=$this->shuffle_players($players);
		$playerCount=sizeof($players);
		$gameSize=$this->get_game_size($players);
		$seedCount=$this->get_seed_size($players);
		$playList=array_fill(0,$gameSize-1,null);
		$playSequence=$this->get_eMap($gameSize);

		$chunk2=array_chunk($playSequence,sizeof($playSequence)/2);
		//assign upper bout players
		foreach ($chunk2[0] as $i) {
			$playList[$i]=array_shift($players);
		}
		//give empty bout priority to seed player
		$chunk2Lower=$this->unset_chunk2Lower($chunk2[1],$playerCount,$seedCount);
		//shuffle lower bout
		shuffle($chunk2Lower);
		//assign lower bout players
		foreach($chunk2Lower as $i){
			$playList[$i]=array_shift($players);
		}
		//shuffle bout upper with lower
		//$playList=$this->shuffle_bout($playList);
		//remove empty element/null in the playerList
		$playList=array_filter($playList, function($value) { return !is_null($value) && $value !== '';});
		//assign bout position for players	
		//display
		foreach($playList as $i=>$p){
			$playList[$i]['position']=$i;
		}
		//sort by Players sequence
		$columns = array_column($playList, 'bout_seq');
		array_multisort($columns, SORT_ASC, $playList);
		return $playList;
    }
	public function shuffle_bout($playList){
		$chunk2=array_chunk($playList,2);
		foreach($chunk2 as $c){
			if(!($c[0]['seed'] || $c[1]['seed'])){
					shuffle($c);
			}
			$pList[]=$c[0];
			$pList[]=$c[1];
		}
		return array_merge($pList);
	}
	public function get_eMap($num){
		$eMap=array(
			8=>[0,4,2,6,1,5,3,7],
			16=>[0,8,4,12,2,10,6,14,1,9,5,13,3,11,7,15],
			32=>[0,16,8,24,4,20,12,28,2,18,10,26,6,22,14,30,1,17,9,25,5,21,13,29,3,19,11,27,7,23,15,31],
			64=>[0,32,16,48,8,40,24,56,4,36,20,52,12,44,28,60,2,34,18,50,10,42,26,58,6,38,22,54,14,46,30,62,1,33,17,49,9,41,25,57,5,37,21,53,13,45,29,60,3,35,19,51,13,45,29,61,7,39,23,55,15,47,31,63]
		);
		return $eMap[$num];
	}

	public function	get_seed_size($arr){
		$cnt=0;
		foreach($arr as $a){
			if($a['seed']){
				$cnt++;
			}
		}
		return $cnt;
	}

	public function	get_game_size($arr){
		$size=count($arr);
		return pow(2,strlen(decbin($size-1)));
	}
	//shuffle players and move seed to from;
	public function shuffle_players($players){
		foreach ($players as $i=>$player){
			$players[$i]['bout_seq']=$i;
		}
		shuffle($players);
		$playerCount=count($players);
		$cnt=0;
		foreach($players as $i=>$p){
			if($p['seed']){
				$tmp=$players[$cnt];
				$players[$cnt]=$players[$i];
				$players[$i]=$tmp;
				$cnt++;
			}
		}
		return $players;
	}
	public function unset_chunk2Lower($arr,$playerCount,$seedCount){
		$arrSize=count($arr)*2;
		$blank=$arrSize/2-($playerCount-$arrSize/2);
		$blank=$blank>=4?$seedCount:$blank;
		$seedLower=array(0,$arrSize/4,$arrSize/8,$arrSize/4+1);
		for($i=0;$i<$blank;$i++){
			unset($arr[$seedLower[$i]]);
		}
		return array_values($arr);
	}

}
