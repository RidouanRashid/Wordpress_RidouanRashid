<?php
/*
Plugin Name: Mijn Widget Plugin
Plugin URI: http://voorbeeld.com/
Description: Een plugin met een zelfgemaakte widget.
Version: 1.0
Author: Jouw Naam
Author URI: http://voorbeeld.com/
License: GPLv2 or later
*/



// Widgetklasse maken die de WP_Widget klasse uitbreidt
class Mijn_Eigen_Widget extends WP_Widget {

    // Constructor: dit stelt de widget in
    function __construct() {
        parent::__construct(
            'mijn_eigen_widget', // Basis-ID van de widget
            __('Mijn Eigen Widget', 'text_domain'), // Naam van de widget
            array('description' => __('Een voorbeeld van een eenvoudige widget', 'text_domain'))
        );
    }

    // Frontend: wat de gebruiker ziet op de website
    public function widget($args, $instance) {
        echo $args['before_widget']; // WordPress-widget opmaak
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
        echo __('Wereldrecords laten zien waartoe mensen, dieren en zelfs de natuur in staat zijn. Ze tonen het uiterste van wat mogelijk is — de snelste, de grootste, de slimste, de sterkste. Achter elk record schuilt een verhaal van ambitie, doorzettingsvermogen en soms pure nieuwsgierigheid. Ze herinneren ons eraan dat grenzen er zijn om verlegd te worden en dat elke prestatie begint met een droom. Of het nu gaat om een atleet die de limieten van het menselijk lichaam opzoekt, een kunstenaar die iets maakt wat nog nooit eerder is gedaan, of een natuurverschijnsel dat ons verbaast door zijn kracht — wereldrecords vieren de uitzonderlijkheid van het alledaagse. Ze verbinden mensen over de hele wereld in hun bewondering voor wat mogelijk is en inspireren ons allemaal om te ontdekken waar onze eigen grenzen liggen.', 'text_domain'); // De daadwerkelijke inhoud van de widget
        echo $args['after_widget'];
    }

    // Backend: het formulier in het WordPress-dashboard om de widget-instellingen te beheren
    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : __('Nieuwe titel', 'text_domain');
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Titel:'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <?php
    }

    // Bijwerken van widget-instellingen (bijvoorbeeld als de gebruiker de titel wijzigt)
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }
}

// Widget registreren
function registreer_mijn_eigen_widget() {
    register_widget('Mijn_Eigen_Widget');
}
add_action('widgets_init', 'registreer_mijn_eigen_widget');

