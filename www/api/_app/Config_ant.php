﻿<?php
// Configuração da conexao
define('HOST', 'localhost');
define('USER', 'porta268_root');
define('PASS', '314159');
define('DBSA', 'porta268_itv_jf');

function __autoload($Class){
    $cDir = ['Conn'];
    $iDir = null;
    
    foreach ($cDir as $dirName):
    if (!$iDir && file_exists($file = __DIR__ . DIRECTORY_SEPARATOR . $dirName . DIRECTORY_SEPARATOR . $Class . '.class.php') && !is_dir($file)):
        include_once ($file);
        $iDir = true;
    endif;
    endforeach;
    if(!$iDir):
    trigger_error("Não foi possivel incluir {$Class}.class.php", E_USER_ERROR);
    die;
    endif;
}
