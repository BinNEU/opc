<?php

	$cache_time=30;
	$OJ_CACHE_SHARE=true;
	require_once('./include/cache_start.php');
        require_once('./include/db_info.inc.php');
        require_once('./include/memcache.php');
	require_once('./include/setlang.php');
	$view_title= "Welcome To Online Judge";
 $result=false;	
//affichage du phpinfo
if (isset($_GET['phpinfo']))
{
	phpinfo();
	exit();
}


//affichage des images
if (isset($_GET['img']))
{
    switch ($_GET['img'])
    {
        case 'pngFolder' :
        header("Content-type: image/png");
        echo base64_decode($pngFolder);
        exit();
        
        case 'pngFolderGo' :
        header("Content-type: image/png");
        echo base64_decode($pngFolderGo);
        exit();
        
        case 'gifLogo' :
        header("Content-type: image/gif");
        echo base64_decode($gifLogo);
        exit();
        
        case 'pngPlugin' :
        header("Content-type: image/png");
        echo base64_decode($pngPlugin);
        exit();
        
        case 'pngWrench' :
        header("Content-type: image/png");
        echo base64_decode($pngWrench);
        exit();
        
        case 'favicon' :
        header("Content-type: image/x-icon");
        echo base64_decode($favicon);
        exit();
    }
}



// Définition de la langue et des textes 

if (isset ($_GET['lang']))
{
  $langue = htmlspecialchars($_GET['lang'],ENT_QUOTES);
  if ($langue != 'en' && $langue != 'fr' ) {
		$langue = 'fr';
  }
  }
elseif (isset ($_SERVER['HTTP_ACCEPT_LANGUAGE']) AND preg_match("/^fr/", $_SERVER['HTTP_ACCEPT_LANGUAGE']))
{
	$langue = 'fr';
}
else
{
	$langue = 'en';
}

//initialisation
$aliasContents = '';

// récupération des alias
if (is_dir($aliasDir))
{
    $handle=opendir($aliasDir);
    while (($file = readdir($handle))!==false) 
    {
	    if (is_file($aliasDir.$file) && strstr($file, '.conf'))
	    {		
		    $msg = '';
		    $aliasContents .= '<li><a href="'.str_replace('.conf','',$file).'/">'.str_replace('.conf','',$file).'</a></li>';
	    }
    }
    closedir($handle);
}
if (empty($aliasContents))
	$aliasContents = "<li>".$langues[$langue]['txtNoAlias']."</li>\n";

// récupération des projets
$handle=opendir(".");
$projectContents = '';
while (($file = readdir($handle))!==false) 
{
	if (is_dir($file) && !in_array($file,$projectsListIgnore)) 
	{		
		//[modif oto] Ajout éventuel de http:// pour éviter le niveau localhost dans les url
		$projectContents .= '<li><a href="'.($suppress_localhost ? 'http://' : '').$file.'">'.$file.'</a></li>';
	}
}
closedir($handle);
if (empty($projectContents))
	$projectContents = "<li>".$langues[$langue]['txtNoProjet']."</li>\n";;


//initialisation
$phpExtContents = '';

// récupération des extensions PHP
$loaded_extensions = get_loaded_extensions();
// [modif oto] classement alphabétique des extensions
setlocale(LC_ALL,"{$langues[$langue]['locale']}");
sort($loaded_extensions,SORT_LOCALE_STRING);
foreach ($loaded_extensions as $extension)
	$phpExtContents .= "<li>${extension}</li>";


//header('Status: 301 Moved Permanently', false, 301);      
//header('Location: /aviatechno/index.php');      
//exit();        

require("template/".$OJ_TEMPLATE."/hupingindex.php");
/////////////////////////Common foot
if(file_exists('./include/cache_end.php'))
	require_once('./include/cache_end.php');
?>