  <form action="" method="POST">
    <input type="hidden" name="action" value="updateShow">
    <p class="error"><?php if(!empty($errors)) echo 'Some errors occured'; ?></p>
    <div class="fields">

    <div class="add-activity__type">
      <label for="type">
        <span>Choose your type of sport</span>
        <input type="radio" name="type" value="" checked> optie
        <input type="radio" name="type" value=""> optie
        <input type="radio" name="type" value=""> optie
      </label>
    </div>
    <div class="add-activity__sport">
      <label for="sport">
        <span>Choose your sport</span>
        <input type="radio" name="sport" value="" checked> optie
        <input type="radio" name="sport" value=""> optie
        <input type="radio" name="sport" value=""> optie
      </label>
    </div>
    <div class="add-activity__details">
      <label for="day">
        <span>When do you want to sport?</span>
        <input type="radio" name="sport" value="" checked> optie
        <input type="radio" name="sport" value=""> optie
        <input type="radio" name="sport" value=""> optie
      </label>

      <label for="time">
        <span>What time will you start?</span>
        <input type="time" name="time">
      </label>

      <label for="duration">
        <span>How long do you want to sport?</span>
        <input type="range" name="duration" min="0" max="10">
      </label>

      <label for="location">
        <span>Where do you want to sport?</span>
        <input type="radio" name="sport" value="" checked> optie
        <input type="radio" name="sport" value=""> optie
        <input type="radio" name="sport" value=""> optie
      </label>

      <label for="location">
        <span>Who will you take with you?</span>

      </label>

      <label for="location">
        <span>What is the intensity of your sport activity?</span>
        <input type="radio" name="sport" value="" checked> optie
        <input type="radio" name="sport" value=""> optie
        <input type="radio" name="sport" value=""> optie
      </label>
    </div>
  </form>
