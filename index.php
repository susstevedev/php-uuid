<?php
    function uuid() {
        $random = null;
        for ($i = 0; $i < 10; $i++) {
            $random .= sprintf('%02x', mt_rand(0, 255));
        }

        $version = '7' . substr($random, 1, 3);
        $unix = (int)(microtime(true) * 1000);
        $unix_hex = sprintf('%012x', (int)(microtime(true) * 1000));

        $uuidv7 = array(
            substr($unix_hex, 0, 8),
            substr($unix_hex, 8, 4),
            $version,
            dechex((hexdec($random[4]) & 0x3) | 0x8) . substr($random, 5, 3),
            substr($random, 8),
        );

        return implode('-', $uuidv7);
    }
    echo uuid();
?>