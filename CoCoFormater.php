<?php

include_once 'functions.php';
include_once 'src/CoCoForliaLog.php';
include_once 'src/Post.php';
include_once 'src/Writer.php';
function showHelp(){
    global $argv;
    echo <<<EOL
# ココフォリアログ整形

## usage
$argv[0] < ログファイル.html > 出力.html

## オプション
  --extab=[tab,tab...] 出力しないタブ
  --exname=[tab,tab...] 出力しないキャラクター

EOL;

}
$options = getopt('', ['extab::', 'exname::','help',"ls-tab",'ls-name']);
if(array_key_exists('help',$options)){
    showHelp();
    exit(0);
}
$planeText = readSTDIN();
$xml = simplexml_load_string($planeText);
$log = new CoCoForliaLog($xml);
$exName = isset($options['exname'])?explode(',',$options['exname']):[];
$exTab = isset($options['extab'])?explode(',',$options['extab']):[];
$writer = new Writer($exTab,$exName);
if(array_key_exists('ls-tab',$options)){
    foreach ($log->getTabs() as $tab){
        echo substr($tab,1,-1) . "\n";
    }
    exit(0);
}
if(array_key_exists('ls-name',$options)){
    foreach ($log->getUsers() as $tab){
        echo $tab . "\n";
    }
    exit(0);
}
echo $writer->header();
echo $writer->bodyHead();
echo $writer->tableHeader($log);
echo $writer->tableBody($log);
echo $writer->bodyTail();
