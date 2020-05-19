

//menu collant
(function(){
    var scrollY = function(){
        var supportPageOffset = window.pageXOffset !== undefined;
        var isCSS1Compat = ((document.compatMode || "") === "CSS1Compat");
        return supportPageOffset ? window.pageYOffset : isCSS1Compat ? document.documentElement.scrollTop : document.body.scrollTop;
    }
    
    var element = document.querySelector(".menu")
    var rect = element.getBoundingClientRect()
    var top = rect.top + scrollY()
    var fakeElement = document.createElement("div")                 //div derrière la nav-bar pour éviter que le texte qui suit ne remonte au moment du scroll
    fakeElement.style.width = rect.width + "px"
    fakeElement.style.height = rect.height + "px"
    var onScroll = function(){ 
        var hasScrollClass = element.classList.contains("fixed")    //pas d'exécution de la condition dès que l'on scroll
        if(scrollY() > top && !hasScrollClass){
            element.classList.add("fixed")
            element.parentNode.insertBefore(fakeElement, element)
        }else if(scrollY() < top && hasScrollClass){
            element.classList.remove("fixed")
            element.parentNode.removeChild(fakeElement)
        }
    }
    
    //redimentionné quand l'utilisateur modifie la taille de la fenetre
    
    var onResize = function(){
        element.classList.remove("fixed")
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
    
})() 

 



















