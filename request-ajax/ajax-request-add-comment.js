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

function sendComment(){
    var allFormNewComment = document.querySelectorAll('.form-new-comment');
    var httpRequest = getHttpRequest();
    if(allFormNewComment){
        allFormNewComment.forEach(formNewComment => {
            formNewComment.addEventListener('submit',function(e){
                e.preventDefault();
                var commentAdded = document.querySelector('.clone-comment-added');
                var contentComment = this.querySelector('.new-comment-content');
                if(contentComment.value != ""){
                    var idComment = null;
                    if(formNewComment.parentNode.getAttribute('class') === 'user-comment'){
                        idComment = formNewComment.parentNode.querySelector('.add-response-comment').getAttribute('data-id');
                    }
                    else{
                        idComment = 0;
                    }
                    httpRequest.onreadystatechange = function(){
                        if(httpRequest.readyState === 4){
                            if(httpRequest.status === 200){
                                var cloneCommentAdded = commentAdded.cloneNode(true);
                                var insertionLocation = formNewComment.parentNode;
                                cloneCommentAdded.style.display = 'flex';
                                cloneCommentAdded.querySelector('#comment-content').innerHTML = httpRequest.responseText;
                                cloneCommentAdded.querySelector('#user-pseudo').innerHTML = pseudo;
                                cloneCommentAdded.querySelector('.date').innerHTML = 'Le: ' + new Date().toLocaleDateString();
                                insertionLocation.insertAdjacentElement('beforeend', cloneCommentAdded);
                                if(formNewComment.parentNode.getAttribute('class') === 'user-comment'){
                                    formNewComment.style.display = 'none';
                                }
                            }
                            else{
                                alert("votre message n'a pas pus être envoyer");
                            }
                        }
                    }
                    httpRequest.open('POST', '/Vieillissement/article/request-add-comments.php', true);
                    httpRequest.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
                    console.log(idArticle + ' ' + userId +' ' + idComment);
                    httpRequest.send("new_comment=" + encodeURIComponent(contentComment.value) + "&id_article=" + idArticle + "&user_id=" + userId + "&response_comment=" + idComment);
                    
                    formNewComment.querySelector('.new-comment-content').value = "";
                }
            })
        });
    }
}
sendComment();