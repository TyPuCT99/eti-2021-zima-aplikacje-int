<html>
<head>
    <title>
        <?php echo $title ?>
    </title>
</head>
<body>
<h1>Hello APSL!</h1>
<?php if($session->has('user')): ?>
    <h1>Witaj <?php echo $session->get('user');?></h1>
<?php else: ?>
    <form name="loginForm" method="post" action="<?php echo $router->generate('do_login')?>">
        <input type="text" name="login" value="" placeholder="Enter your username here"/>
        <input type="password" name="password" value="" placeholder="Enter your password here"/>

        <button type="submit">Zaloguj</button>
    </form>
<?php endif; ?>

<a href="<?php echo $router->generate('home') ?>">Home Page</a>
<a href="<?php echo $router->generate('body') ?>">BODY Page</a>
<a href="<?php echo $router->generate('article', ['id' => 2]) ?>">Article Page</a>
<?php if ($session->get('user')): ?>
    <a href="<?php echo $router->generate('logout')?>">Logout</a>
<?php endif; ?>

<?php echo $content ?>

<?php echo $session->get('user', 'Anonymous') ?>


</body>
</html>