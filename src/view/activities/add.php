<section class="form">
  <h2 class="form__title">Plan a new activity</h2>
  <form action="index.php?page=add-activity" method="POST" class="add-activity">
    <input type="hidden" name="action" value="newActivity">

    <?php if (isset($errors)): ?>
      <div class="form__errors">
        <?php foreach ($errors as $error): ?>
          <p class="error"><?php echo $error; ?></p>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <div class="add-activity__form-item add-activity__form-item__type">
      <h3 class="add-activity__label">Choose your type of sport</h3>
      <div class="add-activity__options-container">
        <?php foreach ($types as $type): ?>
          <label class="add-activity__option add-activity__option--square">
            <input type="radio" name="type" value="<?php echo $type['id']; ?>">
            <div class="add-activity__option__container">
              <!-- <img srcset="<?php echo $type['icon']; ?> 90w" sizes="90px" src="<?php echo $type['icon']; ?>" alt="<?php echo $type['name']; ?> icon"> -->
              <p><?php echo $type['name'] ?></p>
            </div>
          </label>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="add-activity__form-item add-activity__form-item__sport">
      <h3 class="add-activity__label">Choose your sport</h3>
      <div class="add-activity__options-container">
        <?php foreach ($sports as $sport): ?>
          <label class="add-activity__option add-activity__option--square">
            <input type="radio" name="sport" value="<?php echo $sport['id']; ?>">
            <div class="add-activity__option__container">
              <p><?php echo $sport['sport']; ?></p>
            </div>
          </label>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="add-activity__form-item add-activity__form-item__date">
      <h3 class="add-activity__label">When do you want to sport?</h3>
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
      <div class="add-activity__options-container">
        <label class="add-activity__option add-activity__option--time">
          <input type="time" name="starthour" class="input-time" value="13:30">
        </label>
      </div>
    </div>

    <div class="add-activity__form-item add-activity__form-item__duration">
      <h3 class="add-activity__label">How long will you sport?</h3>
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
      <div class="add-activity__options-container">
        <?php foreach ($locations as $location): ?>
          <label class="add-activity__option add-activity__option--location">
            <input type="radio" name="location" value="<?php echo $location['id'] ?>">
            <div class="add-activity__option__container">
              <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M38.0523 20.6993L35.0745 17.739C35.1295 17.5515 35.1531 17.3562 35.1531 17.1532V12.615C35.1531 12.1854 34.7995 11.8339 34.3674 11.8339H29.1111L23.572 0.445676C23.4541 0.211349 23.2341 0.0473209 22.9748 0.00826647C22.7156 -0.030788 22.4563 0.0707536 22.2756 0.266026L16.6736 6.59284L11.4566 4.70261C11.2602 4.63231 11.048 4.64012 10.8595 4.72604C10.6709 4.81196 10.5216 4.97599 10.4509 5.16345L8.88738 9.42819C8.77738 9.72501 8.73809 10.0296 8.76167 10.3343L7.82669 10.8107C5.74461 11.873 4.15751 13.6539 3.3561 15.8409L0.386186 23.9643C-0.195226 25.5499 -0.116657 27.2683 0.598323 28.7914C1.3133 30.3145 2.58612 31.4783 4.18108 32.0563L12.6823 35.1338C13.1301 35.2978 13.5858 35.376 14.0415 35.376C15.5265 35.376 16.9172 34.5402 17.585 33.1264L19.0857 29.9396V33.6888C19.0857 37.1725 21.9377 40 25.4341 40H31.7903C35.2945 40 38.1387 37.1646 38.1387 33.6888V30.4863C39.2622 29.5412 39.9772 28.1353 39.9772 26.5653V25.3546C39.9929 23.5893 39.3015 21.9412 38.0523 20.6993ZM28.6161 13.3883C28.624 13.3883 28.624 13.3883 28.6161 13.3883H33.5817V14.8021H29.1975C28.7654 14.8021 28.4118 15.1536 28.4118 15.5832C28.4118 16.0128 28.7654 16.3643 29.1975 16.3643H33.5817V17.1532C33.5817 17.4968 33.2988 17.778 32.9531 17.778H24.2791C23.9334 17.778 23.6505 17.4968 23.6505 17.1532V13.3961L28.6161 13.3883ZM22.6763 2.1875L27.3669 11.8261H22.8648C22.4327 11.8261 22.0791 12.1776 22.0791 12.6072V16.9423L20.9006 14.4194C21.0185 14.2631 21.1127 14.0835 21.1756 13.896L22.7391 9.63128C22.8884 9.22511 22.6763 8.77989 22.2677 8.63148L18.2607 7.17866L22.6763 2.1875ZM10.3645 9.97496L10.7416 8.95173L15.5265 10.6857C15.6129 10.717 15.7072 10.7326 15.7936 10.7326C16.1157 10.7326 16.4143 10.5373 16.5322 10.2171C16.6814 9.81093 16.4693 9.36571 16.0607 9.2173L11.2759 7.48328L11.653 6.44444L20.987 9.81874L19.6906 13.3493C19.6356 13.5055 19.5178 13.6305 19.3685 13.7007C19.2192 13.771 19.0464 13.7789 18.8892 13.7242L10.7338 10.7717C10.5766 10.717 10.4509 10.5998 10.3802 10.4514C10.3173 10.303 10.3095 10.1312 10.3645 9.97496ZM19.0935 26.2528L16.1707 32.4547C15.6522 33.5638 14.3872 34.0793 13.2323 33.6654L4.72321 30.5879C3.5211 30.1505 2.56255 29.2835 2.02828 28.1353C1.49401 26.9871 1.43116 25.6983 1.87114 24.5032L4.84106 16.3955C5.50104 14.5834 6.82101 13.0993 8.54953 12.2167L9.43736 11.7636C9.65735 11.9745 9.91663 12.1386 10.2152 12.2479L18.3707 15.2004C18.6142 15.2864 18.8735 15.3332 19.1249 15.3332C19.2821 15.3332 19.4314 15.3176 19.5806 15.2864L20.877 18.0514C21.042 18.4029 21.1756 18.77 21.2856 19.1371C19.8635 20.7852 19.0935 22.8785 19.0935 25.0578V26.2528ZM38.4215 26.5575C38.4215 28.5258 36.8109 30.127 34.8309 30.127H33.5503C32.4581 30.127 31.5703 29.2444 31.5703 28.1587C31.5703 27.073 32.4581 26.1904 33.5503 26.1904H34.9645C35.3966 26.1904 35.7502 25.8389 35.7502 25.4093C35.7502 24.9797 35.3966 24.6282 34.9645 24.6282H33.5503C31.5939 24.6282 29.9989 26.2138 29.9989 28.1587C29.9989 30.1036 31.5939 31.6892 33.5503 31.6892H34.8309C35.4438 31.6892 36.033 31.5799 36.5752 31.3846V33.6888C36.5752 36.3055 34.4302 38.4378 31.7982 38.4378H25.4419C22.8098 38.4378 20.6649 36.3055 20.6649 33.6888V25.0578C20.6649 23.1285 21.3956 21.2851 22.7156 19.8713L23.3913 19.1449C23.6662 19.2699 23.9648 19.3324 24.2869 19.3324H32.961C33.3931 19.3324 33.786 19.2074 34.1317 18.9965L36.9444 21.7928C37.8951 22.7379 38.4215 24.0033 38.4215 25.339V26.5575Z" fill="#4546A3" fill-opacity="0.5"/>
                <path d="M26.5348 15.0289C26.3855 14.8804 26.1889 14.8022 25.9767 14.8022C25.7644 14.8022 25.5679 14.8882 25.4185 15.0289C25.2692 15.1774 25.1906 15.3727 25.1906 15.5837C25.1906 15.7869 25.277 15.9901 25.4185 16.1386C25.5679 16.2871 25.7644 16.3653 25.9767 16.3653C26.1889 16.3653 26.3855 16.2793 26.5348 16.1386C26.6842 15.9901 26.7628 15.7948 26.7628 15.5837C26.7628 15.3805 26.6842 15.1774 26.5348 15.0289Z" fill="#4546A3" fill-opacity="0.5"/>
                <path d="M9.80729 29.104L9.78371 29.0962C9.37492 28.9477 8.92682 29.1587 8.77745 29.5651C8.62809 29.9715 8.84034 30.417 9.24913 30.5655L9.27272 30.5733C9.35919 30.6046 9.45353 30.6202 9.54 30.6202C9.86232 30.6202 10.1611 30.4248 10.279 30.1044C10.4283 29.698 10.2161 29.2525 9.80729 29.104Z" fill="#4546A3" fill-opacity="0.5"/>
                <path d="M7.00178 28.0887L5.79182 27.6513C5.38326 27.5029 5.05326 27.206 4.87256 26.8077C4.69185 26.4171 4.66828 25.9719 4.81756 25.5658C4.96684 25.1596 4.7547 24.7144 4.34614 24.566C3.93758 24.4176 3.48974 24.6285 3.34046 25.0346C3.04975 25.8313 3.08903 26.6983 3.45045 27.4716C3.81187 28.2449 4.45614 28.8307 5.25754 29.1197L6.46751 29.5571C6.55394 29.5884 6.64822 29.604 6.73465 29.604C7.05678 29.604 7.35534 29.4087 7.4732 29.0885C7.62248 28.6901 7.41034 28.2371 7.00178 28.0887Z" fill="#4546A3" fill-opacity="0.5"/>
              </svg>
              <p><?php echo $location['location'] ?></p>
            </div>
          </label>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="add-activity__form-item add-activity__form-item__friends">
      <h3 class="add-activity__label">Who will you take with you?</h3>
    </div>

    <div class="add-activity__form-item add-activity__form-item__intensity">
      <h3 class="add-activity__label">What will be the intensity of your sport?</h3>
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
      <div class="add-activity__options-container">
        <?php foreach ($focuses as $focus): ?>
          <label class="add-activity__option add-activity__option--focus">
            <input type="checkbox" name="focus" value="">
            <div class="add-activity__option__container">
              <p><?php echo $focus['name'] ?></p>
            </div>
          </label>
        <?php endforeach; ?>
      </div>
    </div>
    <input type="submit" class="btn__detail btn__edit" value="Save" />
  </form>
</section>
