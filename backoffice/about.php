<?php 
    require_once "controller/checklogin.php";

    include('includes/header.php'); 

    include('includes/sidebar.php'); 

 // VIEW ABOUT IMG
    $query = $db->prepare("SELECT * FROM images WHERE tag = 'about' ");
    $query->execute();
    $homeimg = $query->fetchAll( PDO::FETCH_ASSOC );

// VIEW ABOUT TEXT
    $query = $db->prepare("SELECT * FROM content WHERE tag = 'about' ");
    $query->execute();
    $contents = $query->fetchAll( PDO::FETCH_ASSOC );

// VIEW ABOUT SLIDER
    $query = $db->prepare("SELECT * FROM about_slider ORDER BY aorder ASC ");
    $query->execute();
    $images = $query->fetchAll( PDO::FETCH_ASSOC );


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
                        <h6 class="h2 text-white d-inline-block mb-0">Quem Somos</h6>
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
                                    <button class='btn btn-primary m-4' name='edit-about' type='submit'>Editar</button>
                                </form> 
                            </div>
                        </div>
                        <hr>
                        <div class="row ml-2 mr-2">
                            <div class="col-lg-6 col-md-12 col-sm-12 m-0 p-0">
                                <h2 class="mb-4">Editar Banner</h2>
                                <form action="controller/edit-home.php" method="post" enctype="multipart/form-data">
                                    <div>
                                        <img class='w-25 pt-3 pb-3' src='../<?= $homeimg[0]['folder']?>' alt='<?= $homeimg[0]['src']?>' />
                                    </div>
                                    <input type='file' class='form-control img-alert' name='newimg'/>
                                    <p class="mt-3">Tamanho: 1908x570</p>
                                    <div class="mt-4 mb-4">
                                        <input type="hidden" name="img_id" value="<?= $homeimg[0]['img_id']?>">
                                        <input type='hidden' name='oldimg' value='<?= $homeimg[0]['src']?>'>
                                        <button class='btn btn-primary m-4' name='edit-about1' type='submit'>Editar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <div class="row ml-2 mr-2">
                            <div class="col-lg-6 col-md-12 col-sm-12 m-0 p-0">
                                <h2 class="mb-4">Editar Imagem</h2>
                                <form action="controller/edit-home.php" method="post" enctype="multipart/form-data">
                                    <div>
                                        <img class='w-25 pt-3 pb-3' src='../<?= $homeimg[1]['folder']?>' alt='<?= $homeimg[1]['src']?>' />
                                    </div>
                                    <input type='file' class='form-control img-alert' name='newimg'/>
                                    <p class="mt-3">Tamanho: 730x660</p>
                                    <div class="mt-4 mb-4">
                                        <input type="hidden" name="img_id" value="<?= $homeimg[1]['img_id']?>">
                                        <input type='hidden' name='oldimg' value='<?= $homeimg[1]['src']?>'>
                                        <button class='btn btn-primary m-4' name='edit-about2' type='submit'>Editar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <div class="row ml-2 mr-2">
                            <div class="col-lg-6 col-md-12 col-sm-12 m-0 p-0">
                                <h2 class="mb-4">Editar Imagem</h2>
                                <form action="controller/edit-home.php" method="post" enctype="multipart/form-data">
                                    <div>
                                        <img class='w-25 pt-3 pb-3' src='../<?= $homeimg[2]['folder']?>' alt='<?= $homeimg[2]['src']?>' />
                                    </div>
                                    <input type='file' class='form-control img-alert' name='newimg'/>
                                    <p class="mt-3">Tamanho: 730x660</p>
                                    <div class="mt-4 mb-4">
                                        <input type="hidden" name="img_id" value="<?= $homeimg[2]['img_id']?>">
                                        <input type='hidden' name='oldimg' value='<?= $homeimg[2]['src']?>'>
                                        <button class='btn btn-primary m-4' name='edit-about3' type='submit'>Editar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <div class="row ml-2 mr-2">
                            <div class="col-lg-6 col-md-12 col-sm-12 m-0 p-0">
                                <?php foreach($images as $img) : ?>
                                    <h2 class="mb-4">Editar Imagem do Slider</h2>
                                    <form action="controller/edit-home.php" method="post" enctype="multipart/form-data">
                                        <label>Número</label>
                                        <input type="number" name="aorder" min="0" class="form-control mb-4 w-25" value="<?= $img['aorder']?>" required>
                                        <label>Título</label>
                                        <input type="text" name="text" min="0" class="form-control mb-4" value="<?= $img['text']?>" required>
                                        <label>Imagens</label>
                                        <div>
                                            <img class='w-25 pt-3 pb-3' src='../<?= $img['folder']?>' alt='<?= $img['src']?>' />
                                        </div>
                                        <input type='file' class='form-control img-alert' name='newimg'/>
                                        <p class="mt-3">Tamanho: 408x368</p>
                                        <div class="mt-4 mb-4">
                                            <input type="hidden" name="img_id" value="<?= $img['slider_id']?>">
                                            <input type='hidden' name='oldimg' value='<?= $img['src']?>'>
                                            <button class='btn btn-primary m-4' name='edit-aboutslider' type='submit'>Editar</button>
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

  <?php include('includes/footer.php'); ?>