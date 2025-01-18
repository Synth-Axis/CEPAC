
<?php 
    require_once "controller/checklogin.php";

    include('includes/header.php'); 

    include('includes/sidebar.php'); 

    if(isset($_POST['reset']) ){
        $_SESSION['records-limit4'] = 15;
    }

    // PAGINATION
    if(!isset($_POST['records-limit4'])){
        $_POST['records-limit4'] = 15;
    } else {
        $_SESSION['records-limit4'] = $_POST['records-limit4'];
    }

    if(empty($_SESSION['records-limit4']) || !isset($_SESSION["records-limit4"])){
        $_SESSION['records-limit4'] = 15;
    } 

    // Dynamic limit
    $limit = isset($_SESSION['records-limit4']) ? $_SESSION['records-limit4'] : 15;

    // Get total records
    $sql = $db->query("SELECT count(pr_id) AS id FROM plans_reports")->fetchAll();

    $allRecrods = $sql[0]['id'];

    // Calculate total pages
    $totoalPages = ceil($allRecrods / $limit);

    // Current pagination page number
    $page = (isset($_GET['page']) && is_numeric($_GET['page']) ) ? $_GET['page'] : 1;

    // Offset
    $paginationStart = ($page - 1) * $limit;

    // VIEW DOCS
    $docs = $db->query("SELECT * FROM plans_reports ORDER BY pr_id DESC LIMIT $paginationStart, $limit ")->fetchAll();

    // Prev + Next
    $prev = $page - 1;
    $next = $page + 1;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if(isset($_POST["search-docs"])) {

			$title = trim($_POST["title"]);

            $query = $db->prepare("SELECT *, title as title  FROM plans_reports WHERE (YEAR(year) LIKE :title OR title LIKE :title )  ORDER BY pr_id DESC");
        

			$query->bindParam( ":title",  $param_title, PDO::PARAM_STR );

			$param_title = '%'.$title.'%';
			
			$query ->execute();
			
			$docs = $query->fetchAll( PDO::FETCH_ASSOC ); 

		}	
	}

    


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
                            <h6 class="h2 text-white d-inline-block mb-0">Planos e Relatórios</h6>
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
                            <div class="row ml-2 mr-2 mt-4">
                                <form method="post" action="plans-reports.php" class="w-100">
                                    <div class="search-portfolio">
                                        <div class="form-group mr-3 search-name">
                                            <input type="text" name="title" class="form-control" placeholder="Pesquisar por nome ou ano" value="<?php echo isset($title) ? $title : ''; ?>" >
                                        </div>
                                        <div class="form-group mr-3 get-oppbut">
                                            <button type="submit" name="search-docs" class="btn btn-primary">Pesquisar</button>
                                        </div>
                                    </div> 
                                </form>  
                            </div>  
                            <div class="d-flex flex-row justify-content-end">
                                <a class='btn btn-primary mb-3 mr-3' href="add-docs.php">Adicionar Documento</a>
                                <!-- Select dropdown -->
                                <div>
                                    <div class="d-flex flex-row-reverse bd-highlight mb-3">
                                        <form action="plans-reports.php" method="post">
                                            <button name="reset" type='submit' class="btn btn-info btn-sm m-1 ">Reset</button>
                                        </form>
                                        <?php if(!isset($_POST["search-docs"])) : ?> 
                                        <form action="plans-reports.php" method="post" id="limitForm">
                                            <select name="records-limit4" id="records-limit4" class="custom-select selectpicker form-control">
                                                <option disabled selected>Limite</option>
                                                <?php foreach([15,30,60,100] as $limit) : ?>
                                                <option
                                                    <?php if(isset($_SESSION['records-limit4']) && $_SESSION['records-limit4'] == $limit) echo 'selected'; ?>
                                                    value="<?= $limit; ?>">
                                                    <?= $limit; ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </form>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row ml-2 mr-2 d-flex justify-content-center">
                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Nº</th>
                                                <th scope="col">Título</th>
                                                <th scope="col">Data</th>
                                                <th scope="col">Ordem</th>
                                                <th scope="col">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            <?php foreach($docs as $n) : ?>
                                                <tr>
                                                    <td>
                                                        <?= $n["pr_id"]; ?>
                                                    </td>
                                                    <td>
                                                        <?= $n["title"]; ?>
                                                    </td>
                                                    <td>
                                                        <?= $n["year"]; ?>
                                                    </td>
                                                    <td>
                                                        <?= $n["prorder"]; ?>
                                                    </td>
                                                    <td>
                                                        <a class='btn btn-primary' href="edit-docs.php?n=<?= $n["pr_id"]; ?>">Editar</a>
                                                        <button class='btn btn-danger' type="button" data-toggle='modal' data-id='<?= $n["pr_id"]; ?>' data-src='<?= $n["src"]; ?>'   data-target='#deleteDocs'>Apagar</button>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                       <!-- Pagination -->
                                       <?php if(!isset($_POST["search-docs"])) : ?>
                                        <nav aria-label="Page navigation example mt-5" class="nagPag paginationflex " >
                                            <ul class="pagination ">
                                                <li class="page-item <?php if($page <= 1){ echo 'disabled'; } ?>">
                                                    <a class="page-link"
                                                        href="<?php if($page <= 1){ echo '#'; } else { echo "?page=" . $prev; } ?>"> < </a>
                                                </li>
                                
                                                <?php  
                                                    $x=""; 

                                                    for($i = 1; $i <= $totoalPages; $i++ ): 
                                                    
                                                        if($i==$page) {
                                                        
                                                            $x.= "<li class='page-item active'>
                                                                    <a class='page-link' href='plans-reports.php?page=".$i."' '>".$i."</a>
                                                                </li> ";
                                                        } 
                                                        elseif ($i > 3 && $i!=$totoalPages && $i < $totoalPages - 2 ) {
                                                            $x.= "<li class='page-item'>.</li> ";
                                                        }
                                                        else {
                                                            $x.= "<li class='page-item'>
                                                                    <a class='page-link' href='plans-reports.php?page=".$i."'>".$i."</a>
                                                                </li>";
                                                        }
                                                        
                                                    endfor;  
                                                    echo $x;
                                                ?>
                                
                                                <li class="page-item <?php if($page >= $totoalPages) { echo 'disabled'; } ?>">
                                                    <a class="page-link"
                                                        href="<?php if($page >= $totoalPages){ echo '#'; } else {echo "?page=". $next; } ?>"> > </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal-->
            <div class="modal fade" id="deleteDocs" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="deleteDocsLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteDocsLabel">Apagar</h5>
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
                            <button type="button" class="btn btn-danger delete-docs">Apagar</button>
                        </div>
                    </div>
                </div>
            </div> 

  <?php include('includes/footer.php'); ?>