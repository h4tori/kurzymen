<?php
/*
Plugin Name: Kurzy Měn Widget (Kurzyakcie.cz)
Description: Přidává widget s kurzy měn z Kurzyakcie.cz.
Version: 1.0
Author: Tomáš Rohlena @ Kurzyakcie.cz @ Webmint.cz 
URL: https://www.kurzyakcie.cz/widget
*/

// Bezpečnostní opatření
if (!defined('ABSPATH')) exit;

// Registrace widgetu
function kurzy_meny_register_widget() {
    register_widget('Kurzy_Meny_Widget');
}
add_action('widgets_init', 'kurzy_meny_register_widget');

// Třída widgetu
class Kurzy_Meny_Widget extends WP_Widget {

    // Konstruktor
    public function __construct() {
        parent::__construct(
            'kurzy_meny_widget', // Base ID
            'Kurzy Měn Widget', // Name
            array('description' => 'Widget zobrazující kurzy měn podle aktuálního kurzu ČNB. Widget můžete přidat do příspěvku nebo do sidebaru.')
        );
    }

    // Frontend widgetu
    public function widget($args, $instance) {
        echo $args['before_widget'];

        // ID pro div, kde se zobrazí kurzy měn
        $div_id = 'kurzymen_237';

        // Vložení JavaScriptu pro načtení kurzů měn
        echo "<script src='https://www.kurzyakcie.cz/widget/kurz'></script>";

        // Vložení divu pro zobrazení kurzů
        echo "<div id='" . $div_id . "'></div>";

        // Vložení zdroje dat
        echo "<p style='font-size: smaller;'>Kurzy měn dle aktuálního kurzu ČNB.<br />";
        echo "Zdroj dat: <a href='https://www.kurzyakcie.cz' title='Kurzy akcie'>Kurzyakcie.cz</a></p>";

        echo $args['after_widget'];
    }

    // Backend widgetu
    public function form($instance) {
        // Formulář pro backend widgetu není nutný pro tento widget
        echo '<p>Není potřeba žádné nastavení.</p>';
    }

    // Aktualizace nastavení widgetu
    public function update($new_instance, $old_instance) {
        // Aktualizace nastavení widgetu není nutná pro tento widget
        return $old_instance;
    }
}

// Aktivace pluginu
function kurzy_meny_activate() {
    // Zde můžete přidat kód, který se spustí při aktivaci pluginu
}
register_activation_hook(__FILE__, 'kurzy_meny_activate');

// Deaktivace pluginu
function kurzy_meny_deactivate() {
    // Zde můžete přidat kód, který se spustí při deaktivaci pluginu
}
register_deactivation_hook(__FILE__, 'kurzy_meny_deactivate');
