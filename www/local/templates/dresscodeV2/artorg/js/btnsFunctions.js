function btnTestSiteRequest(){
    // here we want to send an ajax request to the ajax page:
    var xhr = new XMLHttpRequest();
    xhr.open('GET','../../local/files/ajax_admin.php?test=true','true');
    xhr.setRequestHeader('X-REQUESTED-WITH','XMLHttpRequest');
    xhr.onreadystatechange = function (){
        if(xhr.readyState == 4 && xhr.status == 200 ){
            alert("Test Site");
        }
    }

    xhr.send();
}
