<?php
namespace Efficientdev\MonarchSnippet;
/**
 * 
 require_once 'vendor/autoload.php';

$em = new \efficientdev\MonarchSnippet\EmailMany();
$em->post([]);

 */
class EmailMany
{
	
	function __construct($api_key)
	{
		# code...
		$url=Constants.getHost()."api/emailmany?api_key=".($api_key??'');


		$bu=$_SERVER[HTTP_HOST];
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

		var_dump($response);
    
	}

	public function post($data){


		$response = curl_exec($this->ch); 
		curl_close($this->ch);  

	}
}