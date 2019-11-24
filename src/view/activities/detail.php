<?php
  $id = $_GET['id'];
?>

<div class="detail__wrapper">

  <div class="detail__back">
    <a class="" href="index.php">Back to overview</a>
  </div>

  <section class="activity__details">

    <div class="details__main">
      <div class="details__main__wrapper">
        <h2 class="detail__sport"><?php echo $activity['sport']; ?></h2>
        <p class="detail__date"><?php echo strftime("%a %d %B", strtotime($activity['date'])); ?> </p>
        <p class="detail__time"><?php echo strftime("%H:%M", strtotime($activity['starthour'])); ?> - <?php echo strftime("%H:%M", strtotime($activity['endhour'])); ?></p>
        <p class="detail__location"><?php echo $activity['location']; ?><p>
      </div>

      <div class="details__img">
        <img srcset="<?php echo $activity['sport_icon']; ?> 90w" sizes="90px" src="<?php echo $activity['sport_icon']; ?>" alt="Kickbox gloves icon">
        <p><?php echo $activity['sport']; ?></p>
      </div>
    </div>

    <section class="details_sub">
      <h3 class="detail__subtitle">Overview details</h3>

      <h4 class="overview__title">With</h4>
      <div class="friends__wrapper">
        <?php foreach ($friends as $friend): ?>
          <p class="overview__focus"><?php echo $friend['firstname']; ?></p>
        <?php endforeach; ?>
      </div>

      <h4 class="overview__title">Intensity</h4>
      <p class="overview__focus"><?php echo $activity['intensity']; ?></p>


      <h4 class="overview__title">Focus</h4>
      <div class="focus__wrapper">
        <?php foreach ($focuses as $focus): ?>
          <p class="overview__focus"><?php echo $focus['name']; ?></p>
        <?php endforeach; ?>
      </div>
    </section>

    <div class="details__buttons">
      <a class="btn__detail btn__edit" href="index.php?page=add-activity">edit</a>
      <a class="btn__detail btn__delete" href="index.php?page=detail&id=<?php echo $activity['id']; ?>&action=delete_activity">delete</a>
    </div>
  </section>

</div>
