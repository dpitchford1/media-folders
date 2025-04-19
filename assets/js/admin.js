import { render } from '@wordpress/element';
import App from './components/App';

// Initialize the application when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    const root = document.getElementById('media-folders-root');
    if (root) {
        render(<App />, root);
    }
});