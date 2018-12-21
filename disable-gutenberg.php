<?php declare( strict_types = 1 );

/**
 * Class to remove Gutenberg Editor
 */
class DisableGutenberg {
    public function __construct() {
        add_filter( 'use_block_editor_for_post_type', array( $this, 'disable' ), 100 );
        add_action( 'wp_enqueue_scripts', array( $this, 'dequeue_gutenberg_theme_css'), 100 );
    }
    
    /**
     * Method to deactivate Gutenberg Editor
     *
     * @return bool
     */
    public function disable(): bool {
        return false;
    }

    /**
     * Dequeue Theme CSS from Gutenberg
     */
    public function dequeue_gutenberg_theme_css(): void {
        wp_dequeue_style( 'wp-block-library' );
    }
}

$disable_gutenberg = new DisableGutenberg();
