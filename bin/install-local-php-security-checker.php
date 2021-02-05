#!/usr/bin/env php
<?php

$versionOutput = null;
exec("curl -s https://api.github.com/repos/fabpot/local-php-security-checker/releases/latest | grep '\"tag_name\":' | sed -E 's/.*\"([^\"]+)\".*/\\1/;s/^v//'", $versionOutput);

if (!isset($versionOutput[0])) {
    exit(1);
}

$version = $versionOutput[0];
exec("curl -LSs https://github.com/fabpot/local-php-security-checker/releases/download/v${version}/local-php-security-checker_${version}_linux_amd64 > ./vendor/bin/local-php-security-checker");

?>