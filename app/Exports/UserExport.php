<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class UserExport implements FromCollection
{
    public function collection()
    {
    	$collections = collect([]);
    	$collections->push([
    		'#' , 'Nama' , 'Email' , 'Bergabung'
    	]);
    	foreach (User::all() as $key => $user) {
    		$collections->push([
    			$key , $user->name , $user->email , $user->created_at->diffForHumans(),
    		]);
    	}
        return $collections;
    }
}
        