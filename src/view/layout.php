<!DOCTYPE html>
<html lang="eng">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
    <title>Planner - <?php echo $title; ?></title>
    <?php echo $css;?>
  </head>
  <body>

    <div class="header__wrapper">
      <header class="header">
          <h1 class="header__title"> <span class="header__title--small">Hello,</span> <br> Lien</h1>
      </header>

      <nav class="nav">
        <ul class="menu">
          <li class="menu__item menu__item--home menu__item--active">
            <a class="" href="index.php"><img srcset="./assets/img/home.svg 25w" sizes="25px" src="./assets/img/home.svg" alt="Home icon"></a>
          </li>
          <li class="menu__item menu__item--home menu__item--active">
            <a class="" href="index.php"><img srcset="./assets/img/profile.svg 25w" sizes="25px" src="./assets/img/profile.svg" alt="profile icon"></a>
          </li>
          <li class="menu__item menu__item--home menu__item--active">
            <a class="" href="index.php"><img srcset="./assets/img/settings.svg 25w" sizes="25px" src="./assets/img/settings.svg" alt="settings icon"></a>
          </li>
        </ul>
      </nav>

      <section class="hours">
        <h2 class="hidden">Sport Hours</h2>
        <div class="hours__wrapper hours__wrapper--done">
          <span class="hours__subtitle">Hours of sport done</span>
          <span class="hours__amount">
            <span>3h</span>
            <span>30mins</span>
          </span>
        </div>

        <div class="hours__wrapper hours__wrapper--todo">
          <span class="hours__subtitle">Hours left to plan</span>
          <span class="hours__amount">
            <span>6h</span>
            <span>30mins</span>
          </span>
        <div>
      </section>
    </div>

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
