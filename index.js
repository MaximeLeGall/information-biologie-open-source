
//switch carousel first-part
(function(){
    var visibleArticle = function(){
        var firstPart = document.querySelector("#first-part");
        var firstPart_width = firstPart.getBoundingClientRect().width;
        var abstractArticle = document.querySelector(".newArticles div");
        var abstractArticle_width = abstractArticle.getBoundingClientRect().width + 30;
        var abstractArticle_all = document.querySelectorAll(".newArticles div");
        var abstractArticle_lenght = abstractArticle_all.length;
        for(i = 0; i < abstractArticle_lenght; i++){
            if(abstractArticle_width * (i + 1) < firstPart_width){
                abstractArticle_all[i].style.display = "block";
            }
            else{
                abstractArticle_all[i].style.display = "none";
            }
        }
    }
    visibleArticle()
    window.addEventListener("resize", visibleArticle)
}());
