
<body>
<link rel="stylesheet" href="public/css/style.css">

    <?php 
    
    require './vendor/autoload.php';
    include_once __DIR__ . '/App/View/Main/header.php';

    $q = filter_input(INPUT_SERVER, 'QUERY_STRING');
    
    switch ($q) {
        case "create":
            
        include_once './App/View/User/create.php';
            break;
        
        default:
            include_once './App/View/Home/index.php';
        break;
    }
?>
</body>
</html>