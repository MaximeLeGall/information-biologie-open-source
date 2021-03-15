/*printer article*/

document.querySelector('#printer').addEventListener("click", function printTarget() {
    let divToPrint = document.querySelector('#article-name').outerHTML;
    divToPrint += document.querySelector('#article-content').outerHTML;
    var win = window.open();
    self.focus();
    win.document.open();
    win.document.write('<'+'html'+'><'+'body'+'>');
    win.document.write(divToPrint);
    win.document.write('<'+'/body'+'><'+'/html'+'>');
    win.document.close();
    win.print();
});

(function sliderReadingCompanionHeight(){
    let articleHeight = document.querySelector('#article-content').offsetHeight;
    let readingCompanion = document.querySelector('.reading-companion');
    readingCompanion.style.height = articleHeight + "px";
})();