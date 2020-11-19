<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ZipArchive;
use File;

class ZipController extends Controller
{
    public function zipCreateAndDownload()
    {
    	$zip = new ZipArchive;
    	$fileName = 'items.zip';
    	if($zip->open(public_path($fileName), ZipArchive::CREATE) == TRUE)
    	{
    		$files = File::files(storage_path('app/public/photos'));
    		foreach($files as $key => $value) {
    			$relativeName = basename($value);
    			$zip->addFile($value , $relativeName);
    		}
			$zip->close();
    	}
    	return response()->download(public_path($fileName));
    }
}
