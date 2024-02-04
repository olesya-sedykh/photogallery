// // console.log("Test")
// let name = "Test";
// let number = 1;
// const number2 = 4;
// let boo = true;

// name = "Тест"

// // console.log(name, number)
// // console.log(typeof name, typeof number, typeof boo)

// const header = document.querySelector(".header")
// // const header = document.querySelectorAll("")
// console.log(header)
// console.log(typeof header)

// // function sayHello() {
// //     let message = "Hello!";
// //     console.log(message + name)
// // }

// // sayHello();

// function simpleMath(a, b) {
//     let result = a + b;
//     // console.log(result)
//     return result;
// }

// let sum = simpleMath(1, 2);
// console.log(sum);


// window.addEventListener("scroll", function() {
//     let scrollPos = this.window.scrollY;
//     console.log(scrollPos);
//     console.log("scrolled");
//     header.classList.add("red");
// })

// let new_add = document.querySelector('add a');
// new_add.textContent = '+';

function click_reg() {
  document.querySelector('.start_registration').style.color = "black";
}

function click_auto() {
  document.querySelector('.start_autorization').style.color = "black";
}

const mediaQuerySmall = window.matchMedia('(max-width: 720px)')

function handleChangeText(e) {
  if (e.matches) {
    let new_add = document.querySelector('.add a');
    new_add.textContent = '+';

    let dates = document.querySelectorAll('.image_date');

    dates.forEach(function(date) {
      let new_date = date;
      new_date.textContent = date.textContent.slice(10, );
    });
    
    // let new_date1 = document.querySelector('.date1');
    // new_date1.textContent = '15 августа';

    // let new_date2 = document.querySelector('.date2');
    // new_date2.textContent = '15 августа';

    // let new_date3 = document.querySelector('.date3');
    // new_date3.textContent = '15 августа';

    // let new_date4 = document.querySelector('.date4');
    // new_date4.textContent = '15 августа';

    // let new_date5 = document.querySelector('.date5');
    // new_date5.textContent = '15 августа';

    // let new_date6 = document.querySelector('.date6');
    // new_date6.textContent = '15 августа';

    // let new_date7 = document.querySelector('.date7');
    // new_date7.textContent = '15 августа';

    // let new_date8 = document.querySelector('.date8');
    // new_date8.textContent = '15 августа';

    // let new_date9 = document.querySelector('.date9');
    // new_date9.textContent = '15 августа';

    // let new_date10 = document.querySelector('.date10');
    // new_date10.textContent = '15 августа';

    // let new_date11 = document.querySelector('.date11');
    // new_date11.textContent = '15 августа';

    // let new_date12 = document.querySelector('.date12');
    // new_date12.textContent = '15 августа';
    
    // new_logitip = document.querySelector('.logotip');
    // new_logitip.changeImage = 'img\logotip.svg';

    let new_logitip = document.querySelector('.logotip_text');
    new_logitip.textContent = '';

    let new_hello = document.querySelector('.hello');
    if (new_hello !== null) {
      new_hello.textContent = new_hello.textContent.slice(14, );
    }
  }
    
  else {
    let new_add = document.querySelector('.add a');
    new_add.textContent = '+ Добавить';

    let dates = document.querySelectorAll('.image_date');

    dates.forEach(function(date) {
      let new_date = date;
      if (new_date.textContent < 11) {
        new_date.textContent = 'Добавлено ' + date.textContent;
      }
    });

    // let new_date1 = document.querySelector('.date1');
    // new_date1.textContent = 'Добавлено 15 августа';

    // let new_date2 = document.querySelector('.date2');
    // new_date2.textContent = 'Добавлено 15 августа';

    // let new_date3 = document.querySelector('.date3');
    // new_date3.textContent = 'Добавлено 15 августа';

    // let new_date4 = document.querySelector('.date4');
    // new_date4.textContent = 'Добавлено 15 августа';

    // let new_date5 = document.querySelector('.date5');
    // new_date5.textContent = 'Добавлено 15 августа';

    // let new_date6 = document.querySelector('.date6');
    // new_date6.textContent = 'Добавлено 15 августа';

    // let new_date7 = document.querySelector('.date7');
    // new_date7.textContent = 'Добавлено 15 августа';

    // let new_date8 = document.querySelector('.date8');
    // new_date8.textContent = 'Добавлено 15 августа';

    // let new_date9 = document.querySelector('.date9');
    // new_date9.textContent = 'Добавлено 15 августа';

    // let new_date10 = document.querySelector('.date10');
    // new_date10.textContent = 'Добавлено 15 августа';

    // let new_date11 = document.querySelector('.date11');
    // new_date11.textContent = 'Добавлено 15 августа';

    // let new_date12 = document.querySelector('.date12');
    // new_date12.textContent = 'Добавлено 15 августа';

    let new_logitip = document.querySelector('.logotip_text');
    new_logitip.textContent = 'Фотогалерея';

    let new_hello = document.querySelector('.hello');
    if (new_hello !== null && new_hello.textContent.length < 15) { //если приветствие ещё не добавилось
      new_hello.textContent = "Здравствуйте, " + new_hello.textContent;
    }
  }
}

