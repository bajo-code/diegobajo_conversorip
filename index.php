


<?php

session_start();
$_SESSION["diegobajo"];
require_once 'vendor/autoload.php';

use Foolz\Inet\Inet;
use ipinfo\ipinfo\IPinfo;

$client = new IPinfo();

if (isset($_REQUEST['parse'])){
    $num_decimal;
    $num_decimal = htmlspecialchars($_REQUEST['num']);
    $dir_ip = \Foolz\Inet\Inet :: dtop($num_decimal);
    $details = $client->getDetails($dir_ip);

    echo "
    <style> @import url(style.css)</style>
        <ul>
            <li>IP: ". $details->ip. "</li>
            <li>Ciudad: ". $details->city. "</li>
            <li>Pais: ". $details->country. "</li>
            <li>Region: ". $details->region. "</li>
            <li>Loc: ". $details->loc. "</li>
            <li>Postal: ". $details->postal. "</li>
        </ul>
    ";
};

echo '<html>
<style> @import url(style.css)</style>
<body>
<div>
<form action="" method="post">
    <h2>NUMBER TO IP:</h2><input type="text" name="num" size="20"><br>
    <button type="submit" value="Send" name="parse">Calcular</button>
</form>
</div>
</body>
</html>';

