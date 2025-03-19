<header class="bg-gray-800 flex p-8 justify-between items-center">
        <h1 class="text-3xl font-bold text-white">Tarjeta de datos</h1>
        <nav class="flex items-center">
            <?php if(isset($_SESSION['user_id'])):?>
                <img src="<?= $_SESSION['user_avatar'] ?>" alt="Avatar" style="width: 50px; height: 50px; border-radius: 50%;">
                <p class="text-white ml-4"><?= $_SESSION['user_name'] ?></p>
                <a href="logout.php" class="text-red ml-4">Cerrar Sesión</a>
                <?php if($_SESSION['user_rol'] === 'admin'): ?>
                    <a href="admin.php" class="text-white ml-4"><img src="https://cdn-icons-png.flaticon.com/512/5742/5742154.png" alt=""></a>
                    <a href="settings.php" class="text-white ml-4"><i class="ti-settings"></i></a>
                <?php endif; ?>
            <?php endif; ?>
        </nav>
    </header>

    <?php if(isset($_SESSION['user_id'])): ?>
        <div class="container mt-4">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Información del Usuario</h2>
                    <p class="card-text"><strong>Nombre:</strong> <?= $_SESSION['user_name'] ?></p>
                    <p class="card-text"><strong>Email:</strong> <?= $_SESSION['user_email'] ?></p>
                    <p class="card-text"><strong>Rol:</strong> <?= $_SESSION['user_rol'] ?></p>
                </div>
            </div>
        </div>
    <?php endif; ?>