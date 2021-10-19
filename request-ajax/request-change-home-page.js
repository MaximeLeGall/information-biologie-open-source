
function callSelector(e){
    let $allSelector = document.querySelectorAll('.form-control');
    let $formPart2 = document.querySelector('.form-homePage');
    e.addEventListener('click', function(){
        let $previousSelect = document.querySelector('.active-element-part2');
        if($formPart2.parentElement != e){
            if($previousSelect){
                removeSelector($previousSelect);
            }
            $allSelector.forEach($selector => resetSelector($selector));
            addSelector(e);
        }
    });
    function removeSelector($previousSelect){
        $previousSelect.firstElementChild.classList.remove('active-actuals-elements');
        $previousSelect.classList.remove('active-element-part2');
        $formPart2.classList.remove('active-form-homePage');
        $formPart2.style.display = 'none';
    }

    function addSelector($elementPart2){
        $elementPart2.classList.add('active-element-part2');
        $elementPart2.firstElementChild.classList.add('active-actuals-elements');
        $elementPart2.insertAdjacentElement('beforeend', $formPart2);
        $elementPart2.addEventListener('animationend', () =>{
            $formPart2.classList.add('active-form-homePage');
            $formPart2.style.display = 'block';
        })
    }

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


//Ajax request multi selector
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
            this.$previousId = e.target.parentElement.parentElement.firstElementChild.firstElementChild.value;
            this.loadOptions(e.target.value, this.$previousId, (options) =>{
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
    loadOptions(id, previousId ,callback){
        if (this.cache[id + previousId]){
            callback(this.cache[id +previousId]);
            return;
        }
        let request = new XMLHttpRequest();
        request.open('GET', this.$select.dataset.source.replace('$id', id).replace('$previousId', previousId),true);
        request.onload = () =>{
            if (request.status >= 200 && request.status < 400){
                console.log(this);
                let data = JSON.parse(request.responseText);
                let options = data.reduce(function (accumulator, option){
                    return accumulator + '<option value="' + option.value + '">' + option.label + '</option>'
                }, '');
                this.cache[id + previousId] = options;
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

//validated change homepage

