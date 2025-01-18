<?php

require_once "../../db/config.php";

// EDIT FILE
if ( isset($_POST['edit-file']) ) {

    $allowed_types = [
        "jpg" => "image/jpeg",
        "png" => "image/png",
        "mp4" => "video/mp4",
        "mov" => "video/quicktime",
        "pdf" => "application/pdf",
        "webp" => "image/webp"
    ];

    $file_id = $_POST["file_id"];
    $oldimg = $_POST["oldimg"];

    if(
        isset($_FILES["newimg"]) &&
        !empty($_FILES["newimg"]) && 
        $_FILES["newimg"]["size"] > 0 && 
        $_FILES["newimg"]["error"] === 0 &&
        in_array($_FILES["newimg"]["type"], $allowed_types)
    ) {
      
        unlink("../../upload/".$oldimg);   

        $file_extension = array_search($_FILES["newimg"]["type"], $allowed_types);
        $filename =  date("YmdHis") ."_". mt_rand(100000, 999999).".".$file_extension;


        $folder = "upload/".$filename;


        $sql = "UPDATE files SET src = '".$filename."', folder = '".$folder."' WHERE file_id = $file_id ";
        
        $query = $db->prepare($sql);

        $query->execute();
        move_uploaded_file($_FILES["newimg"]["tmp_name"], "../../upload/".$filename);

        header("Location: ../../backoffice/edit-file.php?n=$file_id");

    }
    
    header("Location: ../../backoffice/edit-file.php?n=$file_id");
}

// ADD FILE
if (isset($_POST['add-file'])) {

    $allowed_types = [
        "jpg" => "image/jpeg",
        "png" => "image/png",
        "mp4" => "video/mp4",
        "mov" => "video/quicktime",
        "pdf" => "application/pdf",
        "webp" => "image/webp"
    ];

    if(
        isset($_FILES["src"]) &&
        !empty($_FILES["src"]) && 
        $_FILES["src"]["size"] > 0 && 
        $_FILES["src"]["error"] === 0 &&
        in_array($_FILES["src"]["type"], $allowed_types)
    ) {

        $file_extension = array_search($_FILES["src"]["type"], $allowed_types);
        $filename = date("YmdHis") ."_". mt_rand(100000, 999999).".".$file_extension;

        $folder = "upload/".$filename;


        $query = $db->prepare("INSERT INTO files (src, folder, tdate) VALUES (:src, :folder, NOW()) ");

        $query->bindParam( ":src",  $param_src, PDO::PARAM_STR );
        $query->bindParam( ":folder",  $param_folder, PDO::PARAM_STR );

        $param_src = $filename;
        $param_folder = $folder;

        $query->execute();

        move_uploaded_file($_FILES["src"]["tmp_name"], "../../upload/".$filename);
     

        header("Location: ../../backoffice/files.php");
    }
                     
}

$type = isset($_POST['type']) ? $_POST['type'] : '';

// DELETE FILE
if($type == 3) {
    $id = $_POST["id"];
    $src =  !empty($_POST["src"]) ? trim($_POST["src"]) : NULL;

    unlink("../../upload/".$src); 
        
    $query = $db->prepare("DELETE FROM files WHERE file_id = :file_id");

    $query->bindParam( ":file_id",  $param_file_id, PDO::PARAM_INT );

	$param_file_id = $id;

    $query->execute();
        
}













?>