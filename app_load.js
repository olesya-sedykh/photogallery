const mediaQuerySmall = window.matchMedia('(max-width: 720px)')

function handleChangeText(e) {
  if (e.matches) {
    let new_logitip = document.querySelector('.logotip_text');
    new_logitip.textContent = '';

    let new_hello = document.querySelector('.hello');
    if (new_hello !== null) {
      new_hello.textContent = new_hello.textContent.slice(14, );
    }
  }
    
  else {
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



function click_desc() {
  let image_field = document.querySelector('.image_field');

  if (image.value !== '') {
    let line3 = document.querySelector('.line3');
    line3.innerHTML = 'Изображение загружено';
    
    // let plus = document.querySelector('.plus');
    // let requirement1 = document.querySelector('.requirement1');
    // let requirement2 = document.querySelector('.requirement2');

    // plus.innerHTML = '';
    // requirement1.innerHTML = '';
    // requirement2.innerHTML = '';

    // let file = image.files[0];
    // console.log(1);
    // image_field.innerHTML = '';

    // let str_new = '<img class="image" src="<?php echo $_FILES[&quot;plus&quot;][&quot;tmp_name&quot;]?>" alt="image">';
    // let str_new = '<img class="image" src="<?php echo $_FILES[&quot;plus&quot;][&quot;tmp_name&quot;] ?>" alt="image">';
    // let str_new = '<img class="image" src="' + file.name + '" alt="image">';
    // let str_new = '<div class="image">Изображение загружено</div>';
    // image_field.innerHTML += str_new;
  }

  else {
    let line3 = document.querySelector('.line3');
    line3.innerHTML = '';
    
    // // let new_image = document.querySelector('.image');

    // image_field.innerHTML = '';

    // // new_image.innerHTML = '';

    // let str_new = '<input class="plus" type="file" id="input__file" name="plus" required /><label for="input__file"><span class="plus_image"><img src="img\+.svg" alt="+"></span></label><div class="requirement1">Загрузите фотографию</div><div class="requirement2">(допустимый формат - jpg, максимальный размер - 3 Мб)</div>';
    // image_field.innerHTML += str_new;
  }
}



let name = document.querySelector('.image_name');
let image = document.querySelector('.plus');

let load_image = document.querySelector('.load_image');

document.addEventListener('click', (e) => {

  // let close = document.querySelector('.close');

	const withinBoundaries = (e.composedPath().includes(image) && e.composedPath().includes(name));
 
	if (!withinBoundaries) {

    if (image.value !== '' && name.value !== '') {
      load_image.style.opacity = "1";
      load_image.disabled = false;
    }

    else {
      load_image.style.opacity = "0.3";
      load_image.disabled = true;
    }
	}
})