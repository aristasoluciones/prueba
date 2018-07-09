<?php

        include_once('config.php');
require_once("S3.php");
$key_space = "BT7JUGZNR2QX4YHSYCGL";
$secret_space ="oqo0F9a+hFZdFmpGwFFJrKVm5qEg0EEXpajHawEOd1I";
$space_name = "hbkruzpehost";
$region ="nyc3";



        $message = '';


            if (!class_exists('S3')) require_once 'S3.php';
            // AWS access info
            if (!defined('awsAccessKey')) define('awsAccessKey', $key_space);
            if (!defined('awsSecretKey')) define('awsSecretKey', $secret_space);
            $uploadFile = dirname(__FILE__).'/S3.php'; // File to upload, we'll use the S3 class since it exists
            $bucket = uniqid($space_name); // Temporary bucket
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

            $file ='pruebaddddd.txt';
            $path = 'jod.txt';

            S3::setAuth(awsAccessKey, awsSecretKey);

            $path = 'huerin/'; // Can be empty ''
            $lifetime = 3600; // Period for which the parameters are valid
            $maxFileSize = (1024 * 1024 * 50); // 50 MB
            $metaHeaders = array('uid' => 123);
            $requestHeaders = array(
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename=${filename}'
            );
            $params = S3::getHttpUploadPostParams(
                $bucket,
                $path,
                S3::ACL_PUBLIC_READ,
                $lifetime,
                $maxFileSize,
                201, // Or a URL to redirect to on success
                $metaHeaders,
                $requestHeaders,
                false // False since we're not using flash
            );

$uploadURL = 'https://' . $bucket . '.nyc3.digitaloceanspaces.com/';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>S3 Form Upload</title>
</head>
<body>
<form method="post" action="<?php echo $uploadURL; ?>" enctype="multipart/form-data">
    <?php
    foreach ($params as $p => $v)
        echo "        <input type=\"hidden\" name=\"{$p}\" value=\"{$v}\" />\n";
    ?>
    <input type="file" name="file" />&#160;<input type="submit" value="Upload" />
</form>
</body>
</html>