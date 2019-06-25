function showElement(x,y) {
    // Get the checkbox
    var checkBox = document.getElementById(x);
    // Get the output text
    var text = document.getElementById(y);


    // If the checkbox is checked, display the output text
    if (checkBox.checked == true){
        text.style.display = "block";
        text.setAttribute('required','');
    } else {
        text.style.display = "none";
    }
}