<?php

require_once "../../db/config.php";

// ADD TEAM
if (isset($_POST['add-team'])) {

    $name = isset($_POST["name"]) ? trim($_POST['name']) : NULL;
    $role = isset($_POST["role_pt"]) ? trim($_POST['role_pt']) : NULL;
    $tag = isset($_POST["tag"]) ? trim($_POST['tag']) : NULL;
    $torder = isset($_POST["torder"]) ? trim($_POST['torder']) : NULL;

    // IMG
    $allowed_types = [
        "jpg" => "image/jpeg",
        "png" => "image/png",
        "webp" => "image/webp"
    ];

    if(
        !empty($name) &&
        !empty($torder) 
    ) {
        $filename = '';
        $folder = '';

        if( 
            isset($_FILES["src"]) &&
            !empty($_FILES["src"]) && 
            $_FILES["src"]["size"] > 0 && 
            $_FILES["src"]["error"] === 0 &&
            in_array($_FILES["src"]["type"], $allowed_types) 
        ) {

            $file_extension = array_search($_FILES["src"]["type"], $allowed_types);
            $filename = date("YmdHis") ."_". mt_rand(100000, 999999).'.'.$file_extension;
    
            $folder = "images/sobre/equipa/".$filename;
        }

        $query = $db->prepare("INSERT INTO team (name, role, torder, tag, src, folder) VALUES (:name, :role, :torder, :tag, :src, :folder) ");

        $query->bindParam( ":name",  $param_name, PDO::PARAM_STR );
        $query->bindParam( ":role",  $param_role, PDO::PARAM_STR );
        $query->bindParam( ":torder",  $param_torder, PDO::PARAM_STR );
        $query->bindParam( ":tag",  $param_tag, PDO::PARAM_STR );
    
        $query->bindParam( ":src",  $param_src, PDO::PARAM_STR );
        $query->bindParam( ":folder",  $param_folder, PDO::PARAM_STR );

        $param_name = $name;
        $param_role = $role;
        $param_torder = $torder;
        $param_tag = $tag;

        $param_src = $filename;
        $param_folder = $folder;
        
        $query->execute();


        
        if( 
            isset($_FILES["src"]) &&
            !empty($_FILES["src"]) && 
            $_FILES["src"]["size"] > 0 && 
            $_FILES["src"]["error"] === 0 &&
            in_array($_FILES["src"]["type"], $allowed_types) 
        ) {

            move_uploaded_file($_FILES["src"]["tmp_name"], "../../images/sobre/equipa/".$filename);
        }
  
    
        header("Location: ../../backoffice/team.php");
    }

}

// EDIT TEAM 
if (isset($_POST['edit-team'])) {

    $name = isset($_POST["name"]) ? trim($_POST['name']) : NULL;
    $role = isset($_POST["role"]) ? trim($_POST['role']) : NULL;
    $tag = isset($_POST["tag"]) ? trim($_POST['tag']) : NULL;
    $torder = isset($_POST["torder"]) ? trim($_POST['torder']) : NULL;
    $team_id = isset($_POST["team_id"]) ? trim(filter_var($_POST['team_id'], FILTER_SANITIZE_NUMBER_INT)) : NULL;

    if( !empty($team_id) ) {

        $query = $db->prepare("UPDATE team SET name = :name, role = :role, tag = :tag, torder = :torder WHERE team_id = :team_id");

        $query->bindParam( ":team_id",  $param_team_id, PDO::PARAM_INT );
        $query->bindParam( ":name",  $param_name, PDO::PARAM_STR );
        $query->bindParam( ":role",  $param_role, PDO::PARAM_STR );
        $query->bindParam( ":tag",  $param_tag, PDO::PARAM_INT );
        $query->bindParam( ":torder",  $param_torder, PDO::PARAM_INT );

        $param_team_id = $team_id;
        $param_name = $name;
        $param_role = $role;
        $param_tag = $tag;
        $param_torder = $torder;
        
        $query->execute();

        header("Location: ../../backoffice/edit-team.php?n=$team_id");

    }

    header("Location: ../../backoffice/edit-team.php?n=$team_id");
}

$type = isset($_POST['type']) ? $_POST['type'] : '';

// DELETE TEAM
if($type == 5) {
    $id = $_POST["id"];
    $src =  !empty($_POST["src"]) ? trim($_POST["src"]) : NULL;

    unlink("../../images/sobre/equipa/".$src); 
        
    $query = $db->prepare("DELETE FROM team WHERE team_id = :team_id");

    $query->bindParam( ":team_id",  $param_team_id, PDO::PARAM_INT );

	$param_team_id = $id;

    $query->execute();
        
}

// DELETE TEAM IMAGE
if($type == 4) {
    $id = $_POST["id"];
    $src =  !empty($_POST["src"]) ? trim($_POST["src"]) : NULL;

    unlink("../../images/sobre/equipa/".$src); 
        
    $query = $db->prepare("UPDATE team SET src = '', folder = '' WHERE team_id = :team_id");

    $query->bindParam( ":team_id",  $param_team_id, PDO::PARAM_INT );

	$param_team_id = $id;

    $query->execute();
        
}

// EDIT IMAGE
if (isset($_POST['edit-img'])  ) {

    $allowed_types = [
        "jpg" => "image/jpeg",
        "png" => "image/png",
        "webp" => "image/webp"
    ];

    $team_id = $_POST["team_id"];
    $oldimg = $_POST["oldimg"];

    if(
        isset($_FILES["newimg"]) &&
        !empty($_FILES["newimg"]) && 
        $_FILES["newimg"]["size"] > 0 && 
        $_FILES["newimg"]["error"] === 0 &&
        in_array($_FILES["newimg"]["type"], $allowed_types)
    ) {
      
        unlink("../../images/sobre/equipa/".$oldimg);   
        
        $file_extension = array_search($_FILES["newimg"]["type"], $allowed_types);
        $filename = date("YmdHis") ."_". mt_rand(100000, 999999).'.'.$file_extension;

        $folder = "images/sobre/equipa/".$filename;

        $sql = "UPDATE team SET src = '".$filename."', folder = '".$folder."' WHERE team_id = $team_id ";
        
        $query = $db->prepare($sql);

        $query->execute();
        move_uploaded_file($_FILES["newimg"]["tmp_name"], "../../images/sobre/equipa/".$filename);

        header("Location: ../../backoffice/edit-team.php?n=$team_id");
    }

    header("Location: ../../backoffice/edit-team.php?n=$team_id");
}

// EDIT TEAM TEXT
if ( isset($_POST['edit-teamtext'])  ) {

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
        header("Location: ../../backoffice/team-text.php");
    }
    header("Location: ../../backoffice/team-text.php");
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

        header("Location: ../../backoffice/team-text.php");
    }
    header("Location: ../../backoffice/team-text.php");
}







?>