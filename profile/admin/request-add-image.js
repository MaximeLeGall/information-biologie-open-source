function addImage(e){
    e.preventDefault();
    var $image = document.querySelector('#image');
    if($image != ""){
        let request = new XMLHttpRequest();
        let formData = new FormData();
        formData.append('image', $image.files[0]);
        // request.overrideMimeType('image.jpeg');
        request.onreadystatechange =  function(){
            if(request.readyState === 4){
                if (request.status === 200){
                    console.log(request.response);
                    $image.files[0] = "";
                }
                else{
                    alert("Impossible d'envoyer l'image");
                }
            }
        }
        request.onerror = function(){
        }
        request.open('POST', '/Vieillissement/profile/admin/request-add-image.php', true);
        // request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
        request.send(formData);
    }
}


let $addImage = document.querySelector('.form-add-image');
$addImage.addEventListener('submit', this.addImage);