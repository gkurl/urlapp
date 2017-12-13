function ClickEvents(){
    //initialise the <span> class from HTML
    var Switch = document.querySelector('.closealert');


        //Set the event listener
        Switch.addEventListener('click', Transition, false);

}

function Transition() {
    var element = document.getElementById('error');
    element.classList.toggle('collapsed');
    /*if (event.target.className == 'closealert') {    }*/

}

window.onload = function () {

        Transition();

}


ClickEvents();
