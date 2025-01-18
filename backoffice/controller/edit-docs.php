<?php

require_once "../../db/config.php";


// EDIT CC TEXT
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
        header("Location: ../../backoffice/code-of-conduct.php");
    }
    header("Location: ../../backoffice/code-of-conduct.php");
}

// EDIT IMAGE
if ( isset($_POST['edit-img']) ) {

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

        header("Location: ../../backoffice/code-of-conduct.php");
    }

    header("Location: ../../backoffice/code-of-conduct.php");
}

// EDIT DOCS TITLE
if (isset($_POST['edit-doc1']) || isset($_POST['edit-doc2']) ) {

    $doc_id = isset($_POST["doc_id"]) ? $_POST["doc_id"] : '';
    $title = isset($_POST["title"]) ? $_POST["title"] : '';

    if( !empty($doc_id) ) {

        $query = $db->prepare("UPDATE docs SET title = :title WHERE doc_id = :doc_id");

        $query->bindParam( ":title",  $param_title, PDO::PARAM_STR );
        $query->bindParam( ":doc_id",  $param_doc_id, PDO::PARAM_INT );

        $param_title = $title;
        $param_doc_id = $doc_id;
        
        $query->execute();

        header("Location: ../../backoffice/code-of-conduct.php");

    }

    header("Location: ../../backoffice/code-of-conduct.php");

}

// EDIT DOCS
if (isset($_POST['edit-pdf1']) || isset($_POST['edit-pdf2']) ) {

    $allowed_types = [
        "pdf" => "application/pdf"
    ];

    $doc_id = $_POST["doc_id"];
    $oldimg = $_POST["oldimg"];

    if(
        isset($_FILES["newimg"]) &&
        !empty($_FILES["newimg"]) && 
        $_FILES["newimg"]["size"] > 0 && 
        $_FILES["newimg"]["error"] === 0 &&
        in_array($_FILES["newimg"]["type"], $allowed_types)
    ) {
      
        unlink("../../pdfs/".$oldimg);   
         
        
        $file_extension = array_search($_FILES["newimg"]["type"], $allowed_types);
        $filename = pathinfo($_FILES['newimg']['name'], PATHINFO_FILENAME).".".$file_extension;


        $folder = "pdfs/".$filename;


        $sql = "UPDATE docs SET src = '".$filename."', folder = '".$folder."' WHERE doc_id = $doc_id ";
        
        $query = $db->prepare($sql);

        $query->execute();
        move_uploaded_file($_FILES["newimg"]["tmp_name"], "../../pdfs/".$filename);

        header("Location: ../../backoffice/code-of-conduct.php");
    }

    header("Location: ../../backoffice/code-of-conduct.php");
}

// EDIT DOCOF TEXT
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
        header("Location: ../../backoffice/docs.php");
    }
    header("Location: ../../backoffice/docs.php");
}

// EDIT IMAGE
if ( isset($_POST['edit-img1']) || isset($_POST['edit-img2']) || isset($_POST['edit-img3'])) {

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

        header("Location: ../../backoffice/docs.php");
    }

    header("Location: ../../backoffice/docs.php");
}

// EDIT DOCS TITLE
if (isset($_POST['edit-doc3']) || isset($_POST['edit-doc4']) || isset($_POST['edit-doc5']) ) {

    $doc_id = isset($_POST["doc_id"]) ? $_POST["doc_id"] : '';
    $title = isset($_POST["title"]) ? $_POST["title"] : '';

    if( !empty($doc_id) ) {

        $query = $db->prepare("UPDATE docs SET title = :title WHERE doc_id = :doc_id");

        $query->bindParam( ":title",  $param_title, PDO::PARAM_STR );
        $query->bindParam( ":doc_id",  $param_doc_id, PDO::PARAM_INT );

        $param_title = $title;
        $param_doc_id = $doc_id;
        
        $query->execute();

        header("Location: ../../backoffice/docs.php");

    }

    header("Location: ../../backoffice/docs.php");

}

// EDIT DOCS
if (isset($_POST['edit-pdf3']) || isset($_POST['edit-pdf4'])  || isset($_POST['edit-pdf5']) ) {

    $allowed_types = [
        "pdf" => "application/pdf"
    ];

    $doc_id = $_POST["doc_id"];
    $oldimg = $_POST["oldimg"];

    if(
        isset($_FILES["newimg"]) &&
        !empty($_FILES["newimg"]) && 
        $_FILES["newimg"]["size"] > 0 && 
        $_FILES["newimg"]["error"] === 0 &&
        in_array($_FILES["newimg"]["type"], $allowed_types)
    ) {
      
        unlink("../../pdfs/".$oldimg);   
         
        
        $file_extension = array_search($_FILES["newimg"]["type"], $allowed_types);
        $filename = pathinfo($_FILES['newimg']['name'], PATHINFO_FILENAME).".".$file_extension;


        $folder = "pdfs/".$filename;


        $sql = "UPDATE docs SET src = '".$filename."', folder = '".$folder."' WHERE doc_id = $doc_id ";
        
        $query = $db->prepare($sql);

        $query->execute();
        move_uploaded_file($_FILES["newimg"]["tmp_name"], "../../pdfs/".$filename);

        
        header("Location: ../../backoffice/docs.php");
    }
   
    header("Location: ../../backoffice/docs.php");
}

