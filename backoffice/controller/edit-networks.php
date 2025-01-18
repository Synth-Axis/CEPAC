<?php

require_once "../../db/config.php";

// EDIT NETWORK TEXT
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
        header("Location: ../../backoffice/networks.php");
    }
    header("Location: ../../backoffice/networks.php");
}

// ADD NETWORK IMAGE
if (isset($_POST['add-img'])) {

    $allowed_types = [
        "jpg" => "image/jpeg",
        "png" => "image/png",
        "webp" => "image/webp"
    ];

    $norder = isset($_POST["norder"]) ? trim($_POST['norder']) : NULL;

    if(
        !empty($norder) &&
        isset($_FILES["newimg"]) &&
        !empty($_FILES["newimg"]) && 
        $_FILES["newimg"]["size"] > 0 && 
        $_FILES["newimg"]["error"] === 0 &&
        in_array($_FILES["newimg"]["type"], $allowed_types)
    ) {
                   
        $file_extension = array_search($_FILES["newimg"]["type"], $allowed_types);
        $filename = date("YmdHis") ."_". mt_rand(100000, 999999).".".$file_extension;

        $folder = "images/sobre/redes-parceiros/redes/".$filename;

        $sql = "INSERT INTO networks (src, folder, norder)  VALUES (?, ?, ?) ";
        
        $query = $db->prepare($sql);

        $query->execute([
            $filename,
            $folder,
            $norder
        ]);

        move_uploaded_file($_FILES["newimg"]["tmp_name"], "../../images/sobre/redes-parceiros/redes/".$filename);

        header("Location: ../../backoffice/networks.php");
    }

    header("Location: ../../backoffice/networks.php");

}

// EDIT NETWORK IMG
if (isset($_POST['edit-img'])) {

    $allowed_types = [
        "jpg" => "image/jpeg",
        "png" => "image/png",
        "webp" => "image/webp"
    ];

    $network_id = $_POST["network_id"];
    $oldimg = $_POST["oldimg"];
    $norder = isset($_POST["norder"]) ? trim($_POST['norder']) : NULL;

    if( isset($norder)) {

        $sql = "UPDATE networks SET norder = '".$norder."' WHERE network_id = '".$network_id."' ";
        
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
                  
        unlink("../../images/sobre/redes-parceiros/redes/".$oldimg);    

        $file_extension = array_search($_FILES["newimg"]["type"], $allowed_types);
        $filename = date("YmdHis") ."_". mt_rand(100000, 999999).".".$file_extension;

        $folder = "images/sobre/redes-parceiros/redes/".$filename;

        $sql = "UPDATE networks SET src = '".$filename."', folder = '".$folder."' WHERE network_id = '".$network_id."' ";
        
        $query = $db->prepare($sql);

        $query->execute();
        move_uploaded_file($_FILES["newimg"]["tmp_name"], "../../images/sobre/redes-parceiros/redes/".$filename);

        header("Location: ../../backoffice/networks.php");
    }

    header("Location: ../../backoffice/networks.php");

}

$type = isset($_POST['type']) ? $_POST['type'] : '';

// DELETE NETWORS IMGS
if($type == 7) {
    $id = $_POST["id"];
    $src =  !empty($_POST["src"]) ? trim($_POST["src"]) : NULL;


    unlink("../../images/sobre/redes-parceiros/redes/".$src);   
        
    $query = $db->prepare("DELETE FROM networks WHERE network_id = :network_id");

    $query->bindParam( ":network_id",  $param_network_id, PDO::PARAM_INT );

	$param_network_id = $id;

    $query->execute();
        
}

// ADD NETWORK TEXT
if (isset($_POST['add-ntext'])) {


    $ntorder = isset($_POST["ntorder"]) ? trim($_POST['ntorder']) : NULL;
    $text = isset($_POST["text"]) ? trim($_POST['text']) : NULL;
    $title = isset($_POST["title"]) ? trim($_POST['title']) : NULL;

    if(
        !empty($ntorder) &&
        !empty($text) &&
        !empty($title) 
    ) {

        $sql = "INSERT INTO networks_text (ntorder, text, title)  VALUES (?, ?, ?) ";
        
        $query = $db->prepare($sql);

        $query->execute([
            $ntorder,
            $text,
            $title
        ]);

        header("Location: ../../backoffice/networks-text.php");
    }

    header("Location: ../../backoffice/networks-text.php");

}

