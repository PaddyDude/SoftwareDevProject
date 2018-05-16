
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
         include_once("Controllers/UserController.php");

        $controller = new Controller();

        if (isset($_GET['controller']) && isset($_GET['action']) ) {

            $action     = $_GET['action'];
            if(isset($_GET['cid']))
            {
                $controller->{ $action }($_GET['cid']);
            }
            else {
                    $controller->{ $action }();
            }


         } else {
            $controller->invoke();
          }

        ?>
    </body>
</html>
