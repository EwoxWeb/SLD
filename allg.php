<?php include('header.php'); ?>
<script src="js/script.js"></script>
<body>
    <?php
    $pkm = $conn->query("SELECT * FROM pkm order by id_pkm");
    include('fonctionLivingDex.php')
    ?>
</html>