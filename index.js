

//switch carousel first-part
(function(){
    var firstPart, 
    firstPart_width,
    article,
    article_width,
    article_all,
    article_last_index,
    arrowChangeArticle,
    arrowChangeArticle_width,
    activeArticle_lenght,
    allActiveArticle_width,
    element;
    var visibleArticle = function(){
        firstPart = document.querySelector("#first-part");
        firstPart_width = firstPart.getBoundingClientRect().width;
        article = document.querySelector(".inlineArticle div");
        article_width = article.getBoundingClientRect().width + 30;
        article_all = document.querySelectorAll(".inlineArticle div");
        article_last_index = article_all.length;
        activearticle_lenght = 0;
        arrowChangeArticle_width = document.querySelector(".arrowChangeArticle").getBoundingClientRect().width * 2;
        for(i = 0; i < article_last_index; i++){
            element = article_all[i];
            if(article_width * (i + 1) + arrowChangeArticle_width < firstPart_width){
                element.classList.remove("hideArticle");
                element.classList.add("visibleArticle");
                activeArticle_lenght += 1;
            } 
            else{
                element.classList.remove("visibleArticle");
                element.classList.add("hideArticle");
            }
        }
        allActiveArticle_width = activeArticle_lenght * article_width;
    }
    visibleArticle();
    window.addEventListener("resize", visibleArticle);
        

    var lastArticle_width = 0;
    var inlineArticle = document.querySelector(".inlineArticle");
    var activeArticle_all = document.querySelectorAll(".visibleArticle");
    var activeArticle_last;
    var activeArticle_first;
    var article_invisible_width = article_width * (article_last_index - 1 - activeArticle_all.length);
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
        if( - lastArticle_width <= article_invisible_width){
            activeArticle_all = document.querySelectorAll(".visibleArticle");
            activeArticle_first = activeArticle_all[0];
            activeArticle_last = activeArticle_all[activeArticle_all.length - 1];
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






