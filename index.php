<?php

        include_once('config.php');
require_once("s3.php");
$key_space = "BT7JUGZNR2QX4YHSYCGL";
$secret_space ="oqo0F9a+hFZdFmpGwFFJrKVm5qEg0EEXpajHawEOd1I";
$space_name = "hbkruzpehost";
$region ="nyc3";



        $message = '';
        if(!empty($_FILES['uploaded_file'])) {

            if (!class_exists('S3')) require_once 'S3.php';
            // AWS access info
            if (!defined('awsAccessKey')) define('awsAccessKey', $key_space);
            if (!defined('awsSecretKey')) define('awsSecretKey', $secret_space);
            $uploadFile = dirname(__FILE__).'/S3.php'; // File to upload, we'll use the S3 class since it exists
            $bucketName = uniqid($space_name); // Temporary bucket
            // If you want to use PECL Fileinfo for MIME types:
            //if (!extension_loaded('fileinfo') && @dl('fileinfo.so')) $_ENV['MAGIC'] = '/usr/share/file/magic';
            // Check if our upload file exists
                        if (!file_exists($uploadFile) || !is_file($uploadFile))
                            exit("\nERROR: No such file: $uploadFile\n\n");
            // Check for CURL
                        if (!extension_loaded('curl') && !@dl(PHP_SHLIB_SUFFIX == 'so' ? 'curl.so' : 'php_curl.dll'))
                            exit("\nERROR: CURL extension not loaded\n\n");
            // Pointless without your keys!
                       /* if (awsAccessKey == 'change-this' || awsSecretKey == 'change-this')
                            exit("\nERROR: AWS access information required\n\nPlease edit the following lines in this file:\n\n".
                                "define('awsAccessKey', 'change-me');\ndefine('awsSecretKey', 'change-me');\n\n");*/

                        $ext =  end(explode(".",$_FILES['uploaded_file']['name']));
                        $saveAs = "arvhivo1.".$ext;
                        $path_to_file = $_FILES['uploaded_file']['tmp_name'];

            $s3 = new S3(awsAccessKey, awsSecretKey);
// List your buckets:
            echo "S3::listBuckets(): ".print_r($s3->listBuckets(), 1)."\n";
                //$space->UploadFile($path_to_file, "public",$saveAs);

        }

?>
<!DOCTYPE html>
<html>
<head>
  <title>Upload your files</title>
</head>
<body>
  <?php echo $message; ?>
  <form enctype="multipart/form-data" action="index.php" method="POST">
    <p>Upload your file</p>
    <input type="file" name="uploaded_file"></input><br />
    <input type="submit" value="Upload"></input>
  </form>
</body>
</html>