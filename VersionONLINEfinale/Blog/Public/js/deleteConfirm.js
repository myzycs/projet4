 function deleteConfirmation()
{
    var x = confirm("etes vous sur de vouloir supprimer le commentaire ?");
    if (x==true) {
        //oui
        return true;
    }else{
        //non
        return false;
    }
}