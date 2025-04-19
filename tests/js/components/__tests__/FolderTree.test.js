import { render, screen, fireEvent } from '@testing-library/react';
import FolderTree from '../../../../js/components/FolderTree';

describe('FolderTree Component', () => {
    it('renders folder structure correctly', () => {
        const folders = [
            { id: 1, name: 'Root Folder', parent_id: 0 },
            { id: 2, name: 'Child Folder', parent_id: 1 }
        ];

        render(<FolderTree folders={folders} />);
        
        expect(screen.getByText('Root Folder')).toBeInTheDocument();
        expect(screen.getByText('Child Folder')).toBeInTheDocument();
    });

    it('handles folder selection', () => {
        const onSelect = jest.fn();
        const folders = [{ id: 1, name: 'Test Folder', parent_id: 0 }];

        render(<FolderTree folders={folders} onSelect={onSelect} />);
        
        fireEvent.click(screen.getByText('Test Folder'));
        expect(onSelect).toHaveBeenCalledWith(1);
    });
});