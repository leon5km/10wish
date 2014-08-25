<?php
class IndexAction extends Action{
	public function index(){
	}
	
	public function array_shift(){
		$stack = array("orange", "banana", "apple", "raspberry");
		$fruit = array_shift($stack);
		print_r($stack);
		var_dump($fruit);
		var_dump($stack);
	}
};
?>