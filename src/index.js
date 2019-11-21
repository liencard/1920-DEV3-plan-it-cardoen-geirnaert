require('./style.css');
{
  const showSliderValue = () => {

    const $rangeSlider = document.getElementById('durationTime');
    const $rangeBullet = document.querySelector('.ds-label');

    $rangeSlider.oninput = function () {
      $rangeBullet.innerHTML = this.value / 4;

      const bulletPosition = (this.value / $rangeSlider.max);
      $rangeBullet.style.left = (bulletPosition * 58) + 'rem';
      console.log(bulletPosition);
    };

  };

  const init = () => {
    const $rangeSlider = document.querySelector('.ds-range');
    $rangeSlider.addEventListener('input', showSliderValue());
  };

  init();
}
