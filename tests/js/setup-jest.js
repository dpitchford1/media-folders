// Jest setup file
import '@testing-library/jest-dom';

// Mock WordPress dependencies
global.wp = {
    element: require('@wordpress/element'),
    components: require('@wordpress/components'),
    i18n: require('@wordpress/i18n'),
    data: require('@wordpress/data'),
    apiFetch: jest.fn()
};

// Mock translations function
global.__ = jest.fn((text) => text);