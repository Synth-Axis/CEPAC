
<?php 
    require_once "controller/checklogin.php";

    include('includes/header.php'); 

    include('includes/sidebar.php'); 

    
    $news_id = isset($_GET["n"]) ? $_GET["n"] : '';
  
    // VIEW TEAM
    $query = $db->prepare("SELECT * FROM news WHERE news_id = :news_id");

    $query->bindParam( ":news_id",  $param_news_id, PDO::PARAM_INT );

	$param_news_id = $news_id;

    $query->execute();

    $news = $query->fetch( PDO::FETCH_ASSOC );
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
                        <h6 class="h2 text-white d-inline-block mb-0">Editar Notícia - <?= $news["title"]; ?></h6>
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
                        <a class='btn btn-primary mb-3' href="news.php"><i class="ni ni-bold-left "></i></a>
                        <div class="row ml-2 mr-2 mt-4">
                            <div class="col-lg-6 col-md-12 col-sm-12 m-0 p-0">
                                <form action="controller/edit-news.php" method="post" enctype="multipart/form-data">
                                    <h2 class="mb-4 mt-4">Em Destaque</h2>
                                    <div class="form-group custom-control custom-control-alternative custom-checkbox">
                                        <input class="custom-control-input" id="customCheckRegister1" type="radio" <?php echo ($news["highlighted"] === "1") ? 'checked' : '';?> name="highlighted" value="1">
                                        <label class="custom-control-label" for="customCheckRegister1">
                                            <span class="text-muted">Sim</span>
                                        </label>
                                    </div>
                                    <div class="form-group custom-control custom-control-alternative custom-checkbox">
                                        <input class="custom-control-input" id="customCheckRegister2" type="radio" <?php echo ($news["highlighted"] === "0") ? 'checked' : '';?> name="highlighted" value="0">
                                        <label class="custom-control-label" for="customCheckRegister2">
                                            <span class="text-muted">Não</span>
                                        </label>
                                    </div>
                                    <input type='hidden' name='news_id' value='<?= $news["news_id"];?>'>
                                    <button class='btn btn-primary m-4' name='edit-highlighted' ty3pe='submit'>Editar</button>
                                </form>
                                <hr>
                                <form action="controller/edit-news.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Título</label>
                                        <input type="text" name="title" class="form-control" value="<?= $news["title"]; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Data</label>
                                        <input type="date"  name="tdate" class="form-control date-w" value="<?= $news["tdate"]; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Texto</label>
                                        <textarea rows="20" name="text" class="form-control mytextarea" ><?= $news["text"]; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Subtexto</label>
                                        <input type="text" name="shorttext" class="form-control" value="<?= $news["shorttext"]; ?>" required>
                                    </div>
                                    <input type='hidden' name='news_id' value='<?= $news["news_id"];?>'>
                                    <button class='btn btn-primary m-4' name='edit-news' ty3pe='submit'>Editar</button>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <h2 class="mb-4 mt-4">Editar Imagem de Capa</h2>
                        <div class="row ml-2 mr-2">
                            <div class="col-lg-4 col-md-12 col-sm-12 m-0 p-0">
                                <img class='w-75 pt-3 pb-3' src='../<?= $news['banner_folder']; ?>' alt='<?= $news['title']?>' />
                                <form action="controller/edit-news.php" method="post" enctype="multipart/form-data">
                                    <div id='change-img' class='form-group mt-3'>
                                        <input type='file' class='form-control img-alert' name='newimg' required />
                                        <div class="mt-3">
                                            <input type='hidden' name='oldimg' value='<?= $news['banner']; ?>'>
                                            <input type='hidden' name='news_id' value='<?= $news['news_id']?>'>
                                            <button class='btn btn-primary m-4' name='edit-img' type='submit'>Editar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <h2 class="mb-4">Editar Benner</h2>
                        <div class="row ml-2 mr-2">
                            <div class="col-lg-4 col-md-12 col-sm-12 m-0 p-0">
                                <div class="mb-4">
                                    <img class='w-75 pt-3 pb-3' src='../<?= $news['folder']; ?>' alt='<?= $news['title']?>' />
                                </div>	
                                <form action="controller/edit-news.php" method="post" enctype="multipart/form-data">
                                    <div id='change-img' class='form-group mt-3'>
                                        <input type='file' class='form-control img-alert' name='newimg' required/>
                                        <div class="mt-3">
                                            <input type='hidden' name='oldimg' value='<?= $news['src']; ?>'>
                                            <input type='hidden' name='news_id' value='<?= $news['news_id']?>'>
                                            <button class='btn btn-primary m-4' name='edit-img2' type='submit'>Editar</button>
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