// EDIT NETWRORK TEXT
if (isset($_POST['edit-ntext'])) {

    $ntext_id = isset($_POST["ntext_id"]) ? $_POST["ntext_id"] : '';
    $ntorder = isset($_POST["ntorder"]) ? $_POST["ntorder"] : '';
    $title = isset($_POST["title"]) ? $_POST["title"] : '';
    $text = isset($_POST["text"]) ? $_POST["text"] : '';


    if( !empty($ntext_id) ) {

        $query = $db->prepare("UPDATE networks_text SET ntorder = :ntorder, title = :title, text = :text WHERE ntext_id = :ntext_id");

        $query->bindParam( ":ntorder",  $param_ntorder, PDO::PARAM_INT );
        $query->bindParam( ":ntext_id",  $param_ntext_id, PDO::PARAM_INT );
        $query->bindParam( ":title",  $param_title, PDO::PARAM_STR );
        $query->bindParam( ":text",  $param_text, PDO::PARAM_STR );

        $param_ntorder= $ntorder;
        $param_ntext_id = $ntext_id;
        $param_title = $title;
        $param_text = $text;
        
        $query->execute();

        header("Location: ../../backoffice/networks-text.php");

    }

    header("Location: ../../backoffice/networks-text.php");
}

// DELETE NETWORS TEXT 
if($type == 8) {
    $id = $_POST["id"];
        
    $query = $db->prepare("DELETE FROM networks_text WHERE ntext_id = :ntext_id");

    $query->bindParam( ":ntext_id",  $param_ntext_id, PDO::PARAM_INT );

	$param_ntext_id = $id;

    $query->execute();
        
}

// EDIT PARTNERSHIPS TEXT
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
        header("Location: ../../backoffice/partnerships.php");
    }
    header("Location: ../../backoffice/partnerships.php");
}

// ADD PARTNERSHIPS IMAGE
if (isset($_POST['add-img2'])) {

    $allowed_types = [
        "jpg" => "image/jpeg",
        "png" => "image/png",
        "webp" => "image/webp"
    ];

    $norder = isset($_POST["norder"]) ? trim($_POST['norder']) : NULL;

    if(
        !empty($norder) &&
        isset($_FILES["newimg"]) &&
        !empty($_FILES["newimg"]) && 
        $_FILES["newimg"]["size"] > 0 && 
        $_FILES["newimg"]["error"] === 0 &&
        in_array($_FILES["newimg"]["type"], $allowed_types)
    ) {
                   
        $file_extension = array_search($_FILES["newimg"]["type"], $allowed_types);
        $filename = date("YmdHis") ."_". mt_rand(100000, 999999).".".$file_extension;

        $folder = "images/sobre/redes-parceiros/parceiros/".$filename;

        $sql = "INSERT INTO partnerships (src, folder, norder)  VALUES (?, ?, ?) ";
        
        $query = $db->prepare($sql);

        $query->execute([
            $filename,
            $folder,
            $norder
        ]);

        move_uploaded_file($_FILES["newimg"]["tmp_name"], "../../images/sobre/redes-parceiros/parceiros/".$filename);

        header("Location: ../../backoffice/partnerships.php");
    }

   header("Location: ../../backoffice/partnerships.php");

}

