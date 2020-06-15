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

function animationOverlayWords(){
        //stockage des différentes itérations de l'overlay
    var overlayLenght = document.querySelector(".overlay-words").childElementCount;
    var word = document.querySelector(".overlay-words").children;
    var arrayOverlayWords = [];
    for(i = 0; i < overlayLenght; i++){
        if(arrayOverlayWords[0] != null){
            var element = 0;
            while(element < arrayOverlayWords.length && word[i].textContent != ""){
                if(arrayOverlayWords[element].includes(word[i].textContent)){
                    arrayOverlayWords[element][1].push(i);
                    break;
                }
                if(element + 1 == arrayOverlayWords.length){
                    arrayOverlayWords.push([word[i].textContent,[i]]);
                    break;
                }
                element++;
            }
        } else{
            arrayOverlayWords.push([word[i].textContent,[i]]);
        }
    }
        //activation overlay
    const arrayPhrases = [["vieillissement","cellulaire"],["nutrition","et","vieillissement"],["maladies","neurodégénérative","et cancer"],["molécules","antivieillissement"]]
    var randomElementIteration = function(numberIteration){
        return Math.round(Math.random() * Math.floor(numberIteration));
    }
    arrayPhrases.forEach(phrase => {
        arrayOverlayWords.forEach(element => {
            var randomIteration = randomElementIteration(element[1].length);
            if(phrase[0] == element[0]){
                for(word of phrase){
                    console.log(word);
                }
                // console.log(randomIteration);
                // console.log(element);
            }
        });
    });
}
animationOverlayWords()