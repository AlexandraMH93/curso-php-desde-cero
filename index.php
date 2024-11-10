<?php
    const API_URL = "https://whenisthenextmcufilm.com/api";
    # Inicializamos la conexión a la API con CURL ch = CURL handle
    $ch = curl_init(API_URL);
    // Indicar que queremos recibir el resultado de l petición y no mostrarla en pantalla
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    /*
    Ejecutar la petición
    y guardamos resultado
    */ 
    $result = curl_exec($ch);
    $data = json_decode($result, true);
    
    curl_close($ch);

  
?>

<head>
    <meta charset="UTF-8">
    <title>La próxima película de Marvel</title>
    <meta name="description" content="La próxima película de Marvel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<main>
    <section>
        <img src="<?php echo $data['poster_url']; ?>" width="300" alt="poster" style="border-radius: 10px;">
    </section>

    <hgroup>
        <h2><?php echo $data['title']; ?> se estrena en <?php echo $data['days_until']; ?> días</h2>
        <p>Fecha de estreno: <?php echo $data['release_date']; ?></p>
    </hgroup>

    <section>
        <h4>La próxima película de Marvel será de <?php echo $data['following_production']['title']; ?></h4>
    </section>
</main>

<style>
    :root {
       color-scheme: dark;
    }
    body {
        display: grid;
        place-content: center;
    }
    section{
        display: flex;
        justify-content: center;
    }
</style>