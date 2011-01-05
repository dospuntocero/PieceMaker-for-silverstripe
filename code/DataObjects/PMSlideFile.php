<?php
class PMSlideFile extends File {

	static $singular_name = "PMSlide File";
	static $plural_name = "PMSlide Files";
	
	static $has_one = array(
		'PMSlide' => 'PMSlide',
	);

	function getPMTitle(){
		if ($this->PMSlide() instanceof DataObject){
			return $this->PMSlide()->PMTitle;
		}else{
			return false;
		}
	}
}