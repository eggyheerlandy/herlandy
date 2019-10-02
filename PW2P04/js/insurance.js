function deleteInsurance(id) {
    var confirmation=window.confirm("Are you sure want to delete?");
    if(confirmation){
        window.location = "index.php?menu=in&delcom=1&id="+id;
    }
}

function updateInsurance(id) {
    window.location = "index.php?menu=iu&id="+id;
}

