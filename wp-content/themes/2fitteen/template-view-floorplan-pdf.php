<?php
    /*
     * Template Name: Template View Floorplan
     */
?>
<style>
    body{ 
        margin:0px;
        padding:0px;
        overflow:hidden;
    }
</style>
<?php 
$uploads_dir = wp_upload_dir()['basedir']; 
$rootFolder = $uploads_dir.'/floorplan';
if (!file_exists($rootFolder)) {
	mkdir($rootFolder, 0777, true);
}
// Initialize a file URL to the variable
//$url = 'https://api.buildingstack.com/api/Resources/UnitFloorPlan/4mfs';
$url = $_GET['url'];
  
// Use basename() function to return the base name of file
$file_name = explode("/",$url);
$file_name = end($file_name);
  
// Use file_get_contents() function to get the file
// from url and use file_put_contents() function to
// save the file by using base name
//$arr = wp_get_upload_dir()['baseurl'];
//var_dump(wp_get_upload_dir());
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";//$_SERVER[REQUEST_URI];

//var_dump($arr);
if (file_put_contents($rootFolder."/".$file_name.".pdf", file_get_contents($url)))
{
    //echo "File downloaded successfully";
    ?>
    <iframe src="<?php echo $actual_link."/wp-content/uploads/floorplan/".$file_name.".pdf";?>" style="width:100%; height:100%"></iframe>
    <?php
}
else
{
    echo "File downloading failed.";
}

?>