require('./style.css');
require('./js/validate.js');
require('./js/activities.js');

{
  const showSliderValue = () => {

    const $rangeSlider = document.getElementById('durationTime');
    const $rangeBullet = document.querySelector('.ds-label');

    $rangeSlider.oninput = function () {
      $rangeBullet.innerHTML = this.value / 4;
    };

  };

  // const handleSubmit = e => {
  //   e.preventDefault();
  //   const $p = document.createElement(`p`);
  //   $p.textContent = `Geen refresh na submit door e.preventDefault()`;
  //   document.querySelector(`.form`).appendChild($p);
  //   console.log(e);
  // };

  const init = () => {
    document.documentElement.classList.add('has-js');

    const $rangeSlider = document.querySelector('.ds-range');
    if ($rangeSlider) {
      $rangeSlider.addEventListener('input', showSliderValue());
    }

    //document.querySelector(`form`).addEventListener(`submit`, handleSubmit);


  };

  init();
}
