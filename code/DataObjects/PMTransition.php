<?php
class PMTransition extends DataObject {

	static $singular_name = "PieceMaker Transition";
	static $plural_name = "PieceMaker Transitions";
	
	static $has_one = array(
		'SiteConfig' => 'SiteConfig',
	);

	static $db = array(
		'Pieces' => 'Varchar',
		'Time' => 'Varchar',
		'Transition' => "Enum('easeInOutSine,easeInOutQuad,easeInOutCubic,easeInOutQuart,easeInOutQuint,easeInOutExpo,easeInOutElastic,easeInOutBack,easeInOutBounce','easeInOutBack')",
		'Delay' => 'Varchar',
		'DepthOffset' => 'Varchar',
		'CubeDistance' => 'Varchar',
	);

	public function getCMSFields_forPopup(){
		
		$transition = new DropdownField('Transition',_t('PMTransition.TRANSITION',"Transition"),$this->dbObject('Transition')->enumValues());
		$transition->setEmptyString(_t('PMTransition.TRANSITION',"Select the slide transition type"));

		return new FieldSet(
			new TextField('Pieces',_t('PMTransition.PIECES',"Amount of Pieces the slide will be sliced 2-15 recomended")),
			new TextField('Time',_t('PMTransition.TIME',"Time for one cube to turn")),
			$transition,
			new TextField('Delay',_t('PMTransition.DELAY',"Delay between the start of one cube to the start of the next cube")),
			new TextField('DepthOffset',_t('PMTransition.DEPTHOFFSET',"The offset during transition on the z-axis. Value between 100 and 1000 are recommended. But go for experiments. :)")),
			new TextField('CubeDistance',_t('PMTransition.CUBEDISTANCE',"The distance between the cubes during transition. Values Between 5 and 50 are recommended. But go for experiments.:)"))		  
		);
	}
}
