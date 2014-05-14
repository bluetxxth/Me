<?php 

class CBlog extends CContent{
	
	private $res;
	
	/**
	 * Constructs an object of type CConent
	 */
	function __construct($db){
		parent::__construct($db);
	}
	
	
	/**
	 * get the blog's content
	 */
	public function getContent(){
		
		$this-> res = parent::getBlogContent();	
		
		return $this->res;
	}
	
}