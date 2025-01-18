<?php

require_once "../../db/config.php";

// EDIT IMAGE
if ( isset($_POST['edit-img2']) ) {

    $allowed_types = [
        "jpg" => "image/jpeg",
        "png" => "image/png",
        "webp" => "image/webp"
    ];

    $news_id = $_POST["news_id"];
    $oldimg = $_POST["oldimg"];

    if(
        isset($_FILES["newimg"]) &&
        !empty($_FILES["newimg"]) && 
        $_FILES["newimg"]["size"] > 0 && 
        $_FILES["newimg"]["error"] === 0 &&
        in_array($_FILES["newimg"]["type"], $allowed_types)
    ) {
      
        unlink("../../images/noticias/".$oldimg);   

        $file_extension = array_search($_FILES["newimg"]["type"], $allowed_types);
        $filename =  date("YmdHis") ."_". mt_rand(100000, 999999).".".$file_extension;


        $folder = "images/noticias/".$filename;


        $sql = "UPDATE news SET src = '".$filename."', folder = '".$folder."' WHERE news_id = $news_id ";
        
        $query = $db->prepare($sql);

        $query->execute();
        move_uploaded_file($_FILES["newimg"]["tmp_name"], "../../images/noticias/".$filename);

    }
    
    header("Location: ../../backoffice/edit-news.php?n=$news_id");
}

// EDIT BANNER
if ( isset($_POST['edit-img']) ) {

    $allowed_types = [
        "jpg" => "image/jpeg",
        "png" => "image/png",
        "webp" => "image/webp"
    ];

    $news_id = $_POST["news_id"];
    $oldimg = $_POST["oldimg"];

    if(
        isset($_FILES["newimg"]) &&
        !empty($_FILES["newimg"]) && 
        $_FILES["newimg"]["size"] > 0 && 
        $_FILES["newimg"]["error"] === 0 &&
        in_array($_FILES["newimg"]["type"], $allowed_types)
    ) {
      
        unlink("../../images/noticias/".$oldimg);   

        $file_extension = array_search($_FILES["newimg"]["type"], $allowed_types);
        $filename =  date("YmdHis") ."_". mt_rand(100000, 999999).".".$file_extension;


        $folder = "images/noticias/".$filename;


        $sql = "UPDATE news SET banner = '".$filename."', banner_folder = '".$folder."' WHERE news_id = $news_id ";
        
        $query = $db->prepare($sql);

        $query->execute();
        move_uploaded_file($_FILES["newimg"]["tmp_name"], "../../images/noticias/".$filename);

    }

    header("Location: ../../backoffice/edit-news.php?n=$news_id");
}

// EDIT NEWS
if (isset($_POST['edit-news'])) {

    $title = isset($_POST["title"]) ? $_POST["title"] : '';
    $text = isset($_POST["text"]) ? $_POST["text"] : '';
    $tdate = isset($_POST["tdate"]) ? $_POST["tdate"] : '';
    $news_id = isset($_POST["news_id"]) ? $_POST["news_id"] : '';
    $shorttext = isset($_POST["shorttext"]) ? $_POST["shorttext"] : '';
    


    if( !empty($news_id) ) {

        $query = $db->prepare("UPDATE news SET title = :title, text = :text, shorttext = :shorttext, tdate = :tdate WHERE news_id = :news_id");

        $query->bindParam( ":title",  $param_title, PDO::PARAM_STR );
        $query->bindParam( ":text",  $param_text, PDO::PARAM_STR );
        $query->bindParam( ":tdate",  $param_tdate, PDO::PARAM_STR );
        $query->bindParam( ":news_id",  $param_news_id, PDO::PARAM_INT );
        $query->bindParam( ":shorttext",  $param_shorttext, PDO::PARAM_STR );

        $param_title = $title;
        $param_text = $text;
        $param_shorttext = $shorttext;
        $param_tdate = $tdate;
        $param_news_id = $news_id;
        
        $query->execute();

    }

    header("Location: ../../backoffice/edit-news.php?n=$news_id");
}

// EDIT HIFLIGHTED NEWS
if (isset($_POST['edit-highlighted'])) {

    $news_id = isset($_POST["news_id"]) ? $_POST["news_id"] : '';
    $highlighted = isset($_POST["highlighted"]) ? $_POST["highlighted"] : '';


    if( !empty($news_id) ) {

        $query = $db->prepare("UPDATE news SET highlighted = :highlighted WHERE news_id = :news_id");

        $query->bindParam( ":highlighted",  $param_highlighted, PDO::PARAM_STR );
        $query->bindParam( ":news_id",  $param_news_id, PDO::PARAM_INT );

        $param_highlighted = $highlighted;
        $param_news_id = $news_id;
        
        $query->execute();

    }

    header("Location: ../../backoffice/edit-news.php?n=$news_id");
}

