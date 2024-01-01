<?php

// ord mengetahui nilai desimal dari inputan ascii
// chr mengembalikan desimal ke ascii
function vigenere_encrypt($params)
{
    $key = "secret";
    $key_i = 0;
    $chipertext = "";
    for ($i = 0; $i < strlen($params); $i++) {
        $key_ascii = ord($key[$key_i]); // mengubah ascii ke desimal
        $plain_ascii = ord($params[$i]);

        $cipher_ascii = ($plain_ascii + $key_ascii) % 127; // rumus enkripsi vigenere
        $chipertext .= chr($cipher_ascii); // mengubah desimal ke ascii

        // proses penambahan key index bertambah 1
        $key_i++;
        if ($key_i > strlen($key) - 1) {
            $key_i = 0;
        }
    }
    return $chipertext;
}

function vigenere_decrypt($params)
{
    $key = "secret";
    $key_i = 0;
    $plaintext = "";
    for ($i = 0; $i < strlen($params); $i++) {
        $key_ascii = ord($key[$key_i]);
        $plain_ascii = ord($params[$i]);

        $plain_ascii = ($plain_ascii - $key_ascii) + 127;
        $plaintext .= chr($plain_ascii);

        // proses penambahan key index bertambah 1
        $key_i++;
        if ($key_i > strlen($key) - 1) {
            $key_i = 0;
        }
    }
    return $plaintext;
}

function affine_encrypt($params)
{
    // (51,127) relative prima
    $a = 51;
    $b = 5;
    $ciphertext = "";
    for ($i = 0; $i < strlen($params); $i++) {
        $key_a = $a;
        $key_b = $b;
        $plain_ascii = ord($params[$i]); // mengubah ascii ke desimal

        $cipher_ascii = ($key_a * $plain_ascii + $key_b) % 127; // rumus enkripsi affine
        $ciphertext .= chr($cipher_ascii); // mengubah desimal ke hexadesimal
    }
    return $ciphertext;
}

function affine_decrypt($params)
{
    // (51,127) relative prima
    // 51x = 1 + 127k
    //   x = (1 + 127k)/51
    // k    x
    // 2    255/51 = 5
    // a invers = 5
    $a = 5;
    $b = 5;
    $plaintext = "";
    for ($i = 0; $i < strlen($params); $i++) {
        $key_a_invers = $a;
        $key_b = $b;
        $plain_ascii = ord($params[$i]);

        $cipher_ascii = ($key_a_invers * ($plain_ascii - $key_b)) % 127;
        $plaintext .= chr($cipher_ascii);
    }
    return $plaintext;
}
