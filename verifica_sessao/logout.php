<?php
session_start();
session_destroy();
session_regenerate_id(true);
session_start();
header('Location: ../index.php');
exit();