
<?php 
    require_once "controller/checklogin.php";

    include('includes/header.php'); 

    include('includes/sidebar.php'); 

  
// VIEW DOCS PDF
    $query = $db->prepare("SELECT * FROM docs WHERE tag = 'docof' ");
    $query->execute();
    $docs = $query->fetchAll( PDO::FETCH_ASSOC );

// VIEW DOCS TEXT
    $query = $db->prepare("SELECT * FROM content WHERE tag = 'docof' ");
    $query->execute();
    $contents = $query->fetchAll( PDO::FETCH_ASSOC );

// VIEW DOCS IMG
    $query = $db->prepare("SELECT * FROM images WHERE tag = 'docof' ");
    $query->execute();
    $imgs = $query->fetchAll( PDO::FETCH_ASSOC );

// VIEW BANNER
    $query = $db->prepare("SELECT * FROM banners WHERE tag = 'docof' ");
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
                        <h6 class="h2 text-white d-inline-block mb-0">Documentos Oficiais</h6>
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
                                <form action="controller/edit-docs.php" method="post" enctype="multipart/form-data">
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
                        <div class="row ml-2 mr-2 mt-4">
                            <div class="col-lg-6 col-md-12 col-sm-12 m-0 p-0">
                                <form action="controller/edit-docs.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Título</label>
                                        <input type="text" name="title" class="form-control" value="<?= $docs[0]["title"]; ?>" required>
                                    </div>
                                    <input type='hidden' name='doc_id' value='<?= $docs[0]["doc_id"];?>'>
                                    <button class='btn btn-primary m-4' name='edit-doc3' ty3pe='submit'>Editar</button>
                                </form>
                            </div>
                        </div>
                        <h2 class="mb-4">Editar PDF</h2>
                        <div class="row ml-2 mr-2">
                            <div class="col-lg-4 col-md-12 col-sm-12 m-0 p-0">
                                <div class="mb-4">
                                    <a href='../<?= $docs[0]['folder']?>' alt='<?= $docs[0]['title']?>' target="_blank">
                                        <?= $docs[0]['folder']?>
                                    </a>
                                </div>	
                                <form action="controller/edit-docs.php" method="post" enctype="multipart/form-data">
                                    <div id='change-img' class='form-group mt-3'>
                                        <input type='file' class='form-control img-alert' name='newimg' required accept="application/pdf"/>
                                        <div class="mt-3">
                                            <input type='hidden' name='oldimg' value='<?= $docs[0]['src']; ?>'>
                                            <input type='hidden' name='doc_id' value='<?= $docs[0]['doc_id']?>'>
                                            <button class='btn btn-primary m-4' name='edit-pdf3' type='submit'>Editar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <div class="row ml-2 mr-2 mt-4">
                            <div class="col-lg-6 col-md-12 col-sm-12 m-0 p-0">
                                <form action="controller/edit-docs.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Título</label>
                                        <input type="text" name="title" class="form-control" value="<?= $docs[1]["title"]; ?>" required>
                                    </div>
                                    <input type='hidden' name='doc_id' value='<?= $docs[1]["doc_id"];?>'>
                                    <button class='btn btn-primary m-4' name='edit-doc4' ty3pe='submit'>Editar</button>
                                </form>
                            </div>
                        </div>
                        <h2 class="mb-4">Editar PDF</h2>
                        <div class="row ml-2 mr-2">
                            <div class="col-lg-4 col-md-12 col-sm-12 m-0 p-0">
                                <div class="mb-4">
                                    <a href='../<?= $docs[1]['folder']?>' alt='<?= $docs[1]['title']?>' target="_blank">
                                        <?= $docs[1]['folder']?>
                                    </a>
                                </div>	
                                <form action="controller/edit-docs.php" method="post" enctype="multipart/form-data">
                                    <div id='change-img' class='form-group mt-3'>
                                        <input type='file' class='form-control img-alert' name='newimg' required accept="application/pdf"/>
                                        <div class="mt-3">
                                            <input type='hidden' name='oldimg' value='<?= $docs[1]['src']; ?>'>
                                            <input type='hidden' name='doc_id' value='<?= $docs[1]['doc_id']?>'>
                                            <button class='btn btn-primary m-4' name='edit-pdf4' type='submit'>Editar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <div class="row ml-2 mr-2 mt-4">
                            <div class="col-lg-6 col-md-12 col-sm-12 m-0 p-0">
                                <form action="controller/edit-docs.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Título</label>
                                        <input type="text" name="title" class="form-control" value="<?= $docs[2]["title"]; ?>" required>
                                    </div>
                                    <input type='hidden' name='doc_id' value='<?= $docs[2]["doc_id"];?>'>
                                    <button class='btn btn-primary m-4' name='edit-doc5' ty3pe='submit'>Editar</button>
                                </form>
                            </div>
                        </div>
                        <h2 class="mb-4">Editar PDF</h2>
                        <div class="row ml-2 mr-2">
                            <div class="col-lg-4 col-md-12 col-sm-12 m-0 p-0">
                                <div class="mb-4">
                                    <a href='../<?= $docs[2]['folder']?>' alt='<?= $docs[2]['title']?>' target="_blank">
                                        <?= $docs[2]['folder']?>
                                    </a>
                                </div>	
                                <form action="controller/edit-docs.php" method="post" enctype="multipart/form-data">
                                    <div id='change-img' class='form-group mt-3'>
                                        <input type='file' class='form-control img-alert' name='newimg' required accept="application/pdf"/>
                                        <div class="mt-3">
                                            <input type='hidden' name='oldimg' value='<?= $docs[2]['src']; ?>'>
                                            <input type='hidden' name='doc_id' value='<?= $docs[2]['doc_id']?>'>
                                            <button class='btn btn-primary m-4' name='edit-pdf5' type='submit'>Editar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <div class="row ml-2 mr-2">
                            <div class="col-lg-8 col-md-12 col-sm-12 m-0 p-0">
                                <form action="controller/edit-docs.php" method="post" enctype="multipart/form-data">
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
                                <h2 class="mb-4">Editar Imagem</h2>
                                <form action="controller/edit-docs.php" method="post" enctype="multipart/form-data">
                                    <div>
                                        <img class='w-25 pt-3 pb-3' src='../<?= $imgs[0]['folder']?>' alt='<?= $imgs[0]['src']?>' />
                                    </div>
                                    <input type='file' class='form-control img-alert' name='newimg'/>
                                    <div class="mt-4 mb-4">
                                        <input type="hidden" name="img_id" value="<?= $imgs[0]['img_id']?>">
                                        <input type='hidden' name='oldimg' value='<?= $imgs[0]['src']?>'>
                                        <button class='btn btn-primary m-4' name='edit-img1' type='submit'>Editar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <div class="row ml-2 mr-2">
                            <div class="col-lg-6 col-md-12 col-sm-12 m-0 p-0">
                                <h2 class="mb-4">Editar Imagem</h2>
                                <form action="controller/edit-docs.php" method="post" enctype="multipart/form-data">
                                    <div>
                                        <img class='w-25 pt-3 pb-3' src='../<?= $imgs[1]['folder']?>' alt='<?= $imgs[1]['src']?>' />
                                    </div>
                                    <input type='file' class='form-control img-alert' name='newimg'/>
                                    <div class="mt-4 mb-4">
                                        <input type="hidden" name="img_id" value="<?= $imgs[1]['img_id']?>">
                                        <input type='hidden' name='oldimg' value='<?= $imgs[1]['src']?>'>
                                        <button class='btn btn-primary m-4' name='edit-img2' type='submit'>Editar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <div class="row ml-2 mr-2">
                            <div class="col-lg-6 col-md-12 col-sm-12 m-0 p-0">
                                <h2 class="mb-4">Editar Imagem</h2>
                                <form action="controller/edit-docs.php" method="post" enctype="multipart/form-data">
                                    <div>
                                        <img class='w-25 pt-3 pb-3' src='../<?= $imgs[2]['folder']?>' alt='<?= $imgs[2]['src']?>' />
                                    </div>
                                    <input type='file' class='form-control img-alert' name='newimg'/>
                                    <div class="mt-4 mb-4">
                                        <input type="hidden" name="img_id" value="<?= $imgs[2]['img_id']?>">
                                        <input type='hidden' name='oldimg' value='<?= $imgs[2]['src']?>'>
                                        <button class='btn btn-primary m-4' name='edit-img3' type='submit'>Editar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



  <?php include('includes/footer.php'); ?>