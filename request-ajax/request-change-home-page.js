class linkedSelect{
    constructor($select){
        this.$select = $select;
        let $target = document.querySelector(this.$select.dataset.target)
        this.onChange = this.onChange.bind(this);
        this.cache = {};
        this.$select.addEventListener('change', this.onChange);
    }

    //se déclenche sur le changement du selecteur ($select)
    onChange(e){
        this.loadOptions(e.target.value, (options) =>{
            $target.insertAdjacentHTML('beforeend', options);
        })
    }

    loadOptions(id, callback){
        if (this.cache[id]){
            callback(this.cache[id]);
            return;
        }
        else{
            let request = new XMLHttpRequest();
            request.open('GET', this.$select.dataset.source.replace('$id', e.target.value),true);
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
        }}
}




let $selects = document.querySelectorAll('.linked-select');
$selects.forEach(function($select){
    new linkedSelect($select);
})