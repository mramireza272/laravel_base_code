<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;
use App\Http\Requests;

class API extends Controller
{

    public static function Call($host, $type, $method, $port = null, $parameters = [], $headers = [], 
    							$config = [ 'returnType' => 'array', 'debug' => false ]
								/*$returnType = 'array', $debug = false*/
							   ){

    	$client = new \GuzzleHttp\Client();
		$data['headers'] = $headers;
		$data['headers']['Content-Type'] = 'application/json';

		if($type != 'GET'){
			$data['body'] = json_encode($parameters);
		}

		$try = 1;
		//foreach(SELF::getMules() as $mule){

		if(is_null($port)){
			$url = $host.$method;
		}else{
			$url = $host.':'.$port.$method;
		}
		
		try{
			$response = $client->request($type, $url, $data);
			$contents = $response->getBody()->getContents();
			if($config['debug']){
				$debugFile = [
					'try'  => $try,
					'url'  => $url,
					'body' => $parameters,
					'resp' => $contents
 				];
 				if(!\Storage::exists('debug/log.txt')){
 					\Storage::put('debug/log.txt','');
 				}
 				
		    	$file = \Storage::append('debug/log.txt','['.date('Y-m-d H:i:s').']:'.json_encode($debugFile));
		    
		    	$try++;
		    }
			//break;
		}catch(ClientException $e){
			$contents = (string)$e->getResponse()->getBody();
		}catch(RequestException $e){
	        if(!$e->hasResponse()){
				$contents = json_encode([
	            	'error' => [
	              		'code' => 999,
	              		'msg'  => 'Contacta con el administrador'
	            	]
	          	]);
			}else{
				$contents = (string)$e->getResponse()->getBody();
			}
	    }
	    if($config['debug']){
			$debugFile = [
				'try'  => $try,
				'url'  => $url,
				'body' => $parameters,
				'resp' => $contents
				];
				if(!\Storage::exists('debug/log.txt')){
					\Storage::put('debug/log.txt','');
				}
				
	    	$file = \Storage::append('debug/log.txt','['.date('Y-m-d H:i:s').']:'.json_encode($debugFile));
	    
	    	$try++;
	    }
		    
		//}
		
		switch($config['returnType']){
			case 'array': 
				$contents = json_decode($contents,true);
				break;
			case 'object': 
				$contents = json_decode($contents); 
				break;
		}

		return $contents;
    }
}
