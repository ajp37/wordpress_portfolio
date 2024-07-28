document.addEventListener('DOMContentLoaded', function() {
    var page = 1;

    document.getElementById('load-more').addEventListener('click', function() {
        page++;
        var data = new FormData();
        data.append('action', 'load_more_flavours');
        data.append('page', page);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', ajaxurl, true);
        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 400) {
                var response = xhr.responseText;
                if (response) {
                    document.querySelector('.flavours-grid').insertAdjacentHTML('beforeend', response);
                } else {
                    document.getElementById('load-more').style.display = 'none';
                }
            }
        };
        xhr.send(data);
    });
});
