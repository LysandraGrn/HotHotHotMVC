<?php


class Buffer
{
    public $S_directoryName;
    public $I_duration; //Lifetime of the buffer in minutes.

    public function __construct($S_directoryName, $I_duration){
        $this->S_directoryName = $S_directoryName;
        $this->I_duration = $I_duration;
    }

    public function writeBuffer($filename, $content){
        return file_put_contents($this->S_directoryName.'/'.$filename, $content);
    }

    public function readBuffer($filename){
        $file = $this->S_directoryName.'/'.$filename;
        if(!file_exists($file)){
            return false;
        }
        $file = $this->S_directoryName.'/'.$filename;
        $filelifetime = (time() - filemtime($file)) / 60;
        if($filelifetime > $this->I_duration){
            return false;
        }
        return file_get_contents($file);
    }

    public function deleteBuffer($filename){
        $file = $this->S_directoryName.'/'.$filename;
        if(file_exists($file)){
            unlink($file);
        }
    }

    public function clearBuffer(){
        $files = glob($this->S_directoryName.'/*');
        foreach ($files as $file){
            unlink($file);
        }
    }

    public function inc($file){
        $filename = basename($file);
        if($content = $this->readBuffer($filename)){
            echo $content;
            return false;
        }
        ob_start();
        require $file;
        $content = ob_get_clean();
        $this->writeBuffer($filename, $content);
        echo $content;
        return false;
    }
}