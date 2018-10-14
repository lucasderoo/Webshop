
var open = false;
function readURL(event){
     var getImagePath = URL.createObjectURL(event.target.files[0]);
     if(getImagePath == null){
        return;
    }
    // if(open == true){
    //     $("#vanilla-demo").empty();
    // }
    $("#dropzone").hide();
    $("#vanilla-demo").show();
    opencroppie(getImagePath, event);
}
function opencroppie(getImagePath, event){
    var file = event.target.files[0];
    var fileType = file["type"];
    var ValidImageTypes = ["image/svg", "image/jpeg", "image/png"];
    if ($.inArray(fileType, ValidImageTypes) < 0) {
        alert('only .jpg .png and .svg files are allowed');
        $(".upload-file").val("");
        return;
    }
    var el = document.getElementById('vanilla-demo');
    var vanilla = new Croppie(el, {
        viewport: { width: 400, height: 400, type: 'square'},
        boundary: { width: 500, height: 450 },
        showZoomer: true,
    });
    vanilla.bind({
        url: getImagePath,
    });

    open = true;
    $(".vanilla-result").one("click" ,function(e) {
        vanilla.result().then(function(resp) {
            uploadimage(getImagePath, event, resp)
        });
    });
}
function uploadimage(getImagePath, event, resp){
    console.log("#"+event.target.id+"-t");
    $("#product-"+event.target.id).attr('value', resp);
    $("#"+event.target.id).attr('src', resp);
    $('#myModal').modal('toggle');
} 
