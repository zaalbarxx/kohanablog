window.onload = function(){
    var lang = document.getElementById('language_change');
    lang.addEventListener('change',function(){
        lang.submit();
    });

}