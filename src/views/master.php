<!DOCTYPE html>
<html lang="<?= LANGUAGE ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>

    <link rel="icon" href="<?= showIco() ?>" type="image/x-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- font-awesome -->
    <script src="https://kit.fontawesome.com/b019fa643e.js" crossorigin="anonymous"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="/assets/css/styles.css">

    <!-- Language -->
    <script src="<?= "/translations/" . LANGUAGE . ".js" ?>"></script>
    
</head>

<body>

    <?php 

        if (strpos($view, 'adminView/') === 0) {
            require __DIR__ . "/adminView/layout.php";

        } elseif (strpos($view, 'publicView/') === 0) {
            require __DIR__ . "/publicView/layout.php";

        } else if($view === "adminView/loginView.php"){
            require __DIR__ . "/adminView/loginAdmin.php";
            
        } else if($view === "/publicView/maintenance.php") {
            require __DIR__ . "/publicView/maintenance.php";
        } else {
            echo "Layout not found for the specified view.";
        }
    ?>

    <div id="alertaMsg" class="alert_content">
        <div class="alerta">
            <i class="icon_alerta bi"></i>
            <div class="description_alert"></div>
        </div>
    </div>

    <div class="toast-container position-fixed top-0 end-0 p-3" id="toastContainer">
        <!-- Toasts serão adicionados aqui -->
    </div>

    <div id="spinnerLoadPage" class="spinner position-absolute top-0">
        <div class="lds-ring">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- Bootstrap JavaScript  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Custom JavaScript -->
    <script src="/assets/js/scripts.js"></script>
    <script src="/assets/js/validations.js"></script>
</body>

</html>