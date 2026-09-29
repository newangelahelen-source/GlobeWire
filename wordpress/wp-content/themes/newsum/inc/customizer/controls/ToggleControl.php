<?php
/**
 * Premium Toggle Switch Control for NewSum Lite
 *
 * @package NewSum
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'WP_Customize_Control' ) ) {
    return;
}

/**
 * Custom control for an iOS-style toggle switch.
 */
class NewSum_Toggle_Control extends \WP_Customize_Control {
    
    public $type = 'newsum-toggle';

    /**
     * Render the control's content in PHP.
     */
    protected function render_content() {
        ?>
        <div class="newsum-control-wrapper newsum-toggle-control">
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <?php if ( ! empty( $this->description ) ) : ?>
                    <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
                <?php endif; ?>
                
                <div class="newsum-toggle-switch">
                    <input type="checkbox" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> <?php checked( $this->value() ); ?> />
                    <span class="newsum-slider round"></span>
                </div>
            </label>
        </div>
        <?php
    }
}
