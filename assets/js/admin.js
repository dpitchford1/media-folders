console.log('Build process check');
import { render } from '@wordpress/element';
import App from './components/App';

document.addEventListener('DOMContentLoaded', () => {
    const root = document.getElementById('media-folders-root');
    if (root) {
        render(<App />, root);
    }
});