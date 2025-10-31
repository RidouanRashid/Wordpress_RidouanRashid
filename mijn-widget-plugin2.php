<?php
/*
Plugin Name: Info Blok Widget
Description: Widget voor het toevoegen van informatieblokken
Version: 1.0
Author: Your Name
*/

// Widget Class voor Info Blok
class Mijn_Info_Widget extends WP_Widget {
    
    public function __construct() {
        parent::__construct(
            'mijn_info_widget',
            'Info Blok Widget',
            array('description' => 'Widget om informatieblokken weer te geven')
        );
    }

    // Widget frontend weergave
    public function widget($args, $instance) {
        $titel = !empty($instance['titel']) ? $instance['titel'] : '';
        $inhoud = !empty($instance['inhoud']) ? $instance['inhoud'] : '';
        $type = !empty($instance['type']) ? $instance['type'] : 'info';
        $url = !empty($instance['url']) ? $instance['url'] : '';
        
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

    // Widget backend formulier
    public function form($instance) {
        $titel = !empty($instance['titel']) ? $instance['titel'] : '';
        $inhoud = !empty($instance['inhoud']) ? $instance['inhoud'] : '';
        $type = !empty($instance['type']) ? $instance['type'] : 'info';
        $url = !empty($instance['url']) ? $instance['url'] : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('titel'); ?>">Titel:</label>
            <input class="widefat" type="text" 
                   id="<?php echo $this->get_field_id('titel'); ?>" 
                   name="<?php echo $this->get_field_name('titel'); ?>" 
                   value="<?php echo esc_attr($titel); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('inhoud'); ?>">Inhoud:</label>
            <textarea class="widefat" rows="5" 
                      id="<?php echo $this->get_field_id('inhoud'); ?>" 
                      name="<?php echo $this->get_field_name('inhoud'); ?>"
            ><?php echo esc_textarea($inhoud); ?></textarea>
        </p>
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

    // Widget opslaan
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['titel'] = !empty($new_instance['titel']) ? strip_tags($new_instance['titel']) : '';
        $instance['inhoud'] = !empty($new_instance['inhoud']) ? strip_tags($new_instance['inhoud']) : '';
        $instance['type'] = !empty($new_instance['type']) ? $new_instance['type'] : 'info';
        $instance['url'] = !empty($new_instance['url']) ? esc_url_raw($new_instance['url']) : '';
        return $instance;
    }
}

// Widget styles
function info_widget_styles() {
}

// Registreer de widget
function register_mijn_info_widget() {
    register_widget('Mijn_Info_Widget');
}

// Hook registrations
add_action('widgets_init', 'register_mijn_info_widget');
add_action('wp_head', 'info_widget_styles');
