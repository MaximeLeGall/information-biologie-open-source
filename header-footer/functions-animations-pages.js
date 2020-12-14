//Automatisation de l'implémentation des titres dans companion
(function(){
    var title = document.querySelectorAll("h1, h2")
    var liste = document.querySelector(".reading-companion-panel-list")
    var hrefCompanion = document.querySelector(".reading-companion-section-item a")
    if(liste != undefined){
        for(i = 0; i < title.length; i++){
            hrefCompanion.innerHTML = title[i].textContent
            hrefCompanion.setAttribute("href", "#link"+[i])
            title[i].setAttribute("id", "link"+[i])
            var companionLink = document.querySelector(".reading-companion-section-item").cloneNode(true)
            liste.appendChild(companionLink)
        }
        liste.removeChild(liste.getElementsByTagName("li")[0])

    }
        //align title in screen
    function offsetAnchor() {
        if(location.hash.length !== 0) {
            window.scrollTo(window.scrollX, window.scrollY - 100);
        }
    }
    
    window.addEventListener("hashchange", offsetAnchor);

})();



//nav-bar and companion, sticky 
(function(){
    var scrollY = function(){
        var supportPageOffset = window.pageXOffset !== undefined;
        var isCSS1Compat = ((document.compatMode || "") === "CSS1Compat");
        return supportPageOffset ? window.pageYOffset : isCSS1Compat ? document.documentElement.scrollTop : document.body.scrollTop;
    }
    
    var elements = document.querySelectorAll('[data-sticky]')
    for(var i = 0; i < elements.length; i++){
        (function(element){
            var rect = element.getBoundingClientRect()
            var top = rect.top + scrollY()
            var offset = parseInt( element.getAttribute("data-offset") || 0, 10)
            if(element.getAttribute("data-constraint")){
                var constraint = document.querySelector(element.getAttribute("data-constraint"))
            }
            else{
                var constraint = document.body
            }
            var constraintRect = constraint.getBoundingClientRect()
            var constraintBottom = constraintRect.top + scrollY() + constraintRect.height - offset - rect.height
            var fakeElement = document.createElement("div")                 //div derrière la nav-bar pour éviter que le texte qui suit ne remonte au moment du scroll
            fakeElement.style.width = rect.width + "px"
            fakeElement.style.height = rect.height + "px"
            var onScroll = function(){ 
                if(scrollY() > constraintBottom && element.style.position != "absolute"){
                    element.style.position = "absolute"
                    element.style.bottom = "0"
                    element.style.top = "auto"
                }
                else if(scrollY() > top - offset && scrollY() < constraintBottom && element.style.position != "fixed"){
                    element.style.position = "fixed"
                    element.style.top = offset + "px"
                    element.style.bottom = "auto"
                    if(element.classList.contains("menu")){
                        element.style.left = "0px"
                        element.style.right = "0px"
                    }
                    element.parentNode.insertBefore(fakeElement, element)
                }
                else if(scrollY() < top - offset && element.style.position != "static" && element.parentNode.contains(fakeElement)){
                    element.style.position = "static"
                    element.parentNode.removeChild(fakeElement)
                }
            }


            //redimentionné quand l'utilisateur modifie la taille de la fenetre
            var onResize = function(){
                element.style.position = "static"
                fakeElement.style.display = "none"
                rect = element.getBoundingClientRect()
                top = rect.top + scrollY()
                fakeElement.style.width = rect.width + "px"
                fakeElement.style.height = rect.height + "px"
                fakeElement.style.display = "block"
                onScroll()
            }

            window.addEventListener("scroll", onScroll)
            window.addEventListener("resize", onResize)
        })(elements[i])
    }
})();

    //companion button 
function switchButton(newButton){
    var companionPanelActive = document.querySelector(".reading-companion-panel--active");
    var allCompanionPanel = document.querySelectorAll(".reading-companion-panel");
    var companionTabActive = document.querySelector(".reading-companion-tab--active");
    companionPanelActive.classList.remove("reading-companion-panel--active");
    companionTabActive.classList.remove("reading-companion-tab--active");
    newButton.classList.add("reading-companion-tab--active");
    allCompanionPanel.forEach(element => {
        if(element.getAttribute("name") === newButton.getAttribute("id")){
            element.classList.add("reading-companion-panel--active")
        }
    });
}


    //animation backgroud-image carousel
