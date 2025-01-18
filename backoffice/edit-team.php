
<?php 
    require_once "controller/checklogin.php";

    include('includes/header.php'); 

    include('includes/sidebar.php'); 

    
    $team_id = isset($_GET["n"]) ? $_GET["n"] : '';
  
// VIEW TEAM
    $query = $db->prepare("SELECT *, t.name as tname, tr.name as trname, t.torder as ttorder FROM team as t INNER JOIN team_roles as tr ON tr.role_id = t.tag WHERE t.team_id = :team_id");

    $query->bindParam( ":team_id",  $param_team_id, PDO::PARAM_INT );

	$param_team_id = $team_id;

    $query->execute();

    $member = $query->fetch( PDO::FETCH_ASSOC );

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
                        <h6 class="h2 text-white d-inline-block mb-0">Editar Membro - <?= $member["name"]; ?></h6>
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
                                        <input type="text" name="name" class="form-control" value="<?= $member["tname"]; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Título do Cargo</label>
                                        <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1" name="tag">
                                            <option selected value="<?= $member["tag"]; ?>">- <?= $member["trname"]; ?></option>
                                            <?php foreach($teamroles as $role) : ?>
                                                <option value="<?= $role["role_id"]; ?>"><?= $role["name"]; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Cargo</label>
                                        <input type="text" name="role" class="form-control" value="<?= $member["role"]; ?>" >
                                    </div>
                                    <div class="form-group">
                                        <label>Ordem</label>
                                        <input type="number" min="0" name="torder" class="form-control date-w" value="<?= $member["ttorder"]; ?>" required>
                                    </div>
                                    <input type='hidden' name='team_id' value='<?= $member["team_id"];?>'>
                                    <button class='btn btn-primary m-4' name='edit-team' ty3pe='submit'>Editar</button>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <h2 class="mb-4 mt-4">Editar Imagem</h2>
                        <div class="row ml-2 mr-2">
                            <div class="col-lg-4 col-md-12 col-sm-12 m-0 p-0">
                                <?php if(!empty($member["src"])) : ?>
                                    <img class='w-75 pt-3 pb-3' src='../<?= $member['folder']; ?>' alt='<?= $member['tname']?>' />
                                <?php endif; ?>
                                <form action="controller/edit-team.php" method="post" enctype="multipart/form-data">
                                    <div id='change-img' class='form-group mt-3'>
                                        <input type='file' class='form-control img-alert' name='newimg' required />
                                        <div class="mt-3">
                                            <input type='hidden' name='oldimg' value='<?= $member['src']; ?>'>
                                            <input type='hidden' name='team_id' value='<?= $member['team_id']?>'>
                                            <button class='btn btn-primary m-4' name='edit-img' type='submit'>Editar</button>
                                            <button class='btn btn-danger' type="button" data-toggle='modal' data-id='<?= $member["team_id"]; ?>' data-src='<?= $member["src"]; ?>' data-target='#deleteMemberimg'>Apagar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal-->
        <div class="modal fade" id="deleteMemberimg" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="deleteMemberimgLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteMemberimgLabel">Apagar</h5>
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
                    <button type="button" class="btn btn-danger delete-memberimg">Apagar</button>
                </div>
            </div>
        </div>
    </div> 



  <?php include('includes/footer.php'); ?>