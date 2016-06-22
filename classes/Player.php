<?php
class Player{
	public $name;
	public $position;

	public function __construct($name =' ', $position = '',$age = ''){
		$this->name = $name;
		$this->position = $position;
		$this->age = $age;
	}
}
?>