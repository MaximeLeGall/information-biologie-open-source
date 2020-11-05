

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

(function(){
    var allButtonType = document.querySelectorAll('.b-article button');
    var articlePresentation = document.querySelector('.article-presentation');
    var dataArticle = document.querySelector('.data-article');
    function displayButton(){
        if(articlePresentation.children.length == 0){
            for(i = 1; i < allButtonType.length; i++){
                allButtonType[i].style.display = "none";
            }
        }
        else{
            for(i = 1; i < allButtonType.length; i++){
                allButtonType[i].style.display = "block";
            }
            allButtonType[0].style.display = "none";
        }
    }
    displayButton();
    //Listener buttons rédaction + action of button
    for(let buttonType of allButtonType){
        buttonType.addEventListener('click', function(){
            var textarea = document.querySelector('#textarea');
            var valideArticle = document.querySelector('#valide-article');
            var newContent = textarea.value;
            if(/\w/.test(textarea.value)){
                if(this.value === 'h1'){
                    dataArticle.insertAdjacentHTML('beforeend', '<h1>' + newContent + '</h1>');
                    articlePresentation.insertAdjacentHTML('beforeend',  '<h1>' + newContent + '</h1>');
                }
                if(this.value === 'h2'){
                    dataArticle.insertAdjacentHTML('beforeend', '<h2>' + newContent + '</h2>');
                    articlePresentation.insertAdjacentHTML('beforeend',  '<h2>' + newContent + '</h2>');
                }
                if(this.value === 'p'){
                    dataArticle.insertAdjacentHTML('beforeend', '<p>' + newContent + '</p>');
                    articlePresentation.insertAdjacentHTML('beforeend',  '<p>' + newContent + '</p>');
                    valideArticle.style.display = "block";
                }
            }
            textarea.value = "";
            displayButton();
        });
    };
})();




