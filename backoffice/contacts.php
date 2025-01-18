<?php 
    require_once "controller/checklogin.php";

    include('includes/header.php'); 

    include('includes/sidebar.php'); 

// VIEW HOME TEXT
    $query = $db->prepare("SELECT * FROM content WHERE tag = 'contacts' ");
    $query->execute();
    $contents = $query->fetchAll( PDO::FETCH_ASSOC );


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
                        <h6 class="h2 text-white d-inline-block mb-0">Contactos</h6>
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
                        <div class="row ml-2 mr-2">
                            <div class="col-lg-8 col-md-12 col-sm-12 m-0 p-0">
                                <form action="controller/edit-home.php" method="post" enctype="multipart/form-data">
                                    <h2 class="mb-4">Editar Conteudo</h2> 
                                    <?php foreach($contents as $content) : ?>
                                        <textarea type="text" name="text[]" rows="3" class="form-control mb-4" required><?= $content["text"];?></textarea>
                                        <input type='hidden' name='content_id[]' value='<?= $content["content_id"];?>'>
                                    <?php endforeach; ?>
                                    <button class='btn btn-primary m-4' name='edit-contacts' type='submit'>Editar</button>
                                </form> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

  <?php include('includes/footer.php'); ?>