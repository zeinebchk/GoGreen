window.addEventListener('scroll', function() {
    var imgMoDurable = document.querySelector('.img-mo-durable');
    var positionFromTop = imgMoDurable.getBoundingClientRect().top;
    var screenHeight = window.innerHeight;

    if (positionFromTop - screenHeight <= 0) {
        imgMoDurable.classList.add('animate');
    }
});
window.addEventListener('scroll', function() {
    var imgMoDurable = document.querySelector('.parag');
    var positionFromTop = imgMoDurable.getBoundingClientRect().top;
    var screenHeight = window.innerHeight;

    if (positionFromTop - screenHeight <= 0) {
        imgMoDurable.classList.add('animate2');
    }
});

window.addEventListener('scroll', function() {
    var imgMoDurable = document.querySelector('.recuperer-text');
    var positionFromTop = imgMoDurable.getBoundingClientRect().top;
    var screenHeight = window.innerHeight;

    if (positionFromTop - screenHeight <= 0) {
        imgMoDurable.classList.add('animRecText');
    }
});
window.addEventListener('scroll', function() {
    var imgMoDurable = document.querySelector('.recuperer');
    var positionFromTop = imgMoDurable.getBoundingClientRect().top;
    var screenHeight = window.innerHeight;

    if (positionFromTop - screenHeight <= 0) {
        imgMoDurable.classList.add('animRec');
    }
});
window.addEventListener('scroll', function() {
    var imgMoDurable = document.querySelector('.reserv');
    var positionFromTop = imgMoDurable.getBoundingClientRect().top;
    var screenHeight = window.innerHeight;

    if (positionFromTop - screenHeight <= 0) {
        imgMoDurable.classList.add('animReserv');
    }
});
window.addEventListener('scroll', function() {
    var imgMoDurable = document.querySelector('.reserv-text');
    var positionFromTop = imgMoDurable.getBoundingClientRect().top;
    var screenHeight = window.innerHeight;

    if (positionFromTop - screenHeight <= 0) {
        imgMoDurable.classList.add('animResText');
    }
});
window.addEventListener('scroll', function() {
    var imgMoDurable = document.querySelector('.venir');
    var positionFromTop = imgMoDurable.getBoundingClientRect().top;
    var screenHeight = window.innerHeight;

    if (positionFromTop - screenHeight <= 0) {
        imgMoDurable.classList.add('animven');
    }
});
window.addEventListener('scroll', function() {
    var imgMoDurable = document.querySelector('.venir-text');
    var positionFromTop = imgMoDurable.getBoundingClientRect().top;
    var screenHeight = window.innerHeight;

    if (positionFromTop - screenHeight <= 0) {
        imgMoDurable.classList.add('animvenText');
    }
});
window.addEventListener('scroll', function() {
    var imgMoDurable = document.querySelector('.balade');
    var positionFromTop = imgMoDurable.getBoundingClientRect().top;
    var screenHeight = window.innerHeight;

    if (positionFromTop - screenHeight <= 0) {
        imgMoDurable.classList.add('animbal');
    }
});
window.addEventListener('scroll', function() {
    var imgMoDurable = document.querySelector('.balade-text');
    var positionFromTop = imgMoDurable.getBoundingClientRect().top;
    var screenHeight = window.innerHeight;

    if (positionFromTop - screenHeight <= 0) {
        imgMoDurable.classList.add('animBalText');

    }

});



