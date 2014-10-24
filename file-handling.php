<?php
    if(isset($_POST['function'])){
        switch ($_POST['function']) {
            case 'write-file':
                if(isset($_POST['path']) && isset($_POST['data'])) {
                    writeFile($_POST['path'], $_POST['data']);
                }
                else {
                   die('no post data to process');
               }
                break;
            case 'get-files':
                getFiles($_POST['path']);
            break;
            default:
                # code...
                break;
        }
    }
    else{
        die("no function passed");
    }

//
function writeFile($path, $data){
    $fp = fopen($path, 'w');
    fwrite($fp, $data);
    fclose($fp);
    echo("Success");
}
function readFileContents(){
    if(isset($_POST['path']) && isset($_POST['data'])) {
            $path = $_POST['path'];
            $data = $_POST['data'];
            $fp = fopen($path, 'w');
            fwrite($fp, $data);
            fclose($fp);
            echo("Success");
        }
        else {
           die('no post data to process');
       }
}

function getFiles($folder){
    //open this directory
    $dir = opendir($folder);
    $first = true;
    print "[";
    while($file = readdir($dir)){
        if(substr($file, 0, 1) != '.'){
            if($first){
                $first = false;
            }
            else{
                print ",";
            }
            print '"'.$file.'"';
        }
    }
    print "]";
    closedir($dir);
    return;
}
?>	