mediaQuerySmall.addListener(handleChangeText)
handleChangeText(mediaQuerySmall)



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

  // let close = document.querySelector('.close');

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

// if (registration_password.value !== second_password.value) {
//   // const text = document.createTextNode("Пароли не совпадают");
//   // registration_window = document.querySelector('.registration_window');
//   // registration_window.appendChild(text);
//   registration_button.style.opacity = "0.3";
//   alert("Пароли не совпадают");
// }
// else {
//   registration_button.style.opacity = "1";
// }


document.querySelector('.reg_form').addEventListener('submit', click_registration)

function click_registration(e) {

  e.preventDefault();

  let flag = false;
  let warning = "В заполнении формы допущены следующие ошибки: ";
  // let reg = /[+7|8][0-9]{3}[0-9]{3}[0-9]{2}[0-9]{2}/
  let reg_phone = /^(8|\+7){1}[0-9]{10}$/
  // let reg_email = /^[a-zA-Z]+$/

  if (!reg_phone.test(phone.value)) {
    if (flag === true) {
      warning += ", ";
    }
    if (!warning.includes("формат записи телефона должен иметь вид: '+7(8)xxxxxxxxxx'")) {
      warning += "формат записи телефона должен иметь вид: '+7(8)xxxxxxxxxx'";
    }
    flag = true;
  }

  // if (!reg_email.test(registration_login.value)) {
  //   if (flag === true) {
  //     warning += ", ";
  //   }
  //   if (!warning.includes("email может содержать только латинские буквы")) {
  //     warning += "email может содержать только латинские буквы";
  //   }
  //   flag = true;
  // }

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

    // let registration_form = new FormData(document.querySelector('.reg_form'));
    // console.log(registration_form);
    // fetch('/registration.php', {
    //   method: 'POST',
    //   body: registration_form
    // })

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

    // .then((response) => {
    //   console.log('1');
    // });
      // response.json())
    // .then((res) => {
    //   // if (res.errors) {
    //   //   alert(errors);
    //   // } 
    //   // else {
    //   //   location.reload();
    //   // }
    //   console.log('1');
    // })
    // console.log('1');
    // location.reload();
  }
};

// registration_button.addEventListener('click', click_registration);

document.querySelector('.auto_form').addEventListener('submit', click_autorization)

function click_autorization(e) {

  e.preventDefault();

  // let autorization_form = new FormData(document.querySelector('.auto_form'));
  // console.log(autorization_form);
  fetch('/autorization.php?login=' + autorization_login.value + '&password=' + autorization_password.value, {
    method: 'GET'
    // body: autorization_form
  })
  // let autorization_json = {
  //   login: autorization_login,
  //   password: autorization_password
  // }
  // console.log(autorization_json);
  // fetch('/autorization.php', {
  //   method: 'GET',
  //   body: JSON.stringify(autorization_json)
  //   // headers: { 
  //   //   'Content-Type': 'application/json',
  //   //   'Accept': 'application/json'
  //   // }
  // })

  // .then(response => response.json())
  .then(response => {
    // console.log(response);
    let json = response.json();
    // console.log(json);
    return json;
  })
  .then((result) => {
    // console.log(result.error);
    if (result.error) {
      // console.log(result.error);
      alert(result.error);
    } 
    else {
      location.reload();
      window.location.href = 'index.php';
      // console.log(1);
    }
    // console.log(result.error);
  })
  .catch(error => console.log(error));

}