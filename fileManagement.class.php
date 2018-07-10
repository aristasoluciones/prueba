<?php
/**
 * Created by PhpStorm.
 * User: RAGNAR
 * Date: 09/07/2018
 * Time: 06:08 PM
 */

class FileManagement extends S3
{
    public static $validateFile = false;
    private function validateFile($val){
         self::$validateFile=$val;
    }
    private function getEndPoint(){
        return parent::$endpoint;
    }
    /*
    * funcion uploadFile
    * Subir archivo a AWS S3 o Digital Ocean Spaces
    */

    public function uploadFile($FILES=array(),$bucketName='',$custom="same",$permiso ='private'){
        //comprobar si se guardara personalizado
        switch($custom){
            case "same":
                $nameDestino = $FILES['name'];
            break;
            default:
                //encontrar extension
                $ext =end(explode(".",$FILES['name']));
                $nameDestino = $custom.".".$ext;
            break;
        }
        switch($permiso){
            case 'public-rw':
                $acl = parent::ACL_PUBLIC_READ_WRITE;
            break;
            case 'public-r':
                $acl = parent::ACL_PUBLIC_READ;
            break;
            default:
                $acl = parent::ACL_PRIVATE;
            break;

        }
       if($this->putObject(parent::inputFile($FILES['tmp_name'],false),$bucketName,$nameDestino,$acl))
           return true;
        else
          return false;
    }

}