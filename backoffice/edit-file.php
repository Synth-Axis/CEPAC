
<?php 
    require_once "controller/checklogin.php";

    include('includes/header.php'); 

    include('includes/sidebar.php'); 

    $file_id = isset($_GET["n"]) ? $_GET["n"] : '';
  
    // VIEW TEAM
    $query = $db->prepare("SELECT * FROM files WHERE file_id = :file_id");

    $query->bindParam( ":file_id",  $param_file_id, PDO::PARAM_INT );

	$param_file_id = $file_id;

    $query->execute();

    $file = $query->fetch( PDO::FETCH_ASSOC );


?>

  <!-- Main content -->
  <div class="main-content" id="panel">
    <?php include('includes/navbar.php');?>

    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Editar Ficheiro</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <a class='btn btn-primary mb-3' href="files.php"><i class="ni ni-bold-left "></i></a>
                        <div class="row ml-2 mr-2 mt-5">
                            <div class="col-lg-4 col-md-12 col-sm-12 m-0 p-0">
                                <h2 class="mb-4">Link</h2>
                                <div class="mb-4">
                                    <a href='../<?= $file['folder']?>' target="_blank">
                                        <?= $file['folder']?>
                                    </a>
                                </div>	
                                <form action="controller/edit-files.php" method="post" enctype="multipart/form-data">
                                    <div id='change-img' class='form-group mt-3'>
                                        <input type='file' class='form-control img-alert' name='newimg' required/>
                                        <div class="mt-3">
                                            <input type='hidden' name='oldimg' value='<?= $file['src']; ?>'>
                                            <input type='hidden' name='file_id' value='<?= $file['file_id']?>'>
                                            <button class='btn btn-primary m-4' name='edit-file' type='submit'>Editar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



  <?php include('includes/footer.php'); ?>