{
  const handleSubmitForm = e => {
    const $form = e.currentTarget;

    if (!$form.checkValidity()) {
      e.preventDefault();

      const fields = $form.querySelectorAll(`.input`);
      fields.forEach(showValidationInfo);

      //$form.querySelectorAll(`.form__errors`).innerHTML = `Some errors occured`;
    } else {
      console.log(`Form is valid => submit form`);
    }
  };

  const showValidationInfo = $field => {
    let message;
    console.log($field);
    if ($field.validity.valueMissing) {
      message = `Veld is verplicht`;
    }
    if ($field.validity.typeMismatch) {
      message = `Type is niet correct`;
    }
    if ($field.validity.rangeOverflow) {
      const max = $field.getAttribute(`max`);
      message = `Te groot, max ${max}`;
    }
    if ($field.validity.rangeUnderflow) {
      const min = $field.getAttribute(`min`);
      message = `Te klein, min ${min}`;
    }
    if ($field.validity.tooShort) {
      const min = $field.getAttribute(`minlength`);
      message = `Te kort, minimum lengte is ${min}`;
    }
    if ($field.validity.tooLong) {
      const max = $field.getAttribute(`maxlength`);
      message = `Te lang, maximum lengte is ${max}`;
    }
    if ($field) {

      console.log('ccc');
    }
    if (message) {
      $field.parentElement.querySelector(`.form__errors`).textContent = message;
    }
  };

  const handeInputField = e => {
    const $field = e.currentTarget;
    if ($field.checkValidity()) {
      $field.parentElement.querySelector(`.form__errors`).textContent = ``;
      if ($field.form.checkValidity()) {
        $field.form.querySelector(`.form__errors`).innerHTML = ``;
      }
    }
  };

  const handeBlurField = e => {
    const $field = e.currentTarget;
    showValidationInfo($field);
  };

  const addValidationListeners = fields => {
    fields.forEach($field => {
      $field.addEventListener(`input`, handeInputField);
      $field.addEventListener(`blur`, handeBlurField);
    });
  };

  const init = () => {
    const $form = document.querySelector(`form`);
    $form.noValidate = true;
    $form.addEventListener(`submit`, handleSubmitForm);

    console.log(`testttt`);

    const fields = $form.querySelectorAll(`.input`);
    addValidationListeners(fields);
  };

  init();
}
