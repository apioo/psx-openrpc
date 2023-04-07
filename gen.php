<?php

$cmd = sprintf('php vendor/psx/schema/bin/schema schema:parse typeschema.json src --format=php --config=%s', escapeshellarg('namespace=PSX\\OpenRPC&mapping[openapi]=PSX\\OpenAPI'));

echo 'Generated' . "\n";
echo '> ' . $cmd . "\n";

shell_exec($cmd);