// ADD PR DOCS
if (isset($_POST['add-docs'])) {

    $title = isset($_POST["title"]) ? $_POST["title"] : '';
    $prorder = isset($_POST["prorder"]) ? $_POST["prorder"] : '';
    $year = isset($_POST["year"]) ? $_POST["year"] : '';
    $tdate = isset($_POST["tdate"]) ? $_POST["tdate"] : '';

    $allowed_types = [
        "pdf" => "application/pdf"
    ];

    if(
        !empty($title) && 
        !empty($prorder) && 
        !empty($year) && 
        isset($_FILES["src"]) &&
        !empty($_FILES["src"]) && 
        $_FILES["src"]["size"] > 0 && 
        $_FILES["src"]["error"] === 0 &&
        in_array($_FILES["src"]["type"], $allowed_types) 
 
    ) {

        $file_extension = array_search($_FILES["src"]["type"], $allowed_types);
        $filename = pathinfo($_FILES['src']['name'], PATHINFO_FILENAME).".".$file_extension;

        $folder = "pdfs/planos-relatorios/".$filename;

        $query = $db->prepare("INSERT INTO plans_reports (title, prorder, year, src, folder) VALUES (:title, :prorder, :year, :src, :folder) ");

        $query->bindParam( ":title",  $param_title, PDO::PARAM_STR );
        $query->bindParam( ":prorder",  $param_prorder, PDO::PARAM_INT );
        $query->bindParam( ":year",  $param_year, PDO::PARAM_INT );

        $query->bindParam( ":src",  $param_src, PDO::PARAM_STR );
        $query->bindParam( ":folder",  $param_folder, PDO::PARAM_STR );

        $param_title = $title;
        $param_prorder = $prorder;
        $param_year = $year;

        $param_src = $filename;
        $param_folder = $folder;

        
        $query->execute();

        move_uploaded_file($_FILES["src"]["tmp_name"], "../../pdfs/planos-relatorios/".$filename);


        header("Location: ../../backoffice/plans-reports.php");
    }

}

// EDIT PR DOCS TEXT
if (isset($_POST['edit-prdocs']) ) {

    $pr_id = isset($_POST["pr_id"]) ? $_POST["pr_id"] : '';
    $title = isset($_POST["title"]) ? $_POST["title"] : '';
    $year = isset($_POST["year"]) ? $_POST["year"] : '';
    $prorder = isset($_POST["prorder"]) ? $_POST["prorder"] : '';

    if( !empty($pr_id) ) {

        $query = $db->prepare("UPDATE plans_reports SET title = :title, prorder = :prorder, year = :year WHERE pr_id = :pr_id");

        $query->bindParam( ":title",  $param_title, PDO::PARAM_STR );
        $query->bindParam( ":prorder",  $param_prorder, PDO::PARAM_INT );
        $query->bindParam( ":year",  $param_year, PDO::PARAM_INT );
        $query->bindParam( ":pr_id",  $param_pr_id, PDO::PARAM_INT );

        $param_title = $title;
        $param_prorder = $prorder;
        $param_year = $year;
        $param_pr_id = $pr_id;
        
        $query->execute();

        header("Location: ../../backoffice/edit-docs.php?n=$pr_id");

    }

    header("Location: ../../backoffice/edit-docs.php?n=$pr_id");

}

// EDIT PR DOCS PDF
if (isset($_POST['edit-prpdf']) ) {

    $allowed_types = [
        "pdf" => "application/pdf"
    ];

    $pr_id = $_POST["pr_id"];
    $oldimg = $_POST["oldimg"];

    if(
        isset($_FILES["newimg"]) &&
        !empty($_FILES["newimg"]) && 
        $_FILES["newimg"]["size"] > 0 && 
        $_FILES["newimg"]["error"] === 0 &&
        in_array($_FILES["newimg"]["type"], $allowed_types)
    ) {
      
        unlink("../../pdfs/planos-relatorios/".$oldimg);   
         
        
        $file_extension = array_search($_FILES["newimg"]["type"], $allowed_types);
        $filename = pathinfo($_FILES['newimg']['name'], PATHINFO_FILENAME).".".$file_extension;


        $folder = "pdfs/planos-relatorios/".$filename;


        $sql = "UPDATE plans_reports SET src = '".$filename."', folder = '".$folder."' WHERE pr_id = $pr_id ";
        
        $query = $db->prepare($sql);

        $query->execute();
        move_uploaded_file($_FILES["newimg"]["tmp_name"], "../../pdfs/planos-relatorios/".$filename);

        
        header("Location: ../../backoffice/edit-docs.php?n=$pr_id");
    }
   
    header("Location: ../../backoffice/edit-docs.php?n=$pr_id");
}

$type = isset($_POST['type']) ? $_POST['type'] : '';

// DELETE PR DOCS
if($type == 6) {
    $id = $_POST["id"];
    $src =  !empty($_POST["src"]) ? trim($_POST["src"]) : NULL;

    unlink("../../pdfs/planos-relatorios/".$src);   
        
    $query = $db->prepare("DELETE FROM plans_reports WHERE pr_id = :pr_id");

    $query->bindParam( ":pr_id",  $param_pr_id, PDO::PARAM_INT );

	$param_pr_id = $id;

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

        header("Location: ../../backoffice/code-of-conduct.php");
    }
    
    header("Location: ../../backoffice/code-of-conduct.php");
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

        header("Location: ../../backoffice/docs.php");
    }
    
    header("Location: ../../backoffice/docs.php");
}

// EDIT BANNER
if (isset($_POST['edit-banner3'])) {

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

        header("Location: ../../backoffice/pr-banner.php");
    }
    
    header("Location: ../../backoffice/pr-banner.php");
}

