<h1>Pokedex</h1>
<form action="" method="post">
    Nombre del pokemon <input type="text" name="nombre"> <input type="submit" name="buscar" value="Buscar">
</form>

<?php
if (isset($_POST['buscar'])) {
    $datos = file_get_contents("https://pokeapi.co/api/v2/pokemon/$_POST[nombre]");
    $pokemon = json_decode($datos);
    ?>
    <h2><?php echo $pokemon->name ?></h2>
    <img src="<?php echo $pokemon->sprites->front_default; ?>" alt="Pokemon">

    <h3>Habilidades</h3>
    <ul>
        <?php
        foreach ($pokemon->abilities as $habilidad) {
            echo "<li>" . $habilidad->ability->name . "</li>";
        }
        ?>
    </ul>

    <h3>Estadisticas</h3>
    <ul>
        <?php
                foreach ($pokemon->stats as $st){
                    echo "<li>".$st->stat->name.": ".$st->base_stat."</li>";
                }
        ?>
    </ul>


    <?php
}
?>