<?php

namespace bepc\Http\Controllers;

use Illuminate\Http\Request;

use bepc\Http\Requests;
use bepc\Http\Controllers\Controller;

use bepc\Models\Order;
use ZipArchive;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;
use Response;
class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function __construct(){
        $this->middleWare('auth');
    }

    public function index()
    {
        return view('default.blade.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        
    }
    public function download(){
        $path =base_path().'/backupfolder/';
         if (file_exists($path)) {
             $source = realpath($path);
            $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source ,RecursiveDirectoryIterator::SKIP_DOTS ),RecursiveIteratorIterator::SELF_FIRST);
            

         }
       return view('default.blade.backup')->withFiles($files);
    }
    public function getDownload($file){
        //PDF file is stored under project/public/download/info.pdf
        $filedes= base_path(). "/backupfolder/".$file;
        $headers = array('Content-Type: application/zip');
        return Response::download($filedes, $file, $headers);
    }

    public function backup(){
        ini_set('max_execution_time', 600);
        ini_set('memory_limit','1024M');
        $source =base_path();
        $file ='['.date('Ymd').']'.str_random(5).'.zip';
        $destination =$source.'/backupfolder/'.$file;
        echo '<html>';
        $this->zipData($source, $destination);
        echo '<hr><br/><p style="background-color:black; color:red;padding:10px;margin:-10px;">Back up FINISHED SUCCESSFULLY<br/>File:'.$destination."</p>";
        return redirect(route('site.download'));
    }
     function zipData($source, $destination) {
        if (extension_loaded('zip')) {
            if (file_exists($source)) {
                $zip = new ZipArchive();
                if ($zip->open($destination, ZIPARCHIVE::CREATE)) {
                    $source = realpath($source);
                    if (is_dir($source)) {
                        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source ,RecursiveDirectoryIterator::SKIP_DOTS),RecursiveIteratorIterator::SELF_FIRST);
                     
                        foreach ($files as $file) {
                            echo '<script type="text/javascript">';
                            echo 'window.scrollTo(0,document.body.scrollHeight);';
                            echo '</script>';
                            //echo '<p style="background-color:#913D88; color:#AEA8D3;">'.$file->getBaseName()."</p>";
                            echo '<p style="background-color:black; color:#2ecc71;padding:10px;margin:-10px;"> Copying file '.$file->getBaseName().".....</p>";
                            if(strtolower(substr($file->getBaseName(), -4)) === '.zip')
                            {
                                echo "ignored ".$file->getBaseName();
                                continue;
                            }
                            else
                            {
                                $file = realpath($file);
                                if (is_dir($file))$zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
                                else if (is_file($file)) $zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
                            }
                        }
                    } else if (is_file($source)) {
                        $zip->addFromString(basename($source), file_get_contents($source));
                    }
                }

                return $zip->close();

            }
        }   
         
      
    }
    public function getFileCount($path) {
        $size = 0;
        $ignore = array('.','..','cgi-bin','.DS_Store');
        $files = scandir($path);
        foreach($files as $t) {
            if(in_array($t, $ignore)) continue;
            if (is_dir(rtrim($path, '/') . '/' . $t)) {
                $size += $this->getFileCount(rtrim($path, '/') . '/' . $t);
            } else {
                $size++;
            }   
        }
        return $size;
    }
}
