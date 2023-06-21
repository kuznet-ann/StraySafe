// Hamburger
const menuOpen = document.querySelector('.menu__hamburger'),
        menuClose = document.querySelector('.menu__close')
        menu = document.querySelector('.menu__list-bg');

menuOpen.addEventListener('click', () => {
    menu.style.right = 0;
});

menuClose.addEventListener('click', () => {
    menu.style.right = "-350px";
});

// Slider
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
    if (document.body.contains(document.querySelector(block))) {
        const overlayBtn = document.querySelector(openBtn),
                overlay = document.querySelector(block),
                overlayCloseBtn = document.querySelector(closeBtn);
        
        overlayBtn.addEventListener('click', function() {
            overlay.classList.add('active');
        });
        
        overlayCloseBtn.addEventListener('click', function() {
            overlay.classList.remove('active');
        });
        
        overlay.addEventListener('click', function(e) {
            if ((e.target === overlay)) {
                    overlay.classList.remove('active');
            }
        });
    }
};

overlayFunc('.btn-overlay','.overlay','.overlay__close');
overlayFunc('.catalog__btn-sort','.catalog__form-sort','.catalog__form-serch');
