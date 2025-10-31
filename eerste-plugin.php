<?php
/*
Plugin Name: Eerste Plugin
Plugin URI: http://voorbeeld.com/
Description: Dit is mijn eerste zelfgemaakte WordPress-plugin.
Version: 1.0
Author: Jouw Naam
Author URI: http://voorbeeld.com/
License: GPLv2 or later
*/


// Functie om een bericht toe te voegen aan de onderkant van de pagina
function mijn_eerste_plugin_bericht() {
    $bericht = get_option('mijn_eerste_plugin_bericht', 'Dit is mijn eerste plugin! Welkom op mijn website.');
    echo '<div class="plugin-message"><p>' . esc_html($bericht) . '</p></div>';
}



// Voeg het bericht toe direct na de header via een custom action
add_action('after_theme_header', 'mijn_eerste_plugin_bericht');

// Functie om een admin menu-item toe te voegen
function mijn_eerste_plugin_menu() {
    add_options_page(
        'Mijn Eerste Plugin Instellingen',  // Paginatitel
        'Mijn Plugin',                      // Menu-item titel
        'manage_options',                   // Wie kan de plugin (toegangsniveau)
        'mijn-eerste-plugin',               // De slug
        'mijn_eerste_plugin_instellingen_pagina' // Functie om de inhoud van de pagina te tonen
    );
}
add_action('admin_menu', 'mijn_eerste_plugin_menu');

// Functie om de inhoud van de instellingenpagina te tonen
function mijn_eerste_plugin_instellingen_pagina() {
    ?>
    <div class="wrap">
        <h2>Mijn Eerste Plugin Instellingen</h2>
        <form method="post" action="options.php">
            <?php
            settings_fields('mijn_eerste_plugin_options_group');
            ?>
            <label for="mijn_eerste_plugin_bericht">Bericht:</label>
            <input type="text" id="mijn_eerste_plugin_bericht" name="mijn_eerste_plugin_bericht" value="<?php echo get_option('mijn_eerste_plugin_bericht'); ?>">
            <?php
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

// Registreren van instellingen
function mijn_eerste_plugin_register_settings() {
    register_setting('mijn_eerste_plugin_options_group', 'mijn_eerste_plugin_bericht');
}
add_action('admin_init', 'mijn_eerste_plugin_register_settings');



