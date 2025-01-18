<?php

require_once "../../db/config.php";

// EDIT IPF TEXT
if ( isset($_POST['edit-text'])  ) {

    $text = $_POST["text"];
    $content_id = $_POST["content_id"];

    if(!empty($text)) {
                
        foreach( $text as $key => $val ) {
            $sql = $db->prepare("UPDATE content SET text = ? WHERE content_id = ? ");
            $n_text = $val;
            $n_content_id = $content_id[$key];
            
            $sql->execute([
                $n_text,
                $n_content_id
            ]);
        }
        header("Location: ../../backoffice/privacy-policy.php");
    }
    header("Location: ../../backoffice/privacy-policy.php");
}


// EDIT BANNER
if (isset($_POST['edit-banner'])) {

    $allowed_types = [
        "jpg" => "image/jpeg",
        "png" => "image/png",
        "webp" => "image/webp"
    ];

    $banner_id = $_POST["banner_id"];
    $oldimg = $_POST["oldimg"];
    $title = isset($_POST["title"]) ? trim($_POST['title']) : NULL;

    if( isset($title)) {

        $sql = "UPDATE banners SET title = '".$title."' WHERE banner_id = '".$banner_id."' ";
        
        $query = $db->prepare($sql);

        $query->execute();
    }

    if(
        isset($_FILES["newimg"]) &&
        !empty($_FILES["newimg"]) && 
        $_FILES["newimg"]["size"] > 0 && 
        $_FILES["newimg"]["error"] === 0 &&
        in_array($_FILES["newimg"]["type"], $allowed_types)
    ) {
                  
        unlink("../../images/banners/".$oldimg);    

        $file_extension = array_search($_FILES["newimg"]["type"], $allowed_types);
        $filename = date("YmdHis") ."_". mt_rand(100000, 999999).".".$file_extension;

        $folder = "images/banners/".$filename;

        $sql = "UPDATE banners SET src = '".$filename."', folder = '".$folder."' WHERE banner_id = '".$banner_id."' ";
        
        $query = $db->prepare($sql);

        $query->execute();
        move_uploaded_file($_FILES["newimg"]["tmp_name"], "../../images/banners/".$filename);

        header("Location: ../../backoffice/privacy-policy.php");
    }
    
    header("Location: ../../backoffice/privacy-policy.php");
}


