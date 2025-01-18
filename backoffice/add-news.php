
<?php 
    require_once "controller/checklogin.php";

    include('includes/header.php'); 

    include('includes/sidebar.php'); 

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
                        <h6 class="h2 text-white d-inline-block mb-0">Adicionar Notícia</h6>
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
                                        <input class="custom-control-input" id="customCheckRegister1" type="radio" name="highlighted" value="1">
                                        <label class="custom-control-label" for="customCheckRegister1">
                                            <span class="text-muted">Sim</span>
                                        </label>
                                    </div>
                                    <div class="form-group custom-control custom-control-alternative custom-checkbox">
                                        <input class="custom-control-input" id="customCheckRegister2" type="radio" checked name="highlighted" value="0">
                                        <label class="custom-control-label" for="customCheckRegister2">
                                            <span class="text-muted">Não</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label>Título</label>
                                        <input type="text" name="title" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Data</label>
                                        <input type="date" name="tdate" class="form-control date-w" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Texto</label>
                                        <textarea rows="20" name="text" class="form-control mytextarea" ></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Subtexto</label>
                                        <input type="text" name="shorttext" class="form-control" required>
                                    </div>
                                    <div class='form-group'>
                                        <label>Image de Capa</label>
                                        <input type='file' class='form-control img-alert' name='banner' required/>
                                    </div>
                                    <div class='form-group'>
                                        <label>Banner</label>
                                        <input type='file' class='form-control img-alert' name='src' />
                                    </div>
                                    <button class='btn btn-primary m-4' name='add-news' type='submit'>Adicionar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



  <?php include('includes/footer.php'); ?>