<?php declare(strict_types=1);

require __DIR__ . '/src/TypeMeta.php';
require __DIR__ . '/src/ExtStubExporter.php';
require __DIR__ . '/src/SwooleLibrary.php';

// Create exporter
$dumper = IDEHelper\ExtStubExporter::create();
$dumper->export();
