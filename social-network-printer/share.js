
class ni extends HTMLAnchorElement {
    constructor() {
        super(),
        this.addEventListener("click", (e=>{
            e.preventDefault(),
            e.stopPropagation(),
            function(e, t, n, i) {
                const s = void 0 !== window.screenLeft ? window.screenLeft : screen.left
                  , o = void 0 !== window.screenTop ? window.screenTop : screen.top
                  , r = (window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width) / 2 - n / 2 + s
                  , a = (window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height) / 2 - i / 2 + o
                  , l = window.open(e, t, `scrollbars=yes, width=${n}, height=${i}, top=${a}, left=${r}`);
                window.focus && l.focus()
            }(this.getAttribute("href") + '&text=' + encodeURIComponent(document.title), "Partager", 670, 340)
        }
        ))
    }
}
customElements.define("social-share", ni, {
    extends: "a"
});