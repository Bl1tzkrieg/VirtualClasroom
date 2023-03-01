<?php

function Obtener_Contador($filename4)
{
// Open our file in append-or-create mode.
$fh = fopen($filename4, "a+");

if (!$fh)
die("Error en creación del contador");


// Before doing anything else, get an exclusive lock on the file.
// This will prevent anybody else from reading or writing to it.
flock($fh, LOCK_EX);

// Place the pointer at the start of the file.
fseek($fh, 0);

// Read one line from the file to get current count.
// There should only ever be one line.
$current = intval(trim(fgets($fh)));

// Increment
$new = $current++;

// Now we can reset the pointer again, and truncate the file to zero length.
fseek($fh, 0);

ftruncate($fh, 0);

// Now we can write out our line.
fwrite($fh, $current . "\n");

// And we're done.  Closing the file will also release the lock.
fclose($fh);

return $new;         

}

?>
