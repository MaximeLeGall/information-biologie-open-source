

function callSelector(e){
    let $formPart2 = document.querySelector('.change-home-page');
    let $allSelector = document.querySelectorAll('.form-control');
    e.addEventListener('click', function(){
        if($formPart2.parentElement != e){ //check if element have focus
            $allSelector.forEach($selector => resetSelector($selector));
            this.classList.add('s-actuals-elements', 's-element-part2');
            $formPart2.style.display = 'block';
            this.insertAdjacentElement('beforeend', $formPart2);
        }
    });

    function resetSelector($selector){
        $selector.selectedIndex = 0;
        if($selector != $allSelector[0]){
            var lengthSelector = $selector.options.length - 1;
            for(i = lengthSelector; i > 0; i--){
                $selector.remove(i);
            }
        }
    }
}
let $allElementPart2 = document.querySelectorAll('.element-part2');
$allElementPart2.forEach($elementPart2 => callSelector($elementPart2));


//Ajax request
class linkedSelect{
    constructor($select){
        this.$select = $select;
        this.$target = document.querySelector(this.$select.dataset.target);
        this.$placeholder = this.$target.firstElementChild;
        this.onChange = this.onChange.bind(this);
        this.cache = {};
        this.$select.addEventListener('change', this.onChange);
    }

    //se déclenche sur le changement du selecteur ($select)
    onChange(e){
        if(e.target.value != 0)
            this.loadOptions(e.target.value, (options) =>{
                this.$target.innerHTML = options;
                this.$target.insertBefore(this.$placeholder, this.$target.firstChild);
                this.$target.selectedIndex = 0;
            })
    }

    /*
    *
    *@param id: string
    *@param callback: function
    */ 
    loadOptions(id, callback){
        if (this.cache[id]){
            callback(this.cache[id]);
            return;
        }
        let request = new XMLHttpRequest();
        request.open('GET', this.$select.dataset.source.replace('$id', id),true);
        request.onload = () =>{
            if (request.status >= 200 && request.status < 400){
                let data = JSON.parse(request.responseText);
                let options = data.reduce(function (accumulator, option){
                    return accumulator + '<option value="' + option.value + '">' + option.label + '</option>'
                }, '');
                this.cache[id] = options;
                callback(options);
            }
            else{
                alert('Impossible de charger la liste');
            }
        }
        request.onerror = function(){
            alert('Impossible de charger la liste');
        }
        request.send();
    }
}




let $selects = document.querySelectorAll('.linked-select');
$selects.forEach(function($select){
    new linkedSelect($select);
})