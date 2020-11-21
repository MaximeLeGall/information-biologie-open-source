var getHttpRequest = function(){
    var httpRequest = false;

    if(window.XMLHttpRequest){
        httpRequest = new XMLHttpRequest();
        if(httpRequest.overrideMimeType){
            httpRequest.overrideMimeType('text/xml');
        }
    }
    else if(window.ActiveXObject){
        try{
            httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch(e){
            try{
                httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch(e){}
        }
    }
    if(!httpRequest){
        alert('Impossible de créer une instance XMLHTTP');
        return false;
    }
    else{
        return httpRequest;
    }
}

var addComment = document.querySelector('#form-new-comment');
var result = document.querySelector('.all-comments');
var httpRequest = getHttpRequest();
if(addComment){
    addComment.addEventListener('submit',function(e){
        e.preventDefault();
        httpRequest.onreadystatechange = function(){
            if(httpRequest.readyState === 4){
                result.innerHTML = '';
                if(httpRequest.status === 200){
                    result.innerHTML = httpRequest.responseText;
                    console.log(httpRequest.responseText);
                }
                else{
                    alert("votre message n'a pas pus être envoyer");
                }
            }
        }
        httpRequest.open('POST', '/Vieillissement/article/request-comments.php', true);
        httpRequest.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
        var contentComment = document.querySelector('.new-comment-content').value;
        httpRequest.send("new_comment=" + encodeURIComponent(contentComment) + "&article=" + encodeURIComponent(idArticle) + '&user_id=' + encodeURIComponent(userId));
    })
}