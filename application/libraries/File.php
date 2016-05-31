<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
        $this->ci->load->library('dir');
	}

	public function md5($filePath='')
    {
        if(!file_exists($filePath))
        {
            return false;
        }
        return md5_file($filePath);
    }
    public function cleanTmpFiles($path)
    {
        $listFiles=$this->ci->dir->all($path);
        $total=count($listFiles);
        if(isset($listFiles[0]))
        for ($i=0; $i < $total; $i++) { 
            $theName=$listFiles[$i];
            if(preg_match('/.*?\.(txt|zip|rar|jpg|bmp|png|gif)/i', $theName))
            {
                unlink($path.$theName);
            }
        }
        if(is_dir($path.'thumbnail'))
        {
            $this->ci->dir->remove($path.'thumbnail');
            mkdir($path.'thumbnail');            
        }
    }
    public function removeAllFiles($path='',$callback='')
    {
        if(!isset($path[2]))
        {
            return false;
        }
        $listFiles=$this->ci->dir->listFiles($path);
        $total=count($listFiles);
        if(isset($listFiles[0]))
        for ($i=0; $i < $total; $i++) { 
            $theName=$listFiles[$i];
            if(is_file($path.$theName))
            {
                unlink($path.$theName);
            }
        }
        if(is_object($callback))
        {
            $callback=(object)$callback;
            $result=$callback();
            return $result;
        }
    }
    public function removeByPath($inputData=array())
    {
        /*
        $inputData:
            - path : string
            - files : array filenames:Tst.php
        */
        if(!preg_match('/.*?\/$/i', $inputData['path']))
        {
            $inputData['path'].='/';
        }
        $inputData['path']=ROOT_PATH.$inputData['path'];
        if(isset($inputData['files']) && is_array($inputData['files']))
        {
            $total=count($inputData['files']);
            for ($i=0; $i < $total; $i++) { 
                $path=$inputData['path'].$inputData['files'][$i];
                if(file_exists($path))
                {
                    unlink($path);
                }
            }
        }
    }
    public function unzipModule($fullPath,$remove='no')
    {
        if(!preg_match('/.*?\.(zip|rar)/i', $fullPath))
        {
            return false;
        }
        $zip = new Unzip($fullPath);
        $zip->extract();
        if($remove!='no')
        {
            unlink($fullPath);
        }
        $dirPath=dirname($fullPath).'/';
        $listFiles=$this->ci->dir->listFiles($dirPath);
        return $listFiles;
    }
    public function downloadModule($fileUrl,$savePath,$unzip='no')
    {
        // self::uploadFromUrl($fileUrl,$savePath);
        $imgData=Http::getDataUrl($fileUrl);
        // $fileName=basename($fileUrl);
        $fileName=PluginStoreApi::getFileName($fileUrl);
        $fullPath=ROOT_PATH.$savePath.$fileName;
        File::create($fullPath,$imgData);
        if($unzip!='no')
        {
            $listFiles=self::unzipModule($fullPath,'yes');
            return $listFiles;
        }
        return $savePath.$fileName;
    }
    public function uploadMultiModule($keyName='theFile',$savePath='contents/plugins/')
    {
        $resultData=self::uploadMultiple($keyName,$savePath);
        $total=count($resultData);
        for($i=0;$i<$total;$i++)
        {
            if(isset($resultData[$i][4]))
            {
                $thisPath=ROOT_PATH.$resultData[$i];    
                
                self::unzipModule($thisPath,'yes');            
            }
        }
    }
    public function exists($filePath = '',$callback='')
    {
        if (isset($filePath[1]) && !file_exists($filePath)) {
            return false;
        }
        if(is_object($callback))
        {
            $callback=(object)$callback;
            $result=$callback($filePath);
            return $result;            
        }
    }
    public function create($filePath = '', $fileData = '', $writeMode = 'w')
    {
        $path=dirname($filePath);
        if(!is_dir($path))
        {
            $this->ci->dir->create($path);
        }
        if(file_exists($filePath))
        {
            chmod($filePath, 0666);
        }
        
        
        $fp = fopen($filePath, $writeMode);
        fwrite($fp, $fileData);
        fclose($fp);
        chmod($filePath, 0644);
        return $filePath;
    }
    public function writeoverride($filePath = '', $fileData = '')
    {
        self::create($filePath, $fileData);
    }
    public function write($filePath = '', $fileData = '')
    {
        self::create($filePath, $fileData, 'a');
    }
    public function read($filePath = '')
    {
        if (file_exists($filePath)) {
            $data = file_get_contents($filePath);
            return $data;
        }
        return false;
    }
    public function readallline($filePath = '')
    {
        if (file_exists($filePath)) {
            $data = file($filePath);
            return $data;
        }
        return false;
    }
    public function getcontenttype($filePath = '')
    {
        /*
        'application/octet-stream'
         $mime_types = array(
                    'txt' => 'text/plain',
                    'htm' => 'text/html',
                    'html' => 'text/html',
                    'php' => 'text/html',
                    'css' => 'text/css',
                    'js' => 'application/javascript',
                    'json' => 'application/json',
                    'xml' => 'application/xml',
                    'swf' => 'application/x-shockwave-flash',
                    'flv' => 'video/x-flv',
                    // images
                    'png' => 'image/png',
                    'jpe' => 'image/jpeg',
                    'jpeg' => 'image/jpeg',
                    'jpg' => 'image/jpeg',
                    'gif' => 'image/gif',
                    'bmp' => 'image/bmp',
                    'ico' => 'image/vnd.microsoft.icon',
                    'tiff' => 'image/tiff',
                    'tif' => 'image/tiff',
                    'svg' => 'image/svg+xml',
                    'svgz' => 'image/svg+xml',
                    // archives
                    'zip' => 'application/zip',
                    'rar' => 'application/x-rar-compressed',
                    'exe' => 'application/x-msdownload',
                    'msi' => 'application/x-msdownload',
                    'cab' => 'application/vnd.ms-cab-compressed',
                    // audio/video
                    'mp3' => 'audio/mpeg',
                    'qt' => 'video/quicktime',
                    'mov' => 'video/quicktime',
                    // adobe
                    'pdf' => 'application/pdf',
                    'psd' => 'image/vnd.adobe.photoshop',
                    'ai' => 'application/postscript',
                    'eps' => 'application/postscript',
                    'ps' => 'application/postscript',
                    // ms office
                    'doc' => 'application/msword',
                    'rtf' => 'application/rtf',
                    'xls' => 'application/vnd.ms-excel',
                    'ppt' => 'application/vnd.ms-powerpoint',
                    // open office
                    'odt' => 'application/vnd.oasis.opendocument.text',
                    'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
                );
        */
        if (file_exists($filePath)) {
            return mime_content_type($filePath);
        }
        return false;
    }
    public function getmodifytime($filePath = '')
    {
        if (file_exists($filePath)) {
            return filemtime($filePath);
        }
        return false;
    }
    public function getcreatetime($filePath = '')
    {
        if (file_exists($filePath)) {
            return fileatime($filePath);
        }
        return false;
    }
    public function getextension($fileName = '')
    {
        if (preg_match('/\.(\w+)$/i', $fileName, $matches)) {
            return $matches[1];
        }
        return false;
    }
    public function getsize($filePath = '')
    {
        if (file_exists($filePath)) {
            return filesize($filePath);
        }
        return false;
    }
    public function download($filePath,$fileName='')
    {
        if(isset($fileName[2]))
        {
            preg_match('/\.(\w+)$/i', $filePath,$matches);
            $fileName=Url::makeFriendly($fileName).'.'.$matches[1];
        }
        else
        {
            $fileName=basename($filePath);
        }
        
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.$fileName);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filePath));
        ob_clean();
        flush();
        readfile($filePath);
        exit;
    }
    public function move($fileSource = '', $fileDesc = '')
    {
        if (file_exists($fileSource)) {
            if (file_exists($fileDesc)) {
                unlink($fileDesc);
            }
            copy($fileSource, $fileDesc);
            unlink($fileSource);
            return true;
        }
        return false;
    }
    public function copy($fileSource = '', $fileDesc = '')
    {
        if (file_exists($fileSource)) {
            if (file_exists($fileDesc)) {
                unlink($fileDesc);
            }
            copy($fileSource, $fileDesc);
            return true;
        }
        return false;
    }
    public function copyMatch($source, $target)
    {
        if(!isset($target[2]))
        {
            return false;
        }
        if(!preg_match('/\/$/i', $target))
        {
            $target.='/';
        }
        $allFiles=glob($source);
        $total=count($allFiles);
        for ($i=0; $i < $total; $i++) { 
            $fileName=basename($allFiles[$i]);
            copy($allFiles[$i], $target.$fileName);
        }
    }
    public function fullCopy( $source, $target ) {
        if ( is_dir( $source ) ) {
            @mkdir( $target );
            $d = dir( $source );
            while ( FALSE !== ( $entry = $d->read() ) ) {
                if ( $entry == '.' || $entry == '..' ) {
                    continue;
                }
                $Entry = $source . '/' . $entry; 
                if ( is_dir( $Entry ) ) {
                    self::fullCopy( $Entry, $target . '/' . $entry );
                    continue;
                }
                copy( $Entry, $target . '/' . $entry );
            }
            $d->close();
        }else {
            copy( $source, $target );
        }
    }
    public function rename($oldName = '', $newName = '')
    {
        if (file_exists($oldName)) {
            $dir = dirname($oldName);
            rename($oldName, $dir . '/' . $newName);
            return true;
        }
        return false;
    }
    public function name($Url = '')
    {
        return basename($Url);
    }
    public function upload($keyName='image',$shortPath='uploads/files/',$defaultName='')
    {
        $name=$_FILES[$keyName]['name'];
        if(!preg_match('/^.*?\.(\w+)$/i', $name,$match))
        {
            return false;
        }
        
        $shortPath.=Http::get('host').'/';
        $newName=String::randNumber(10);
        $shortPath.=$newName;
        if(!is_dir($shortPath))
        {
            $this->ci->dir->create(ROOT_PATH.$shortPath);
        }
        preg_match('/(.*?)\.(\w+)/i', $name,$match);
        $fileName=trim(String::makeFriendlyUrl($match[1]));
        $fileName=isset($defaultName[1])?trim(String::makeFriendlyUrl($defaultName)):$fileName;
        $fileExt=$match[2];
        $shortPath.='/'.$fileName.'.'.$fileExt;  
        $fullPath=ROOT_PATH.$shortPath;
        move_uploaded_file($_FILES[$keyName]['tmp_name'], $fullPath);
        return $shortPath;
    }
    
    public function uploadMultiple($keyName='image',$shortPath='uploads/files/',$defaultName='')
    {
        $name=$_FILES[$keyName]['name'][0];
        $resultData=array();
        if(!preg_match('/^.*?\.\w+$/i', $name))
        {
            return false;
        }
        $shortPath.=Http::get('host').'/';
        if(!is_dir($shortPath))
        {
            $this->ci->dir->create(ROOT_PATH.$shortPath);
        }
        $total=count($_FILES[$keyName]['name']);
        $tmpShortPath='';
        for($i=0;$i<$total;$i++)
        {
            $tmpShortPath=$shortPath;
            if(!preg_match('/.*?\.(\w+)/i', $_FILES[$keyName]['name'][$i],$matchName))
            {
                continue;
            }
            $newName=String::randNumber(10);
            $theName=$_FILES[$keyName]['name'][$i];
            $tmpShortPath.=$newName;
            mkdir(ROOT_PATH.$tmpShortPath);
            preg_match('/(.*?)\.(\w+)/i', $theName,$match);
            $fileName=trim(String::makeFriendlyUrl($match[1]));
            $fileName=isset($defaultName[1])?trim(String::makeFriendlyUrl($defaultName)):$fileName;
            $fileExt=$match[2];        
            $tmpShortPath.='/'.$fileName.'_'.$i.'.'.$fileExt;      
            $resultData[$i]=$tmpShortPath;
            $fullPath=ROOT_PATH.$tmpShortPath;
            move_uploaded_file($_FILES[$keyName]['tmp_name'][$i], $fullPath);
        }
        return $resultData;
    }
    public function uploadFromUrl($imgUrl,$shortPath='uploads/files/',$defaultName='')
    {
        $imgUrl=trim($imgUrl);
        if(!preg_match('/^http.*?\.(\w+)/i', $imgUrl,$match))
        {
            return false;
        }
        $shortPath.=Http::get('host').'/';
        if(!is_dir($shortPath))
        {
            $this->ci->dir->create(ROOT_PATH.$shortPath);
        }
        $newName=String::randNumber(10);
        $shortPath.=$newName;
        mkdir(ROOT_PATH.$shortPath);
        preg_match('/(.*?)\.(\w+)/i', basename($imgUrl),$match);
        $fileName=trim(String::makeFriendlyUrl($match[1]));
        $fileName=isset($defaultName[1])?trim(String::makeFriendlyUrl($defaultName)):$fileName;
        $fileExt=$match[2];
        $shortPath.='/'.$fileName.'.'.$fileExt;
        $fullPath=ROOT_PATH.$shortPath;
        $imgData=Http::getDataUrl($imgUrl);
        File::create($fullPath,$imgData);
        return $shortPath;
    }
    public function remove($filePath)
    {
        if(preg_match('/.*?\.\w+/i', $filePath) && file_exists($filePath))
        {
            unlink($filePath);
            $filePath=dirname($filePath);
            if(file_exists($filePath.'/index.html'))
            {
                unlink($filePath.'/index.html');
            }
            rmdir($filePath);
        }
    }
    public function removeOnly($filePath)
    {
        if(preg_match('/.*?\.\w+/i', $filePath) && file_exists($filePath))
        {
            unlink($filePath);
        }
    }

}

/* End of file File.php */
/* Location: ./application/libraries/File.php */
