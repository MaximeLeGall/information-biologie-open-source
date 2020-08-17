

//first-part switch carousel 
(function(){
    var firstPart_width,
        article_width,
        article_all,
        article_last_index,
        allActiveArticle_width,
        allActiveArticle_center,
        inlineArticle,
        activeArticle_all,
        element;
    var visibleArticle = function(){
        firstPart_width = document.querySelector("#first-part").getBoundingClientRect().width;
        inlineArticle = document.querySelector(".inlineArticle");
        article_width = document.querySelector(".inlineArticle div").getBoundingClientRect().width + 30;
        article_all = document.querySelectorAll(".inlineArticle div");
        article_last_index = article_all.length;
        for(i = 0; i < article_last_index; i++){
            element = article_all[i];
            if(article_width * (i + 1) + 100 < firstPart_width){
                element.classList.remove("hideArticle");
                element.classList.add("visibleArticle");
            } 
            else{
                element.classList.remove("visibleArticle");
                element.classList.add("hideArticle");
            }
        }
            //centrage des éléments actifs
        activeArticle_all = document.querySelectorAll(".visibleArticle");
        allActiveArticle_width = activeArticle_all.length * article_width;
        allActiveArticle_center = (firstPart_width - allActiveArticle_width) / 2;
        inlineArticle.style.marginLeft = allActiveArticle_center + "px";
            //retour au première élément
        if(lastArticle_width != undefined){
            lastArticle_width = 0;
            inlineArticle.style.transform = "translateX(" + lastArticle_width + "px)";
        }
    }
    visibleArticle();
    window.addEventListener("resize", visibleArticle);
        

    var lastArticle_width = 0;
    var activeArticle_all,
        activeArticle_last,
        activeArticle_first,
        article_invisible_width;
    function nextArticle(){
        if(lastArticle_width < 0){
            activeArticle_all = document.querySelectorAll(".visibleArticle");
            activeArticle_first = activeArticle_all[0];
            activeArticle_last = activeArticle_all[activeArticle_all.length - 1];
            lastArticle_width = lastArticle_width + article_width;
            inlineArticle.style.transform = "translateX(" + lastArticle_width + "px)";
            activeArticle_first.previousElementSibling.classList.add("visibleArticle");
            activeArticle_first.previousElementSibling.classList.remove("hideArticle");
            activeArticle_last.classList.add("hideArticle");
            activeArticle_last.classList.remove("visibleArticle");
        }
    }

    function previousArticle(){
        activeArticle_all = document.querySelectorAll(".visibleArticle");
        activeArticle_first = activeArticle_all[0];
        activeArticle_last = activeArticle_all[activeArticle_all.length - 1];
        article_invisible_width = article_width * (article_last_index - 1 - activeArticle_all.length);
        if( - lastArticle_width <= article_invisible_width && activeArticle_last.nextElementSibling != undefined){
            lastArticle_width = lastArticle_width - article_width;
            inlineArticle.style.transform = "translateX(" + lastArticle_width +"px)";
            activeArticle_first.classList.remove("visibleArticle");
            activeArticle_first.classList.add("hideArticle");
            activeArticle_last.nextElementSibling.classList.remove("hideArticle");
            activeArticle_last.nextElementSibling.classList.add("visibleArticle");
        }
    }
    document.querySelector(".leftArrow").addEventListener("click", nextArticle);
    document.querySelector(".rightArrow").addEventListener("click", previousArticle);
}());






