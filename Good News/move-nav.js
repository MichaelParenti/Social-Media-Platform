document.addEventListener("DOMContentLoaded", ()=>{

    //Declarations
    var nav = document.querySelector("nav");

    //Move Nav
    setInterval(()=>{

        var y = window.scrollY;

        if(y <= 100){
            nav.style.position = 'absolute';
            nav.style.top = 100 + "px";
        } else {
            nav.style.position = "fixed";
            nav.style.top = 0 + "px";
        }

    },1)

});