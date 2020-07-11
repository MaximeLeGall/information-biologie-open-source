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
            window.addEventListener("resize",onResize)
        })(elements[i])
    }
    
    
})();



//animation overlay-words
(function animationBackgroundOverlay(){
    var overlayImage = document.querySelector(".overlay");
    var arraySrcImage = [];
    var i = 1;
    var srcImage = "image-overlay-1920/" + i + ".jpg";
    console.log(url(srcImage))
    while(url(srcImage) != undefined && i < 10){
        srcImage = "image-overlay-1920/" + i + ".jpg";
        arraySrcImage.push(srcImage)
        // console.log(overlayImage.style.background-image)
        i++
    }
    console.log(arraySrcImage)
}());

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
            console.log("parseFloatPossibleIteration: " + parseFloatPossibleIteration)
            return Math.round(Math.random() * Math.floor(parseFloatPossibleIteration));
        };
        const filterWord = function(arrayOverlayWords, word){
            return arrayOverlayWords.filter(el => el.indexOf(word) !== -1)
        };
        var incrément = 0;
        arrayPhrases.forEach(phrase => {
            setTimeout(function() {
                let elementArrayOverlayWords;
                let lenghtIteration;

                        //suppression de l'index de l'itération si > au dernier index de l'élément suivant

                let lastKey = null;
                let viableIteration = [];
                phrase.reverse();
                console.log(phrase)
                for(elementReversedPhrase of phrase){
                    elementArrayOverlayWords = filterWord(arrayOverlayWords, elementReversedPhrase);
                    lenghtIteration = elementArrayOverlayWords[0][1].length - 1;
                    if(lastKey != null){
                        while(elementArrayOverlayWords[0][1].every(elem => elem < lastKey) == false){
                            elementArrayOverlayWords[0][1].pop();
                        }
                    }
                    viableIteration.push(elementArrayOverlayWords[0]);
                    lastKey = elementArrayOverlayWords[0][1][lenghtIteration];
                }

                        //choix aléatoire des itérations
                
                phrase.reverse();
                let randomIndexKey;
                let arrayKeyWord = [];
                let i = 0;
                for(elementPhrase of phrase){
                    console.log(elementPhrase)
                    let keyWord = 0;
                    elementArrayOverlayWords = filterWord(viableIteration, elementPhrase);
                    console.log(elementArrayOverlayWords[0][1])
                    lenghtIteration = elementArrayOverlayWords[0][1].length - 1;
                    let stop = 0;
                    while(keyWord < arrayKeyWord[i-1]){
                        randomIndexKey = randomElementIteration(lenghtIteration);
                        keyWord = elementArrayOverlayWords[0][1][randomIndexKey];
                        stop++;
                    }
                    if(arrayKeyWord[0] == null){
                        randomIndexKey = randomElementIteration(lenghtIteration);
                        keyWord = elementArrayOverlayWords[0][1][randomIndexKey];
                    }
                    console.log(randomIndexKey)
                    console.log(keyWord)
                    arrayKeyWord.push(keyWord);
                    i++
                }
                console.log(phrase)
                    //activation de la nouvelle phrase et désactivation de l'ancienne
                for(spanWord of allSpanWord){
                        spanWord.classList.remove("js-overlay-active");
                }
                for(indexActive of arrayKeyWord){
                    allSpanWord[indexActive].classList.add("js-overlay-active");
                }
            }, 1 + incrément, incrément += 4000);
        })
        console.log("incrément: " + incrément)
        setTimeout(activationPhrase, incrément);
    }());
}());