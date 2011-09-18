<?php

	Object::add_extension('SiteConfig','PMDecorator');
	Object::add_extension('Page','PMDecorator_Controller');
	Object::add_extension('ContentController', 'PMDecorator_Extension');
	DataObject::add_extension('Image_Cached','PM_ImageDecorator');
