<section class="activities">
  <h2 class="activities__title">Planned Tasks</h2>

  <h3 class="activities__day">Today</h3>
    <div class="activites__day__wrapper">
      <!-- Template -->
      <ul class="activities__list">
        <?php foreach ($activities as $activity): ?>
        <li class="activity">
          <a class="activity__button" href="index.php?page=detail&id=<?php echo $activity['id']; ?>">
            <img srcset="<?php echo $activity['icon-sport']; ?> 60w" sizes="40px" src="<?php echo $activity['icon-sport']; ?>" alt="Kickbox gloves icon">
            <span class="activity__button__wrapper">
              <span class="activity__button__time"><?php echo strftime("%H:%M", strtotime($activity['starthour'])); ?> - <?php echo strftime("%H:%M", strtotime($activity['endhour'])); ?></span>
              <span class="activity__button__name"><?php echo $activity['sport']; ?></span>
            </span>
          </a>
        </li>
        <?php endforeach; ?>

      </ul>
    </div>

  <h3 class="activities__day">Tomorrow</h3>
    <div class="activites__day__wrapper">
    <!-- Template -->
    <ul class="activities__list">
      <li class="activity">
        <a class="activity__button" href="index.php?page=detail">
          <img srcset="./assets/img/kickbox.svg 40w" sizes="40px" src="./assets/img/kickbox.svg" alt="Kickbox gloves icon">
          <span class="activity__button__wrapper">
            <span class="activity__button__time">18:00 - 19:00</span>
            <span class="activity__button__name">Kickbox</span>
          </span>
        </a>
      </li>
    </ul>
  </div>

  <a class="add__activity" href="index.php?page=add-activity">+</a>

<section>
