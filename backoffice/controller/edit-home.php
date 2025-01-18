<?php

require_once "../../db/config.php";

// EDIT HOME TEXT
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
        header("Location: ../../backoffice/index.php");
    }
    header("Location: ../../backoffice/index.php");
}

// EDIT FOOTER TEXT
if ( isset($_POST['edit-text2'])  ) {

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
        header("Location: ../../backoffice/footer.php");
    }
    header("Location: ../../backoffice/footer.php");
}

// EDIT IMAGE
if ( isset($_POST['edit-img1']) ) {

    $allowed_types = [
        "jpg" => "image/jpeg",
        "png" => "image/png",
        "webp" => "image/webp"
    ];

    $img_id = $_POST["img_id"];
    $oldimg = $_POST["oldimg"];

    if(
        isset($_FILES["newimg"]) &&
        !empty($_FILES["newimg"]) && 
        $_FILES["newimg"]["size"] > 0 && 
        $_FILES["newimg"]["error"] === 0 &&
        in_array($_FILES["newimg"]["type"], $allowed_types)
    ) {
      
        unlink("../../images/parceiros/".$oldimg);   

        $file_extension = array_search($_FILES["newimg"]["type"], $allowed_types);
        $filename =  date("YmdHis") ."_". mt_rand(100000, 999999).".".$file_extension;


        $folder = "images/parceiros/".$filename;


        $sql = "UPDATE images SET src = '".$filename."', folder = '".$folder."' WHERE img_id = $img_id ";
        
        $query = $db->prepare($sql);

        $query->execute();
        move_uploaded_file($_FILES["newimg"]["tmp_name"], "../../images/parceiros/".$filename);

        header("Location: ../../backoffice/partners.php");
    }

    header("Location: ../../backoffice/partners.php");
}

// ADD SLIDER IMAGE
if (isset($_POST['add-img'])) {

    $allowed_types = [
        "jpg" => "image/jpeg",
        "png" => "image/png",
        "webp" => "image/webp"
    ];

    $iorder = isset($_POST["iorder"]) ? trim($_POST['iorder']) : NULL;
    $hslider = "hslider";

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

        $folder = "images/home/slider/".$filename;

        $sql = "INSERT INTO images (src, folder, iorder, tag)  VALUES (?, ?, ?, ?) ";
        
        $query = $db->prepare($sql);

        $query->execute([
            $filename,
            $folder,
            $iorder,
            $hslider
        ]);

        move_uploaded_file($_FILES["newimg"]["tmp_name"], "../../images/home/slider/".$filename);

        header("Location: ../../backoffice/index.php");
    }

    header("Location: ../../backoffice/index.php");

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
                  
        unlink("../../images/home/slider/".$oldimg);    

        $file_extension = array_search($_FILES["newimg"]["type"], $allowed_types);
        $filename = date("YmdHis") ."_". mt_rand(100000, 999999).".".$file_extension;

        $folder = "images/home/slider/".$filename;

        $sql = "UPDATE images SET src = '".$filename."', folder = '".$folder."' WHERE img_id = '".$img_id."' ";
        
        $query = $db->prepare($sql);

        $query->execute();
        move_uploaded_file($_FILES["newimg"]["tmp_name"], "../../images/home/slider/".$filename);

        header("Location: ../../backoffice/index.php");
    }

    header("Location: ../../backoffice/index.php");

}

$type = isset($_POST['type']) ? $_POST['type'] : '';

// DELETE SLIDER IMGS
if($type == 1) {
    $id = $_POST["id"];
    $src =  !empty($_POST["src"]) ? trim($_POST["src"]) : NULL;


    unlink("../../images/home/slider/".$src); 
        
    $query = $db->prepare("DELETE FROM images WHERE img_id = :img_id");

    $query->bindParam( ":img_id",  $param_img_id, PDO::PARAM_INT );

	$param_img_id = $id;

    $query->execute();
        
}


// EDIT FOOTER IMAGE 2
if ( isset($_POST['edit-img2']) ) {

    $allowed_types = [
        "jpg" => "image/jpeg",
        "png" => "image/png",
        "webp" => "image/webp"
    ];

    $img_id = $_POST["img_id"];
    $oldimg = $_POST["oldimg"];

    if(
        isset($_FILES["newimg"]) &&
        !empty($_FILES["newimg"]) && 
        $_FILES["newimg"]["size"] > 0 && 
        $_FILES["newimg"]["error"] === 0 &&
        in_array($_FILES["newimg"]["type"], $allowed_types)
    ) {
      
        unlink("../../images/".$oldimg);   

        $file_extension = array_search($_FILES["newimg"]["type"], $allowed_types);
        $filename =  date("YmdHis") ."_". mt_rand(100000, 999999).".".$file_extension;


        $folder = "images/".$filename;


        $sql = "UPDATE images SET src = '".$filename."', folder = '".$folder."' WHERE img_id = $img_id ";
        
        $query = $db->prepare($sql);

        $query->execute();
        move_uploaded_file($_FILES["newimg"]["tmp_name"], "../../images/".$filename);

        header("Location: ../../backoffice/footer.php");
    }

    header("Location: ../../backoffice/footer.php");
}

