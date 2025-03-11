<?php 

    Class tamanhoArquivo{
    
    private function formatFileSize($filename){
     $size = filesize($filename); 
     
     for ($i = 0; $size >= 1024 && $i < count($units) -1; $i++){
     $size /= 1024;
    $formattedSize = round($size, 2);
    }
    return $formattedSize . ' '($size, 2);
    }
}
$filename = 'i:/test.txt';
$filesize = formatFileSize($filename);
echo "File Size" . $fileSize;