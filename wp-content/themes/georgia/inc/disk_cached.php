<?php
function is_disk_cache() {
    $status = get_option('disk_cache_status');
    $status = $status?$status:0;
    return $status;
}
//get CACHE_DIR and DISK_CACHE_TIMEOUT in index.php in the root folder
//if ( !defined('CACHE_DIR') )
define('CACHE_DIR', wf_createFullPath(ABSPATH, 'cache'));
define('DISK_CACHE_TIMEOUT', 3*60);

//run disk cache
//wf_do_disk_cache();
if(!file_exists(CACHE_DIR)){
	mkdir(CACHE_DIR,0775);
}

if ( !defined('DISK_CACHE_TIMEOUT') )
	define('DISK_CACHE_TIMEOUT', 7*60);

if(!file_exists(CACHE_DIR . 'index.php')){  
    //unlink(CACHE_DIR . 'index.php');
    $content = '<?php
        header("HTTP/1.0 404 Not Found");
        header("Location: http://kiokarma.com/");';
    @file_put_contents(CACHE_DIR . 'index.php', $content);    
}

function wf_getRequestUrl(){
    return "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
}

function wf_do_disk_cache(){
    $start = get_time_start();       
    $url = wf_getRequestUrl();    
    if(!(strpos($url, '/login') || strpos($url, '/wp-admin'))){
        $content = wf_getCache($url);
        if($content){
            echo $content;
	       $complete = get_time_end($start);
            echo '<!-- Cached time: '. $complete .'" -->';
            exit();
        }else{
            if(!isset($_POST['wf_docache'])){
                $content = wf_get_web($url,array('wf_docache'=>1));
                if(strlen($content)>400){
                    echo $content;
        	        $complete = get_time_end($start);
                    echo '<!-- Query time: '. $complete .'" -->';
                    wf_setCache($url,$content);
                    exit();
                }
            }
        }
    }

}

function wf_get_web($url,$post = "") {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_URL,$url);
	if(empty($_SERVER['HTTP_USER_AGENT'])) {
		$agent  = "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.11) Gecko/2009060215 Firefox/3.0.11";
	} else {
		$agent  = $_SERVER['HTTP_USER_AGENT'];
	}
	curl_setopt($ch, CURLOPT_USERAGENT, $agent);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	$buf        = @curl_exec ($ch);
    $con_info   = @curl_getinfo($ch);
	curl_close ($ch);
    if($con_info['http_code']=='200'){
          return $buf;
    }
	return '';
}

function wf_cacheTimeOut($filename, $second=3600){
	$filetime = strtotime(date ("Y-m-d H:i:s", @filemtime($filename)));
	$timeout =  strtotime(date ("Y-m-d H:i:s",  strtotime("-$second seconds")));
	if($filetime<$timeout){
		@unlink($filename);
		return true;
	}
	else
		return false;
}

function wf_createFullPath($url, $filename){
    $path       =  rtrim($url,'/');
    $filename   =  trim($filename,'/');
    $path       =  $path . '/' . $filename;
    return $path;
}

function wf_setCache($key, $data, $group='default'){
    if(!$key || !$data || !$group)
    return false;

    $subdir     = md5($group);
    $file       = md5($key);
    $path       = wf_createFullPath(CACHE_DIR,$subdir);

	if(!file_exists($path)){
		@mkdir($path,0777);
	}
	$filename   = wf_createFullPath($path,$file);

    $data       = serialize($data);
	@file_put_contents($filename, $data);
    return true;
}

function wf_getCache($key, $group='default'){
    if(!$key ||  !$group)
        return false;

    $subdir     = md5($group);
    $file       = md5($key);
    $path       = wf_createFullPath(CACHE_DIR,$subdir);
	$filename   = wf_createFullPath($path,$file);

    $timeout    = DISK_CACHE_TIMEOUT;
	if(is_readable($filename)){
		if(wf_cacheTimeOut($filename,$timeout))
			return false;

		$content = @file_get_contents($filename);
		return unserialize($content);
	}
	return false;
}

function wf_deleteCache($key, $group='default'){
    $subdir     = md5($group);
    $file       = md5($key);
    $path       = wf_createFullPath(CACHE_DIR,$subdir);
	$filename   = wf_createFullPath($path,$file);
	@unlink($filename);
    return true;
}

function wf_deleteCacheGroup($group='default'){
   $subdir     = md5($group);
   $path       = wf_createFullPath(CACHE_DIR,$subdir);
   wf_deleteDir($path);

}

function wf_flushCache(){
	$dir = CACHE_DIR;
	$dhandle = opendir($dir);
	if ($dhandle) {
		// loop through it
		while (false !== ($fname = readdir($dhandle))) {
			// if the element is a directory, and
			// does not start with a '.' or '..'
			// we call deleteDir function recursively
			// passing this element as a parameter
			if (is_dir( "{$dir}/{$fname}" )) {
				if (($fname != '.') && ($fname != '..')) {
					wf_deleteDir("$dir/$fname");
				}
				// the element is a file, so we delete it
			}
			else{
			   @unlink("{$dir}/{$fname}");
			}
		}
		closedir($dhandle);
	}
	//rmdir($dir);
}

function wf_deleteDir($dir) {
	// open the directory
	$dhandle = opendir($dir);
	if ($dhandle) {
		// loop through it
		while (false !== ($fname = readdir($dhandle))) {
			// if the element is a directory, and
			// does not start with a '.' or '..'
			// we call deleteDir function recursively
			// passing this element as a parameter            
			if (is_dir( "{$dir}/{$fname}" )) {
				if (($fname != '.') && ($fname != '..')) {				    
					wf_deleteDir("$dir/$fname");
				}
				// the element is a file, so we delete it
			}
			else{                
				@unlink("{$dir}/{$fname}");
			}
		}
		closedir($dhandle);
	}
	@rmdir($dir);
}



function wf_deleteFullDir($dir) {
	// open the directory
	$dhandle = opendir($dir);
	if ($dhandle) {
		// loop through it
		while (false !== ($fname = readdir($dhandle))) {
			// if the element is a directory, and
			// does not start with a '.' or '..'
			// we call deleteDir function recursively
			// passing this element as a parameter            
			if (is_dir( "{$dir}/{$fname}" )) {
				if (($fname != '.') && ($fname != '..')) {				    
					wf_deleteDir("$dir/$fname");
				}
				// the element is a file, so we delete it
			}
			else{ 
                $timeout    = DISK_CACHE_TIMEOUT;
                if(wf_cacheTimeOut("{$dir}/{$fname}",$timeout))
				    @unlink("{$dir}/{$fname}");
			}
		}
		closedir($dhandle);
	}
	//@rmdir($dir);
}


/**
* Hàm để lấy tính thời gian bắt đầu
*/
function get_time_start(){
	$load_time = microtime();
	$load_time = explode(' ',$load_time);
	$load_time = $load_time[1] + $load_time[0];
	return $load_time;
}
/**
 * Hàm để lấy tính thời gian kết thúc
 */
function get_time_end($start_time){
	$end_time = get_time_start();
	$final_time = ($end_time- $start_time);
	$load_time = number_format($final_time, 4, '.', '');
	return $load_time;
}
