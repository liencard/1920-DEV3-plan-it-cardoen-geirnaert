{
  const getSports = async () => {
    const $form = document.querySelector('.addactivity__form');
    const data = new FormData($form);
    const entries = [...data.entries()];
    const qs = new URLSearchParams(entries).toString();
    const url = `${$form.getAttribute('action')}?${qs}`;

    const response = await fetch(url, {
      headers: new Headers({
        Accept: 'application/json'
      })
    });

    const sports = await response.json();
    showSports(sports);
  };

  const showSports = sports => {
    const $list = document.querySelector('.form__item--sport .form__item__options');
    $list.innerHTML = ``;
    sports.forEach(sport => {
      $list.innerHTML += `
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
      </label>`;
    });
  };

  const init = () => {
    document.querySelector('.form__item--type .options__item').addEventListener('click', getSports);
  };

  init();
}
