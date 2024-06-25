<?php include('header.php'); ?>
<script src="js/script.js"></script>
<body>
    <?php
    $pkm = $conn->query("SELECT * FROM pkm where generation=2");
    include('fonctionLivingDex.php')
    ?>
</html>