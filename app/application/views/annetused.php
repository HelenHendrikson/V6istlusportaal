<!DOCTYPE html>
<html>

    <body>
<?php

// STEP 1. Setup private key
// =========================

$private_key = openssl_pkey_get_private(
"-----BEGIN RSA PRIVATE KEY-----
MIIEogIBAAKCAQEApvPX7AltyeKEj2YfjQKiQ0jLf8ZnTYNQpJI1gXwpzs28YZoq
sj9AFwTDfbghWs528JCmcd5XkkZCOrCY0WbGk2PZ1qHaHLAVdpYA2V4tuMHnTll9
RJDvfA8BVpvM1ocA9vtxNl++GVeqPy1VYn+NBeY5Xm51q12K1W+DGdoZO+S+taqO
ytce5WbJ8KveCZrdJEpQw++ES5Ml++s6oMmHxoN1R0rwxjzOw/CeN/ARSsUrVjWZ
QS/x44KHkQRH+eQLuapqImifhJkmRmlVVjhUvbn79JAXzxKeZaU93Tw/qJ3DWDfS
d8HvZ2Q3Zc8BQuPAyQvJma2oR9q6zYhShHb3BwIDAQABAoIBAFuQ0ZP7d+OKAPpF
IHjOQQB2JGZoArBYnRoltoLV/ngWDoPZciFg313AlxeUrXaIVmOKcj9xmsX3Esvt
n2L5419jHE7DZkTlrl/j1YNiS+FRN/OY0UOR2kdIU4uU17uxP642KdmQmUp88jrE
OlhTbJ0Xr89C9faOz15QUq8TF1PpNoRokzkcqZbNN2GHatJ5z1Necd7FgTbHUUff
xORHbSaD5WEw/jF5862mx2O/yfNEYWY0esT1Tlrtoefm8yCWjmu/LIGhUCTgGmNo
enTI8tTJa8cteuptK6CQZKWExJEgxfGAGUgCqDGMI9X0Cz0uD/4LY3cWxCYDI9GB
kVJ0ZUECgYEA0X7U1M39ROGFGSce9VfDOv2mpt6k4VxIhSnIvMzBAgsS/S+9av+B
HffAaozqMjC555qG7eUvdt5xxxAZuI4cpAneNcSAZoKXXUH420nF8/k7wk9tbikN
SvS6/yn1UiwRhfWtR1ECAX8tnCtyBj29IDXpT6C9eS2b7brsNLOWwBUCgYEAzANk
AIOL8bFxkl7IeflQ7PuF8OjUH5IvvAE/ZvORbd+OPZjKGBO1cX+XzttYgVoZP3D/
+CejlWYR22oegI2ckKMb23nmC37mYmA1sO/9okA3zAQbo7k4u8h1+UJzlUzgZvZa
1WRtpv9CImu042w2xaNKzkgQaQO+iBjIMmnDRasCgYBxXTi+j1lmVMM5gTn3ea5j
1a7AzepbKRz1Mk82G3a2LFfyOks+A1VTaiXtgqOY1VVERxKM2WB96pGXLtc8T2qg
OdbNMbBpyHEwPer0f09nXo8/7stAuWZAEX6/ZW0jMkWpP/CsjuGO/csonznstqwJ
KiM+u7TMRioC0wvO2P/SoQKBgEmtX8wftcaPgqiNunDybRtoqrKaIyFTthF7kd4o
UHkRp1jveOzBEWHv5m86H/h3BW836/k+t4EY35IR/PoIKmbBwSm+GCpGpgUZIcrI
oRybfIsdYK38ElUezBw8t2lP3irRBXTTVBZfUQ8FPspzJkSx+C4PMH38cC7OZF5w
e6kJAoGAXLcWKHmAdWZXaxP1Uk0mWLvFC9f+LsXYxNMBFLdu/KdI0sKNzfLis/f3
GNJFctc1ot5DaR9/CEd+V/QWZV2aeVgoKLGmGql+0ri15HzmCO4m7JGEdWPMoHUH
iqFncmjbRsrnrd+0lZBOkhFZ6844GSih0ibkdShl4WjID4T1Afg=
-----END RSA PRIVATE KEY-----");

// STEP 2. Define payment information
// ==================================

$fields = array(
        "VK_SERVICE"     => "1011",
        "VK_VERSION"     => "008",
        "VK_SND_ID"      => "uid100010",
        "VK_STAMP"       => "12345",
        "VK_AMOUNT"      => "150",
        "VK_CURR"        => "EUR",
        "VK_ACC"         => "EE152200221234567897",
        "VK_NAME"        => "V6iustlusportaal",
        "VK_REF"         => "1234561",
        "VK_LANG"        => "EST",
        "VK_MSG"         => "Annetus",
        "VK_RETURN"      => 'http' . '://' . $_SERVER['HTTP_HOST'] .
                                            dirname ($_SERVER['PHP_SELF']) . '/receive', 
        "VK_CANCEL"      => 'http' . '://' . $_SERVER['HTTP_HOST'] .
                                            dirname ($_SERVER['PHP_SELF']) . '/makseKatkestatud',
        "VK_DATETIME"    => "2017-03-31T14:36:13+0300",
        "VK_ENCODING"    => "utf-8",
);

// STEP 3. Generate data to be signed
// ==================================

// Data to be signed is in the form of XXXYYYYY where XXX is 3 char
// zero padded length of the value and YYY the value itself
// NB! Swedbank expects symbol count, not byte count with UTF-8,
// so use `mb_strlen` instead of `strlen` to detect the length of a string

$data = str_pad (mb_strlen($fields["VK_SERVICE"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_SERVICE"] .    /* 1011 */
        str_pad (mb_strlen($fields["VK_VERSION"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_VERSION"] .    /* 008 */
        str_pad (mb_strlen($fields["VK_SND_ID"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_SND_ID"] .     /* uid100010 */
        str_pad (mb_strlen($fields["VK_STAMP"], "UTF-8"),   3, "0", STR_PAD_LEFT) . $fields["VK_STAMP"] .      /* 12345 */
        str_pad (mb_strlen($fields["VK_AMOUNT"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_AMOUNT"] .     /* 150 */
        str_pad (mb_strlen($fields["VK_CURR"], "UTF-8"),    3, "0", STR_PAD_LEFT) . $fields["VK_CURR"] .       /* EUR */
        str_pad (mb_strlen($fields["VK_ACC"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_ACC"] .        /* EE152200221234567897 */
        str_pad (mb_strlen($fields["VK_NAME"], "UTF-8"),    3, "0", STR_PAD_LEFT) . $fields["VK_NAME"] .       /* V6iustlusportaal */
        str_pad (mb_strlen($fields["VK_REF"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_REF"] .        /* 1234561 */
        str_pad (mb_strlen($fields["VK_MSG"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_MSG"] .        /* Annetus */
        str_pad (mb_strlen($fields["VK_RETURN"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_RETURN"] .     /* http://localhost:8080/project/SayJ5Tp9Cjvj9X6I?payment_action=success */
        str_pad (mb_strlen($fields["VK_CANCEL"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_CANCEL"] .     /* http://localhost:8080/project/SayJ5Tp9Cjvj9X6I?payment_action=cancel */
        str_pad (mb_strlen($fields["VK_DATETIME"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_DATETIME"];    /* 2017-03-31T14:36:13+0300 */

/* $data = "0041011003008009uid10001000512345003150003EUR020EE152200221234567897016V6iustlusportaal0071234561011Torso Tiger069http://localhost:8080/project/SayJ5Tp9Cjvj9X6I?payment_action=success068http://localhost:8080/project/SayJ5Tp9Cjvj9X6I?payment_action=cancel0242017-03-31T14:36:13+0300"; */

// STEP 4. Sign the data with RSA-SHA1 to generate MAC code
// ========================================================

openssl_sign ($data, $signature, $private_key, OPENSSL_ALGO_SHA1);

/* Wkr/CYP2tVXOcQfrqixCvxO9025LJ6Rv1KG6LJvGjfbsTPUcbi3gp4LPO5Gkfdhy2lKeQvaD9BQz/RiOZPebvW2IN6RJNB5MTHWD0gjRk6UfSrtJZY7dmm6TZFJ6M+XVj/v7jn0wvA8jGehdSblT54mnsLCPMZqnqKZo18C85RwcOuWBQ9bW2aERZzzAU9uYzS6s6eU6g2StDfz+I5tvMhFiLjeXDGH50pyW3oYA2+6/bbQnwUr7Du4IhWjzrclFOgmc9+rbALuwNXA8x5CeHoFP2ptQgUu5N7xTXSZikeYX7jvn+W5hnzq/+2wCHsfhif5v2Ln/1iIujwENYgwYKg== */
$fields["VK_MAC"] = base64_encode($signature);

// STEP 5. Generate POST form with payment data that will be sent to the bank
// ==========================================================================
?>

<div class="container" id="content1">



        <form method="post" action="http://localhost:8080/banklink/swedbank-common">
            <!-- include all values as hidden form fields -->
			<?php foreach($fields as $key => $val){
					echo '<input type="hidden" name="' .$key . ' "value="' . htmlspecialchars($val). '" />' . "\n";
				}
?>			<div class="row">
				<h2 id="annetusedpealkiri" class="alert"> Siin saad teha annetuse!</h2>
			</div>
			<div class="row">
				<div class="col-xs-6">
					<h3>Korrega saab annetada 150 eurot! </h3>
					<div class="form-group">
						<!--<tr><td colspan="2"><input type="submit" class="btn btn-special" value="Annetama!" /></td></tr> -->
					 <input type="submit" class="btn btn-special" value="Annetama!" />
						
						
						<!--<button type="submit">Annetama</button> -->
						

						
					</div>
				</div>
			</div>
        </form>
</div>

</body>
</html>
