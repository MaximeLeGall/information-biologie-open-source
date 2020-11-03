

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



//add element into the article

var allButtonType = document.querySelectorAll('button');
for(let buttonType of allButtonType){
    buttonType.addEventListener('click', function(){
        var article = document.querySelector('.article');
        var textarea = document.querySelector('#textarea');
        if(this.value === 'h1'){
            var newElement = document.createElement("h1");
            var newContent = document.createTextNode(textarea.value);
            newElement.appendChild(newContent);
            article.insertAdjacentElement('beforeend', newElement);
        }
        if(this.value === 'h2'){
            var newElement = document.createElement("h2");
            var newContent = document.createTextNode(textarea.value);
            newElement.appendChild(newContent);
            article.insertAdjacentElement('beforeend', newElement);
        }
        if(this.value === 'p'){
            var newElement = document.createElement("p");
            var newContent = document.createTextNode(textarea.value);
            newElement.appendChild(newContent);
            article.insertAdjacentElement('beforeend', newElement);
        }
        textarea.value = "";
    });
};



