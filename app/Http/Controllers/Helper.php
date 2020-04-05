<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class Helper extends Controller
{
    
    public function dayString($day){
    	switch($day){
    		case 1: return 'Lunes';
    		case 2: return 'Martes';
    		case 3: return 'Miércoles';
    		case 4: return 'Jueves';
    		case 5: return 'Viernes';
            case 6: return 'Sábado';
    	}
    }
}
