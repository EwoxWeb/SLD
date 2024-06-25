<?php include('header.php'); ?>
<script src="js/script.js"></script>
<body>
    <?php
    $pkm = $conn->query("SELECT * FROM pkm where generation=8");
    include('fonctionLivingDex.php')
    ?>
</html>