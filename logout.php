<?php
session_start();
session_destroy();
session_unset();
echo "<script>
        alert('Berhasil Logout!');
        document.location.href = 'login.php';
      </script>";
?>