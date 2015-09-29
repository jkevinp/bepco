<?php

namespace bepc\Http\Controllers;

use Illuminate\Http\Request;
use bepc\Http\Requests;
use bepc\Http\Controllers\Controller;
use bepc\Models\User;
use bepc\Models\UserGroup;
use Validator;
use bcrypt;
use URL;
use bepc\Libraries\BarcodeGenerator\BarcodeGenerator as BgcOutput;
use bepc\Repositories\Contracts\UserContract;
use bepc\Repositories\Contracts\UserBarcodeContract;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(BgcOutput $b ,UserContract $uc, UserBarcodeContract $ubc){
        $this->BgcOutput = $b;
        $this->user = $uc;
        $this->userbarcode = $ubc;
    }
    public function index(){   
        $users = $this->user->all();
        return view('self.blade.user.list')->with(compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type = false)
    {
       $usergroups = UserGroup::all();
       if(!$type) return view('self.blade.auth.create')->with(compact('usergroups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $rules = [
                    'username' => 'unique:user,username|required|min:5|max:30',
                    'email'    => 'required|email|unique:user,email',
                    'firstname'=> 'required',
                    'lastname' => 'required',
                    'middlename'=>'required',
                    'usergroup_id'=>'required|integer|exists:usergroup,id',
                    'password' => 'required|min:5',
                    'confirmpassword' => 'required|min:5|same:password'

                ];
        $v = validator::make($input , $rules);
        if($v->fails())return redirect()->back()->withErrors($v->messages()->first())->withInput($input);
        

        if($user = $this->user->store($input)){
            $extension = "png";
            $file = $this->BgcOutput->output($user->id ?  str_pad($user->id, 7, "0", STR_PAD_LEFT) : str_pad($input['product_id'], 7, "0", STR_PAD_LEFT) ,  $extension , public_path('img-id')); 
            $userbarcode = $this->userbarcode->store($user,$file);
            $user->barcode_id = $userbarcode->id;
            $user = $user->save();
            if(file_exists(public_path('img-id').'/'.$file) && $user && $userbarcode ){
               $url =public_path('img-id').'/'.$file;
               //$this->create_id($user, $url);
               return redirect(route('auth.login'))->with('flash_message' , 'User successfully registered.');
            }else{
                $this->userbarcode->fdelete($userbarcode);
                $this->user->fdelete($user);
                return redirect()->back()->withErrors('Cannot save userbarcode. Try Again');
            }
        }
        return redirect()->back()->withErrors('Could not save user');

        
        
    }
    public function create_id($userid){
        $user = $this->user->find($userid);
        if(!$user || !$user->userbarcode)return redirect()->back()->withErrors('Could not find user');
        $this->user->create_id($user, $user->userbarcode);

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    function old_create(){
        //echo '<img src="'.route('user.create').'" alt="Image created by a PHP script" >';
        $url = public_path().'/img-template/id.gif';
        $saveurl =public_path().'/img-template/id'.str_random(2).'.png';
        $file_exists =file_exists($url); 
        $image_upload = imagecreatefromgif(public_path().'/img-template/id.gif');
        $imagewidth = 336;
        $imageheight  = 220;
        $img = imagecreate($imagewidth,$imageheight); //create the image
        $background = imagecolorallocate( $img, 255,255,255);
        $text_colour = imagecolorallocate( $img, 255, 255, 255 );
        $line_colour = imagecolorallocate( $img,245, 215, 110);
        $text_black = imagecolorallocate($img, 0,0,0);
        $label_color= imagecolorallocate($img, 70,70,70);
        $border_color = imagecolorallocate($img, 0, 0, 0); //create the border color
        $barcode =imagecreatefrompng(public_path()."/img-template/barcode.png") ;
        imagefilledrectangle($img,0,0,$imagewidth,$imageheight/3,$line_colour);
        imagerectangle($img,1,1,$imagewidth-2,$imageheight-2,$border_color);
        imagettftext($img, 14, 0, 5, 40,$text_colour,public_path()."/font/Arial.ttf" ,env('APP_TITLE'));
        imagettftext($img, 14, 0, 5, 65,$text_colour,public_path()."/font/Arial.ttf" , "Identity Card");
        imagettftext($img, 9, 0, $imagewidth * 0.75, 20,$text_colour,public_path()."/font/Arial.ttf" , "ID:"."000000000");
        imagettftext($img, 9, 0, $imagewidth * 0.35, $imageheight * 0.45,$label_color,public_path()."/font/Arial.ttf" , "Name");
        imagettftext($img, 9, 0, $imagewidth * 0.35, $imageheight * 0.5,$text_black,public_path()."/font/Arial.ttf" , "John Kevin Peralta");
        imagettftext($img, 9, 0, $imagewidth * 0.35, $imageheight * 0.6,$label_color,public_path()."/font/Arial.ttf" , "Username");
        imagettftext($img, 9, 0, $imagewidth * 0.35, $imageheight * 0.65,$text_black,public_path()."/font/Arial.ttf" , "Rururhunie");
        imagettftext($img, 9, 0, $imagewidth * 0.35, $imageheight * 0.75,$label_color,public_path()."/font/Arial.ttf" , "Group");
        imagettftext($img, 9, 0, $imagewidth * 0.35, $imageheight * 0.8,$text_black,public_path()."/font/Arial.ttf" , "Admin"); 
        imagettftext($img, 9, 0, $imagewidth * 0.03, $imageheight * 0.96,$text_black,public_path()."/font/Arial.ttf" , "xnalimits@gmail.com | 09056057553"); 
        $barcode = imagerotate($barcode, 90,$background );
        imagecopy($img, $barcode, $imagewidth - 45, $imageheight - 144, 0, 0, 41, 138);
        $sizex =getimagesize($url)[0];
        $sizey =getimagesize($url)[1];
        imagecopyresized($img, $image_upload, $imagewidth * 0.05, $imageheight * 0.4, 0, 0, 90, 90,$sizex,$sizey);
        //header("Content-type: image/png");
        imagepng( $img , $saveurl );
        imagecolordeallocate($img, $line_colour );
        imagecolordeallocate($img, $text_colour );
        imagecolordeallocate( $img,$background );

        imagedestroy( $img );
    }
}