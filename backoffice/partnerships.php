<?php 
    require_once "controller/checklogin.php";

    include('includes/header.php'); 

    include('includes/sidebar.php'); 

 // VIEW PARTNERSHIPS IMAGES
    $query = $db->prepare("SELECT * FROM partnerships ORDER BY norder ASC ");
    $query->execute();
    $images = $query->fetchAll( PDO::FETCH_ASSOC );

// VIEW PARTNERSHIPS TEXT
    $query = $db->prepare("SELECT * FROM content WHERE tag = 'part' ");
    $query->execute();
    $contents = $query->fetchAll( PDO::FETCH_ASSOC );

// VIEW BANNER
	$query = $db->prepare("SELECT * FROM banners WHERE tag = 'part' ");
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
                        <h6 class="h2 text-white d-inline-block mb-0">Parcerias</h6>
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
                                <form action="controller/edit-networks.php" method="post" enctype="multipart/form-data">
                                    <h2 class="mb-4">Editar Conteudo</h2> 
                                    <?php foreach($contents as $content) : ?>
                                        <label>Texto</label>
                                        <textarea type="text" name="text[]" rows="3" class="form-control mb-4" required><?= $content["text"];?></textarea>
                                        <input type='hidden' name='content_id[]' value='<?= $content["content_id"];?>'>
                                    <?php endforeach; ?>
                                    <button class='btn btn-primary m-4' name='edit-text2' type='submit'>Editar</button>
                                </form> 
                            </div>
                        </div>
                        <hr>
                        <div class="row ml-2 mr-2">
                            <div class="col-lg-6 col-md-12 col-sm-12 m-0 p-0">
                                <h2 class="mb-4">Editar Banner</h2>
                                <form action="controller/edit-networks.php" method="post" enctype="multipart/form-data">
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
                                        <button class='btn btn-primary m-4' name='edit-banner2' type='submit'>Editar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <div class="row ml-2 mr-2">
                            <div class="col-lg-6 col-md-12 col-sm-12 m-0 p-0">
                                <form action="controller/edit-networks.php" method="post" enctype="multipart/form-data">
                                    <h2 class="mb-4">Adicionar Parceria</h2> 
                                    <label>Número</label>
                                    <input type="number" name="norder" min="0" class="form-control mb-4 w-25" required>
                                    <label>Imagem</label>
                                    <input type='file' class='form-control img-alert' name='newimg' required/>
                                    <p class="mt-3">Tamanho: 215x100</p> 
                                    <button class='btn btn-primary m-4' name='add-img2' type='submit'>Adicionar</button>
                                </form> 
                                <hr>
                                <?php foreach($images as $img) : ?>
                                    <h2 class="mb-4">Editar Parceria</h2>
                                    <form action="controller/edit-networks.php" method="post" enctype="multipart/form-data">
                                        <label>Número</label>
                                        <input type="number" name="norder" min="0" class="form-control mb-4 w-25" value="<?= $img['norder']?>" required>
                                        <label>Imagem</label>
                                        <div>
                                            <img class='w-25 pt-3 pb-3' src='../<?= $img['folder']?>' alt='<?= $img['src']?>' />
                                        </div>
                                        <input type='file' class='form-control img-alert' name='newimg'/>
                                        <p class="mt-3">Tamanho: 215x100</p> 
                                        <div class="mt-4 mb-4">
                                            <input type="hidden" name="partnership_id" value="<?= $img['partnership_id']?>">
                                            <input type='hidden' name='oldimg' value='<?= $img['src']?>'>
                                            <button class='btn btn-primary m-4' name='edit-img2' type='submit'>Editar</button>
                                            <button class='btn btn-danger' type="button" data-toggle='modal' data-id='<?= $img["partnership_id"];?>' data-src='<?= $img["src"];?>' data-target='#deletePartnership'>Apagar</button>
                                        </div>
                                    </form>
                                    <hr>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="deletePartnership" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="deletePartnershipLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deletePartnershipLabel">Apagar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Tem certeza de que deseja apagar?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <input type="hidden" name="src" class="modal-src">
                        <input type="hidden" name="id" class="modal-id">
                        <button type="button" class="btn btn-danger delete-partnership">Apagar</button>
                    </div>
                </div>
            </div>
        </div> 

  <?php include('includes/footer.php'); ?>