// EDIT FOOTER IMAGE 3
if ( isset($_POST['edit-img3']) ) {

    $allowed_types = [
        "jpg" => "image/jpeg",
        "png" => "image/png",
        "webp" => "image/webp"
    ];

    $img_id = $_POST["img_id"];
    $oldimg = $_POST["oldimg"];

    if(
        isset($_FILES["newimg"]) &&
        !empty($_FILES["newimg"]) && 
        $_FILES["newimg"]["size"] > 0 && 
        $_FILES["newimg"]["error"] === 0 &&
        in_array($_FILES["newimg"]["type"], $allowed_types)
    ) {
      
        unlink("../../images/".$oldimg);   

        $file_extension = array_search($_FILES["newimg"]["type"], $allowed_types);
        $filename =  date("YmdHis") ."_". mt_rand(100000, 999999).".".$file_extension;


        $folder = "images/".$filename;


        $sql = "UPDATE images SET src = '".$filename."', folder = '".$folder."' WHERE img_id = $img_id ";
        
        $query = $db->prepare($sql);

        $query->execute();
        move_uploaded_file($_FILES["newimg"]["tmp_name"], "../../images/".$filename);

        header("Location: ../../backoffice/footer.php");
    }

    header("Location: ../../backoffice/footer.php");
}

// EDIT CONTACTS TEXT
if ( isset($_POST['edit-contacts'])  ) {

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
        header("Location: ../../backoffice/contacts.php");
    }
    header("Location: ../../backoffice/contacts.php");
}

// EDIT CONTACTS TEXT
if ( isset($_POST['edit-about'])  ) {

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
        header("Location: ../../backoffice/about.php");
    }
    header("Location: ../../backoffice/about.php");
}


// EDIT ABOUT IMAGE 1
if ( isset($_POST['edit-about1']) ) {

    $allowed_types = [
        "jpg" => "image/jpeg",
        "png" => "image/png",
        "webp" => "image/webp"
    ];

    $img_id = $_POST["img_id"];
    $oldimg = $_POST["oldimg"];

    if(
        isset($_FILES["newimg"]) &&
        !empty($_FILES["newimg"]) && 
        $_FILES["newimg"]["size"] > 0 && 
        $_FILES["newimg"]["error"] === 0 &&
        in_array($_FILES["newimg"]["type"], $allowed_types)
    ) {
      
        unlink("../../images/apoio/".$oldimg);   

        $file_extension = array_search($_FILES["newimg"]["type"], $allowed_types);
        $filename =  date("YmdHis") ."_". mt_rand(100000, 999999).".".$file_extension;


        $folder = "images/apoio/".$filename;


        $sql = "UPDATE images SET src = '".$filename."', folder = '".$folder."' WHERE img_id = $img_id ";
        
        $query = $db->prepare($sql);

        $query->execute();
        move_uploaded_file($_FILES["newimg"]["tmp_name"], "../../images/apoio/".$filename);

        header("Location: ../../backoffice/about.php");
    }

    header("Location: ../../backoffice/about.php");
}

// EDIT ABOUT IMAGE 2
if ( isset($_POST['edit-about2']) || isset($_POST['edit-about3']) ) {

    $allowed_types = [
        "jpg" => "image/jpeg",
        "png" => "image/png",
        "webp" => "image/webp"
    ];

    $img_id = $_POST["img_id"];
    $oldimg = $_POST["oldimg"];

    if(
        isset($_FILES["newimg"]) &&
        !empty($_FILES["newimg"]) && 
        $_FILES["newimg"]["size"] > 0 && 
        $_FILES["newimg"]["error"] === 0 &&
        in_array($_FILES["newimg"]["type"], $allowed_types)
    ) {
      
        unlink("../../images/sobre/quem-somos/".$oldimg);   

        $file_extension = array_search($_FILES["newimg"]["type"], $allowed_types);
        $filename =  date("YmdHis") ."_". mt_rand(100000, 999999).".".$file_extension;


        $folder = "images/sobre/quem-somos/".$filename;


        $sql = "UPDATE images SET src = '".$filename."', folder = '".$folder."' WHERE img_id = $img_id ";
        
        $query = $db->prepare($sql);

        $query->execute();
        move_uploaded_file($_FILES["newimg"]["tmp_name"], "../../images/sobre/quem-somos/".$filename);

        header("Location: ../../backoffice/about.php");
    }

    header("Location: ../../backoffice/about.php");
}

// EDIT ABOUT SLIDER IMG
if (isset($_POST['edit-aboutslider'])) {

    $allowed_types = [
        "jpg" => "image/jpeg",
        "png" => "image/png",
        "webp" => "image/webp"
    ];

    $img_id = $_POST["img_id"];
    $oldimg = $_POST["oldimg"];
    $aorder = isset($_POST["aorder"]) ? trim($_POST['aorder']) : NULL;
    $text = isset($_POST["text"]) ? trim($_POST['text']) : '';

    if( isset($aorder) || isset($text) ) {

        $sql = "UPDATE about_slider SET aorder = '".$aorder."', text = '".$text."' WHERE slider_id = '".$img_id."' ";
        
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
                  
        unlink("../../images/sobre/quem-somos/".$oldimg);    

        $file_extension = array_search($_FILES["newimg"]["type"], $allowed_types);
        $filename = date("YmdHis") ."_". mt_rand(100000, 999999).".".$file_extension;

        $folder = "images/sobre/quem-somos/".$filename;

        $sql = "UPDATE about_slider SET src = '".$filename."', folder = '".$folder."' WHERE slider_id = '".$img_id."' ";
        
        $query = $db->prepare($sql);

        $query->execute();
        move_uploaded_file($_FILES["newimg"]["tmp_name"], "../../images/sobre/quem-somos/".$filename);

        header("Location: ../../backoffice/about.php");
    }

    header("Location: ../../backoffice/about.php");

}








?>