(function(){
        //creation of different images
    var arrayImage = [];
    var backgroudImageOverlay = document.querySelector(".backgroud-image-carousel");
    for(i = 0; i < arraySrcImage.length; i++){
        var newImage = document.createElement("img");
        newImage.classList.add("image" + i);
        arrayImage.push("image" + i);
        newImage.setAttribute("src",  arraySrcImage[i]);
        backgroudImageOverlay.appendChild(newImage);
    }
    
    var timeImage;
    setInterval(function animationBackgroundOverlay() {
        timeImage = 0;
        arrayImage.forEach(element => {
            setTimeout(function() {
                var currentImage = document.querySelector("." + element);
                var nextImage = function(){
                    var indexNextImage = arrayImage.indexOf(element) + 1;
                    if(indexNextImage >= arrayImage.length){
                        return document.querySelector("." + arrayImage[0]);
                    }
                    else{
                        return document.querySelector("." + arrayImage[indexNextImage]);
                    }
                }
                var previousImage = function(){
                    var indexPreviousImage = arrayImage.indexOf(element) - 1;
                    if(indexPreviousImage < 0){
                        return document.querySelector("." + arrayImage[arrayImage.length - 1]);
                    }
                    else{
                        return document.querySelector("." + arrayImage[indexPreviousImage]);
                    }
                }
                previousImage().classList.remove("change-animation");
                nextImage().style.zIndex = "1";
                currentImage.style.zIndex = "";
                currentImage.classList.add("change-animation");
            }, 1 + timeImage, timeImage += 7000);
        });
        return animationBackgroundOverlay;
    }(), timeImage);
})();


    //animation overlay-words carousel
(function animationOverlayWords(){
        //stockage des différentes répétition dans l'overlay
    var overlayLenght = document.querySelector(".overlay-words").childElementCount;
    var allSpanWord = document.querySelector(".overlay-words").children;
    var arrayOverlayWords = [];
    for(i = 0; i < overlayLenght; i++){
        if(allSpanWord[i].getBoundingClientRect().left > 0 && allSpanWord[i].getBoundingClientRect().right < window.innerWidth){
            if(arrayOverlayWords[0] != null){   
                let element = 0;
                while(element < arrayOverlayWords.length && allSpanWord[i].textContent != ""){  //si textContent = "": il sagit d'un <br>
                    if(arrayOverlayWords[element].includes(allSpanWord[i].textContent)){
                        arrayOverlayWords[element][1].push(i);
                        break;
                    }
                    if(element + 1 == arrayOverlayWords.length){
                        arrayOverlayWords.push([allSpanWord[i].textContent,[i]]);
                        break;
                    }
                    element++;
                }
            } else{
                arrayOverlayWords.push([allSpanWord[i].textContent,[i]]);
            }
        }
    };

        //choix aléatoire des itérations de chaque phrase
    
    (function activationPhrase(){
        const arrayPhrases = [["vieillissement","cellulaire"],["nutrition","et","vieillissement"],["maladies","neurodégénératives","et cancer"],["molécules","antivieillissement"]];
        const randomElementIteration = function(parseFloatPossibleIteration){
            return Math.round(Math.random() * Math.floor(parseFloatPossibleIteration));
        };
        const filterWord = function(arrayOverlayWords, word){
            return arrayOverlayWords.filter(el => el.indexOf(word) !== -1)
        };
        var incrément = 0;
        arrayPhrases.forEach(phrase => {
            setTimeout(function() {
                let elementArrayOverlayWords;
                let lenghtKeys;

                        //suppression de la dernière clé si > a la dernière clé de l'élément précédent (élément suivant de la phrase)

                let lastKey = null;
                let viableIteration = [];
                phrase.reverse();
                for(elementReversedPhrase of phrase){
                    elementArrayOverlayWords = filterWord(arrayOverlayWords, elementReversedPhrase);
                    lenghtKeys = elementArrayOverlayWords[0][1].length - 1;
                    if(lastKey != null){
                        while(elementArrayOverlayWords[0][1][lenghtKeys] > lastKey){
                            elementArrayOverlayWords[0][1].pop();
                        }
                        viableIteration.push(elementArrayOverlayWords[0]);
                        lastKey = elementArrayOverlayWords[0][1][elementArrayOverlayWords[0][1].length - 1];    //attention: lengthKey correspond au nombre de clées avant suppression (si suppression clé renvoie undefined)
                    }else{
                        viableIteration.push(elementArrayOverlayWords[0]);
                        lastKey = elementArrayOverlayWords[0][1][lenghtKeys];
                    }
                }

                        //choix aléatoire des itérations
                
                phrase.reverse();
                let randomIndexKey;
                let arrayKeyWord = [];
                let i = 0;
                for(elementPhrase of phrase){
                    let keyWord = 0;
                    elementArrayOverlayWords = filterWord(viableIteration, elementPhrase);
                    lenghtKeys = elementArrayOverlayWords[0][1].length - 1;
                    if(arrayKeyWord[0] == null){
                        randomIndexKey = randomElementIteration(lenghtKeys);
                        keyWord = elementArrayOverlayWords[0][1][randomIndexKey];
                    }
                    else{
                        var numberIterations = 0;
                        while(keyWord < arrayKeyWord[i-1] && numberIterations < 51){
                            randomIndexKey = randomElementIteration(lenghtKeys);
                            keyWord = elementArrayOverlayWords[0][1][randomIndexKey];
                            if(numberIterations == 50){
                                keyWord = elementArrayOverlayWords[0][1][lenghtKeys];
                            }
                            numberIterations ++;
                        }
                    }
                    arrayKeyWord.push(keyWord);
                    i++
                }
                    //activation de la nouvelle phrase et désactivation de l'ancienne
                for(spanWord of allSpanWord){
                    spanWord.classList.remove("js-overlay-active");
                }
                for(indexActive of arrayKeyWord){
                    allSpanWord[indexActive].classList.add("js-overlay-active");
                }
            }, 1 + incrément, incrément += 4000);
        })
        setTimeout(activationPhrase, incrément);
    })();
})();


    // bouton de connexion du header
