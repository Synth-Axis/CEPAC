<?php
require_once "controller/checklogin.php";

include('includes/header.php');

include('includes/sidebar.php');

$pr_id = isset($_GET["n"]) ? $_GET["n"] : '';

// VIEW DOC
$query = $db->prepare("SELECT * FROM plans_reports WHERE pr_id = :pr_id");

$query->bindParam(":pr_id",  $param_pr_id, PDO::PARAM_INT);

$param_pr_id = $pr_id;

$query->execute();

$doc = $query->fetch(PDO::FETCH_ASSOC);
?>


<!-- Main content -->
<div class="main-content" id="panel">
    <?php include('includes/navbar.php'); ?>

    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Editar Documento</h6>
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
                        <a class='btn btn-primary mb-3' href="plans-reports.php"><i class="ni ni-bold-left "></i></a>
                        <div class="row ml-2 mr-2 mt-4">
                            <div class="col-lg-6 col-md-12 col-sm-12 m-0 p-0">
                                <form action="controller/edit-docs.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Título</label>
                                        <input type="text" name="title" class="form-control" required value="<?= $doc["title"]; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Ano</label>
                                        <input type="number" min="0" name="year" class="form-control date-w" required value="<?= $doc["year"]; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Ordem</label>
                                        <input type="number" min="0" name="prorder" class="form-control date-w" required value="<?= $doc["prorder"]; ?>">
                                    </div>
                                    <input type="hidden" name="pr_id" value="<?= $doc["pr_id"]; ?>">
                                    <button class='btn btn-primary m-4' name='edit-prdocs' ty3pe='submit'>Editar</button>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <h2 class="mb-4">Editar PDF</h2>
                        <div class="row ml-2 mr-2">
                            <div class="col-lg-4 col-md-12 col-sm-12 m-0 p-0">
                                <div class="mb-4">
                                    <a href='../<?= $doc['folder'] ?>' alt='<?= $doc['title'] ?>' target="_blank">
                                        <?= $doc['folder'] ?>
                                    </a>
                                </div>
                                <form action="controller/edit-docs.php" method="post" enctype="multipart/form-data">
                                    <div id='change-img' class='form-group mt-3'>
                                        <input type='file' class='form-control img-alert' name='newimg' required accept="application/pdf" />
                                        <div class="mt-3">
                                            <input type='hidden' name='oldimg' value='<?= $doc['src']; ?>'>
                                            <input type='hidden' name='pr_id' value='<?= $doc['pr_id'] ?>'>
                                            <button class='btn btn-primary m-4' name='edit-prpdf' type='submit'>Editar</button>
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