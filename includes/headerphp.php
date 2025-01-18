<?php

require_once "db/config.php";

// VIEW SLIDER HOME
$query = $db->prepare("SELECT * FROM images WHERE tag = 'hslider' ORDER BY iorder ASC ");
$query->execute();
$homeslider = $query->fetchAll(PDO::FETCH_ASSOC);

// VIEW HOME TEXT
$query = $db->prepare("SELECT * FROM content ");
$query->execute();
$content = $query->fetchAll(PDO::FETCH_ASSOC);

// VIEW FOOTER IMAGES
$query = $db->prepare("SELECT * FROM images  WHERE tag = 'footer' ");
$query->execute();
$footerimages = $query->fetchAll(PDO::FETCH_ASSOC);

// VIEW DESTAQUE
$query = $db->prepare("SELECT * FROM news  WHERE highlighted = '1' ORDER BY tdate DESC");
$query->execute();
$destaque = $query->fetchAll(PDO::FETCH_ASSOC);

// VIEW ALL NEWS
$year = isset($_GET['year']) && !empty($_GET['year']) ? $_GET['year'] : null;
$month = isset($_GET['month']) && !empty($_GET['month']) ? $_GET['month'] : null;
$search = isset($_GET['search']) && !empty($_GET['search']) ? $_GET['search'] : null;

$queryStr = "SELECT * FROM news";
$params = [];

if ($year || $month || $search) {
    $queryStr .= " WHERE";
    if ($year) {
        $queryStr .= " YEAR(tdate) = :year";
        $params[':year'] = $year;
    }
    if ($month) {
        if ($year) $queryStr .= " AND";
        $queryStr .= " MONTH(tdate) = :month";
        $params[':month'] = $month;
    }
    if ($search) {
        if ($year || $month) $queryStr .= " AND";
        $queryStr .= " title LIKE :search";
        $params[':search'] = "%" . $search . "%";
    }
}

$queryStr .= " ORDER BY tdate DESC";
$query = $db->prepare($queryStr);
$query->execute($params);
$allnews = $query->fetchAll(PDO::FETCH_ASSOC);

// VIEW 10 NEWS
$query = $db->prepare("SELECT * FROM news ORDER BY tdate DESC LIMIT 10 ");
$query->execute();
$tennews = $query->fetchAll(PDO::FETCH_ASSOC);

// VIEW ABOUT IMAGES
$query = $db->prepare("SELECT * FROM images  WHERE tag = 'about' ");
$query->execute();
$aboutimages = $query->fetchAll(PDO::FETCH_ASSOC);

// VIEW ABOUT SLIDER
$query = $db->prepare("SELECT * FROM about_slider ORDER BY aorder ASC ");
$query->execute();
$aboutslider = $query->fetchAll(PDO::FETCH_ASSOC);

// VIEW TEAM 1
$query = $db->prepare("SELECT * FROM team WHERE tag = 1 ORDER BY torder ");
$query->execute();
$team1 = $query->fetchAll(PDO::FETCH_ASSOC);

// VIEW TEAM 2
$query = $db->prepare("SELECT * FROM team WHERE tag = 2 ORDER BY torder");
$query->execute();
$team2 = $query->fetchAll(PDO::FETCH_ASSOC);

// VIEW TEAM 3
$query = $db->prepare("SELECT * FROM team WHERE tag = 3 ORDER BY torder ");
$query->execute();
$team3 = $query->fetchAll(PDO::FETCH_ASSOC);

// VIEW TEAM 4
$query = $db->prepare("SELECT * FROM team WHERE tag = 4 ORDER BY torder ");
$query->execute();
$team4 = $query->fetchAll(PDO::FETCH_ASSOC);

// VIEW TEAM 5
$query = $db->prepare("SELECT * FROM team WHERE tag = 5 ORDER BY torder ");
$query->execute();
$team5 = $query->fetchAll(PDO::FETCH_ASSOC);

// VIEW TEAM 6
$query = $db->prepare("SELECT * FROM team WHERE tag = 6 ORDER BY torder ");
$query->execute();
$team6 = $query->fetchAll(PDO::FETCH_ASSOC);

// VIEW TEAM 7
$query = $db->prepare("SELECT * FROM team WHERE tag = 7 ORDER BY torder ");
$query->execute();
$team7 = $query->fetchAll(PDO::FETCH_ASSOC);

// VIEW TEAM 8
$query = $db->prepare("SELECT * FROM team WHERE tag = 8 ORDER BY torder ");
$query->execute();
$team8 = $query->fetchAll(PDO::FETCH_ASSOC);

// VIEW TEAM 9
$query = $db->prepare("SELECT * FROM team WHERE tag = 9 ORDER BY torder ");
$query->execute();
$team9 = $query->fetchAll(PDO::FETCH_ASSOC);

// VIEW TEAM 10
$query = $db->prepare("SELECT * FROM team WHERE tag = 10 ORDER BY torder ");
$query->execute();
$team10 = $query->fetchAll(PDO::FETCH_ASSOC);

