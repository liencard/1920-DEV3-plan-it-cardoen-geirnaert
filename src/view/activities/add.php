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
      <button type="submit" class="btn btn__type" name="selectType">Select sport</button>
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
                  <path d="M20.5 33.8849C17.823 33.8849 15.6392 31.701 15.6392 29.024C15.6392 26.3471 17.823 24.1632 20.5 24.1632C23.177 24.1632 25.3608 26.3471 25.3608 29.024C25.3608 31.701 23.177 33.8849 20.5 33.8849ZM20.5 25.5721C18.5979 25.5721 17.0481 27.122 17.0481 29.024C17.0481 30.9261 18.5979 32.4759 20.5 32.4759C22.402 32.4759 23.9519 30.9261 23.9519 29.024C23.9519 27.122 22.402 25.5721 20.5 25.5721Z" fill="#ECEDF6"/>
                  <path d="M33.9553 40.8591H7.04468C5.28351 40.8591 3.73369 39.8024 3.09967 38.1821C2.11341 35.5051 1.76118 32.7577 2.04296 29.9398C2.88833 20.9931 10.3557 13.8075 19.3024 13.244C24.445 12.9622 29.3763 14.7233 33.1804 18.2457C36.9141 21.768 39.0275 26.6288 39.0275 31.7715C39.0275 33.9553 38.6753 36.1392 37.9003 38.1821C37.2663 39.8024 35.7165 40.8591 33.9553 40.8591ZM20.5 14.6529C20.1478 14.6529 19.7955 14.6529 19.3729 14.6529C11.0601 15.146 4.22681 21.8385 3.4519 30.0807C3.17011 32.6873 3.52235 35.2233 4.43815 37.689C4.79039 38.7457 5.84709 39.4502 7.04468 39.4502H33.9553C35.1529 39.4502 36.1392 38.7457 36.5619 37.689C37.2663 35.7869 37.6186 33.8144 37.6186 31.7715C37.6186 26.9811 35.7165 22.5429 32.1942 19.3024C29.0241 16.2732 24.8677 14.6529 20.5 14.6529Z" fill="#ECEDF6"/>
                  <path d="M34.0254 19.7955L32.7574 19.1615L39.168 6.05842C39.6612 5.07217 39.5907 3.87457 39.0271 2.95876C38.4636 2.04296 37.4069 1.47938 36.2797 1.40893H4.64913C3.52198 1.40893 2.46528 1.97251 1.9017 2.88832C1.33813 3.80412 1.26768 5.00172 1.76081 5.98797L8.24191 19.0911L6.97387 19.7251L0.49277 6.69244C-0.211698 5.28351 -0.141251 3.59278 0.70411 2.18385C1.54947 0.845361 3.02885 0 4.64913 0L36.3502 0.0704467C37.9704 0.0704467 39.4498 0.915808 40.2952 2.2543C41.1405 3.59278 41.211 5.28351 40.5065 6.76289L34.0254 19.7955Z" fill="#ECEDF6"/>
                  <path d="M29.5172 16.4845L28.2491 15.8505L31.6306 8.94673C31.9124 8.4536 31.8419 7.81958 31.5601 7.32645C31.2784 6.83332 30.7148 6.55154 30.1512 6.55154L10.8488 6.48109C10.2852 6.48109 9.72165 6.76288 9.43986 7.25601C9.15808 7.74913 9.08763 8.38315 9.36942 8.87628L12.6804 15.5687L11.4124 16.2027L8.10138 9.5103C7.60825 8.52405 7.6787 7.3969 8.24227 6.48109C8.80584 5.56528 9.7921 5.00171 10.8488 5.00171L30.1512 5.07216C31.2079 5.07216 32.1942 5.63573 32.7577 6.55154C33.3213 7.46735 33.3918 8.59449 32.8986 9.5103L29.5172 16.4845Z" fill="#ECEDF6"/>
                </g>
                <defs>
                  <clipPath id="clip0">
                    <rect width="41" height="40.8591" fill="white"/>
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
              <svg width="55" height="24" viewBox="0 0 55 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0)">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.9869 9.16602H42.0741V14.2295H12.9869V9.16602ZM14.6046 10.7837V12.6119H40.4564V10.7837H14.6046Z" fill="#ECEDF6"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.82159 1.81367C6.82159 0.694591 7.74053 -0.204224 8.85128 -0.204224H12.5749C13.6857 -0.204224 14.6046 0.694591 14.6046 1.81367V21.6423C14.6046 22.7614 13.6857 23.6602 12.5749 23.6602H8.85128C7.74053 23.6602 6.82159 22.7614 6.82159 21.6423V1.81367ZM8.85128 1.41342C8.61908 1.41342 8.43924 1.60277 8.43924 1.81367V21.6423C8.43924 21.8532 8.61908 22.0426 8.85128 22.0426H12.5749C12.8071 22.0426 12.987 21.8532 12.987 21.6423V1.81367C12.987 1.60277 12.8071 1.41342 12.5749 1.41342H8.85128Z" fill="#ECEDF6"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M2.18237 5.13862C2.18237 4.01954 3.10131 3.12073 4.21206 3.12073H6.40962C7.52037 3.12073 8.43931 4.01954 8.43931 5.13862V18.3174C8.43931 19.4365 7.52037 20.3353 6.40962 20.3353H4.21206C3.10131 20.3353 2.18237 19.4365 2.18237 18.3174V5.13862ZM4.21206 4.73837C3.97986 4.73837 3.80002 4.92772 3.80002 5.13862V18.3174C3.80002 18.5283 3.97986 18.7177 4.21206 18.7177H6.40962C6.64182 18.7177 6.82166 18.5283 6.82166 18.3174V5.13862C6.82166 4.92772 6.64182 4.73837 6.40962 4.73837H4.21206Z" fill="#ECEDF6"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.209188 8.53868C0.488588 8.26198 0.856304 8.13831 1.22089 8.13831H2.38071C2.7453 8.13831 3.11302 8.26198 3.39242 8.53868C3.67252 8.81607 3.79997 9.18412 3.79997 9.55166V13.9043C3.79997 14.2718 3.67252 14.6399 3.39242 14.9173C3.11302 15.194 2.7453 15.3177 2.38071 15.3177H1.22089C0.856304 15.3177 0.488588 15.194 0.209188 14.9173C-0.0709116 14.6399 -0.198364 14.2718 -0.198364 13.9043V9.55166C-0.198364 9.18412 -0.0709116 8.81607 0.209188 8.53868ZM1.41928 9.75595V13.7H2.18232V9.75595H1.41928Z" fill="#ECEDF6"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M42.4251 1.41342C42.1929 1.41342 42.013 1.60277 42.013 1.81367V21.6423C42.013 21.8532 42.1929 22.0426 42.4251 22.0426H46.1487C46.3809 22.0426 46.5607 21.8532 46.5607 21.6423V1.81367C46.5607 1.60277 46.3809 1.41342 46.1487 1.41342H42.4251ZM40.3954 1.81367C40.3954 0.694591 41.3143 -0.204224 42.4251 -0.204224H46.1487C47.2595 -0.204224 48.1784 0.694591 48.1784 1.81367V21.6423C48.1784 22.7614 47.2595 23.6602 46.1487 23.6602H42.4251C41.3143 23.6602 40.3954 22.7614 40.3954 21.6423V1.81367Z" fill="#ECEDF6"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M48.5904 4.73837C48.3582 4.73837 48.1784 4.92772 48.1784 5.13862V18.3174C48.1784 18.5283 48.3582 18.7177 48.5904 18.7177H50.788C51.0202 18.7177 51.2 18.5283 51.2 18.3174V5.13862C51.2 4.92772 51.0202 4.73837 50.788 4.73837H48.5904ZM46.5607 5.13862C46.5607 4.01954 47.4797 3.12073 48.5904 3.12073H50.788C51.8987 3.12073 52.8177 4.01954 52.8177 5.13862V18.3174C52.8177 19.4365 51.8987 20.3353 50.788 20.3353H48.5904C47.4797 20.3353 46.5607 19.4365 46.5607 18.3174V5.13862Z" fill="#ECEDF6"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M52.8177 9.75595V13.7H53.5807V9.75595H52.8177ZM51.6076 8.53868C51.887 8.26198 52.2547 8.13831 52.6193 8.13831H53.7791C54.1437 8.13831 54.5114 8.26198 54.7908 8.53868C55.0709 8.81607 55.1983 9.18412 55.1983 9.55166V13.9043C55.1983 14.2718 55.0709 14.6399 54.7908 14.9173C54.5114 15.194 54.1437 15.3177 53.7791 15.3177H52.6193C52.2547 15.3177 51.887 15.194 51.6076 14.9173C51.3275 14.6399 51.2 14.2718 51.2 13.9043V9.55166C51.2 9.18412 51.3275 8.81607 51.6076 8.53868Z" fill="#ECEDF6"/>
                </g>
                <defs>
                <clipPath id="clip0">
                <rect width="55" height="23.4559" fill="white"/>
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
