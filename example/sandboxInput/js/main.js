(function(){
    'use strict';

    var myTextArea = document.getElementById('textarea');

    var b1 = document.getElementById("button1");

    submitButton.addEventListener("click", function() {
        var msg = document.getElementById("message").value;
        myTextArea.innerHTML = msg;
    });


})();
