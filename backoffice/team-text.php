<?php 
    require_once "controller/checklogin.php";

    include('includes/header.php'); 

    include('includes/sidebar.php'); 

// VIEW HOME TEXT
    $query = $db->prepare("SELECT * FROM content WHERE tag = 'team' ");
    $query->execute();
    $contents = $query->fetchAll( PDO::FETCH_ASSOC );

// VIEW BANNER
    $query = $db->prepare("SELECT * FROM banners WHERE tag = 'team' ");
    $query->execute();
    $banner = $query->fetch( PDO::FETCH_ASSOC );


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
                        <h6 class="h2 text-white d-inline-block mb-0">Equipa - Texto</h6>
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
                            <div class="col-lg-6 col-md-12 col-sm-12 m-0 p-0">
                                <h2 class="mb-4">Editar Banner</h2>
                                <form action="controller/edit-team.php" method="post" enctype="multipart/form-data">
                                    <label>Título</label>
                                    <input type="text" name="title" class="form-control mb-4" value="<?= $banner['title']?>" />
                                    <label>Imagem</label>
                                    <div>
                                        <img class='w-25 pt-3 pb-3' src='../<?= $banner['folder']?>' alt='<?= $banner['src']?>' />
                                    </div>
                                    <input type='file' class='form-control img-alert' name='newimg'/>
                                    <p class="mt-3">Tamanho: 1920x644</p>
                                    <div class="mt-4 mb-4">
                                        <input type="hidden" name="banner_id" value="<?= $banner['banner_id']?>">
                                        <input type='hidden' name='oldimg' value='<?= $banner['src']?>'>
                                        <button class='btn btn-primary m-4' name='edit-banner' type='submit'>Editar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <div class="row ml-2 mr-2">
                            <div class="col-lg-8 col-md-12 col-sm-12 m-0 p-0">
                                <form action="controller/edit-team.php" method="post" enctype="multipart/form-data">
                                    <h2 class="mb-4">Editar Conteudo</h2> 
                                    <?php foreach($contents as $content) : ?>
                                        <textarea type="text" name="text[]" rows="3" class="form-control mb-4" required><?= $content["text"];?></textarea>
                                        <input type='hidden' name='content_id[]' value='<?= $content["content_id"];?>'>
                                    <?php endforeach; ?>
                                    <button class='btn btn-primary m-4' name='edit-teamtext' type='submit'>Editar</button>
                                </form> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

  <?php include('includes/footer.php'); ?>