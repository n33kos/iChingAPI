<?php
require './SQLiteConnection.php';

class Hexagram {
	public $number;
	public $title;
	public $unicodeCharacter;
	public $chineseTitle;
	public $upperTrigram;
	public $lowerTrigram;
	public $numbers;
	public $image;
	public $judgement;
	public $lines;
	public $normalizedAges;
	public $normalizedLines;
	public $description;
	public $descriptionJudgement;
	public $descriptionImage;
	public $descriptionLines;

	function __construct($hexagram_value){
		// $hexagram_value uses 6,7,8,9 notation
		// "668976"
		// 6 = old yin
		// 7 = young yang
		// 8 = young yin
		// 9 = old yang

    	$this->normalizedAges = "";
		for ($i = 0; $i < strlen($hexagram_value); $i++) {
			if($hexagram_value[$i] == "6" || $hexagram_value[$i] == "9"){
				$this->normalizedAges .= "1";
			}else{
				$this->normalizedAges .= "0";
			}
		}

		$this->normalizedLines = "";
		for ($i = 0; $i < strlen($hexagram_value); $i++) {
			if($hexagram_value[$i] == "6" || $hexagram_value[$i] == "8"){
				$this->normalizedLines .= "0";
			}else{
				$this->normalizedLines .= "1";
			}
		}

		$conn = new SQLiteConnection('./iChing.sqlite');
		$result = $conn->query('SELECT * FROM hexagrams WHERE binary="' . $this->normalizedLines . '";');

		$changingPositions = "";
		$changingInts = [];
		for ($i = 0; $i < strlen($this->normalizedAges); $i++) {
			if($this->normalizedAges[$i] == "1"){
				array_push($changingInts, strval($i+1));
			}
		}
		$changingPositions = implode(",", $changingInts);

		$lines = $conn->queryAll('SELECT * FROM changing_lines WHERE hexagram_id=' . $result['id'] . ' AND line_position IN (' . $changingPositions . ');');
		$linesStrings = [];
		$linesDescriptionStrings = [];
		foreach ($lines as $key => $value) {
			array_push($linesStrings, $value['text']);
			array_push($linesDescriptionStrings, $value['description']);
		}
		$linesString = implode("\n\n", $linesStrings);
		$linesDescriptionStrings = implode("\n\n", $linesDescriptionStrings);

		$this->numbers = $hexagram_value;
		$this->upperTrigram = $result['upper_trigram'];
		$this->lowerTrigram = $result['lower_trigram'];
		$this->title = $result['title'];
		$this->chineseTitle = $result['chinese_title'];
		$this->image = $result['image'];
		$this->judgement = $result['judgement'];
		$this->lines = $linesString;
		$this->unicodeCharacter = $result['unicode'];
		$this->number = $result['id'];
		$this->description = $result['description'];
		$this->descriptionJudgement = $result['description_judgement'];
		$this->descriptionImage = $result['description_image'];
		$this->descriptionLines = $linesDescriptionStrings;

		return $this;
	}
}