// VIEW TEAM 11
$query = $db->prepare("SELECT * FROM team WHERE tag = 11 ORDER BY torder ");
$query->execute();
$team11 = $query->fetchAll(PDO::FETCH_ASSOC);

// VIEW TEAM 12
$query = $db->prepare("SELECT * FROM team WHERE tag = 12 ORDER BY torder ");
$query->execute();
$team12 = $query->fetchAll(PDO::FETCH_ASSOC);


// VIEW ROLES TITLE
$query = $db->prepare("SELECT * FROM team_roles ");
$query->execute();
$teamroles = $query->fetchAll(PDO::FETCH_ASSOC);

// VIEW PDF
$query = $db->prepare("SELECT * FROM docs WHERE tag = 'cc' ");
$query->execute();
$docs = $query->fetchAll(PDO::FETCH_ASSOC);

// VIEW ABOUT IMG
$query = $db->prepare("SELECT * FROM images WHERE tag = 'cc' ");
$query->execute();
$ccimgs = $query->fetch(PDO::FETCH_ASSOC);


// VIEW DOCS PDF
$query = $db->prepare("SELECT * FROM docs WHERE tag = 'docof' ");
$query->execute();
$docsof = $query->fetchAll(PDO::FETCH_ASSOC);

// VIEW DOCS IMG
$query = $db->prepare("SELECT * FROM images WHERE tag = 'docof' ");
$query->execute();
$docsimgs = $query->fetchAll(PDO::FETCH_ASSOC);

// VIEW PR DOCS
$query = $db->prepare("SELECT DISTINCT year FROM plans_reports ORDER BY year DESC");
$query->execute();
$pr_year = $query->fetchAll(PDO::FETCH_ASSOC);

// VIEW NETWORK IMAGES
$query = $db->prepare("SELECT * FROM networks ORDER BY norder ASC ");
$query->execute();
$networksimages = $query->fetchAll(PDO::FETCH_ASSOC);

// VIEW NETWORK TEXT
$query = $db->prepare("SELECT * FROM networks_text ORDER BY ntorder ASC ");
$query->execute();
$ntcontent = $query->fetchAll(PDO::FETCH_ASSOC);

// VIEW PARTNERSHIPS IMAGES
$query = $db->prepare("SELECT * FROM partnerships ORDER BY norder ASC ");
$query->execute();
$parnershipsimages = $query->fetchAll(PDO::FETCH_ASSOC);

// VIEW PARTNERSHIPS TEXT
$query = $db->prepare("SELECT * FROM partnerships_text ORDER BY ntorder ASC ");
$query->execute();
$ptcontent = $query->fetchAll(PDO::FETCH_ASSOC);

// VIEW AAS SLIDER
$query = $db->prepare("SELECT * FROM images WHERE tag = 'aas' ORDER BY iorder ASC ");
$query->execute();
$aasimages = $query->fetchAll(PDO::FETCH_ASSOC);

// VIEW IPF SLIDER
$query = $db->prepare("SELECT * FROM images WHERE tag = 'ipf' ORDER BY iorder ASC ");
$query->execute();
$ipfimages = $query->fetchAll(PDO::FETCH_ASSOC);

// VIEW CS SLIDER
$query = $db->prepare("SELECT * FROM images WHERE tag = 'cs' ORDER BY iorder ASC ");
$query->execute();
$csimages = $query->fetchAll(PDO::FETCH_ASSOC);

// VIEW BBU SLIDER
$query = $db->prepare("SELECT * FROM images WHERE tag = 'bbu' ORDER BY iorder ASC ");
$query->execute();
$bbuimages = $query->fetchAll(PDO::FETCH_ASSOC);


// VIEW MS SLIDER
$query = $db->prepare("SELECT * FROM images WHERE tag = 'ms' ORDER BY iorder ASC ");
$query->execute();
$msimages = $query->fetchAll(PDO::FETCH_ASSOC);

// VIEW SV SLIDER
$query = $db->prepare("SELECT * FROM images WHERE tag = 'sv' ORDER BY iorder ASC ");
$query->execute();
$svimages = $query->fetchAll(PDO::FETCH_ASSOC);

// VIEW CM SLIDER
$query = $db->prepare("SELECT * FROM images WHERE tag = 'cm' ORDER BY iorder ASC ");
$query->execute();
$cmimages = $query->fetchAll(PDO::FETCH_ASSOC);

// VIEW PJ SLIDER
$query = $db->prepare("SELECT * FROM images WHERE tag = 'pj' ORDER BY iorder ASC ");
$query->execute();
$pjimages = $query->fetchAll(PDO::FETCH_ASSOC);

// VIEW PROJECTS
$query = $db->prepare("SELECT * FROM projects ORDER BY porder ASC ");
$query->execute();
$projects = $query->fetchAll(PDO::FETCH_ASSOC);
