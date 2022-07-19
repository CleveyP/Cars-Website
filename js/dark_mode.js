let darkToggler = document.getElementById("dark-mode-button");
let isDark = darkToggler.value;
let form = document.getElementById('dark-form');

darkToggler.addEventListener('click', function(){
    if(isDark){ //toggle to light mode
        isDark = false;
        darkToggler.value = isDark;
        alert("Now entering Bright mode!");
        form.submit();
    }
    else{
        isDark = true;
        darkToggler.value = isDark;
        alert("Now entering Dark mode!");
        form.submit();
    }
})