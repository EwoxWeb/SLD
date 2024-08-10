<?php include('header.php'); ?>
<script src="js/script.js"></script>

<body>
    <?php
    $pkm = $conn->query("SELECT * FROM pkm where generation=1");
    // $totalPKM1G = $conn->query("SELECT COUNT(*) AS total1G FROM pkm WHERE generation=1")->fetch();
    // $totalPKMObtenue1G = $conn->query("SELECT COUNT(*) AS totalObtenue1G FROM pkm WHERE obtenue =1 AND generation=1")->fetch();
    // $total = intval($totalPKM1G[0]);
    // $obtenue = intval($totalPKMObtenue1G[0]);
    // $pourcentage = ($obtenue / $total) * 100;
    ?>
    <!-- <div class="progress-container">
        <div class="progress-bar" style="width: <?php echo $pourcentage; ?>%;">
            <?php echo round($pourcentage); ?>%
        </div>
    </div><br/> -->
    <?php
    include('fonctionLivingDex.php')
    ?>

    </html>