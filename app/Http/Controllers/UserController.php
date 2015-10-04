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
use bepc\Repositories\Contracts\UserContract;
use bepc\Repositories\Contracts\UserBarcodeContract;
use bepc\Repositories\Contracts\UserIdCardContract;
use bepc\Libraries\Generic\Helper;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $imagebarcodepath = "";
    public $imagebarcodetype = "png";


    public function __construct(UserContract $uc, UserBarcodeContract $ubc , UserIdCardContract $uicc){
        $this->user = $uc;
        $this->userbarcode = $ubc;
        $this->useridcard = $uicc;
        $this->imagebarcodepath = public_path('img-id');
        $this->imagebarcodetype = "png";
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

        $input['id'] = $file = $this->create_barcode($this->user->generate_id()); //create the barcode first
        $filename = $file.".".$this->imagebarcodetype; //create the filename based on the barcode.
        $filepath = $this->imagebarcodepath."/"; //create the full path of the file
        $endfile = $filepath.$filename; //create the final path + name of the file

        if($user = $this->user->store($input)){
            $userbarcode = $this->userbarcode->store($user, $filename);
            $user->barcode_id = $userbarcode->id;
            if(file_exists($endfile) && $user && $userbarcode ){
                   $user->save();
                   return redirect(route('auth.login'))->with('flash_message' , 'User successfully registered.');
                }else{

                    if($userbarcode)$this->userbarcode->fdelete($userbarcode);
                    if($user)$this->user->fdelete($user);
                    return redirect()->back()->withErrors('Cannot save userbarcode. Try Again');
                }
            
        }
        return redirect()->back()->withErrors('Could not save user');
    }
    public function create_barcode($userid){
        if($barcodefile = $this->userbarcode->find($userid)) return $barcodefile->barcodekey;
        $barcodefile = $this->userbarcode->create_barcode($userid,$this->imagebarcodetype, $this->imagebarcodepath);
        if($this->userbarcode->checkbarcodefile($this->imagebarcodepath."/".$barcodefile.".".$this->imagebarcodetype))return $barcodefile;
        return false;
    }


    public function create_id($userid){
        $user = $this->user->find($userid);
        if(!$user || !$user->userbarcode)return redirect()->back()->withErrors('Could not find user');
        $useridcard = $this->useridcard->create_id($user, $user->userbarcode);
        if($useridcard)return redirect()->back()->with('flash_message'  , 'Successfully created a new id card for '.$user->getName());
        return redirect()->back()->withErrors('Could not create a new id card for '.$user->getName());

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id , $name= false)
    {
        $user = $this->user->find($id);
        if($name)return view('self.blade.user.show')->withUser($user);

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
    public function uploadphoto($userid){
       if($user = $this->user->find($userid)){
            return view('self.blade.user.uploadphoto')->withUser($user);
       }
       else return redirect(route('user.list'))->withErrors('Could not find user with user id: '.$userid);

    }
    public function storephoto(Request $r){
        if($result = $this->user->uploadphoto($r)){
            return redirect(route('user.list'))->with('flash_message', 'Photo has been successfully uploaded.');
        }   
        else return redirect()->back()->withErrors('Could not upload the file or invalid image file');

    }
}
