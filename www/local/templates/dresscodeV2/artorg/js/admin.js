function createButton(data){
    var url    = '/local/files/ajax_admin.php';
    $.ajax({
        url        : url,
        type       : 'POST',
        data       : data,
        success    : function(){alert('Преобразование в тестовый сайт прошло успешно');}
    });

}
