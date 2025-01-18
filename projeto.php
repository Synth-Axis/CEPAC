<?php

$project_id = isset($_GET["n"]) ? $_GET["n"] : '';
$cookies = isset($_GET["cookies"]) ? $_GET["cookies"] : '';
print_r($cookies);

if (!empty($cookies)) {
    header("Location: inicio.php");
}

?>
<?php include 'includes/head.php'; ?>
<style>
    .title-strong {
        font-weight: bold;
        color: #d1b05f;
        font-size: 1.3rem;
    }

    li {
        font-size: 1.3rem;
    }

    b {
        font-weight: bold;
    }
</style>
<div id="grey">
    <?php include 'includes/header.php';




    // VIEW TEAM
    $query = $db->prepare("SELECT * FROM projects WHERE project_id = :project_id");

    $query->bindParam(":project_id",  $param_project_id, PDO::PARAM_INT);

    $param_project_id = $project_id;

    $query->execute();

    $projects = $query->fetch(PDO::FETCH_ASSOC);

    if (!empty($cookies)) {
        header("Location: home.php");
    }


    ?>
</div>

<section id="article" class="top-extra">
    <div class="container">
        <div class="bigtitle" style="display: flex;flex-direction: column; justify-content: center; align-items: center;">
            <h1><?= $projects["title"]; ?></h1>
            <p><?= $projects["text"]; ?></p>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>