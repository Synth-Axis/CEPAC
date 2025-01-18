
<?php 
    require_once "controller/checklogin.php";

    include('includes/header.php'); 

    include('includes/sidebar.php'); 

    
// VIEW ROLES TITLE
    $query = $db->prepare("SELECT * FROM team_roles ");
    $query->execute();
    $teamroles = $query->fetchAll( PDO::FETCH_ASSOC );

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
                        <h6 class="h2 text-white d-inline-block mb-0">Adicionar Membro</h6>
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
                        <a class='btn btn-primary mb-3' href="team.php"><i class="ni ni-bold-left "></i></a>
                        <div class="row ml-2 mr-2 mt-4">
                            <div class="col-lg-6 col-md-12 col-sm-12 m-0 p-0">
                                <form action="controller/edit-team.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Nome</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Título do Cargo</label>
                                        <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1" name="tag">
                                            <?php foreach($teamroles as $role) : ?>
                                                <option value="<?= $role["role_id"]; ?>"><?= $role["name"]; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Cargo</label>
                                        <input type="text" name="role_pt" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Ordem</label>
                                        <input type="number" min="0" name="torder" class="form-control date-w" required>
                                    </div>
                                    <div class='form-group'>
                                        <label>Imagem</label>
                                        <input type='file' class='form-control img-alert' name='src' />
                                    </div>
                                    <button class='btn btn-primary m-4' name='add-team' ty3pe='submit'>Adicionar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



  <?php include('includes/footer.php'); ?>