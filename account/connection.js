        // acces account creation 

//button account creation
var appendElement = document.querySelector('.background-account-creation').cloneNode(true);
function visibleElement(selectBefore, elementOverflowHidden){
    var elementBefore = document.querySelector(selectBefore);
    var parentDiv = elementBefore.parentNode;
    parentDiv.insertBefore(appendElement, elementBefore.nextSibling);
    appendElement.style.top = window.scrollY + "px";
    document.querySelector(elementOverflowHidden).style.overflow = 'hidden';
}

//cancel account creation 
function hiddenElement(selectElement, elementOverflowScroll){
    if(document.querySelector(selectElement)){
        var removeElement = document.querySelector(selectElement);
        removeElement.parentNode.removeChild(removeElement);
    }
    if(document.querySelector(elementOverflowScroll)){
        document.querySelector(elementOverflowScroll).style.overflow = 'scroll';
    }
}
window.addEventListener("load", hiddenElement('.background-account-creation', 'body'));



