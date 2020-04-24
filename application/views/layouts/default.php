<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">

        <title><?php echo $title; ?></title>
        <link rel="icon" href="/public/img/icons/favicon.png">
    
        <link rel="stylesheet" href="/public/css/font.css">
        
		<link rel="stylesheet" href="/public/css/style.css">
        <link rel="stylesheet" href="/public/css/head.css">
        <link rel="stylesheet" href="/public/css/mid.css">
        <link rel="stylesheet" href="/public/css/foot.css">
        

        <script src="/public/js/jquery.js"></script>
        <script src="/public/js/ajax.js"></script>
        <script src="/public/js/script.js"></script>
        <script src="/public/js/swal.js"></script>
        <script src="/public/js/font.js"></script>
    </head>
    <body>
    <header>
        <?php require_once 'application/views/header/nav.tpl'; ?>
        <?php require_once 'application/views/header/nav-script.tpl'; ?>
    </header>
    <main>
        <?php echo $content; ?>
    </main>
    <footer> <?php require_once 'application/views/footer/foot.tpl'; ?> </footer>
    </body>
</html>
