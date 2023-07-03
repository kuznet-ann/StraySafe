// Гамбургер
const menuOpen = document.querySelector('.menu__hamburger'),
        menuClose = document.querySelector('.menu__close')
        menu = document.querySelector('.menu__list-bg');

menuOpen.addEventListener('click', () => {
    menu.style.right = 0;
});

menuClose.addEventListener('click', () => {
    menu.style.right = "-350px";
});

// Слайдер
if (document.querySelector('.ourpets__list')) {
    let offset = 0;
    const arrowLeft = document.querySelector('.ourpets__arrow-left'),
            arrowRight = document.querySelector('.ourpets__arrow-right'),
            slider = document.querySelector('.ourpets__list'),
            sliderWidth = slider.offsetWidth;
    arrowRight.addEventListener('click', () => {
        offset = offset + 309;
        if (offset > sliderWidth - 1216) {
            offset = 0;
        }
        slider.style.left = -offset + 'px';
    });
    
    arrowLeft.addEventListener('click', () => {
        offset = offset - 309;
        if (offset < 0) {
            offset = sliderWidth - 1216;
        }
        slider.style.left = -offset + 'px';
    });
}

// Overlay
const overlayFunc = (openBtn, block, closeBtn) => {
    if (document.body.contains(document.querySelector(block && openBtn))) {
        const overlayBtn = document.querySelector(openBtn),
                overlay = document.querySelector(block),
                overlayCloseBtn = document.querySelector(closeBtn);
        
        overlayBtn.addEventListener('click', () => {
            overlay.classList.add('active');
        });
        
        overlayCloseBtn.addEventListener('click', () => {
            overlay.classList.remove('active');
        });
        
        overlay.addEventListener('click', (e) => {
            if ((e.target === overlay)) {
                overlay.classList.remove('active');
            }
        });
    }
};

overlayFunc('.btn-overlay','.overlay','.overlay__close');
overlayFunc('.btn-overla-reg','.overlay-reg','.overlay__close');
overlayFunc('.catalog__btn-sort','.catalog__sort-wrapper','.catalog__form-serch');
overlayFunc('.catalog__btn-admin', '.overlay-add','.overlay__close');
overlayFunc('.catalog__btn-edit', '.overlay-chage','.overlay__close');

// Переключение между регистрацией и авторизацией
if (document.body.contains(document.querySelector('.overlay__contact-login'))) {
    const loginForm = document.querySelector('.overlay__contact-login'),
            regForm = document.querySelector('.overlay__contact-reg'),
            loginBtn = document.querySelector('.overlay__link-login'),
            regBtn = document.querySelector('.overlay__link-reg');
            
    loginBtn.addEventListener('click', () => {
        loginForm.classList.add('active');
        regForm.classList.remove('active');
    });
    
    regBtn.addEventListener('click', () => {
        loginForm.classList.remove('active');
        regForm.classList.add('active');
    });
}

// Валидация
const checkValidationLogin = (inputId) => {
    const login = document.getElementById(inputId);

    login.addEventListener('input', (event) => {
        if (login.value == "") {
            login.setCustomValidity("Поле не должно быть пустым");
        } else {
            if (login.value.indexOf(' ') >= 0) {
                login.setCustomValidity("Поле не должно cодержать пробелы");
            } else {
                if (login.value.length < 2) {
                    login.setCustomValidity("Поле должно содержать 2 и более символов");
                } else {
                    login.setCustomValidity("");
                }
            }
        }
    });
};

checkValidationLogin("reg-input");

const checkValidationEmail = (inputId) => {
    const email = document.getElementById(inputId);
    email.addEventListener('input', (event) => {
        if (email.validity.typeMismatch) {
            email.setCustomValidity("Введите почту коректно");
        } else {
            email.setCustomValidity("");
        }
    });
};

checkValidationEmail("email-reg");

const checkValidationPass = (inputId) => {
    const pass = document.getElementById(inputId);
    pass.addEventListener('input', (event) => {
        if (pass.value.length < 8) {
            pass.setCustomValidity("Пароль должен содержать 8 или более символов");
        } else {
            pass.setCustomValidity("");
        }
        console.log(pass.value);
        console.log(pass.value.length);
    });
};

checkValidationPass("pass-reg");


// Маски ввода
document.addEventListener('DOMContentLoaded', () => {

    const mask = (dataValue, options) => {
        const elements = document.querySelectorAll(`[data-mask="${dataValue}"]`);
        if (!elements) return;
  
        elements.forEach(el => {
            IMask(el, options);
      });
    };
  
    // Маска для телефона
    mask('tel', {
        mask: '+{7}(000)000-00-00'
    });
  
    // Маска для даты
    mask('date', {
        mask: Date,
        min: new Date(1990, 0, 1),
    });
});

// Поиск
if(document.body.contains(document.querySelector('#live_search'))) {
    $(document).ready(function() {
        $("#live_search").keyup(function() {
            var input = $(this).val();
    
            $.ajax({
                url: "../config/livesearch.php",
                method: "POST",
                data:{input:input},
    
                success: function(data) {
                    $("#catalog__list").html(data);
                }
            });
        });
    });
}
