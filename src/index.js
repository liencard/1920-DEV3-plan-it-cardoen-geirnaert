require('./style.css');
require('./js/validate.js');

{
  const showSliderValue = () => {

    const $rangeSlider = document.getElementById('durationTime');
    const $rangeBullet = document.querySelector('.ds-label');

    $rangeSlider.oninput = function () {
      $rangeBullet.innerHTML = this.value / 4;

      const bulletPosition = (this.value / $rangeSlider.max);
      $rangeBullet.style.left = `${bulletPosition * 57  }rem`;
      console.log(bulletPosition);
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
    const $rangeSlider = document.querySelector('.ds-range');
    if ($rangeSlider) {
      $rangeSlider.addEventListener('input', showSliderValue());
    }

    //document.querySelector(`form`).addEventListener(`submit`, handleSubmit);


  };

  init();
}
