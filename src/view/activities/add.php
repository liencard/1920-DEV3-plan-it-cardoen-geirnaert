<section class="form">

  <div class="detail__back">
    <a class="" href="index.php">Back to overview</a>
  </div>

  <h2 class="form__title">Plan a new activity</h2>
  <form action="index.php?page=add-activity" method="POST" class="add-activity">
    <input type="hidden" name="action" value="newActivity">

    <div class="add-activity__form-item addactivity__form-item__type">
      <h3 class="add-activity__label">Choose your type of sport</h3>
      <span class="form__errors <?php if(empty($errors['sport'])){ echo "hidden" ; } ?>"><?php if(!empty($errors['sport'])){ echo $errors['sport'];} ?></span>
      <div class="add-activity__options-container">
        <?php foreach ($types as $type): ?>
          <label class="add-activity__option add-activity__option--square">
            <input type="radio" name="type" value="<?php echo $type['id'] ?>">

            <!-- NOG BEKIJKEN -->
            <div class="add-activity__option__container">
              <?php echo $type['icon']; ?>
              <p><?php echo $type['name'] ?></p>
            </div>
          </label>
        <?php endforeach; ?>
      </div>
      <button type="submit" class="btn__detail btn__edit" name="selectType">Select sport</button>
    </div>

    <?php if (!empty($sports)): ?>
      <div class="add-activity__form-item add-activity__form-item__sport">
        <h3 class="add-activity__label">Choose your sport</h3>
        <span class="form__errors <?php if(empty($errors['sport'])){ echo "hidden" ; } ?>"><?php if(!empty($errors['sport'])){ echo $errors['sport'];} ?></span>
        <div class="add-activity__options-container">
          <?php foreach ($sports as $sport): ?>
            <label class="add-activity__option add-activity__option--square">
              <input type="radio" name="sport" value="<?php echo $sport['id']; ?>">
              <div class="add-activity__option__container">
                <?php echo $sport['icon']; ?>
                <p><?php echo $sport['sport']; ?></p>
              </div>
            </label>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="add-activity__form-item add-activity__form-item__date">
        <h3 class="add-activity__label">When do you want to sport?</h3>
        <span class="form__errors <?php if(empty($errors['day'])){ echo "hidden" ; } ?>"><?php if(!empty($errors['day'])){ echo $errors['day'];} ?></span>
        <div class="add-activity__options-container">
          <?php foreach ($days as $day): ?>
            <label class="add-activity__option add-activity__option--date">
              <input type="radio" name="day" value="<?php echo $day; ?>">
              <div class="add-activity__option__container">
                <p class="date--large"><?php echo date("j", $day); ?></>
                <p><?php echo date("D", $day)?></p>
              </div>
            </label>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="add-activity__form-item add-activity__form-item__time">
        <h3 class="add-activity__label">What time will you start?</h3>
        <span class="form__errors <?php if(empty($errors['starthour'])){ echo "hidden" ; } ?>"><?php if(!empty($errors['starthour'])){ echo $errors['starthour'];} ?></span>
        <div class="add-activity__options-container">
          <label class="add-activity__option add-activity__option--time">
            <input type="time" name="starthour" class="input-time" value="13:30">
          </label>
        </div>
      </div>

      <div class="add-activity__form-item add-activity__form-item__duration">
        <h3 class="add-activity__label">How long will you sport?</h3>
        <span class="form__errors <?php if(empty($errors['endhour'])){ echo "hidden" ; } ?>"><?php if(!empty($errors['endhour'])){ echo $errors['endhour'];} ?></span>
        <div class="add-activity__options-container add-activity__option--duration">
          <div class="duration-slider">
            <span class="ds-label">0</span>
            <input type="range" name="duration"  min="0" max="12" value="0" class="ds-range" id="durationTime">
          </div>
          <div class="duration-minmax">
            <span>0h</span>
            <span>0,5h</span>
            <span>1h</span>
            <span>1,5h</span>
            <span>2h</span>
            <span>2,5h</span>
            <span>3h</span>
          </div>
        </div>
      </div>

      <div class="add-activity__form-item add-activity__form-item__location">
        <h3 class="add-activity__label">Where will you sport?</h3>
        <span class="form__errors <?php if(empty($errors['location'])){ echo "hidden" ; } ?>"><?php if(!empty($errors['location'])){ echo $errors['location'];} ?></span>
        <div class="add-activity__options-container">
          <?php foreach ($locations as $location): ?>
            <label class="add-activity__option add-activity__option--location">
              <input type="radio" name="location" value="<?php echo $location['id'] ?>">
              <div class="add-activity__option__container">
                <?php echo $location['icon']; ?>
                <p><?php echo $location['location'] ?></p>
              </div>
            </label>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="add-activity__form-item add-activity__form-item__friends">
        <h3 class="add-activity__label">Who will you take with you?</h3>
        <span class="form__errors <?php if(empty($errors['friends'])){ echo "hidden" ; } ?>"><?php if(!empty($errors['location'])){ echo $errors['location'];} ?></span>
        <div class="friends__bubbles__wrapper">
          <?php foreach($_SESSION['sportFriends'] as $friend)
            { ?>
            <div class="friends__bubble">
              <p> <?php echo $friend; ?> </p>
              <button type="submit" class="delete__bubble" name="removeFriend" value="<?php echo $friend; ?>">x</button>
            </div>
          <?php } ?>
        </div>

        <div class="friends__label__wrapper">
          <label class="friends__label">Name:
              <input type="text" name="nameFriend">
          </label>
          <button type="submit" class="btn__detail btn__addfriend" name="addFriend">+ add friend</button>
        </div>
      </div>

      <div class="add-activity__form-item add-activity__form-item__intensity">
        <h3 class="add-activity__label">What will be the intensity of your sport?</h3>
        <span class="form__errors <?php if(empty($errors['intensity'])){ echo "hidden" ; } ?>"><?php if(!empty($errors['intensity'])){ echo $errors['intensity'];} ?></span>
        <div class="add-activity__options-container">
          <label class="add-activity__option add-activity__option--intensity add-activity__option--intensity--light">
            <input type="radio" name="intensity" value="light">
              <!-- <div class="add-activity__option__container"> -->
                <p>light</p>
              <!-- </div> -->
          </label>
          <label class="add-activity__option add-activity__option--intensity add-activity__option--intensity--medium">
            <input type="radio" name="intensity" value="medium" checked>
              <p>medium</p>
          </label>
          <label class="add-activity__option add-activity__option--intensity add-activity__option--intensity--hard">
            <input type="radio" name="intensity" value="hard">
              <p>hard</p>
            </div>
          </label>
        </div>
      </div>

      <div class="add-activity__form-item add-activity__form-item__focus">
        <h3 class="add-activity__label">Which items do you want to focus on?</h3>
        <span class="form__errors"><?php if(!empty($errors['location'])){ echo $errors['location'];} ?></span>
        <div class="add-activity__options-container">
          <?php foreach ($focuses as $focus): ?>
            <label class="add-activity__option add-activity__option--focus">
              <input type="checkbox" name="focus[]" value="<?php echo $focus['id'] ?>">
              <div class="add-activity__option__container">
                <p><?php echo $focus['name'] ?></p>
              </div>
            </label>
          <?php endforeach; ?>
        </div>
      </div>
      <button type="submit" class="btn__detail btn__edit" name="save">save</button>
      <?php endif; ?>
  </form>
</section>
