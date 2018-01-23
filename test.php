<?php

/**
 * A small geoIP Test with Apache- and PHP-Module
 *
 * @date: 2015-09-18
 * @author: EmPeWe
 */

$remote = $_SERVER["REMOTE_ADDR"];
echo nl2br("REMOTE_ADDR: $remote\n\n");

$geoipApache = $_SERVER["GEOIP_ADDR"];
echo nl2br("Apache GEOIP_ADDR: $geoipApache\n");

$countryApache = $_SERVER['GEOIP_COUNTRY_CODE'];
echo nl2br("Apache GEOIP_COUNTRY_CODE: $countryApache\n");

echo nl2br("\nphp5-geoip installed: ");

if ( function_exists("geoip_country_code_by_name") )
{
    echo nl2br("YES\n");
    $countryPhp = geoip_country_code_by_name($remote);
    echo nl2br("PHP geoip_country_code_by_name: $countryPhp\n\n");
}
else
{
    echo nl2br("NO\n");
    echo nl2br("Loading external php5-geoip...\n");
    require "vendor/autoload.php";
    $gi = geoip_open('GeoIP.dat', GEOIP_STANDARD);
    $countryPhp = geoip_country_code_by_addr($gi, $remote);
    echo nl2br("PHP geoip_country_code_by_name: $countryPhp\n\n");
    geoip_close($gi);
}

if (($remote != $geoipApache) || ($countryApache != $countryPhp)): ?>

<font style="color:red;">
CAUTION: the IP addresses respectively country codes differ.<br/>
Maybe you are using an iPhone togehter with a T-Mobile contract.<br/>
You must use the geoIP PHP-Module.<br/><br/>
</font>

<?php else: ?>

<font style="color:green;">
The IP addresses and country codes are identical.<br/>
However you must use the geoIP PHP-Module.<br/><br/>
</font>

<?php endif; ?>

THE END.
