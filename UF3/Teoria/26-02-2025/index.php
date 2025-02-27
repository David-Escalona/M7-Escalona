<!DOCTYPE html>
<html lang="en">
<head>
    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!-- theme meta -->
    <meta name="theme-name" content="agen" />
    
    <!-- ** Plugins Needed for the Project ** -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
    <!-- slick slider -->
    <link rel="stylesheet" href="plugins/slick/slick.css">
    <!-- themefy-icon -->
    <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
    <!-- venobox css -->
    <link rel="stylesheet" href="plugins/venobox/venobox.css">
    <!-- card slider -->
    <link rel="stylesheet" href="plugins/card-slider/css/style.css">

    <!-- Main Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    
    <!--Favicon-->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <title>Document</title>
</head>
<body>
    
    <header class="bg-gray-800 flex p-8 justify-center items-center">
        <h1 class="text-3xl font-bold text.white">Tarjeta de datos</h1>
        <nav class="flex items-center">
            <?php if(isset($_SESSION['user_id'])):?>
                <img src="<?= $_SESSION['user_avatar'] ?>" alt="">
                <p><?= $_SESSION['user_name'] ?></p>
                <a href="logout.php" class="text-white ml-4">Cerrar Sessión</a>
                <?php if($_SESSION['user_rol'] === 'admin'): ?>
                    <a href="admin.php" class="text-white ml-4"><img src="https://phpmyadmin.alwaysdata.com/phpmyadmin/themes/pmahomme/img/logo_left.png" alt=""></a>
                <?php endif; ?>
            <?php endif; ?>
        </nav>
    </header>

    <?php include 'login.php'; ?>
    <?php include 'register.php'; ?>

</body>
</html>