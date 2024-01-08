<?php

include_once 'functions.php';
include_once 'src/CoCoForliaLog.php';
include_once 'src/Post.php';
include_once 'src/Writer.php';

$planeText = readSTDIN();
$xml = simplexml_load_string($planeText);
$log = new CoCoForliaLog($xml);

echo Writer::header();
echo Writer::bodyHead();
echo Writer::tableHeader($log);
echo Writer::tableBody($log);
echo Writer::bodyTail();
