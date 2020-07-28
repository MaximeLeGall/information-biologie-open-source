

//switch carousel first-part
(function(){
    var firstPart, 
    firstPart_width,
    abstractArticle,
    abstractArticle_width,
    abstractArticle_all,
    abstractArticle_last_index,
    abstractArticle_visible,
    arrowChangeArticle,
    arrowChangeArticle_width;
    var visibleArticle = function(){
        firstPart = document.querySelector("#first-part");
        firstPart_width = firstPart.getBoundingClientRect().width;
        abstractArticle = document.querySelector(".inlineArticle div");
        abstractArticle_width = abstractArticle.getBoundingClientRect().width + 30;
        abstractArticle_all = document.querySelectorAll(".inlineArticle div");
        abstractArticle_last_index = abstractArticle_all.length;
        arrowChangeArticle = document.querySelector(".arrowChangeArticle");
        arrowChangeArticle_width = arrowChangeArticle.getBoundingClientRect().width * 2;
        for(i = 0; i < abstractArticle_last_index; i++){
            if(abstractArticle_width * (i + 1) + arrowChangeArticle_width < firstPart_width){
                abstractArticle_all[i].classList.add("activeArticle");
            } 
            else{
                abstractArticle_all[i].style.display = "none";
            }
        }
    }
    visibleArticle()
    window.addEventListener("resize", visibleArticle)
        

    var lastAbstractArticle_width = 0;
    var inlineArticle = document.querySelector(".inlineArticle");
    var activeArticle_all = document.querySelectorAll(".activeArticle");
    var activeArticle_last;
    var activeArticle_first;
    var article_invisible_width = abstractArticle_width * (abstractArticle_last_index - 1 - activeArticle_all.length);
    function nextArticle(){
        if(lastAbstractArticle_width < 0){
            activeArticle_all = document.querySelectorAll(".activeArticle");
            activeArticle_first = activeArticle_all[0];
            lastAbstractArticle_width = lastAbstractArticle_width + abstractArticle_width;
            inlineArticle.style.transform = "translateX(" + lastAbstractArticle_width + "px)";
        }
    }

    function previousArticle(){
        if( - lastAbstractArticle_width <= article_invisible_width){
            activeArticle_all = document.querySelectorAll(".activeArticle");
            activeArticle_first = activeArticle_all[0];
            activeArticle_last = activeArticle_all[activeArticle_all.length - 1];
            console.log(activeArticle_last)
            lastAbstractArticle_width = lastAbstractArticle_width - abstractArticle_width;
            inlineArticle.style.transform = "translateX(" + lastAbstractArticle_width +"px)";
            activeArticle_first.style.opacity = "0";
            activeArticle_last.nextElementSibling.style.display = "";
            activeArticle_last.nextElementSibling.classList.add("activeArticle");
        }
    }
    document.querySelector(".leftArrow").addEventListener("click", nextArticle);
    document.querySelector(".rightArrow").addEventListener("click", previousArticle);
}());






