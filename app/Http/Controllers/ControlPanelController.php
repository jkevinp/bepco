<?php

namespace bepc\Http\Controllers;

use Illuminate\Http\Request;
use bepc\Http\Requests;
use bepc\Http\Controllers\Controller;

class ControlPanelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('self.blade.control.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public static function pull() {
        $git_url = 'git://github.com/jkevindp/barcode.git';
    // validate contains git://github.com/
    if (strpos($git_url, 'git://github.com/') !== FALSE) {
      // create a directory and change permissions 
      $uri = public_path(); // change this if not in drupal 
      //check the dir
      $file_path = realpath($uri);  // change this if not in drupal 
      if (isset($file_path)) {
        $first_dir =  getcwd();
        // change dir to the new path
        $new_dir = chdir($file_path);
        // Git init
        $git_init = shell_exec('git init');
        // Git clone
        $git_clone = shell_exec('git clone '. $git_url);
        // Git pull
        $git_pull = shell_exec('git pull');
        // change dir back
        $change_dir_back = chdir($first_dir);
         return redirect()->back()->with('flash_message', 'Successfully pulled repository');
      }
    }
    else {
      return redirect()->back()->withErrors('Failed to Pull Repository.');
    }
  }
}
