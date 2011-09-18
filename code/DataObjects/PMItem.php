<?php

	class PMItem extends DataObject {
		static $db = array (
			'AlternateText' => 'Varchar(255)',
			'InternalLink' => 'Varchar(255)'
		);
	
		static $has_one = array (
			'SiteConfig' => 'SiteConfig',
			'PMItemFile' => 'Image',
		);

	static $summary_fields = array(
		'Thumbnail' => 'PMItemImage',  
		'AlternateText' => 'Texto alternativo'
	);

	function getThumbnail() {
	    if (((int) $this->PMItemFileID > 0) && (is_a($this->PMItemFile(),'Image')))  {
     	   return $this->PMItemFile()->CMSThumbnail();
	    } else {
     	   return _t('ShowcaseItem.NOTHUMB',"No thumbnail Available") ;
	    }
	}

	public function getCMSFields_forPopup(){
		return new FieldSet(

			new TextareaField('AlternateText', _t('ShowcaseItem.ALTERNATETEXT',"image description. max 255 characters")),
			new FileAttachmentField('PMItemFile', _t('ShowcaseItem.ShowcaseItemImage',"Please select the image for the slideshow"))
		);
	}	
	
	function onBeforeWrite(){
	      parent::onBeforeWrite();
	      $sc = SiteConfig::current_site_config($this->Locale);
	      $this->SiteConfigID = $sc->ID;
	 }		
	
}