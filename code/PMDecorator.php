<?php

class PMDecorator extends DataObjectDecorator{

	function extraStatics() {
		return array(
			'has_many' => array(
				'PMItems' => 'PMItem',
			)
		);
	}

	public function updateCMSFields(FieldSet &$fields) {
		$Banners = new DataObjectManager(
				$this->owner,
				'PMItems',
				'PMItem',
				array(
					"Thumbnail" => "Thumbnail",
					'AlternateText' =>'AlternateText'
				),
				'getCMSFields_forPopup'
		);
		$fields->addFieldToTab( 'Root.Showcase', $Banners );		
	}			
}

class PMDecorator_Controller extends SiteTreeDecorator { 

	public function contentcontrollerInit($controller) {
		Requirements::javascript("PieceMaker/javascript/swfaddress.js");
		Requirements::javascript("PieceMaker/javascript/swfobject.js");
		
		$xmllink = $controller->Link('sliderconfig');
		Requirements::customScript('
		
	      var attributes = {id:"PieceMaker-container"};

		  var flashvars = {};
	      flashvars.cssSource = "PieceMaker/css/piecemaker.css";
	      flashvars.xmlSource = "'.$xmllink.'";

	      var params = {};
	      params.play = "true";
	      params.menu = "false";
	      params.scale = "showall";
	      params.wmode = "transparent";
	      params.allowfullscreen = "true";
	      params.allowscriptaccess = "always";
	      params.allownetworking = "all";

	      swfobject.embedSWF("PieceMaker/flash/piecemaker.swf", "PieceMaker-container", "960", "475", "10", "PieceMaker/flash/expressInstall.swf", flashvars, params, attributes);
		
		');
	}	
}

class PMDecorator_Extension extends Extension{
	public static $allowed_actions = array(
		'sliderconfig'
	);
	
	function sliderconfig(){
		ContentNegotiator::disable();
		$configBody = $this->owner->renderWith('Config');
		$rsp = new SS_HTTPResponse($configBody,200,'OK');
		$rsp->addHeader('Content-Type', 'application/xml; charset="utf-8"');		
		return $rsp;		
	}
}


class PM_ImageDecorator extends DataObjectDecorator {
	public function FullImageURL() {
		$url = $this->owner->getRelativePath();
		return Director::absoluteURL($url);	
	}
}