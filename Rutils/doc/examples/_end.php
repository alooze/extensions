<<<<<<< HEAD
<?php
namespace php_rutils\doc\examples;

$content = ob_get_clean();
if (CLI && strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
    $content = iconv('UTF-8', 'cp866//IGNORE', $content);
echo $content, PHP_EOL;
=======
<?php
namespace php_rutils\doc\examples;

$content = ob_get_clean();
if (CLI && strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
    $content = iconv('UTF-8', 'cp866//IGNORE', $content);
echo $content, PHP_EOL;
>>>>>>> e7fd71c0bb76ce46318f11d43e467a3bec2b7b76
