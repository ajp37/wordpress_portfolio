<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap"
        rel="stylesheet">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header>
        <p class="texto-especial">POISON</p>
    </header>

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


</body>

</html>