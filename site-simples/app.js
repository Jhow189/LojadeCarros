'use strict'

const switcher = document.querySelector('.btn');
switcher.addEventListener('click', function() {
    document.body.classList.toggle("dark-theme") //toggle alterar o elemento da class para dark

    var ClassName = document.body.className;
    if(ClassName == "light-theme") {
        this.textContent = "dark";
    }
    else{
        this.textContent = "light";
    }
    console.log('current class name:' + ClassName);
});