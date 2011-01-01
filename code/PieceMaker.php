<?php
class PieceMaker extends DataObjectDecorator {

	function extraStatics() {
		return array(
			'has_many' => array(
				'PMSlides' => 'PMSlide',
				'PMTransitions' => 'PMTransition',
			)
		);
	}

	public function updateCMSFields(FieldSet &$fields) {
		$Banners = new FileDataObjectManager(
				$this->owner,
				'PMSlides',
				'PMSlide',
				'PMSlideFile',
				array(
					'PMTitle' =>'Title'
				),
				'getCMSFields_forPopup'
		);
		$Banners->setAllowedFileTypes(array('swf','flv','png','jpg'));
		
		$PMTransition = new DataObjectManager(
			$this->owner,
			'PMTransitions',
			'PMTransition',
			array(
				'Pieces' => 'Pieces',
				'Time' => 'Time',
				'Transition' => 'Transition',
				'Delay' => 'Delay',
				'DepthOffset' => 'DepthOffset',
				'CubeDistance' => 'CubeDistance',
			),
			'getCMSFields_forPopup'
		);
	
		$fields->addFieldToTab( 'Root.Showcase', $Banners );		
		$fields->addFieldToTab( 'Root.Showcase', $PMTransition );		
	}	
}

class PieceMakerDecorator extends DataObjectDecorator{
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

	      swfobject.embedSWF("PieceMaker/flash/piecemaker.swf", "PieceMaker-container", "940", "430", "10", "PieceMaker/flash/expressInstall.swf", flashvars, params, attributes);
		
		');
	}	
}

class PieceMaker_ControllerExtension extends Extension {
	
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

class PieceMaker_ImageDecorator extends DataObjectDecorator {
	public function FullImageURL() {
		$url = $this->owner->getRelativePath();
		return Director::absoluteURL($url);	
	}
}