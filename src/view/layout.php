<!DOCTYPE html>
<html lang="eng">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
    <title>Planner - <?php echo $title; ?></title>
    <?php /* NEW */ ?>
    <?php echo $css;?>
  </head>
  <body>

  <nav class="nav">
    <ul class="menu">
      <li class="menu__item menu__item--home menu__item--active">
        <img srcset="./assets/img/home.svg 25w" sizes="25px" src="./assets/img/home.svg" alt="Home icon">
      </li>
      <li class="menu__item menu__item--about">
        <img srcset="./assets/img/profile.svg 25w" sizes="25px" src="./assets/img/profile.svg" alt="Profile icon">
      </li>
      <li class="menu__item menu__item--admin">
        <img srcset="./assets/img/profile.svg 25w" sizes="25px" src="./assets/img/profile.svg" alt="Profile icon">
      </li>
      <li class="menu__item menu__item--admin">
        <img srcset="./assets/img/settings.svg 25w" sizes="25px" src="./assets/img/settings.svg" alt="Setting icon">
      </li>
    </ul>
  </nav>


    <main class="layout">
      <?php
        if(!empty($_SESSION['error'])) {
          echo '<div class="error box">' . $_SESSION['error'] . '</div>';
        }
        if(!empty($_SESSION['info'])) {
          echo '<div class="info box">' . $_SESSION['info'] . '</div>';
        }
      ?>
      <?php echo $content;?>
    </main>
    <?php echo $js; ?>
  </body>
</html>
