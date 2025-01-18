<?php

require_once "../../db/config.php";

// EDIT CS TEXT
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
        header("Location: ../../backoffice/boutique.php");
    }

    header("Location: ../../backoffice/boutique.php");
}

// ADD SLIDER IMAGE
if (isset($_POST['add-img'])) {

    $allowed_types = [
        "jpg" => "image/jpeg",
        "png" => "image/png",
        "webp" => "image/webp"
    ];

    $iorder = isset($_POST["iorder"]) ? trim($_POST['iorder']) : NULL;
    $tag = "bbu";

    if(
        !empty($iorder) &&
        isset($_FILES["newimg"]) &&
        !empty($_FILES["newimg"]) && 
        $_FILES["newimg"]["size"] > 0 && 
        $_FILES["newimg"]["error"] === 0 &&
        in_array($_FILES["newimg"]["type"], $allowed_types)
    ) {
                   
        $file_extension = array_search($_FILES["newimg"]["type"], $allowed_types);
        $filename = date("YmdHis") ."_". mt_rand(100000, 999999).".".$file_extension;

        $folder = "images/fazemos/".$filename;

        $sql = "INSERT INTO images (src, folder, iorder, tag)  VALUES (?, ?, ?, ?) ";
        
        $query = $db->prepare($sql);

        $query->execute([
            $filename,
            $folder,
            $iorder,
            $tag
        ]);

        move_uploaded_file($_FILES["newimg"]["tmp_name"], "../../images/fazemos/".$filename);

        header("Location: ../../backoffice/boutique.php");
    }

    header("Location: ../../backoffice/boutique.php");

}

// EDIT SLIDER IMG
if (isset($_POST['edit-img'])) {

    $allowed_types = [
        "jpg" => "image/jpeg",
        "png" => "image/png",
        "webp" => "image/webp"
    ];

    $img_id = $_POST["img_id"];
    $oldimg = $_POST["oldimg"];
    $iorder = isset($_POST["iorder"]) ? trim($_POST['iorder']) : NULL;

    if( isset($iorder)) {

        $sql = "UPDATE images SET iorder = '".$iorder."' WHERE img_id = '".$img_id."' ";
        
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
                  
        unlink("../../images/fazemos/".$oldimg);    

        $file_extension = array_search($_FILES["newimg"]["type"], $allowed_types);
        $filename = date("YmdHis") ."_". mt_rand(100000, 999999).".".$file_extension;

        $folder = "images/fazemos/".$filename;

        $sql = "UPDATE images SET src = '".$filename."', folder = '".$folder."' WHERE img_id = '".$img_id."' ";
        
        $query = $db->prepare($sql);

        $query->execute();
        move_uploaded_file($_FILES["newimg"]["tmp_name"], "../../images/fazemos/".$filename);

        header("Location: ../../backoffice/boutique.php");
    }

    header("Location: ../../backoffice/boutique.php");
}

$type = isset($_POST['type']) ? $_POST['type'] : '';

// DELETE SLIDER IMGS
if($type == 14) {
    $id = $_POST["id"];
    $src =  !empty($_POST["src"]) ? trim($_POST["src"]) : NULL;


    unlink("../../images/fazemos/".$src); 
        
    $query = $db->prepare("DELETE FROM images WHERE img_id = :img_id");

    $query->bindParam( ":img_id",  $param_img_id, PDO::PARAM_INT );

	$param_img_id = $id;

    $query->execute();
        
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

        header("Location: ../../backoffice/boutique.php");
    }
    
    header("Location: ../../backoffice/boutique.php");
}
