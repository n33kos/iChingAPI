<?php
	require './Hexagram.php';

	header("Access-Control-Allow-Origin: *");

	$lines = isset($_REQUEST['lines']) && $_REQUEST['lines'] != "" ? $_REQUEST['lines'] : null;
	$method = isset($_REQUEST['cast']) && $_REQUEST['cast'] != "" ? $_REQUEST['cast'] : null;

	if (!empty($method) || !empty($lines)) {
		cast($method, $lines);
	} else {
		home();
	}

	function home() {
		echo '
			<h1>Welcome to the iChing API 0.1.0</h1>
			<h3>/hexagram?cast=threecoin&lines=997867</h3>
			<ul>
				<li><pre>?lines=997876</pre>Get hexagram (6,7,8,9 notation))</li>
				<li><pre>?cast=yarrow</pre>Get hexagram Method (threecoin|yarrow)</li>
			</ul>
		';
	}

	function cast($method, $lines) {
		if(empty($lines)) {
			for ($i=0; $i < 6; $i++) {
				$lines .= getLine($method);
			}
		}

		echo json_encode( new Hexagram($lines) );
		return 200;
	}

	//----------------Utility Functions-----------------
	function getLine ($method) {
		if($method == "threecoin"){
			//-------------Three Coin Method----------
			$val1 = rand(1,100);
			$val2 = rand(1,100);
			$val3 = rand(1,100);
			if ($val1 > 50){
				if ($val2 > 50){
					if ($val3 > 50){
						return "9";
					}else{
						return "8";
					}
				}else{
					if ($val3 > 50){
						return "8";
					}else{
						return "7";
					}
				}
			}else{
				if ($val2 < 50){
					if ($val3 < 50){
						return "6";
					}else{
						return "7";
					}
				}else{
					if ($val3 < 50){
						return "7";
					}else{
						return "8";
					}
				}
			}
		}elseif($method == "yarrow"){
			//-------------Yarrow Stalk Method----------
			$WuChi = 1;

			$lefthand = rand(1,49);
			$righthand = 49-$lefthand;

			$pile = [];
			for ($i = 0; $i < 3; $i++){

				if($i > 0){
					$total = $lefthand+$righthand;
					$lefthand = rand(1,$total);
					$righthand = $total-$lefthand;
				}
				$pile[$i] += 1;
				$righthand -= 1;

				$runningleft = 0;
				$runningright = 0;
				$runningleft = $lefthand <= 4 ? $lefthand : ($lefthand % 4 == 0 ? 4 : $lefthand % 4);
				$lefthand -= $runningleft;
				$runningright += $righthand <= 4 ? $righthand : ($righthand % 4 == 0 ? 4 : $righthand % 4);
				$righthand -= $runningright;

				$pile[$i] = $runningleft+$runningright;
			}

			if($pile[0] > 5){
				if($pile[1] > 5){
					if($pile[2] > 5){
						return "6";
					}else{
						return "8";
					}
				}else{
					if($pile[2] > 5){
						return "8";
					}else{
						return "7";
					}
				}
			}else{
				if($pile[1] < 5){
					if($pile[2] < 5){
						return "9";
					}else{
						return "7";
					}
				}else{
					if($pile[2] < 5){
						return "7";
					}else{
						return "8";
					}
				}
			}
		}
	}
?>
