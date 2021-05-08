function generate(){
    var text = document.createElement('textarea');
    text.id = 'editor1';
    text.name = 'editor';
    var sub = document.createElement('input');
    sub.type='submit';
    sub.name='sub';
    sub.value = 'Сохранить и выйти';
    var del = document.createElement('input');
    del.type='submit';
    del.name='del';
    del.value = 'Выйти без сохранения';
    var element1 = document.getElementById("div1");
    var element2 = document.getElementById("div2");
    var form = document.getElementById("Form");
    form.appendChild(text);
    text.innerHTML=element2.innerHTML;
    form.appendChild(sub);
    form.appendChild(del);
    element1.remove();
    element2.remove();

    CKEDITOR.replace('editor1',{
        filebrowserBrowseUrl:'./ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl:'./ckfinder/ckfinder.html?type=Images',
        filebrowserFlashBrowseUrl:'./ckfinder/ckfinder.html?type=Flash',
        filebrowserUploadUrl:'./ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUrl:'./ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUrl:'./ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
    });
}