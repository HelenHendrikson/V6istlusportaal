<div class="container" id="content1">
<?php



// STEP 1. Setup bank certificate
// ==============================

$public_key = openssl_pkey_get_public("-----BEGIN CERTIFICATE-----
MIIDljCCAn4CCQCfhRZskFNB+TANBgkqhkiG9w0BAQUFADCBjDELMAkGA1UEBhMC
RUUxETAPBgNVBAgTCEhhcmp1bWFhMRAwDgYDVQQHEwdUYWxsaW5uMQ0wCwYDVQQK
EwRUZXN0MREwDwYDVQQLEwhiYW5rbGluazEXMBUGA1UEAxMObG9jYWxob3N0IDgw
ODAxHTAbBgkqhkiG9w0BCQEWDnRlc3RAbG9jYWxob3N0MB4XDTE3MDMzMTExMDkz
M1oXDTM3MDMyNjExMDkzM1owgYwxCzAJBgNVBAYTAkVFMREwDwYDVQQIEwhIYXJq
dW1hYTEQMA4GA1UEBxMHVGFsbGlubjENMAsGA1UEChMEVGVzdDERMA8GA1UECxMI
YmFua2xpbmsxFzAVBgNVBAMTDmxvY2FsaG9zdCA4MDgwMR0wGwYJKoZIhvcNAQkB
Fg50ZXN0QGxvY2FsaG9zdDCCASIwDQYJKoZIhvcNAQEBBQADggEPADCCAQoCggEB
AM2pNbBeJhuRCZPTano2ceuPiB3ThkNqevgIBt+pPYHgzPNiICT1X+Ab//4VIr+W
vU8EjV6lRd5ZoxYwX3MOan9bKxnT80IZS/uWOMo9ZpIdI/77aG9uWSgwCl+j9Lff
3oadpyhIgwMQX7wK4jOmc4XzpFInFtHfLk6Z2TyNBSDMQIcAOgGFIKRiXDA+s4Cm
XGkJBD4KtMfHJGapyVBs/4+DmMc22aZ+bBVG34tLY/GoEF77AjNCHjz3wgeHiOYC
vespBLsIpejUFs/RaeDa7/7NTSAhsJjitiJLJ21oUm6T4PeIbiPHgcpmWqOAUXZy
IFJ5K7HuAyf/XEw83KS6M3sCAwEAATANBgkqhkiG9w0BAQUFAAOCAQEAOojjDKIZ
kR4nY/8/PDoCiLCjKqtDw5xZzqVZH2efc4H2QP3ia/FVYQ6fMrWGCtitlblKHaj/
NZNdkB+r9hKkcj+svjJ9Ty10/S0kXGdG7RC3AkK9mx5cGSN3Qh4r7pKIhlUa/RzU
rTYZE19zl7rSf5Dj2F6Qo+WzZjs0Mo8QU1ZoBboO6Pe+KI/yKju/h/NTeCQF6qEX
g/cj/p3tQVgwidT+vptE4e1+IvYZhKJocbZDeNslEq1ra4CRmkarAB4C6tAGLCRX
zrOwTUfHAOjZUHay/uUMv9H1UK7+dT1IUKCF1bVpoqyOaU54Tq+PhVCGAzKtrwA5
l+w2e/Z67+ZXyw==
-----END CERTIFICATE-----");

// STEP 2. Define payment information
// ==================================
// NB! In a real application, you should read the values either from `$_POST`, `$_GET` or `$_REQUEST`.

$fields = array(
        "VK_SERVICE"     => "1111",
        "VK_VERSION"     => "008",
        "VK_SND_ID"      => "HP",
        "VK_REC_ID"      => "uid100010",
        "VK_STAMP"       => "12345",
        "VK_T_NO"        => "10023",
        "VK_AMOUNT"      => "150",
        "VK_CURR"        => "EUR",
        "VK_REC_ACC"     => "EE152200221234567897",
        "VK_REC_NAME"    => "V6iustlusportaal",
        "VK_SND_ACC"     => "EE152200221234567897",
        "VK_SND_NAME"    => "Tõõger Leõpäöld",
        "VK_REF"         => "1234561",
        "VK_MSG"         => "Annetus",
        "VK_T_DATETIME"  => "2017-04-04T21:57:48+0300",
        "VK_ENCODING"    => "utf-8",
        "VK_LANG"        => "EST",
        "VK_MAC"         => "nfnTKgf0RqSB03O2GvUeWjq888Phy+uR/oqvYhPX1+wbhgWOrMqz9giZw0unIwfRbxNXGgdhbP1DrI1I8eztiHYwDmipoH72j+K2y4NO6Ngp9wgSpiIapj8n1TTRmXk5kPTCGwHWNmqIQ9DsMxhF1i6fEb5h/OcmKgtjvBYTRum1FKzseWBTWQ99I8Nu4K8SSCcaO4oKflpKLatYQVPKHE2kr2W5HA/QF+Gn3gRfYltb+HTM6CM5xb6wgAkCBKwR0DAW+tooxrjUS7vu35ka6LQfqYlWzh8+xlVbtaGxXP1Lvoz8byx3XnqAGxCCnXZ/8peDNA9a7mVKe1cXOF+nHg==",
        "VK_AUTO"        => "N"
);

// STEP 3. Generate data to be verified
// ====================================

// Data to be verified is in the form of XXXYYYYY where XXX is 3 char
// zero padded length of the value and YYY the value itself
// NB! Swedbank expects symbol count, not byte count with UTF-8,
// so use `mb_strlen` instead of `strlen` to detect the length of a string

$data = str_pad (mb_strlen($fields["VK_SERVICE"], "UTF-8"),   3, "0", STR_PAD_LEFT) . $fields["VK_SERVICE"] .    /* 1111 */
        str_pad (mb_strlen($fields["VK_VERSION"], "UTF-8"),   3, "0", STR_PAD_LEFT) . $fields["VK_VERSION"] .    /* 008 */
        str_pad (mb_strlen($fields["VK_SND_ID"], "UTF-8"),    3, "0", STR_PAD_LEFT) . $fields["VK_SND_ID"] .     /* HP */
        str_pad (mb_strlen($fields["VK_REC_ID"], "UTF-8"),    3, "0", STR_PAD_LEFT) . $fields["VK_REC_ID"] .     /* uid100010 */
        str_pad (mb_strlen($fields["VK_STAMP"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_STAMP"] .      /* 12345 */
        str_pad (mb_strlen($fields["VK_T_NO"], "UTF-8"),      3, "0", STR_PAD_LEFT) . $fields["VK_T_NO"] .       /* 10023 */
        str_pad (mb_strlen($fields["VK_AMOUNT"], "UTF-8"),    3, "0", STR_PAD_LEFT) . $fields["VK_AMOUNT"] .     /* 150 */
        str_pad (mb_strlen($fields["VK_CURR"], "UTF-8"),      3, "0", STR_PAD_LEFT) . $fields["VK_CURR"] .       /* EUR */
        str_pad (mb_strlen($fields["VK_REC_ACC"], "UTF-8"),   3, "0", STR_PAD_LEFT) . $fields["VK_REC_ACC"] .    /* EE152200221234567897 */
        str_pad (mb_strlen($fields["VK_REC_NAME"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_REC_NAME"] .   /* V6iustlusportaal */
        str_pad (mb_strlen($fields["VK_SND_ACC"], "UTF-8"),   3, "0", STR_PAD_LEFT) . $fields["VK_SND_ACC"] .    /* EE152200221234567897 */
        str_pad (mb_strlen($fields["VK_SND_NAME"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_SND_NAME"] .   /* Tõõger Leõpäöld */
        str_pad (mb_strlen($fields["VK_REF"], "UTF-8"),       3, "0", STR_PAD_LEFT) . $fields["VK_REF"] .        /* 1234561 */
        str_pad (mb_strlen($fields["VK_MSG"], "UTF-8"),       3, "0", STR_PAD_LEFT) . $fields["VK_MSG"] .        /* Annetus */
        str_pad (mb_strlen($fields["VK_T_DATETIME"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_T_DATETIME"];  /* 2017-04-04T21:57:48+0300 */

/* $data = "0041111003008002HP009uid1000100051234500510023003150003EUR020EE152200221234567897016V6iustlusportaal020EE152200221234567897015Tõõger Leõpäöld0071234561007Annetus0242017-04-04T21:57:48+0300"; */

// STEP 4. Verify the data with RSA-SHA1
// =====================================

if (openssl_verify ($data, base64_decode($fields["VK_MAC"]), $public_key) !== 1) {
    $signatureVerified = false;
}else{
    $signatureVerified = true;
}

// STEP 5. Display output of the received payment
// ==============================================
?>

    <h2>Makse tulemused</h2>

    <p><strong>Makse staatus:</strong> <?php echo $fields["VK_SERVICE"] == "1111" ? "makse sooritatud" : "makse tühistatud" ?></p>
	
    <p><strong>Signature: </strong><?php echo $signatureVerified ? "verified" : "not verified" ?></p>
	<p><strong>Maksja:</strong> <?php echo $fields["VK_SND_NAME"]?></p>
	<p><strong>Maksja konto:</strong> <?php echo $fields["VK_SND_ACC"]?></p>
	<p><strong>Maksekorralduse number:</strong><?php echo $fields["VK_T_NO"]?></p>
							
    
	
</div>
