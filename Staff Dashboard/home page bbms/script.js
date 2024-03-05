let text = document.getElementById('text');
let photo1 = document.getElementById('photo1');
let photo2 = document.getElementById('photo2');
let photo3 = document.getElementById('photo3');
let photo4 = document.getElementById('photo4');
let photo5 = document.getElementById('photo5');

window.addEventListener('scroll',() => {
    let value = window.scrollY;

    text.style.marginTop = value * 2.5 + 'px';
    photo1.style.left = value * -1 + 'px';
    photo2.style.left = value * -1 + 'px';
    photo3.style.left = value * 1 + 'px';
    photo4.style.left = value * 1 + 'px';
    photo5.style.top = value * -1 + 'px';
})