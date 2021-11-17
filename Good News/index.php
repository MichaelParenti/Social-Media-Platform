<?php

if (isset($_POST['post'])) {

    #declarations
    $title = $_POST['title'];
    $message = $_POST['message'];

    $redirect = "index.html";
    
    $file = $_FILES['fileToUpload']; 
    $fileName = $_FILES['fileToUpload']['name'];
    $fileTmpName = $_FILES['fileToUpload']['tmp_name'];
    $fileSize = $_FILES['fileToUpload']['size'];
    $fileError = $_FILES['fileToUpload']['error'];
    $fileType = $_FILES['fileToUpload']['type'];
    
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    
    $allowed = array('jpg', 'jpeg', 'png', 'gif', 'bmp', 'raw', 'webp', 'tiff', 'heif', 'indd', 'svg', 'ico', 'eps', 'wdp', 'apng');
    
    #upload image
    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 10000000){
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = 'images/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
            } else {
                echo "Your file is too large.";
            }
        } else {
            echo "There was an error uploading your file.";
        }
    } else {
        echo "You cannot upload files of this type.";
    }
    


    
        $post_without_image = "\n
                <div class=\"post-with-text\">
                    <h2 class=\"text-title\">" . $title . "</h2>
                    <div class=\"message\">
                        <h3>" . $message . "</h3>
                    </div>
                </div>\n\n";

        $post_with_image = "\n
                <div class=\"post-with-text\">
                    <h2 class=\"text-title\">" . $title . "</h2>
                    <div class=\"message\">
                        <h3>" . $message . "</h3>
                    </div>
                    <img src=\"" . $fileDestination . "\" alt=\"image\">
                </div>\n\n";
    

    


        #clear form            
        echo "<script>clearForm();</script>";

                #add post to index.html
                function injectData($myfile, $post_with_image, $position) {
                    $fpFile = fopen($myfile, "rw+");
                    $fpTemp = fopen('php://temp', "rw+");
                
                    $len = stream_copy_to_stream($fpFile, $fpTemp); // make a copy
                
                    fseek($fpFile, $position); // move to the position
                    fseek($fpTemp, $position); // move to the position
                
                    fwrite($fpFile, $post_with_image); // Add the data
                
                    stream_copy_to_stream($fpTemp, $fpFile); 
                
                    fclose($fpFile); // close file
                    fclose($fpTemp); // close tmp
                }

                injectData("index.html", $post_with_image, 2300);

    #go to index.html when finished
    header("Location: $redirect");
}
 
?> 