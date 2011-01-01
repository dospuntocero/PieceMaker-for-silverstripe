<?php

DataObject::add_extension('SiteConfig', 'PieceMaker');
DataObject::add_extension('Image_Cached','PieceMaker_ImageDecorator');

Object::add_extension('HomePage_Controller', 'PieceMaker_ControllerExtension');	
Object::add_extension('HomePage','PieceMakerDecorator');

SortableDataObject::add_sortable_class('PMSlide');
