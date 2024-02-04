const mediaQuerySmall = window.matchMedia('(max-width: 720px)')

function handleChangeText(e) {
  if (e.matches) {
    let new_logitip = document.querySelector('.logotip_text');
    new_logitip.textContent = '';

    let new_hello = document.querySelector('.hello');
    if (new_hello !== null) {
      new_hello.textContent = new_hello.textContent.slice(14, );
    }

    let new_back = document.querySelector('.back a');
    new_back.textContent = '<';

    let rating = document.querySelector('.rating');
    // let str2 = '<div class="rating_text">Рейтинг</div><div class="number_of_estimates">138 оценок</div>';
    // rating.innerHTML -= str2;
    rating.innerHTML = '';
    let str = '<div class="rating_value">4.8</div><div class="texts"><div class="rating_text">Рейтинг</div><div class="number_of_estimates">138 оценок</div></div>';
    rating.innerHTML += str;
  }
    
  else {
    let new_logitip = document.querySelector('.logotip_text');
    new_logitip.textContent = 'Фотогалерея';

    let new_hello = document.querySelector('.hello');
    if (new_hello !== null && new_hello.textContent.length < 15) { //если приветствие ещё не добавилось
      new_hello.textContent = "Здравствуйте, " + new_hello.textContent;
    }

    let new_back = document.querySelector('.back a');
    new_back.textContent = '< Назад';

    let rating = document.querySelector('.rating');
    // let str = '<div class="texts"><div class="rating_text">Рейтинг</div><div class="number_of_estimates">138 оценок</div></div>';
    // rating.innerHTML -= str;
    rating.innerHTML = '';
    let str_new = '<div class="rating_text">Рейтинг</div><div class="rating_value">4.8</div><div class="number_of_estimates">138 оценок</div>';
    rating.innerHTML += str_new;
  }
}

mediaQuerySmall.addListener(handleChangeText)
handleChangeText(mediaQuerySmall)



//Для модальных окон

let autorization_login = document.querySelector('.autorization_login input');
let autorization_password = document.querySelector('.autorization_password input');

let registration_login = document.querySelector('.registration_login input');
let registration_password = document.querySelector('.registration_password input');
let user_name = document.querySelector('.name input');
let phone = document.querySelector('.phone input');
let second_password = document.querySelector('.second_password input');
let agreement = document.querySelector('.agreement input');

let autorization_button = document.querySelector('.autorization_close');
let registration_button = document.querySelector('.registration_close');

document.addEventListener('click', (e) => {

	const withinBoundaries = (e.composedPath().includes(autorization_login) && e.composedPath().includes(autorization_password)) || 
  (e.composedPath().includes(user_name) && e.composedPath().includes(registration_login) && e.composedPath().includes(registration_password) &&
    e.composedPath().includes(phone) && e.composedPath().includes(second_password && 
      e.composedPath().includes(agreement)));
 
	if (!withinBoundaries) {

    if (autorization_login.value !== '' && autorization_password.value !== '') {
      autorization_button.style.opacity = "1";
      autorization_button.disabled = false;
    }

    else {
      autorization_button.style.opacity = "0.3";
      autorization_button.disabled = true;
    }

    if (user_name.value !== '' && registration_login.value !== '' && registration_password.value !== '' 
    && phone.value !== '' && second_password.value !== '' && agreement.checked === true) {
      registration_button.style.opacity = "1";
      registration_button.disabled = false;
    }

    else {
      registration_button.style.opacity = "0.3";
      registration_button.disabled = true;
    }
	}
})



// document.querySelector('.reg_form').addEventListener('submit', click_registration)

function click_registration(e) {

  // e.preventDefault();

  let flag = false;
  let warning = "В заполнении формы допущены следующие ошибки: ";
  let reg_phone = /^(8|\+7){1}[0-9]{10}$/
  let reg_email = /^[a-zA-Z]+$/

  if (!reg_phone.test(phone.value)) {
    if (flag === true) {
      warning += ", ";
    }
    if (!warning.includes("формат записи телефона должен иметь вид: '+7(8)xxxxxxxxxx'")) {
      warning += "формат записи телефона должен иметь вид: '+7(8)xxxxxxxxxx'";
    }
    flag = true;
  }

  if (!registration_login.value.includes("@")) {
    if (flag === true) {
      warning += ", ";
    }
    if (!warning.includes("email должен содержать символ @")) {
      warning += "email должен содержать символ @";
    }
    flag = true;
  }

  if (registration_password.value.length < 6) {
    if (flag === true) {
      warning += ", ";
    }
    if (!warning.includes("длина пароля должна быть не меньше 6 символов")) {
      warning += "длина пароля должна быть не меньше 6 символов";
    }
    flag = true;
  }

  if (registration_password.value !== second_password.value) {
    if (flag === true) {
      warning += ", ";
    }
    if (!warning.includes("пароли не совпадают")) {
      warning += "пароли не совпадают";
    }
    flag = true;
  }

  if (flag === true) {
    alert(warning);
  }

  else {
    fetch('/registration.php?name=' + user_name.value + '&login=' + registration_login.value + '&phone=' + phone.value + '&password=' + registration_password.value + '&second_password=' + second_password.value + '&agreement=' + agreement.value, {
      method: 'GET'
    })

    .then(response => {
      console.log(response);
      let json = response.json();
      console.log(json);
      return json;
    })
    .then((result) => {
      console.log(result.success);
      if (result.error) {
        console.log(result.error);
        alert(result.error);
      } 
      else {
        location.reload();
        window.location.href = 'index.php';
      }
    })
    .catch(error => console.log(error));
  }
};

registration_button.addEventListener('click', click_registration);



// document.querySelector('.auto_form').addEventListener('submit', click_autorization)

function click_autorization(e) {

  // e.preventDefault();

  fetch('/autorization.php?login=' + autorization_login.value + '&password=' + autorization_password.value, {
    method: 'GET'
  })

  .then(response => {
    let json = response.json();
    return json;
  })
  .then((result) => {
    if (result.error) {
      alert(result.error);
    } 
    else {
      location.reload();
      window.location.href = 'index.php';
    }
  })
  .catch(error => console.log(error));

}