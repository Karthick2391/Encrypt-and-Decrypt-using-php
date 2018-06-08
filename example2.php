<?php
/**
 * Encrypt and decrypt
 * 
 * @author Karthick <karthi.karthi47@gmail.com>
 * @link Coming Soon
 *
 * @param string $string string to be encrypted/decrypted
 * @param string $action what to do with this? e for encrypt, d for decrypt
 */
function encrypt_decrypt( $string, $action = 'e' ) {
    // you may change these values to your own
    $secret_key = 'karthick@2018@isthehiddenkey#$%';
    $secret_iv = '08062018';

    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash( 'sha256', $secret_key );
    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );

    if( $action == 'e' ) {
        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
    }
    else if( $action == 'd' ){
        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
    }

    return $output;
}

$plain_txt = "Smile Please!";

$encrypted_txt = encrypt_decrypt( $plain_txt, 'e' );

echo "Encrypted Text = " .$encrypted_txt. "\n";

echo '<br>';

$decrypted_txt = encrypt_decrypt( $encrypted_txt, 'd' );

echo "Decrypted Text =" .$decrypted_txt. "\n";

 echo '<br>';

if ( $plain_txt === $decrypted_txt ) 
    echo "SUCCESS";
else 
    echo "FAILED";

 echo '<br>';

?>
