<?php
require __DIR__ . '/authcore/auth.php';
$login = getUserLogin();
if ($login === null):
    header('Location: /kursach/authcore/login.php');
else:
    header('Location: /kursach/main.php');
endif; ?>