// EDIT PARTNERSHIPS IMG
if (isset($_POST['edit-img2'])) {

    $allowed_types = [
        "jpg" => "image/jpeg",
        "png" => "image/png",
        "webp" => "image/webp"
    ];

    $partnership_id = $_POST["partnership_id"];
    $oldimg = $_POST["oldimg"];
    $norder = isset($_POST["norder"]) ? trim($_POST['norder']) : NULL;

    if( isset($norder)) {

        $sql = "UPDATE partnerships SET norder = '".$norder."' WHERE partnership_id = '".$partnership_id."' ";
        
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
                  
        unlink("../../images/sobre/redes-parceiros/parceiros/".$oldimg);    

        $file_extension = array_search($_FILES["newimg"]["type"], $allowed_types);
        $filename = date("YmdHis") ."_". mt_rand(100000, 999999).".".$file_extension;

        $folder = "images/sobre/redes-parceiros/parceiros/".$filename;

        $sql = "UPDATE partnerships SET src = '".$filename."', folder = '".$folder."' WHERE partnership_id = '".$partnership_id."' ";
        
        $query = $db->prepare($sql);

        $query->execute();
        move_uploaded_file($_FILES["newimg"]["tmp_name"], "../../images/sobre/redes-parceiros/parceiros/".$filename);

        header("Location: ../../backoffice/partnerships.php");
    }

    header("Location: ../../backoffice/partnerships.php");

}

// DELETE PARTNERSHIPS IMG
if($type == 9) {
    $id = $_POST["id"];
    $src =  !empty($_POST["src"]) ? trim($_POST["src"]) : NULL;

    unlink("../../images/sobre/redes-parceiros/parceiros/".$src);   
        
        
    $query = $db->prepare("DELETE FROM partnerships WHERE partnership_id = :partnership_id");

    $query->bindParam( ":partnership_id",  $param_partnership_id, PDO::PARAM_INT );

	$param_partnership_id = $id;

    $query->execute();
        
}

// ADD NETWORK TEXT
if (isset($_POST['add-ptext'])) {


    $ntorder = isset($_POST["ntorder"]) ? trim($_POST['ntorder']) : NULL;
    $text = isset($_POST["text"]) ? trim($_POST['text']) : NULL;
    $title = isset($_POST["title"]) ? trim($_POST['title']) : NULL;

    if(
        !empty($ntorder) &&
        !empty($text) &&
        !empty($title) 
    ) {

        $sql = "INSERT INTO partnerships_text (ntorder, text, title)  VALUES (?, ?, ?) ";
        
        $query = $db->prepare($sql);

        $query->execute([
            $ntorder,
            $text,
            $title
        ]);

        header("Location: ../../backoffice/partnerships-text.php");
    }

    header("Location: ../../backoffice/partnerships-text.php");

}

// EDIT NETWRORK TEXT
if (isset($_POST['edit-ptext'])) {

    $ptext_id = isset($_POST["ptext_id"]) ? $_POST["ptext_id"] : '';
    $ntorder = isset($_POST["ntorder"]) ? $_POST["ntorder"] : '';
    $title = isset($_POST["title"]) ? $_POST["title"] : '';
    $text = isset($_POST["text"]) ? $_POST["text"] : '';


    if( !empty($ptext_id) ) {

        $query = $db->prepare("UPDATE partnerships_text SET ntorder = :ntorder, title = :title, text = :text WHERE ptext_id = :ptext_id");

        $query->bindParam( ":ntorder",  $param_ntorder, PDO::PARAM_INT );
        $query->bindParam( ":ptext_id",  $param_ptext_id, PDO::PARAM_INT );
        $query->bindParam( ":title",  $param_title, PDO::PARAM_STR );
        $query->bindParam( ":text",  $param_text, PDO::PARAM_STR );

        $param_ntorder= $ntorder;
        $param_ptext_id = $ptext_id;
        $param_title = $title;
        $param_text = $text;
        
        $query->execute();

        header("Location: ../../backoffice/partnerships-text.php");

    }

    header("Location: ../../backoffice/partnerships-text.php");
}


// DELETE PARTNERSHIPS TEXT 
if($type == 10) {
    $id = $_POST["id"];
        
        
    $query = $db->prepare("DELETE FROM partnerships_text WHERE ptext_id = :ptext_id");

    $query->bindParam( ":ptext_id",  $param_ptext_id, PDO::PARAM_INT );

	$param_ptext_id = $id;

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

        header("Location: ../../backoffice/networks.php");
    }
    
    header("Location: ../../backoffice/networks.php");
}


// EDIT BANNER
if (isset($_POST['edit-banner2'])) {

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

        header("Location: ../../backoffice/partnerships.php");
    }
    
    header("Location: ../../backoffice/partnerships.php");
}








?>