<?php
class PMSlide extends DataObject {

	static $singular_name = "Piece Maker Slide";
	static $plural_name = "Piece Maker Slides";
	
	static $db = array(
		'PMTitle' => 'Varchar(255)'
	);

	static $has_one = array(
		'SiteConfig' => 'SiteConfig',
		'PMSlideFile' => 'File'
	);
	
	function onBeforeWrite(){
		parent::onBeforeWrite();
		$this->PMSlideFile->setName($this->PMTitle);		
	}
	
}