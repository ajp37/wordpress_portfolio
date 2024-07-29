<footer>
  <div class="container">
    <div class="footer-left">
      <p class="texto-especial">POISON</p>
    </div>
    <div class="footer-right">
      <ul class="legal-links">
        <li><a href="#">Legal Notice</a></li>
        <li>|</li>
        <li><a href="#">Legal Information</a></li>
      </ul>
    </div>
  </div>

  <script>
        document.addEventListener('DOMContentLoaded', function () {
            let loadMoreButton = document.getElementById('load-more');
            let page = 1;

            loadMoreButton.addEventListener('click', function () {
                let xhr = new XMLHttpRequest();
                let data = new FormData();
                data.append('action', 'load_more_flavours');
                data.append('page', page);

                xhr.open('POST', '<?php echo admin_url('admin-ajax.php'); ?>', true);

                xhr.onload = function () {
                    if (xhr.status === 200) {
                        let response = xhr.responseText;
                        let parser = new DOMParser();
                        let newPosts = parser.parseFromString(response, 'text/html').body.innerHTML;

                        // Insertar los nuevos posts antes del botón "Load More"
                        loadMoreButton.insertAdjacentHTML('beforebegin', newPosts);

                        page++; // Incrementar el número de página para la próxima solicitud
                    } else {
                        console.error('Failed to load more flavours');
                    }
                };

                xhr.send(data);
            });
        });
    </script>

</footer>
