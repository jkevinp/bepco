<?php namespace bepc\Libraries\BarcodeGenerator;
require('class/BCGFont.php');
require('class/BCGColor.php');
require('class/BCGDrawing.php'); 
include('class/BCGcode39.barcode.php'); // Including the barcode technology
include('class/BCGcode11.barcode.php'); // Including the barcode technology

include('class/BCGean8.barcode.php'); // Including the barcode technology
class BarcodeGenerator 
{
	
	function __construct()
	{
		
	}
	function output($key  , $type, $path){
		$filename = $key.".".$type;
		$fullpath = $path."\\".$key.".".$type;
		$barcode = $key ? $key : 'HELLO';
		// Loading Font
		$file = public_path().'\font\Arial.ttf';
		if(file_exists($file))
			$font = new BCGFont($file, 6);
		else 
			die('Font does not exist <Br/>'.$file);

		// The arguments are R, G, B for color.
		$color_black = new BCGColor(0, 0, 0);
		$color_white = new BCGColor(255,255,255); 

		$code = new BCGean8();
		$code->setScale(2); // Resolution
		$code->setThickness(15); // Thickness
		$code->setForegroundColor($color_black); // Color of bars
		$code->setBackgroundColor($color_white); // Color of spaces
		$code->setFont($font); // Font (or 0)
		$code->parse($key); // Text
		//$code->setDPI(72);
		/* Here is the list of the arguments
		1 - Filename (empty : display on screen)
		2 - Background color */
		$drawing = new BCGDrawing($fullpath, $color_white);
		$drawing->setBarcode($code);
		$drawing->draw();
		// Header that says it is an image (remove it if you save the barcode to a file)
		//header('Content-Type: image/png');
		// Draw (or save) the image into PNG format.
		$drawing->finish(BCGDrawing::IMG_FORMAT_PNG);
		return $filename;
	}
}


?>