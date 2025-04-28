<?php
 
  function getFileList($dir,$folder_name='', $recurse=false)
  {
    $retval = array();
 
    // add trailing slash if missing
    if(substr($dir, -1) != "/") $dir .= "/";

    // open pointer to directory and read list of files
    $d = @dir($dir) or die("getFileList: Failed opening directory $dir for reading");
    while(false !== ($entry = $d->read())) {
		$temp_name = "$dir$entry";
		$temp_name_new = str_replace("../",SITE_BASE_URL."/",$temp_name);
		
      // skip hidden files
      if($entry[0] == ".") continue;
      if(is_dir("$dir$entry")) {
        $retval1[] = array(
          "image" => "$temp_name_new",
		  "thumb" => "$temp_name_new",
		  "folder" => basename("$dir$entry/"),
          "type" => filetype("$dir$entry"),
          "size" => 0,
          "lastmod" => filemtime("$dir$entry")
        );
        if($recurse && is_readable("$dir$entry/")) {
          $retval = array_merge($retval, getFileList("$dir$entry/",basename("$dir$entry/"), true));
        }
      } elseif(is_readable("$dir$entry")) {
		 
        $retval[] = array(
           "image" => "$temp_name_new",
		  "thumb" => "$temp_name_new",
		  "folder" => $folder_name,
          "type" => mime_content_type("$dir$entry"),
          "size" => filesize("$dir$entry"),
          "lastmod" => filemtime("$dir$entry")
        );
		 
      }
    }
    $d->close();

    return $retval;
  }
 
 $dir          = "uploads/media/";
$dirlist = getFileList($dir,'media',true);

    echo "".json_encode($dirlist )."";
 
?>