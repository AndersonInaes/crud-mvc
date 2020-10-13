
<body>
<link rel="stylesheet" href="public/css/style.css">

    <?php 
    
    require './vendor/autoload.php';
    include_once __DIR__ . '/App/View/Main/header.php';

    $q = filter_input(INPUT_SERVER, 'QUERY_STRING');
    
    switch ($q) {
        case 'u=create':
            
        include_once './App/View/User/create.php';
            break;
        case 'u=update':
            include_once './App/View/User/update.php';
        break;
        
        case 'u=delete':
            include_once './App/View/User/delete.php';
        break;
        
        default:
            include_once './App/View/Home/index.php';
        break;
    }
?>
</body>
</html>