function activationProfileOption(element1, element2){
    if(document.querySelector(element1)){
        document.querySelector(element1).style.visibility = "visible";
    }
    if(document.querySelector(element2)){
        document.querySelector(element2).style.backgroundColor = "rgba(255,255,255,1)";
    }
};

function desactivationProfileOption(element1, element2){
    if(document.querySelector(element1)){
        document.querySelector(element1).style.visibility = "hidden";
    }
    if(document.querySelector(element2)){
        document.querySelector(element2).style.backgroundColor = "rgba(255,255,255,0.5)";
    }
};

    


var commentAdded = document.querySelector('.clone-comment-added');
var allComments = document.querySelectorAll('.add-response-comment');
allResponseComment.forEach(response => {
    allComments.forEach(comment => {
        var cloneCommentAdded = commentAdded.cloneNode(true);
        var dataId = comment.getAttribute('data-id');
        var idCommentResponse = response['response_to_comment'];
        if(dataId == idCommentResponse){
            cloneCommentAdded.querySelector('#comment-content').innerHTML = response['comment_article'];
            cloneCommentAdded.querySelector('#user-pseudo').innerHTML = response['user_pseudo'];
            cloneCommentAdded.querySelector('.date').innerHTML = 'Le: ' + response['DATE_FORMAT(date_comment, "%d/%m/%Y")'];
            cloneCommentAdded.style.display = 'flex';
            comment.insertAdjacentElement('afterend', cloneCommentAdded);
        }
    });
});
            //item pseudo (first letter of pseudo)
var allPseudos = document.querySelectorAll('#user-pseudo');
var currentUserPseudo = document.querySelector('#currentUserPseudo');
function itemPseudo(pseudo){
    if(pseudo.getAttribute('id') === 'user-pseudo'){
        var itemPseudo = pseudo.parentNode.parentNode.parentNode.querySelector('.item-pseudo');
    }
    else{
        var itemPseudo = pseudo.parentNode.querySelector('.item-pseudo');
    }
    var firstLetterPseudo = pseudo.textContent.substring(0, 1);
    itemPseudo.innerHTML = firstLetterPseudo;
}
allPseudos.forEach(pseudo =>{
    itemPseudo(pseudo);
});
if(currentUserPseudo){
    itemPseudo(currentUserPseudo);
}


        //add comment
(function(){
    function addComment(){
        var elementsFocus = document.querySelectorAll('.new-comment-content');
        if(elementsFocus[0] != undefined){
            elementsFocus.forEach(element =>{
                    //add focus info
                var infoFocus = element.parentNode.parentNode.querySelector('.focus');
                element.addEventListener("focusin", function(){
                    infoFocus.classList.add('focus-selected-comment');
                });
                element.addEventListener("focusout", function(){
                    infoFocus.classList.remove('focus-selected-comment');
                });
                    //active button add comment
                element.addEventListener('input', function(){
                    var buttonAddComment = this.parentNode.parentNode.querySelector('button');
                    if(/\w/.test(element.value)){
                        buttonAddComment.classList.add('b-comment--active');
                        buttonAddComment.removeAttribute('disabled')
                    }
                    else{
                        buttonAddComment.classList.remove('b-comment--active');
                        buttonAddComment.setAttribute('disabled', "")
                    }
                });
            })
        }
    }
    addComment();
                //creation button cancel + displayed of response comment and insertion
    var allButtonResponse = document.querySelectorAll('.add-response-comment');
    var formNewComment = document.querySelector('.form-new-comment');
    if(formNewComment){
        var buttonCancel = document.createElement('button');
        var responseComment = formNewComment.cloneNode(true);
        buttonCancel.innerHTML = 'ANULLER';
        buttonCancel.classList.add('buttonCancel');
        buttonCancel.setAttribute('type', 'button');
        responseComment.insertAdjacentElement('beforeend', buttonCancel);
        allButtonResponse.forEach(buttonResponse => {
            buttonResponse.addEventListener('click', function(){
                var buttonAddComment = responseComment.querySelector('.b-comment');
                this.insertAdjacentElement('afterend', responseComment);
                buttonAddComment.classList.remove('b-comment--active');
                buttonAddComment.setAttribute('disabled', "");
                responseComment.style.display = 'block';
                addComment();
                sendComment();
            })
        });
        buttonCancel.addEventListener('click', function(){
            responseComment.querySelector('.new-comment-content').value = "";
            responseComment.style.display = 'none';
        })
    }
})();



