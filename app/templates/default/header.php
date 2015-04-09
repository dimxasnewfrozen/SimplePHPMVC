<!DOCTYPE html>
<html lang="<?php echo LANGUAGE_CODE; ?>">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $data['title'].' - '.SITETITLE; ?></title>

    <!-- CSS -->
	<?php
		helpers\assets::css(array(
			helpers\url::base() . 'css/bootstrap.css',
            helpers\url::base() . 'css/font-awesome.min.css',
            helpers\url::base() . 'css/main.css',
		))
	?>

    <!-- Custom Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Black+Ops+One' rel='stylesheet' type='text/css'>
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Fixed navbar -->
<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo DIR;?>">My App</a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li <?php if ($data['page'] == 'home') echo 'class="active"'; ?>><a href="<?php echo DIR;?>">HOME</a></li>
        <li <?php if ($data['page'] == 'about') echo 'class="active"'; ?>  ><a href="<?php echo DIR;?>about">ABOUT</a></li>

        <?php
        if ($data['user_id'] != "")
        {
            ?>
                <li><a href="<?php echo DIR;?>logout">SIGNOUT</a></li>
            <?php
        }
        else 
        {
            ?>
                <li <?php if ($data['page'] == 'signin') echo 'class="active"'; ?> ><a href="<?php echo DIR;?>login">SIGNIN</a></li>
                <li <?php if ($data['page'] == 'signup') echo 'class="active"'; ?> ><a href="<?php echo DIR;?>signup">CREATE ACCOUNT</a></li>
            <?php
        }
        ?>

      </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>
