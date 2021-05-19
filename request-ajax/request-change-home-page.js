class linkedSelect{
    constructor($select){
        this.$select = $select;
        this.onChange = this.onChange.bind(this);
        this.$select.addEventListener('change', this.onChange);
    }
    //se déclenche sur le changement du selecteur ($select)
    onChange(e){
        let request = new XMLHttpRequest();
        request.open('GET', this.$select.dataset.source.replace('$id', e.target.value),true);
        request.onload = () =>{
            if (request.status >= 200 && request.status < 400){
                // let data = JSON.parse(request.responseText);
                console.log(request.responseText);
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