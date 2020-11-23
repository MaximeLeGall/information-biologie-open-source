

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


//redaction
//add element into the article

(function(){
    var allButtonType = document.querySelectorAll('.b-article button');
    var articlePresentation = document.querySelector('.article-presentation');
    var dataArticle = document.querySelector('.data-article');
    var articleName = document.querySelector('.article-name');
    if(allButtonType[0]){
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
                var newContent = textarea.value.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#039;");
                console.log(newContent);
                if(/\w/.test(textarea.value)){
                    if(this.value === 'h1'){
                        articleName.value = newContent;
                        dataArticle.insertAdjacentHTML('beforeend', '<h1>' + newContent + '</h1>');
                        articlePresentation.insertAdjacentHTML('beforeend', '<h1>' + newContent + '</h1>');
                    }
                    else if(this.value === 'h2'){
                        dataArticle.insertAdjacentHTML('beforeend', '<h2>' + newContent + '</h2>');
                        articlePresentation.insertAdjacentHTML('beforeend', '<h2>' + newContent + '</h2>');
                    }
                    else if(this.value === 'p'){
                        dataArticle.insertAdjacentHTML('beforeend', '<p>' + newContent + '</p>');
                        articlePresentation.insertAdjacentHTML('beforeend', '<p>' + newContent + '</p>');
                        valideArticle.style.display = "block";
                    }
                }
                textarea.value = "";
                displayButton();
            });
        };
    }
})();




