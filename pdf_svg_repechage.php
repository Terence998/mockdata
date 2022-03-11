<svg width="660" height="1000">
<?php
	if(!isset($yStart)){
		$yStart=50;
		$xLeft=20;
		$xRight=450;
		$hBox=30;
		$wBox=120;
		$fontSize=20;
		$wLine=50;
		$hGap=40;
		$yNamePadding=20;
		$xNamePadding=10;
		$rx=15;
	}
	for($i=0;$i<2;$i++){
		$y=$hGap*$i+$yStart;
		$yName=$y+$yNamePadding;
		$xName=$xLeft+$xNamePadding;
  		echo '<rect height="'.$hBox.'" width="'.$wBox.'" y="'.$y.'" x="'.$xLeft.'" stroke="#000" fill="#fff" rx="'.$rx.'"/>';
  		echo '<text xml:space="preserve" text-anchor="start" font-family="Noto Sans JP" font-size="'.$fontSize.'" y="'.$yName.'" x="'.$xName.'" stroke-width="0" stroke="#000" fill="#000000">sadsfa</text>';
	}
	$y=$y+$hGap+($hBox/2);
	$x=$xLeft;
	$yName=$y+$yNamePadding;
	$xName=$x+$xNamePadding;
	echo '<rect height="'.$hBox.'" width="'.$wBox.'" y="'.$y.'" x="'.$x.'" stroke="#000" fill="#fff" rx="'.$rx.'"/>';
	echo '<text xml:space="preserve" text-anchor="start" font-family="Noto Sans JP" font-size="'.$fontSize.'" y="'.$yName.'" x="'.$xName.'" stroke-width="0" stroke="#000" fill="#000000">sadsfa</text>';

	for($i=0;$i<2;$i++){
		$y=$hGap*$i+$yStart;
		$yName=$y+$yNamePadding;
		$xName=$xRight+$wBox-$xNamePadding;
  		echo '<rect height="'.$hBox.'" width="'.$wBox.'" y="'.$y.'" x="'.$xRight.'" stroke="#000" fill="#fff" rx="'.$rx.'"/>';
  		echo '<text xml:space="preserve" text-anchor="end" font-family="Noto Sans JP" font-size="'.$fontSize.'" y="'.$yName.'" x="'.$xName.'" stroke-width="0" stroke="#000" fill="#000000">aaaaaa</text>';
	}

	$y=$y+$hGap+($hBox/2);
	$x=$xRight;
	$yName=$y+$yNamePadding;
	$xName=$xRight+$wBox-$xNamePadding;
	echo '<rect height="'.$hBox.'" width="'.$wBox.'" y="'.$y.'" x="'.$x.'" stroke="#000" fill="#fff" rx="'.$rx.'"/>';
	echo '<text xml:space="preserve" text-anchor="end" font-family="Noto Sans JP" font-size="'.$fontSize.'" y="'.$yName.'" x="'.$xName.'" stroke-width="0" stroke="#000" fill="#000000">aaaaaa</text>';	

	$lx1=$xLeft+$wBox;
	$rx1=$xRight;
	$y1=$yStart+($hBox/2);
	$lx2=$lx1+$wLine;
	$rx2=$rx1-$wLine;
	$y2=$y1+($hGap);
	$line=array($lx1,$y1,$lx2,$y1,$lx2,$y2,$lx1,$y2);
	echo '<polyline points="'.implode(',',$line).'"
        fill="none" stroke="black" />';	
	$line=array($rx1,$y1,$rx2,$y1,$rx2,$y2,$rx1,$y2);
	echo '<polyline points="'.implode(',',$line).'"
        fill="none" stroke="black" />';

	$lx1=$xLeft+$wBox+$wLine;
	$rx1=$xRight-$wLine;
	$y1=$yStart+($hBox/2)+($hGap/2);
	$lx2=$lx1+$wLine;
	$rx2=$rx1-$wLine;
	$y2=$y1+($hBox/2)+($hGap/2*3);
	$line=array($lx1,$y1,$lx2,$y1,$lx2,$y2,$lx1-$wLine,$y2);
	echo '<polyline points="'.implode(',',$line).'"
        fill="none" stroke="black" />';	
	$line=array($rx1,$y1,$rx2,$y1,$rx2,$y2,$rx1+$wLine,$y2);
	echo '<polyline points="'.implode(',',$line).'"
        fill="none" stroke="black" />';


    $x1=$xLeft+$wBox+($wLine*2);
    $y1=$yStart+($hBox/2)+($hGap/2*3);
    $x2=$xRight-($wLine*2);
	$line=array($x1,$y1,$x2,$y1);
	echo '<polyline points="'.implode(',',$line).'"
        fill="none" stroke="black" />';	
	
	$scaleX=230;
	$scaleY=130;
    $s=array(
    	$scaleX+0,$scaleY+30,
    	$scaleX+30,$scaleY+30,
    	$scaleX+30,$scaleY+30,
    	$scaleX+40,$scaleY+30,
    	$scaleX+60,$scaleY+60,
    	$scaleX+60,$scaleY+100,
    	$scaleX+60,$scaleY+140,
    	$scaleX+40,$scaleY+170,
    	$scaleX+30,$scaleY+170,
    	$scaleX+0,$scaleY+170,
    	$scaleX+0,$scaleY+170,
    	$scaleX+0,$scaleY+30,

    );
	$scaleX=530;
	$scaleY=30;
    $s2=array(
    	$scaleX+72,$scaleY+14,
    	$scaleX+99,$scaleY+14,
    	$scaleX+99,$scaleY+14,
    	$scaleX+113,$scaleY+14,
    	$scaleX+125,$scaleY+50,
    	$scaleX+125,$scaleY+95,
    	$scaleX+125,$scaleY+140,
    	$scaleX+113,$scaleY+177,
    	$scaleX+99,$scaleY+177,
    	$scaleX+72,$scaleY+177,
    	$scaleX+72,$scaleY+14,
    );

	$scaleX=30;
	$scaleY=30;
    $s1=array(
    	$scaleX+29,$scaleY+15,
    	$scaleX+56,$scaleY+15,
    	$scaleX+56,$scaleY+15,
    	$scaleX+71,$scaleY+15,
    	$scaleX+82,$scaleY+51,
    	$scaleX+82,$scaleY+96,
    	$scaleX+82,$scaleY+141,
    	$scaleX+71,$scaleY+178,
    	$scaleX+56,$scaleY+178,
    	$scaleX+29,$scaleY+178,
    	$scaleX+29,$scaleY+15,
    );

