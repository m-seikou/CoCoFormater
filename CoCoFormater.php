<?php

include_once 'functions.php';
include_once 'src/CoCoForliaLog.php';
include_once 'src/Post.php';
include_once 'src/Writer.php';

$options = getopt('', ['extab', 'exname']);
$planeText = readSTDIN();
$xml = simplexml_load_string($planeText);
$log = new CoCoForliaLog($xml);

$writer = new Writer($options['extab'],$options['exname']);
echo $writer->header();
echo $writer->bodyHead();
echo $writer->tableHeader($log);
echo $writer->tableBody($log);
echo $writer->bodyTail();
