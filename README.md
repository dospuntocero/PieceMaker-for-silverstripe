# PieceMaker for SilverstripeCMS
PieceMaker for SilverstripeCMS is a 3d flash slideshow module that uses XML and is configured from SiteConfig


## maintainer contact

### Silverstripe Module 
 * 	Francisco Arenas : fa[at]dospuntocero[dot]cl  
	[dospuntocero.cl](http://dospuntocero.cl)
	
### Piecemaker Flash code
 * Modular web : welcome[at]modularweb[dot]com   
	[modularweb.net](http://modularweb.net/piecemaker)
	
## Dependencies

* [DataObjectManager](http://www.leftandmain.com/silverstripe-modules/2010/08/23/dataobjectmanager/)
* [KickAssets](http://www.leftandmain.com/silverstripe-modules/2011/08/25/kickassets/)

## How to use it

* Rename the folder to PieceMaker
* Add the dependencies if you haven't already in your project.
* Add the module to your silverstripe installation.
* run dev/build.
* open your admin's SiteConfig and go to Showcase tab.
* add some PMSlides.
* add <% include PieceMaker %> to the template you want to show the slideshow.
* you are done!

All the config stuff is inside Config.ss file, so endusers will not be able to screw things.