<?php namespace bepc\Repositories\Eloquent;

use bepc\Repositories\Contracts\UserContract;
use bepc\Models\User;
use bepc\Models\UserBarcode;
use bepc\Libraries\BarcodeGenerator\BarcodeGenerator as BgcOutput;
use bcrypt;
class EloquentUserRepository implements UserContract
{

	public function find($id){
		return User::find($id);
	}
	public function store($param){
		$param['password'] = bcrypt($param['password']);
		return User::create($param);

	}
	public function sdelete(User $user){
		$user->forceDelete();
	}
	public function fdelete(User $user){
		
	}
	public function create_id(User $user ,UserBarcode $userbarcode){
		
		$barcodeurl = $userbarcode->path.$userbarcode->filename;
		$url = public_path().'/img-template/id.png'; //the image to use
        $background_url = public_path().'/img-template/background.png'; //the background
        $saveurl =public_path().'/img-idcard/id'.str_random(2).'.png'; //the name of the id
        $file_exists =file_exists($url); 
        
        $imagewidth = 336;
        $imageheight  = 220;

        $img = imagecreatetruecolor($imagewidth,$imageheight); //create the image
        imagealphablending($img, true);
        imagesavealpha($img, true);
        $background =  imagecolorallocate($img, 255,255,255);
        $text_colour = imagecolorallocate($img, 0, 0, 0 );
        $line_colour = imagecolorallocate($img,245, 215, 110);
        $text_black =  imagecolorallocate($img, 0,0,0);
        $label_color=  imagecolorallocate($img, 231, 76, 60   );
        $border_color= imagecolorallocate($img, 0, 0, 0); //create the border color
        $header_color= imagecolorallocatealpha($img, 255, 255, 255, 70);


        $barcode =          imagecreatefrompng($barcodeurl) ;
        $image_upload =     imagecreatefrompng(public_path().'/img-template/id.png');
        $background_img =   imagecreatefrompng($background_url);


        $sizex1=getimagesize($background_url)[0];
        $sizey1=getimagesize($background_url)[1];
        $sizex =getimagesize($url)[0];
        $sizey =getimagesize($url)[1];

        //imagecopyresized(dst_image, src_image, dst_x, dst_y, src_x, src_y, dst_w, dst_h, src_w, src_h)
        
        imagecopyresized($img, $background_img,0,0, 0 , 0 , $imagewidth, $imageheight,$sizex1,$sizey1); //41 is the width of the barcode
        imagefilledrectangle($img,0,0,$imagewidth,$imageheight,$header_color);  //create the header

        imagerectangle($img,1,1,$imagewidth-1,$imageheight-1,$border_color); //create the border
        
        imagettftext($img, 14, 0, 5, 40,$text_colour,public_path()."/font/Arial.ttf" ,env('APP_TITLE'));
        imagettftext($img, 14, 0, 5, 65,$text_colour,public_path()."/font/Arial.ttf" , "Identity Card");
        imagettftext($img, 9, 0, $imagewidth * 0.75, 20,$text_colour,public_path()."/font/Arial.ttf" , "ID:".str_pad($user->id, 7, "0", STR_PAD_LEFT));
        imagettftext($img, 9, 0, $imagewidth * 0.35, $imageheight * 0.45,$label_color,public_path()."/font/Arial.ttf" , "Name");
        imagettftext($img, 9, 0, $imagewidth * 0.35, $imageheight * 0.5,$text_black,public_path()."/font/Arial.ttf" , $user->getName());
        imagettftext($img, 9, 0, $imagewidth * 0.35, $imageheight * 0.6,$label_color,public_path()."/font/Arial.ttf" , "Username");
        imagettftext($img, 9, 0, $imagewidth * 0.35, $imageheight * 0.65,$text_black,public_path()."/font/Arial.ttf" , $user->username);
        imagettftext($img, 9, 0, $imagewidth * 0.35, $imageheight * 0.75,$label_color,public_path()."/font/Arial.ttf" , "Group");
        imagettftext($img, 9, 0, $imagewidth * 0.35, $imageheight * 0.8,$text_black,public_path()."/font/Arial.ttf" , $user->getUserGroupName()); 
        imagettftext($img, 9, 0, $imagewidth * 0.03, $imageheight * 0.96,$text_black,public_path()."/font/Arial.ttf" , $user->email);

        $barcode = imagerotate($barcode, 90,$background );

        imagecopyresized($img, $image_upload, $imagewidth * 0.05, $imageheight * 0.4, 0, 0, 90, 90,$sizex,$sizey);
        imagecopy($img, $barcode, $imagewidth - 45, $imageheight - 144, 0, 0, 41, 134);
        
        //header("Content-type: image/png");
        imagepng( $img , $saveurl ); //save the file
        //save the user_id_card here
        imagecolordeallocate($img, $line_colour );
        imagecolordeallocate($img, $text_colour );
        imagecolordeallocate( $img,$background );
        
        imagedestroy( $img );

	}
	public function search($fields, $param){

	}
	public function all(){
		return User::all();
	}
} 