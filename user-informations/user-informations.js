

//bouton modification

function modify(information, buttonWord, displayedElement, input, inputName){
    var paragrapheInformation = document.querySelector('.information');
    paragrapheInformation.insertAdjacentHTML('afterbegin', information)
    var buttonConfirmation = document.querySelector('#b-confirmation');
    buttonConfirmation.insertAdjacentHTML('afterbegin', buttonWord);
    document.querySelector(displayedElement).style.display = "flex";
    document.querySelector(displayedElement).style.top =  window.scrollY + "px";
    document.querySelector('body').style.overflow = "hidden";
    if(input == true){
        var creatInput = document.createElement('input');
        creatInput.setAttribute("type", "text");
        creatInput.setAttribute("name", inputName);
        buttonConfirmation.insertAdjacentElement('beforebegin', creatInput);
    }
}

//cancel modification