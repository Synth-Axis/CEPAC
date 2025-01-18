<?php 
    require_once "controller/checklogin.php";

    include('includes/header.php'); 

    include('includes/sidebar.php'); 

 // VIEW PARTNERSHIPS TEXT
    $query = $db->prepare("SELECT * FROM partnerships_text ORDER BY ntorder ASC ");
    $query->execute();
    $ptcontent = $query->fetchAll( PDO::FETCH_ASSOC );

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
                        <h6 class="h2 text-white d-inline-block mb-0">Parceiros - Texto</h6>
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
                                <form action="controller/edit-networks.php" method="post" enctype="multipart/form-data">
                                    <h2 class="mb-4">Adicionar Parceiro</h2> 
                                    <label>Número</label>
                                    <input type="number" name="ntorder" min="0" class="form-control mb-4 w-25" required>
                                    <label>Título</label>
                                    <input type="text" name="title" min="0" class="form-control mb-4" required>
                                    <label>Texto</label>
                                    <textarea rows="20" name="text" class="form-control mytextarea" ></textarea>
                                    <button class='btn btn-primary m-4' name='add-ptext' type='submit'>Adicionar</button>
                                </form> 
                                <hr>
                                <?php foreach($ptcontent as $c) : ?>
                                    <h2 class="mb-4">Editar Parceiro</h2>
                                    <form action="controller/edit-networks.php" method="post" enctype="multipart/form-data">
                                        <label>Número</label>
                                        <input type="number" name="ntorder" min="0" class="form-control mb-4 w-25" value="<?= $c['ntorder']?>" required>
                                        <label>Título</label>
                                        <input type="text" name="title" min="0" class="form-control mb-4" value="<?= $c['title']?>" required>
                                        <label>Texto</label>
                                        <textarea rows="15" name="text" class="form-control mytextarea" ><?= $c["text"]; ?></textarea>
                                        <div class="mt-4 mb-4">
                                            <input type="hidden" name="ptext_id" value="<?= $c['ptext_id']?>">
                                            <button class='btn btn-primary m-4' name='edit-ptext' type='submit'>Editar</button>
                                            <button class='btn btn-danger' type="button" data-toggle='modal' data-id='<?= $c["ptext_id"];?>' data-target='#deletePtext'>Apagar</button>
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
        <div class="modal fade" id="deletePtext" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="deleteNetworktextdeletePtextLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deletePtextLabel">Apagar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Tem certeza de que deseja apagar?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <input type="hidden" name="id" class="modal-id">
                        <button type="button" class="btn btn-danger delete-ptext">Apagar</button>
                    </div>
                </div>
            </div>
        </div> 

  <?php include('includes/footer.php'); ?>