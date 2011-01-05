<?php
class PieceMaker extends DataObjectDecorator {

	function extraStatics() {

		return array(
			'db' =>  array(
				'ImageWidth' => 'Varchar',
				'ImageHeight' => 'Varchar',
				'LoaderColor' => 'Varchar',
				'InnerSideColor' => 'Varchar',
				'SideShadowAlpha' => 'Varchar',
				'DropShadowAlpha' => 'Varchar',
				'DropShadowDistance' => 'Varchar',
				'DropShadowScale' => 'Varchar',
				'DropShadowBlurX' => 'Varchar',
				'DropShadowBlurY' => 'Varchar',
				'MenuDistanceX' => 'Varchar',
				'MenuDistanceY' => 'Varchar',
				'MenuColor1' => 'Varchar',
				'MenuColor2' => 'Varchar',
				'MenuColor3' => 'Varchar',
				'ControlSize' => 'Varchar',
				'ControlDistance' => 'Varchar',
				'ControlColor1' => 'Varchar',
				'ControlColor2' => 'Varchar',
				'ControlAlpha' => 'Varchar',
				'ControlAlphaOver' => 'Varchar',
				'ControlsX' => 'Varchar',
				'ControlsY' => 'Varchar',
				'ControlsAlign' => 'Varchar',
				'TooltipHeight' => 'Varchar',
				'TooltipColor' => 'Varchar',
				'TooltipTextY' => 'Varchar',
				'TooltipTextStyle' => 'Varchar',
				'TooltipTextColor' => 'Varchar',
				'TooltipMarginLeft' => 'Varchar',
				'TooltipMarginRight' => 'Varchar',
				'TooltipTextSharpness' => 'Varchar',
				'TooltipTextThickness' => 'Varchar',
				'InfoWidth' => 'Varchar',
				'InfoBackground' => 'Varchar',
				'InfoBackgroundAlpha' => 'Varchar',
				'InfoMargin' => 'Varchar',
				'InfoSharpness' => 'Varchar',
				'InfoThickness' => 'Varchar',
				'Autoplay' => 'Varchar',
				'FieldOfView' => 'Varchar'
			),
			'has_many' => array(
				'PMSlides' => 'PMSlide',
				'PMTransitions' => 'PMTransition',
			),
			'defaults' => array(
				'ImageWidth' => '940',
				'ImageHeight' => '400',
				'LoaderColor' => '0x333333',
				'InnerSideColor' => '0x222222',
				'SideShadowAlpha' => '0.8',
				'DropShadowAlpha' => '0.7',
				'DropShadowDistance' => '15',
				'DropShadowScale' => '0.95',
				'DropShadowBlurX' => '40',
				'DropShadowBlurY' => '4',
				'MenuDistanceX' => '20',
				'MenuDistanceY' => '30',
				'MenuColor1' => '0x999999',
				'MenuColor2' => '0x333333',
				'MenuColor3' => '0xFFFFFF',
				'ControlSize' => '100',
				'ControlDistance' => '20',
				'ControlColor1' => '0x222222',
				'ControlColor2' => '0xFFFFFF',
				'ControlAlpha' => '0.8',
				'ControlAlphaOver' => '0.95',
				'ControlsX' => '450',
				'ControlsY' => '280',
				'ControlsAlign' => 'center',
				'TooltipHeight' => '30',
				'TooltipColor' => '0x222222',
				'TooltipTextY' => '5',
				'TooltipTextStyle' => 'P-Italic',
				'TooltipTextColor' => '0xFFFFFF',
				'TooltipMarginLeft' => '5',
				'TooltipMarginRight' => '7',
				'TooltipTextSharpness' => '50',
				'TooltipTextThickness' => '-100',
				'InfoWidth' => '400',
				'InfoBackground' => '0xFFFFFF',
				'InfoBackgroundAlpha' => '0.95',
				'InfoMargin' => '15',
				'InfoSharpness' => '0',
				'InfoThickness' => '0',
				'Autoplay' => '10',
				'FieldOfView' => '45'				
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

		$fields->addFieldsToTab("Root.PiecemakerSettings",array(
			new TextField('ImageWidth',_t('PieceMaker.IMAGEWIDTH',"Image Width")),
			new TextField('ImageHeight',_t('PieceMaker.IMAGEHEIGHT',"Image Height")),
			new TextField('LoaderColor',_t('PieceMaker.LOADERCOLOR',"Loader Color")),
			new TextField('InnerSideColor',_t('PieceMaker.INNERSIDECOLOR',"Inner Side Color")),
			new TextField('SideShadowAlpha',_t('PieceMaker.SIDESHADOWALPHA',"Side Shadow Alpha")),
			new TextField('DropShadowAlpha',_t('PieceMaker.DROPSHADOWALPHA',"Drop Shadow Alpha")),
			new TextField('DropShadowDistance',_t('PieceMaker.DROPSHADOWDISTANCE',"Drop Shadow Distance")),
			new TextField('DropShadowScale',_t('PieceMaker.DROPSHADOWSCALE',"Drop Shadow Scale")),
			new TextField('DropShadowBlurX',_t('PieceMaker.DROPSHADOWBLURX',"Drop Shadow Blur X")),
			new TextField('DropShadowBlurY',_t('PieceMaker.DROPSHADOWBLURY',"Drop Shadow Blur Y")),		
			new TextField('MenuDistanceX',_t('PieceMaker.MENUDISTANCEX',"Menu Distance X")),
			new TextField('MenuDistanceY',_t('PieceMaker.MENUDISTANCEY',"Menu Distance Y")),		
			new TextField('MenuColor1',_t('PieceMaker.MENUCOLOR1',"Menu Color 1")),
			new TextField('MenuColor2',_t('PieceMaker.MENUCOLOR2',"Menu Color 2")),		
			new TextField('MenuColor3',_t('PieceMaker.MENUCOLOR3',"Menu Color 3")),			
			new TextField('ControlSize',_t('PieceMaker.CONTROLSIZE',"Control Size")),
			new TextField('ControlDistance',_t('PieceMaker.CONTROLDISTANCE',"Control Distance")),		
			new TextField('ControlColor1',_t('PieceMaker.CONTROLCOLOR1',"Control Color 1")),
			new TextField('ControlColor2',_t('PieceMaker.CONTROLCOLOR2',"Control Color 2")),		
			new TextField('ControlAlpha',_t('PieceMaker.CONTROLALPHA',"Control Alpha")),
			new TextField('ControlAlphaOver',_t('PieceMaker.CONTROLALPHAOVER',"Control Alpha Over")),		
			new TextField('ControlsX',_t('PieceMaker.CONTROLSX',"Controls X")),
			new TextField('ControlsY',_t('PieceMaker.CONTROLSY',"Controls Y")),
			new TextField('ControlsAlign',_t('PieceMaker.CONTROLSALIGN',"Controls Align")),
			new TextField('TooltipHeight',_t('PieceMaker.TOOLTIPHEIGHT',"Tooltip Height")),
			new TextField('TooltipColor',_t('PieceMaker.TOOLTIPCOLOR',"Tooltip Color")),
			new TextField('TooltipTextY',_t('PieceMaker.TOOLTIPTEXTY',"Tooltip Text Y")),
			new TextField('TooltipTextStyle',_t('PieceMaker.TOOLTIPTEXTSTYLE',"Tooltip Text Style")),
			new TextField('TooltipTextColor',_t('PieceMaker.TOOLTIPTEXTCOLOR',"Tooltip Text Color")),
			new TextField('TooltipMarginLeft',_t('PieceMaker.TOOLTIPMARGINLEFT',"Tooltip Margin Left")),
			new TextField('TooltipMarginRight',_t('PieceMaker.TOOLTIPMARGINRIGHT',"Tooltip Margin Right")),
			new TextField('TooltipTextSharpness',_t('PieceMaker.TOOLTIPTEXTSHARPNESS',"Tooltip Text Sharpness")),
			new TextField('TooltipTextThickness',_t('PieceMaker.TOOLTIPTEXTTHICKNESS',"Tooltip Text Thickness")),
			new TextField('InfoWidth',_t('PieceMaker.INFOWIDTH',"Info Width")),
			new TextField('InfoBackground',_t('PieceMaker.INFOBACKGROUND',"Info Background")),
			new TextField('InfoBackgroundAlpha',_t('PieceMaker.INFOBACKGROUNDALPHA',"Info Background Alpha")),		
			new TextField('InfoMargin',_t('PieceMaker.INFOMARGIN',"Info Margin")),
			new TextField('InfoSharpness',_t('PieceMaker.INFOSHARPNESS',"Info Sharpness")),
			new TextField('InfoThickness',_t('PieceMaker.INFOTHICKNESS',"Info Thickness")),
			new TextField('Autoplay',_t('PieceMaker.AUTOPLAY',"Autoplay")),
			new TextField('FieldOfView',_t('PieceMaker.FIELDOFVIEW',"Field Of View"))
		));
		
		
		
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

	      swfobject.embedSWF("PieceMaker/flash/piecemaker.swf", "PieceMaker-container", "960", "475", "10", "PieceMaker/flash/expressInstall.swf", flashvars, params, attributes);
		
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