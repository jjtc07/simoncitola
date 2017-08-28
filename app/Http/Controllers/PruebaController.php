<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PruebaController extends Controller
{
    public function singularSpanol($value)
    {
    	$palabra = utf8_decode(strtolower($value));
        
        if($palabra=="") {return ""; }

        //Obteniendo la ultima letra
        $segmento1 = utf8_encode(substr( $palabra, -3));
        $segmento2 = utf8_encode(substr( $palabra, -2));

        $vocales = ["a", "e", "i", "o", "u", "Ã¡", "Ã©", "Ã³"];

		$num=strlen($palabra);

		if ($segmento1=='ces') {
			$palabra=substr($palabra,0,$num-3);
			$palabra.='z';
        	dd($palabra);
		}else if($segmento2=='es'){
        	$palabra=substr($palabra,0,$num-2);
        	dd($palabra);
        }else{
			$palabra=substr($palabra,0,$num-1);
        	dd($palabra);
        }

		dd($segmento);

    }
}