$shape1="
<path fill='none' stroke='#222222' stroke-width='1' stroke-linejoin='round' stroke-dashoffset='' fill-rule='nonzero' marker-start='' marker-mid='' marker-end='' d='
		M472,114 
		L499,114 
		L499,114 
		C513,114 
		525,150 
		525,195 
		C525,240 
		513,277 
		499,277 
		L472,277 
		L472,114  
z' style='color: rgb(0, 0, 0);' class='' id='svg_5' transform='rotate(180 270,150) '/>

";

$shape2="
<path fill='none' stroke='#222222' stroke-width='1' stroke-linejoin='round' stroke-dashoffset='' fill-rule='nonzero' marker-start='' marker-mid='' marker-end='' id='svg_2' d='
		M472,114 
		L499,114 
		L499,114 
		C513,114 
		525,150 
		525,195 
		C525,240 
		513,277 
		499,277 
		L472,277 
		L472,114  
 z' style='color: rgb(0, 0, 0);' class=''/>
";


   
    $shape11="	<path fill='none' stroke='#222222' stroke-width='1' stroke-linejoin='round' stroke-dashoffset='' fill-rule='nonzero' marker-start='' marker-mid='' marker-end='' id='svg_8'
		d='
		M{$s[0]},{$s[1]}
		L{$s[2]},{$s[3]} 
		L{$s[4]},{$s[5]} 
		C{$s[6]},{$s[7]} 
		{$s[8]},{$s[9]} 
		{$s[10]},{$s[11]} 
		C{$s[12]},{$s[13]} 
		{$s[14]},{$s[15]} 
		{$s[16]},{$s[17]} 
		L{$s[18]},{$s[19]} 
		L{$s[20]},{$s[21]} 
		z' style='color: rgb(0, 0, 0);' class=''/>
		";
    $shape22='	<path fill="none" stroke="#222222" stroke-width="1" stroke-linejoin="round" stroke-dashoffset="" fill-rule="nonzero" marker-start="" marker-mid="" marker-end="" id="svg_8"
		d="
		M200,230
		L230,230
		L230,230 
		C243,230 
		260,260 
		260,300 
		C260,340 
		240,370 
		230,370 
		L200,370 
		L200,230 z" style="color: rgb(0, 0, 0);" class=""/>
		';
	echo $shape1;
	echo $shape2;
	echo $shape11;
	?>


</svg>