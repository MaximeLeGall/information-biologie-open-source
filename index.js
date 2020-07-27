

//switch carousel first-part
(function(){
    var firstPart, 
    firstPart_width,
    abstractArticle,
    abstractArticle_width,
    abstractArticle_all,
    abstractArticle_lenght,
    abstractArticle_visible,
    arrowChangeArticle,
    arrowChangeArticle_width;
    var visibleArticle = function(){
        abstractArticle_visible = 0;
        firstPart = document.querySelector("#first-part");
        firstPart_width = firstPart.getBoundingClientRect().width;
        abstractArticle = document.querySelector(".inlineArticle div");
        abstractArticle_width = abstractArticle.getBoundingClientRect().width + 30;
        abstractArticle_all = document.querySelectorAll(".inlineArticle div");
        abstractArticle_lenght = abstractArticle_all.length;
        arrowChangeArticle = document.querySelector(".arrowChangeArticle");
        arrowChangeArticle_width = arrowChangeArticle.getBoundingClientRect().width * 2;
        for(i = 0; i < abstractArticle_lenght; i++){
            if(abstractArticle_width * (i + 1) + arrowChangeArticle_width < firstPart_width){
                abstractArticle_all[i].style.display = "block";
                abstractArticle_visible += 1;
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
    var article_invisible_width = abstractArticle_width * (abstractArticle_lenght - 1 - abstractArticle_visible);
    function nextArticle(){
        if(lastAbstractArticle_width < 0){
            lastAbstractArticle_width = lastAbstractArticle_width + abstractArticle_width;
            inlineArticle.style.transform = "translateX(" + lastAbstractArticle_width + "px)";
        }
    }

    function previousArticle(){
        if( - lastAbstractArticle_width <= article_invisible_width){
            lastAbstractArticle_width = lastAbstractArticle_width - abstractArticle_width;
            inlineArticle.style.transform = "translateX(" + lastAbstractArticle_width +"px)";
        }
    }
    document.querySelector(".leftArrow").addEventListener("click", nextArticle);
    document.querySelector(".rightArrow").addEventListener("click", previousArticle);
}());






