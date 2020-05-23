
//Automatisation de l'incrémentation des titres ddans companion
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
})();


//nav-bar and companion, sticky 
(function(){
    var scrollY = function(){
        var supportPageOffset = window.pageXOffset !== undefined;
        var isCSS1Compat = ((document.compatMode || "") === "CSS1Compat");
        return supportPageOffset ? window.pageYOffset : isCSS1Compat ? document.documentElement.scrollTop : document.body.scrollTop;
    }
    
    var elements = document.querySelectorAll('[data-sticky]')
    for(var i = 0; elements.length; i++){
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
                //var hasScrollClass = element.classList.contains("fixed")    //pas d'exécution de la condition dès que l'on scroll
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



