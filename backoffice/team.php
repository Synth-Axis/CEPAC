
<?php 
    require_once "controller/checklogin.php";

    include('includes/header.php'); 

    include('includes/sidebar.php'); 

    
    // VIEW TEAM
    $query = $db->prepare("SELECT *, t.name as tname, tr.name as trname, t.torder as ttorder FROM team as t INNER JOIN team_roles as tr ON t.tag = tr.role_id ORDER BY t.team_id ASC");
    $query ->execute();
    $team = $query->fetchAll( PDO::FETCH_ASSOC ); 
    


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
                            <h6 class="h2 text-white d-inline-block mb-0">Equipa</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-body border-0">
                            <div class="d-flex flex-row justify-content-end">
                                <a class='btn btn-primary mb-3 mr-3' href="add-team.php">Adicionar Membro</a>
                            </div>
                            <div class="row ml-2 mr-2 d-flex justify-content-center">
                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Nº</th>
                                                <th scope="col">Nome</th>
                                                <th scope="col">Títutlo do Cargo</th>
                                                <th scope="col">Cargo</th>
                                                <th scope="col">Ordem</th>
                                                <th scope="col">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            <?php foreach($team as $member) : ?>
                                                <tr>
                                                    <td>
                                                        <?= $member["team_id"]; ?>
                                                    </td>
                                                    <td>
                                                        <?= $member["tname"]; ?>
                                                    </td>
                                                    <td>
                                                        <?= $member["trname"]; ?>
                                                    </td>
                                                    <td>
                                                        <?= $member["role"]; ?>
                                                    </td>
                                                    <td>
                                                        <?= $member["ttorder"]; ?>
                                                    </td>
                                                    <td>
                                                        <a class='btn btn-primary' href="edit-team.php?n=<?= $member["team_id"]; ?>">Editar</a>
                                                        <button class='btn btn-danger' type="button" data-toggle='modal' data-id='<?= $member["team_id"]; ?>' data-src='<?= $member["src"]; ?>' data-target='#deleteMember'>Apagar</button>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal-->
            <div class="modal fade" id="deleteMember" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="deleteMemberLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteMemberLabel">Apagar</h5>
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
                            <button type="button" class="btn btn-danger delete-member">Apagar</button>
                        </div>
                    </div>
                </div>
            </div> 

  <?php include('includes/footer.php'); ?>