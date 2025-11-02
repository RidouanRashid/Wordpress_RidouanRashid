<?php
/**
 * Info Blok Widget Plugin
 * 
 * Plugin Name: Info Blok Widget
 * Description: Widget voor het toevoegen van informatieblokken met links naar records
 * Version: 1.0
 * Author: Your Name
 * 
 * Dit plugin voegt een geavanceerde widget toe die informatieblokken met
 * aanpasbare titel, inhoud, type en links kan weergeven.
 * Perfect voor het linken naar individuele atletiek records.
 */

/**
 * Mijn_Info_Widget Class
 * 
 * Geavanceerde widget voor informatieblokken.
 * Ondersteunt:
 * * Aangepaste titel en inhoud
 * * Drie verschillende types (informatie, nieuws, waarschuwing)
 * * Direct linken naar records via custom URL
 */
class Mijn_Info_Widget extends WP_Widget {
    
    /**
     * Widget Constructor
     * 
     * Initialiseert de widget met ID, naam en beschrijving
     */
    public function __construct() {
        parent::__construct(
            'mijn_info_widget',
            'Info Blok Widget',
            array('description' => 'Widget om informatieblokken weer te geven')
        );
    }

    /**
     * Widget Frontend Rendering
     * 
     * Toont het widget op de website.
     * Haalt instance data op en rendert het als een styled blok met link.
     * 
     * @param array $args Widget arguments van de sidebar
     * @param array $instance Widget instance data
     */
    public function widget($args, $instance) {
        // Haal instance data op met fallback values
        $titel = !empty($instance['titel']) ? $instance['titel'] : '';
        $inhoud = !empty($instance['inhoud']) ? $instance['inhoud'] : '';
        $type = !empty($instance['type']) ? $instance['type'] : 'info';
        $url = !empty($instance['url']) ? $instance['url'] : '';
        
        // Toon de widget wrapper
        echo $args['before_widget'];
        ?>
        <a href="<?php echo esc_url($url); ?>" class="info-blok-link">
            <div class="info-blok <?php echo esc_attr($type); ?>">
                <?php if ($titel) : ?>
                    <h3 class="info-titel"><?php echo esc_html($titel); ?></h3>
                <?php endif; ?>
                
                <div class="info-inhoud">
                    <?php echo wpautop(esc_html($inhoud)); ?>
                </div>
            </div>
        </a>
        <?php
        echo $args['after_widget'];
    }

    /**
     * Widget Backend Form
     * 
     * Toont het formulier in WordPress admin voor widget instellingen.
     * Admin kan hier titel, inhoud, type en URL instellen.
     * 
     * @param array $instance Widget instance data
     */
    public function form($instance) {
        // Haal bestaande waarden op
        $titel = !empty($instance['titel']) ? $instance['titel'] : '';
        $inhoud = !empty($instance['inhoud']) ? $instance['inhoud'] : '';
        $type = !empty($instance['type']) ? $instance['type'] : 'info';
        $url = !empty($instance['url']) ? $instance['url'] : '';
        ?>
        <!-- Titel veld -->
        <p>
            <label for="<?php echo $this->get_field_id('titel'); ?>">Titel:</label>
            <input class="widefat" type="text" 
                   id="<?php echo $this->get_field_id('titel'); ?>" 
                   name="<?php echo $this->get_field_name('titel'); ?>" 
                   value="<?php echo esc_attr($titel); ?>">
        </p>
        
        <!-- Inhoud textarea -->
        <p>
            <label for="<?php echo $this->get_field_id('inhoud'); ?>">Inhoud:</label>
            <textarea class="widefat" rows="5" 
                      id="<?php echo $this->get_field_id('inhoud'); ?>" 
                      name="<?php echo $this->get_field_name('inhoud'); ?>"
            ><?php echo esc_textarea($inhoud); ?></textarea>
        </p>
        
        <!-- Type selectie: informatie, nieuws of waarschuwing -->
        <p>
            <label for="<?php echo $this->get_field_id('type'); ?>">Type:</label>
            <select class="widefat" 
                    id="<?php echo $this->get_field_id('type'); ?>" 
                    name="<?php echo $this->get_field_name('type'); ?>">
                <option value="info" <?php selected($type, 'info'); ?>>Informatie</option>
                <option value="nieuws" <?php selected($type, 'nieuws'); ?>>Nieuws</option>
                <option value="waarschuwing" <?php selected($type, 'waarschuwing'); ?>>Waarschuwing</option>
            </select>
        </p>
        
        <!-- URL veld voor linken naar records -->
        <p>
            <label for="<?php echo $this->get_field_id('url'); ?>">Link URL:</label>
            <input class="widefat" type="url" 
                   id="<?php echo $this->get_field_id('url'); ?>" 
                   name="<?php echo $this->get_field_name('url'); ?>" 
                   value="<?php echo esc_url($url); ?>"
                   placeholder="https://">
            <small>Voer de volledige URL in waar het blok naar moet linken</small>
        </p>
        <?php
    }

    /**
     * Widget Update
     * 
     * Verwerkt de opgeslagen widget data.
     * Sanitized de input en slaat het op.
     * 
     * @param array $new_instance Nieuwe instance data
     * @param array $old_instance Oude instance data
     * @return array Geupdatete instance data
     */
    public function update($new_instance, $old_instance) {
        $instance = array();
        // Sanitize en save titel
        $instance['titel'] = !empty($new_instance['titel']) ? strip_tags($new_instance['titel']) : '';
        // Sanitize en save inhoud
        $instance['inhoud'] = !empty($new_instance['inhoud']) ? strip_tags($new_instance['inhoud']) : '';
        // Save type (dropdown selection)
        $instance['type'] = !empty($new_instance['type']) ? $new_instance['type'] : 'info';
        // Sanitize en save URL
        $instance['url'] = !empty($new_instance['url']) ? esc_url_raw($new_instance['url']) : '';
        return $instance;
    }
}

/**
 * Widget Styling Function
 * 
 * Voegt CSS styles toe voor het info blok widget.
 * (Momenteel leeg, styles zijn in style.css)
 */
function info_widget_styles() {
}

/**
 * Widget Registration
 * 
 * Registreert de Info Blok Widget in WordPress.
 */
function register_mijn_info_widget() {
    register_widget('Mijn_Info_Widget');
}

/**
 * Action Hooks
 * 
 * Koppel registration functie aan widgets_init action
 * Koppel styling functie aan wp_head action
 */
add_action('widgets_init', 'register_mijn_info_widget');
add_action('wp_head', 'info_widget_styles');
