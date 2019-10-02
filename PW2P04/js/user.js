function deleteUser(id) {
    var confirmation=window.confirm("Are you sure want to delete?");
    if(confirmation){
        window.location = "index.php?menu=tr&delcom=1&id="+id;
    }
}

function updateUser(id) {
    window.location = "index.php?menu=iu&id="+id;
}

