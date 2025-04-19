/**
 * WordPress dependencies
 */
import { render } from '@wordpress/element';

/**
 * Internal dependencies
 */
import '../css/index.scss';

// Initialize the app when the DOM is fully loaded
document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('media-folders-app');
    
    if (container) {
        render(
            <div className="media-folders-container">
                <h2>Media Folders</h2>
                {/* Your React components will go here */}
            </div>,
            container
        );
    }
});