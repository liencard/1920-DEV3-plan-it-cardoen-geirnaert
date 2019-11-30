<section class="activities">

  <h2 class="activities__title">Planned Tasks</h2>

  <?php foreach ($sortedActivities as $date => $activitiesGroup): ?>
    <?php if($date == date("Y/m/d")): ?>
      <h3 class="activities__day">Today</h3>
    <?php else: ?>
      <h3 class="activities__day"><?php echo strftime("%a %d %B", strtotime($date)); ?></h3>
    <?php endif; ?>

    <div class="activites__day__wrapper">
      <ul class="activities__list">
        <?php foreach ($activitiesGroup as $activity): ?>
          <li class="activity">
            <a class="activity__button" href="index.php?page=detail&id=<?php echo $activity['activity_id']; ?>">
              <?php echo $activity['sport_icon']; ?>
              <span class="activity__button__wrapper">
                <span class="activity__button__time"><?php echo strftime("%H:%M", strtotime($activity['starthour'])); ?> - <?php echo strftime("%H:%M", strtotime($activity['endhour'])); ?></span>
                <span class="activity__button__name"><?php echo $activity['sport']; ?></span>
              </span>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endforeach; ?>

  <!-- Template -->
  <!-- <h3 class="activities__day">Tomorrow</h3>
  <div class="activites__day__wrapper">
    <ul class="activities__list">
      <li class="activity">
        <a class="activity__button" href="index.php?page=detail">
          <img srcset="./assets/img/kickbox.svg 60w" sizes="40px" src="./assets/img/kickbox.svg" alt="Kickbox gloves icon">
          <span class="activity__button__wrapper">
            <span class="activity__button__time">18:00 - 19:00</span>
            <span class="activity__button__name">Kickbox</span>
          </span>
        </a>
      </li>
    </ul>
  </div> -->

  <a class="add__activity" href="index.php?page=add-activity">+</a>

<section>