// ADD NEWS
if (isset($_POST['add-news'])) {

    $title = isset($_POST["title"]) ? $_POST["title"] : '';
    $text = isset($_POST["text"]) ? $_POST["text"] : '';
    $shorttext = isset($_POST["shorttext"]) ? $_POST["shorttext"] : '';
    $tdate = isset($_POST["tdate"]) ? $_POST["tdate"] : '';
    $highlighted = isset($_POST["highlighted"]) ? $_POST["highlighted"] : '';

    $allowed_types2 = [
        "jpg" => "image/jpeg",
        "png" => "image/png",
        "webp" => "image/webp"
    ];

    if(
        !empty($title) && 
        !empty($shorttext) && 
        isset($_FILES["banner"]) &&
        !empty($_FILES["banner"]) && 
        $_FILES["banner"]["size"] > 0 && 
        $_FILES["banner"]["error"] === 0 &&
        in_array($_FILES["banner"]["type"], $allowed_types2) 
 
    ) {

        $file_extension2 = array_search($_FILES["banner"]["type"], $allowed_types2);
        $filename2 = date("YmdHis") ."_". mt_rand(100000, 999999).".".$file_extension2;

        $folder2 = "images/noticias/".$filename2;

        $filename = '';
        $folder = '';

        if(       
            isset($_FILES["src"]) &&
            !empty($_FILES["src"]) && 
            $_FILES["src"]["size"] > 0 && 
            $_FILES["src"]["error"] === 0 &&
            in_array($_FILES["src"]["type"], $allowed_types2)
        ) {

            $file_extension = array_search($_FILES["src"]["type"], $allowed_types2);
            $filename = date("YmdHis") ."_". mt_rand(100000, 999999).".".$file_extension;

            $folder = "images/noticias/".$filename;
        }


        $query = $db->prepare("INSERT INTO news (title, text, shorttext, src, folder, tdate, banner, banner_folder, highlighted) VALUES (:title, :text, :shorttext, :src, :folder, :tdate, :banner, :banner_folder, :highlighted) ");

        $query->bindParam( ":title",  $param_title, PDO::PARAM_STR );
        $query->bindParam( ":text",  $param_text, PDO::PARAM_STR );
        $query->bindParam( ":shorttext",  $param_shorttext, PDO::PARAM_STR );
        $query->bindParam( ":tdate",  $param_tdate, PDO::PARAM_STR );

        $query->bindParam( ":src",  $param_src, PDO::PARAM_STR );
        $query->bindParam( ":folder",  $param_folder, PDO::PARAM_STR );

        $query->bindParam( ":banner",  $param_banner, PDO::PARAM_STR );
        $query->bindParam( ":banner_folder",  $param_banner_folder, PDO::PARAM_STR );

        $query->bindParam( ":highlighted",  $param_highlighted, PDO::PARAM_INT );

        $param_title = $title;
        $param_text = $text;
        $param_shorttext = $shorttext;
        $param_tdate = $tdate;

        $param_src = $filename;
        $param_folder = $folder;

        $param_banner = $filename2;
        $param_banner_folder = $folder2;

        $param_highlighted = $highlighted;
        
        $query->execute();

        move_uploaded_file($_FILES["banner"]["tmp_name"], "../../images/noticias/".$filename2);

        if(isset($_FILES["src"]) ) {

            move_uploaded_file($_FILES["src"]["tmp_name"], "../../images/noticias/".$filename);
        }
     

        header("Location: ../../backoffice/news.php");
    }

}

$type = isset($_POST['type']) ? $_POST['type'] : '';

// DELETE NEWS
if($type == 2) {
    $id = $_POST["id"];
    $src =  !empty($_POST["src"]) ? trim($_POST["src"]) : NULL;
    $src2 =  !empty($_POST["src2"]) ? trim($_POST["src2"]) : NULL;


    unlink("../../images/noticias/".$src); 
    unlink("../../images/noticias/".$src2); 
        
    $query = $db->prepare("DELETE FROM news WHERE news_id = :news_id");

    $query->bindParam( ":news_id",  $param_news_id, PDO::PARAM_INT );

	$param_news_id = $id;

    $query->execute();
        
}













?>