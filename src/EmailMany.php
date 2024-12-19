<?php
namespace Efficientdev\MonarchSnippet;
/**
 * 
 require_once 'vendor/autoload.php';

$em = new \efficientdev\MonarchSnippet\EmailMany();
$em->post([]);
 */
use Efficientdev\MonarchSnippet\Konstants;

class EmailMany
{
	
	function __construct($_s,$api_key)
	{
		//$_SERVER
		# code...
		$url=Konstants::getHost()."api/emailmany?api_key=".($api_key??'');


		//$bu=$_SERVER[HTTP_HOST];
		$bu=$_s[HTTP_HOST]??'digital';
		$ch = curl_init();

		$flask= array( 
			"Origin: https://$bu",
		    'Referer: https://'.$bu.'/login',
		    'Host: '.$bu,
		    'X-Requested-With: XMLHttpRequest',
		    'Content-Type: application/json',
		    'Accept: application/json'
		);

		curl_setopt($ch, CURLOPT_HTTPHEADER,$flask);


		// Disable SSL verification
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);


		curl_setopt($ch, CURLOPT_URL, $url);



		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$this->ch=$ch;

    
	}

	public function post($data){

		// If you're sending data, use CURLOPT_POST and CURLOPT_POSTFIELDS
		curl_setopt($this->ch, CURLOPT_POST, true);
		curl_setopt($this->ch, CURLOPT_POSTFIELDS, json_encode($data??['key' => 'value']));


		$response = curl_exec($this->ch); 
		curl_close($this->ch);  

		var_dump($response);

	}
}