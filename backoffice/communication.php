<?php 
    require_once "controller/checklogin.php";

    include('includes/header.php'); 

    include('includes/sidebar.php'); 

// VIEW CM SLIDER
    $query = $db->prepare("SELECT * FROM images WHERE tag = 'cm' ORDER BY iorder ASC ");
    $query->execute();
    $images = $query->fetchAll( PDO::FETCH_ASSOC );

// VIEW CM TEXT
    $query = $db->prepare("SELECT * FROM content WHERE tag = 'cm' ");
    $query->execute();
    $contents = $query->fetchAll( PDO::FETCH_ASSOC );

// VIEW BANNER
    $query = $db->prepare("SELECT * FROM banners WHERE tag = 'cm' ");
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
                        <h6 class="h2 text-white d-inline-block mb-0">Comunicação</h6>
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
                                <form action="controller/edit-cm.php" method="post" enctype="multipart/form-data">
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
                                <form action="controller/edit-cm.php" method="post" enctype="multipart/form-data">
                                    <h2 class="mb-4">Editar Conteudo</h2> 
                                    <?php foreach($contents as $content) : ?>
                                        <label>Texto</label>
                                        <textarea type="text" name="text[]" rows="3" class="form-control mb-4" required><?= $content["text"];?></textarea>
                                        <input type='hidden' name='content_id[]' value='<?= $content["content_id"];?>'>
                                    <?php endforeach; ?>
                                    <button class='btn btn-primary m-4' name='edit-text' type='submit'>Editar</button>
                                </form> 
                            </div>
                        </div>
                        <hr>
                        <div class="row ml-2 mr-2">
                            <div class="col-lg-6 col-md-12 col-sm-12 m-0 p-0">
                                <form action="controller/edit-cm.php" method="post" enctype="multipart/form-data">
                                    <h2 class="mb-4">Adicionar Imagem no Slider</h2> 
                                    <label>Número</label>
                                    <input type="number" name="iorder" min="0" class="form-control mb-4 w-25" required>
                                    <label>Imagem</label>
                                    <input type='file' class='form-control img-alert' name='newimg' required/>
                                    <p class="mt-3">Tamanho: 560x420</p>
                                    <button class='btn btn-primary m-4' name='add-img' type='submit'>Adicionar</button>
                                </form> 
                                <hr>
                                <?php foreach($images as $img) : ?>
                                    <h2 class="mb-4">Editar Imagem do Slider</h2>
                                    <form action="controller/edit-cm.php" method="post" enctype="multipart/form-data">
                                        <label>Número</label>
                                        <input type="number" name="iorder" min="0" class="form-control mb-4 w-25" value="<?= $img['iorder']?>" required>
                                        <label>Imagens</label>
                                        <div>
                                            <img class='w-25 pt-3 pb-3' src='../<?= $img['folder']?>' alt='<?= $img['src']?>' />
                                        </div>
                                        <input type='file' class='form-control img-alert' name='newimg'/>
                                        <p class="mt-3">Tamanho: 560x420</p>
                                        <div class="mt-4 mb-4">
                                            <input type="hidden" name="img_id" value="<?= $img['img_id']?>">
                                            <input type='hidden' name='oldimg' value='<?= $img['src']?>'>
                                            <button class='btn btn-primary m-4' name='edit-img' type='submit'>Editar</button>
                                            <button class='btn btn-danger' type="button" data-toggle='modal' data-id='<?= $img["img_id"];?>' data-src='<?= $img["src"];?>' data-target='#deleteCm'>Apagar</button>
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
        <div class="modal fade" id="deleteCm" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="deleteCmLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteCmLabel">Apagar</h5>
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
                        <button type="button" class="btn btn-danger delete-cm">Apagar</button>
                    </div>
                </div>
            </div>
        </div> 

  <?php include('includes/footer.php'); ?>