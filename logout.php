<?php
//stops the current browser session aka logging you out
session_start();
session_destroy();
header("Location:index.php");
?>

</body>
</html>



