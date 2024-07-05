<?php
exec('apt-get update && apt-get install -y libssl1.0.0', $output, $return_var);
if ($return_var !== 0) {
    throw new Exception('Failed to install libssl: ' . implode("\n", $output));
}
