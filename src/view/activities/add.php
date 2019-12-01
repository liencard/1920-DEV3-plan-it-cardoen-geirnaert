<section class="addactivity">

  <div class="backbutton">
    <a class="" href="index.php">Back to overview</a>
  </div>

  <h2 class="addactivity__title">Plan a new activity</h2>

  <form action="index.php?page=add-activity" method="POST" class="addactivity__form">
    <input type="hidden" name="action" value="newActivity">

    <section class="form__item form__item--type">
      <h3 class="form__label">Choose your type of sport</h3>

      <?php if (!empty($errors['type'])): ?>
        <span class="form__errors"><?php echo $errors['type'] ?></span>
      <?php endif; ?>

      <div class="form__item__options">
        <?php foreach ($types as $type): ?>
          <label class="options__item">
            <?php if (!empty($_SESSION['newActivity']['type_id']) && $_SESSION['newActivity']['type_id'] == $type['id']): ?>
              <input type="radio" class="options__item__input" name="type" value="<?php echo $type['id'] ?>" checked>
            <?php else: ?>
              <input type="radio" class="options__item__input" name="type" value="<?php echo $type['id'] ?>">
            <?php endif; ?>

            <div class="options__item__wrapper">
              <?php echo $type['icon']; ?>
              <p class="options__item__p"><?php echo $type['name'] ?></p>
            </div>
          </label>
        <?php endforeach; ?>
      </div>
      <button type="submit" class="btn" name="selectType">Select sport</button>
    </section>

    <?php if (!empty($sports) || !empty($_SESSION['newActivity']['sport_id'])): ?>
      <section class="form__item form__item--sport">
        <h3 class="form__label">Choose your sport</h3>

        <?php if (!empty($errors['sport'])): ?>
          <span class="form__errors"><?php echo $errors['sport'] ?></span>
        <?php endif; ?>

        <div class="form__item__options">
          <?php if (!empty($sports)): ?>
            <?php foreach ($sports as $sport): ?>
              <label class="options__item">
                <?php if (!empty($_SESSION['newActivity']['sport_id']) && $_SESSION['newActivity']['sport_id'] == $sport['id']): ?>
                  <input type="radio" class="options__item__input" name="sport" value="<?php echo $sport['id'] ?>" checked>
                <?php else: ?>
                  <input type="radio" class="options__item__input" name="sport" value="<?php echo $sport['id'] ?>">
                <?php endif; ?>

                <div class="options__item__wrapper">
                  <?php echo $sport['icon']; ?>
                  <p class="options__item__p"><?php echo $sport['sport']; ?></p>
                </div>
              </label>
            <?php endforeach; ?>
          <?php else: ?>
            <?php foreach ($_SESSION['newActivity']['sports'] as $sport): ?>
              <label class="options__item">
                <?php if (!empty($_SESSION['newActivity']['sport_id']) && $_SESSION['newActivity']['sport_id'] == $sport['id']): ?>
                  <input type="radio" class="options__item__input" name="sport" value="<?php echo $sport['id'] ?>" checked>
                <?php else: ?>
                  <input type="radio" class="options__item__input" name="sport" value="<?php echo $sport['id'] ?>">
                <?php endif; ?>

                <div class="options__item__wrapper">
                  <?php echo $sport['icon']; ?>
                  <p class="options__item__p"><?php echo $sport['sport']; ?></p>
                </div>
              </label>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </section>

      <section class="form__item form__item--date">
        <h3 class="form__label">When do you want to sport?</h3>

        <?php if (!empty($errors['day'])): ?>
          <span class="form__errors"><?php echo $errors['day'] ?></span>
        <?php endif; ?>

        <div class="form__item__options">
          <?php foreach ($days as $day): ?>
            <label class="options__item">
              <?php if (!empty($_SESSION['newActivity']['day']) && $_SESSION['newActivity']['day'] == $day): ?>
                <input type="radio" class="options__item__input" name="date" value="<?php echo $day ?>" checked>
              <?php else: ?>
                <input type="radio" class="options__item__input" name="date" value="<?php echo $day ?>">
              <?php endif; ?>

              <div class="options__item__wrapper">
                <p class="options__item__p options__item__p--largedate"><?php echo date("j", $day); ?></>
                <p class="options__item__p"><?php echo date("D", $day)?></p>
              </div>
            </label>
          <?php endforeach; ?>
        </div>
      </section>

      <section class="form__item form__item--starthour">
        <h3 class="form__label">What time will you start?</h3>

        <?php if (!empty($errors['starthour'])): ?>
          <span class="form__errors"><?php echo $errors['starthour'] ?></span>
        <?php endif; ?>

        <div class="form__item__options">
          <label class="options__item options__item--time">
            <?php if (!empty($_SESSION['newActivity']['starthour'])): ?>
              <input type="time" name="starthour" class="input-time" value="<?php echo $_SESSION['newActivity']['starthour'] ?>">
            <?php else: ?>
              <input type="time" name="starthour" class="input-time" value="13:30">
            <?php endif; ?>
          </label>
        </div>
      </section>

      <section class="form__item form__item--duration">
        <h3 class="form__label">How long will you sport?</h3>

        <?php if (!empty($errors['duration'])): ?>
          <span class="form__errors"><?php echo $errors['duration'] ?></span>
        <?php endif; ?>

        <div class="form__item__options options__item--duration">
          <div class="duration-slider">
            <span class="ds-label">0</span>

            <?php if (!empty($_SESSION['newActivity']['duration'])): ?>
              <input type="range" name="duration"  min="0" max="12" value="<?php echo $_SESSION['newActivity']['duration'] ?>" class="ds-range" id="durationTime">
            <?php else: ?>
              <input type="range" name="duration"  min="0" max="12" value="0" class="ds-range" id="durationTime">
            <?php endif; ?>

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
      </section>

      <section class="form__item form__item--location">
        <h3 class="form__label">Where will you sport?</h3>

        <?php if (!empty($errors['location'])): ?>
          <span class="form__errors"><?php echo $errors['location'] ?></span>
        <?php endif; ?>

        <div class="form__item__options">
          <?php foreach ($locations as $location): ?>
            <label class="options__item">
              <?php if (!empty($_SESSION['newActivity']['location_id']) && $_SESSION['newActivity']['location_id'] == $location['id']): ?>
                <input type="radio" class="options__item__input" name="location" value="<?php echo $location['id'] ?>" checked>
              <?php else: ?>
                <input type="radio" class="options__item__input" name="location" value="<?php echo $location['id'] ?>">
              <?php endif; ?>

              <div class="options__item__wrapper">
                <?php echo $location['icon']; ?>
                <p class="options__item__p"><?php echo $location['location'] ?></p>
              </div>
            </label>
          <?php endforeach; ?>
        </div>
      </section>

      <section class="form__item form__item--friends">
        <h3 class="form__label">Who will you take with you?</h3>

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
      </section>

      <section class="form__item form__item--intensity">
        <h3 class="form__label">What will be the intensity of your sport?</h3>

        <?php if (!empty($errors['intensity'])): ?>
          <span class="form__errors"><?php echo $errors['intensity'] ?></span>
        <?php endif; ?>

        <div class="form__item__options">
          <label class="options__item">
            <?php if (!empty($_SESSION['newActivity']['intensity']) && $_SESSION['newActivity']['intensity'] == 'light'): ?>
              <input type="radio" class="options__item__input" name="intensity" value="light" checked>
            <?php else: ?>
              <input type="radio" class="options__item__input" name="intensity" value="light">
            <?php endif; ?>

            <div class="options__item__wrapper">
              <svg width="41" height="22" viewBox="0 0 41 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0)">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0 3C0 1.34772 1.34772 0 3 0H6.5C8.15228 0 9.5 1.34772 9.5 3V6.4C9.5 6.49656 9.5402 6.59304 9.62716 6.67586C9.72102 6.76526 9.82972 6.8 9.9 6.8H30.4C30.4966 6.8 30.593 6.75981 30.6759 6.67285C30.7653 6.57898 30.8 6.47028 30.8 6.4V3C30.8 1.34772 32.1477 0 33.8 0H37.4C39.0782 0 40.3156 1.34557 40.5839 2.82111L40.6 2.90983V18.1C40.6 19.7523 39.2523 21.1 37.6 21.1H34C32.3477 21.1 31 19.7523 31 18.1V14.7C31 14.6034 30.9598 14.507 30.8728 14.4241C30.779 14.3347 30.6703 14.3 30.6 14.3H10C9.90344 14.3 9.80696 14.3402 9.72414 14.4272C9.63474 14.521 9.6 14.6297 9.6 14.7V18.1C9.6 19.7523 8.25228 21.1 6.6 21.1H3C1.34772 21.1 0 19.7523 0 18.1V3ZM3 2C2.45228 2 2 2.45228 2 3V18.1C2 18.6477 2.45228 19.1 3 19.1H6.6C7.14772 19.1 7.6 18.6477 7.6 18.1V14.7C7.6 13.4943 8.6023 12.3 10 12.3H30.6C31.8057 12.3 33 13.3023 33 14.7V18.1C33 18.6477 33.4523 19.1 34 19.1H37.6C38.1477 19.1 38.6 18.6477 38.6 18.1V3.10062C38.4434 2.42185 37.9027 2 37.4 2H33.8C33.2523 2 32.8 2.45228 32.8 3V6.4C32.8 7.60575 31.7977 8.8 30.4 8.8H9.9C8.69425 8.8 7.5 7.7977 7.5 6.4V3C7.5 2.45228 7.04772 2 6.5 2H3Z" fill="#ECEDF6"/>
                </g>
                <defs>
                <clipPath id="clip0">
                <rect width="40.4" height="21.1" fill="white"/>
                </clipPath>
                </defs>
              </svg>
              <p class="options__item__p">light</p>
            </div>
          </label>
          <label class="options__item">
            <?php if (!empty($_SESSION['newActivity']['intensity']) && $_SESSION['newActivity']['intensity'] == 'medium'): ?>
              <input type="radio" class="options__item__input" name="intensity" value="medium" checked>
            <?php else: ?>
              <input type="radio" class="options__item__input" name="intensity" value="medium">
            <?php endif; ?>

            <div class="options__item__wrapper">
              <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0)">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M20.5 25.9535C18.76 25.9535 17.3436 27.3698 17.3436 29.1242C17.3436 30.8786 18.76 32.2949 20.5 32.2949C22.24 32.2949 23.6563 30.8786 23.6563 29.1242C23.6563 27.3698 22.24 25.9535 20.5 25.9535ZM15.3436 29.1242C15.3436 26.2717 17.649 23.9535 20.5 23.9535C23.351 23.9535 25.6563 26.2717 25.6563 29.1242C25.6563 31.9766 23.351 34.2949 20.5 34.2949C17.649 34.2949 15.3436 31.9766 15.3436 29.1242Z" fill="#ECEDF6"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M19.3115 12.9984C30.2518 12.3263 39.323 21.064 39.323 31.881C39.323 34.2006 38.8758 36.365 38.137 38.3691C37.4943 40.2002 35.8344 41.2931 33.9553 41.2931H7.04466C5.16136 41.2931 3.43786 40.1267 2.79494 38.3756L2.79023 38.3628L2.79032 38.3628C1.90278 35.8394 1.45488 33.0079 1.75182 30.0198C2.57385 20.8258 10.1631 13.5954 19.3077 12.9986L19.3115 12.9984ZM19.4361 14.9945C11.2534 15.5295 4.47362 22.0099 3.74346 30.2025L3.74254 30.2129L3.74248 30.2129C3.47715 32.8754 3.87353 35.412 4.67457 37.6922C5.01975 38.6243 5.97147 39.2931 7.04466 39.2931H33.9553C35.032 39.2931 35.9059 38.6929 36.2516 37.7016L36.2546 37.6932L36.2577 37.6847C36.9261 35.8739 37.323 33.941 37.323 31.881C37.323 22.1986 29.2062 14.3953 19.4361 14.9945Z" fill="#ECEDF6"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M2.02564 5.9231C2.02608 5.92401 2.02652 5.92492 2.02697 5.92583L8.50519 19.0682L6.71129 19.9525L0.227294 6.79834C-1.36064 3.52301 1.01833 -0.293091 4.64948 -0.293091H4.65171L36.3505 -0.222401C36.3509 -0.222401 36.3513 -0.222401 36.3517 -0.222401" fill="#ECEDF6"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.8472 6.79651C9.85874 6.79767 9.174 7.89827 9.63045 8.81432L9.63233 8.81809L9.63232 8.81809L12.9433 15.5336L11.1495 16.418L7.84037 9.70629C7.84003 9.7056 7.83969 9.70491 7.83935 9.70423C6.74822 7.51078 8.31661 4.79651 10.8488 4.79651H10.8525V4.79652L30.1512 4.8672C30.1519 4.8672 30.1525 4.8672 30.1532 4.8672C32.6841 4.86857 34.2427 7.50491 33.1673 9.76124L33.1616 9.77332L33.1615 9.77328L29.78 16.6302L27.9863 15.7456L31.3644 8.89542C31.8336 7.90223 31.1397 6.8672 30.1512 6.8672L30.1476 6.86719L10.8488 6.79651C10.8483 6.79651 10.8478 6.79651 10.8472 6.79651Z" fill="#ECEDF6"/>
                </g>
                <defs>
                <clipPath id="clip0">
                <rect width="41" height="41" fill="white"/>
                </clipPath>
                </defs>
              </svg>
              <p class="options__item__p">medium</p>
            </div>
          </label>
          <label class="options__item">
            <?php if (!empty($_SESSION['newActivity']['intensity']) && $_SESSION['newActivity']['intensity'] == 'hard'): ?>
              <input type="radio" class="options__item__input" name="intensity" value="hard" checked>
            <?php else: ?>
              <input type="radio" class="options__item__input" name="intensity" value="hard">
            <?php endif; ?>

            <div class="options__item__wrapper">
              <svg width="68" height="29" viewBox="0 0 68 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0)">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.0566 11.3325H52.0188V17.5928H16.0566V11.3325ZM18.0566 13.3325V15.5928H50.0188V13.3325H18.0566Z" fill="#ECEDF6"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.43396 2.24228C8.43396 0.858698 9.5701 -0.252563 10.9434 -0.252563H15.5472C16.9205 -0.252563 18.0566 0.858698 18.0566 2.24228V26.7577C18.0566 28.1413 16.9205 29.2526 15.5472 29.2526H10.9434C9.5701 29.2526 8.43396 28.1413 8.43396 26.7577V2.24228ZM10.9434 1.74744C10.6563 1.74744 10.434 1.98154 10.434 2.24228V26.7577C10.434 27.0185 10.6563 27.2526 10.9434 27.2526H15.5472C15.8342 27.2526 16.0566 27.0185 16.0566 26.7577V2.24228C16.0566 1.98154 15.8342 1.74744 15.5472 1.74744H10.9434Z" fill="#ECEDF6"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M2.69812 6.35312C2.69812 4.96954 3.83426 3.85828 5.20755 3.85828H7.92454C9.29783 3.85828 10.434 4.96954 10.434 6.35312V22.6469C10.434 24.0305 9.29783 25.1418 7.92454 25.1418H5.20755C3.83426 25.1418 2.69812 24.0305 2.69812 22.6469V6.35312ZM5.20755 5.85828C4.92047 5.85828 4.69812 6.09238 4.69812 6.35312V22.6469C4.69812 22.9077 4.92047 23.1418 5.20755 23.1418H7.92454C8.21162 23.1418 8.43397 22.9077 8.43397 22.6469V6.35312C8.43397 6.09238 8.21162 5.85828 7.92454 5.85828H5.20755Z" fill="#ECEDF6"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.258582 10.5569C0.604023 10.2148 1.05865 10.0619 1.50942 10.0619H2.94338C3.39414 10.0619 3.84877 10.2148 4.19421 10.5569C4.54052 10.8999 4.6981 11.3549 4.6981 11.8093V17.1908C4.6981 17.6452 4.54052 18.1002 4.19421 18.4432C3.84877 18.7853 3.39414 18.9382 2.94338 18.9382H1.50942C1.05865 18.9382 0.604023 18.7853 0.258582 18.4432C-0.0877225 18.1002 -0.2453 17.6452 -0.2453 17.1908V11.8093C-0.2453 11.3549 -0.0877225 10.8999 0.258582 10.5569ZM1.7547 12.0619V16.9382H2.6981V12.0619H1.7547Z" fill="#ECEDF6"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M52.4529 1.74744C52.1658 1.74744 51.9434 1.98154 51.9434 2.24228V26.7577C51.9434 27.0185 52.1658 27.2526 52.4529 27.2526H57.0566C57.3437 27.2526 57.5661 27.0185 57.5661 26.7577V2.24228C57.5661 1.98154 57.3437 1.74744 57.0566 1.74744H52.4529ZM49.9434 2.24228C49.9434 0.858698 51.0796 -0.252563 52.4529 -0.252563H57.0566C58.4299 -0.252563 59.5661 0.858698 59.5661 2.24228V26.7577C59.5661 28.1413 58.4299 29.2526 57.0566 29.2526H52.4529C51.0796 29.2526 49.9434 28.1413 49.9434 26.7577V2.24228Z" fill="#ECEDF6"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M60.0755 5.85828C59.7884 5.85828 59.566 6.09238 59.566 6.35312V22.6469C59.566 22.9077 59.7884 23.1418 60.0755 23.1418H62.7925C63.0795 23.1418 63.3019 22.9077 63.3019 22.6469V6.35312C63.3019 6.09238 63.0795 5.85828 62.7925 5.85828H60.0755ZM57.566 6.35312C57.566 4.96954 58.7022 3.85828 60.0755 3.85828H62.7925C64.1658 3.85828 65.3019 4.96954 65.3019 6.35312V22.6469C65.3019 24.0305 64.1658 25.1418 62.7925 25.1418H60.0755C58.7022 25.1418 57.566 24.0305 57.566 22.6469V6.35312Z" fill="#ECEDF6"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M65.3019 12.0619V16.9382H66.2453V12.0619H65.3019ZM63.8058 10.5569C64.1513 10.2148 64.6059 10.0619 65.0567 10.0619H66.4906C66.9414 10.0619 67.396 10.2148 67.7415 10.5569C68.0878 10.8999 68.2453 11.3549 68.2453 11.8093V17.1908C68.2453 17.6452 68.0878 18.1002 67.7415 18.4432C67.396 18.7853 66.9414 18.9382 66.4906 18.9382H65.0567C64.6059 18.9382 64.1513 18.7853 63.8058 18.4432C63.4595 18.1002 63.3019 17.6452 63.3019 17.1908V11.8093C63.3019 11.3549 63.4595 10.8999 63.8058 10.5569Z" fill="#ECEDF6"/>
                </g>
                <defs>
                <clipPath id="clip0">
                <rect width="68" height="29" fill="white"/>
                </clipPath>
                </defs>
              </svg>
              <p class="options__item__p">hard</p>
            </div>
          </label>
        </section>
      </div>

      <section class="form__item form__item--focus">
        <h3 class="form__label">Which items do you want to focus on?</h3>

        <?php if (!empty($errors['focus'])): ?>
          <span class="form__errors"><?php echo $errors['focus'] ?></span>
        <?php endif; ?>

        <div class="form__item__options">
          <?php foreach ($focuses as $focus): ?>
            <label class="options__item">
              <input type="checkbox" class="options__item__input" name="focus[]" value="<?php echo $focus['id'] ?>">
              <div class="options__item__wrapper">
                <p class="options__item__p"><?php echo $focus['name'] ?></p>
              </div>
            </label>
          <?php endforeach; ?>
        </div>
      </section>

      <button type="submit" class="btn__detail btn__edit" name="save">save</button>
    <?php endif; ?>
  </form>
</section>
