<?php
echo "<pre>";
echo "Current directory: " . __DIR__ . "\n";
echo "Root directory: " . realpath(__DIR__ . '/..') . "\n";
echo "Files in root:\n";
function listFolderFiles($dir, $depth = 0) {
    if ($depth > 3) return; // avoid too deep scan
    $ffs = @scandir($dir);
    if (!$ffs) return;
    unset($ffs[array_search('.', $ffs, true)], $ffs[array_search('..', $ffs, true)]);
    foreach($ffs as $ff){
        $path = $dir.'/'.$ff;
        echo $path."\n";
        if(is_dir($path) && $ff !== 'vendor' && $ff !== 'node_modules') {
            listFolderFiles($path, $depth + 1);
        }
    }
}
listFolderFiles(realpath(__DIR__ . '/..'));
echo "</pre>";
exit;
