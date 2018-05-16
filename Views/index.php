
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
         include_once("Controllers/UserController.php");

        $userController = new UserController();

        if (isset($_GET['controller']) && isset($_GET['action'])) {

            $action     = $_GET['action'];
            $userController->{ $action }();
         } else {
            $userController->invoke();
          }

        ?>
    </body>
</html>
