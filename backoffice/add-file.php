
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
                        <h6 class="h2 text-white d-inline-block mb-0">Adicionar Ficheiro</h6>
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
                            <div class="col-lg-6 col-md-12 col-sm-12 m-0 p-0">
                                <form action="controller/edit-files.php" method="post" enctype="multipart/form-data">
                                    <div class='form-group'>
                                        <label>Ficheiro</label>
                                        <input type='file' class='form-control img-alert' name='src' required/>
                                    </div>
                                    <button class='btn btn-primary m-4' name='add-file' ty3pe='submit'>Adicionar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



  <?php include('includes/footer.php'); ?>