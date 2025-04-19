import { useState } from '@wordpress/element';
import { __ } from '@wordpress/i18n';
import { Button, Modal, TextControl } from '@wordpress/components';

const Toolbar = ({ onCreateFolder, selectedFolder, onUpdateFolder, onDeleteFolder }) => {
    const [isModalOpen, setIsModalOpen] = useState(false);
    const [folderName, setFolderName] = useState('');
    const [isEditing, setIsEditing] = useState(false);

    const handleSubmit = () => {
        if (!folderName.trim()) return;

        if (isEditing) {
            onUpdateFolder(selectedFolder.id, folderName);
        } else {
            onCreateFolder(folderName, selectedFolder?.id);
        }

        setFolderName('');
        setIsModalOpen(false);
        setIsEditing(false);
    };

    const openEditModal = () => {
        setFolderName(selectedFolder.name);
        setIsEditing(true);
        setIsModalOpen(true);
    };

    return (
        <div className="media-folders-toolbar">
            <Button
                isPrimary
                onClick={() => setIsModalOpen(true)}
            >
                {__('New Folder', 'media-folders')}
            </Button>

            {selectedFolder && (
                <>
                    <Button
                        isSecondary
                        onClick={openEditModal}
                    >
                        {__('Rename', 'media-folders')}
                    </Button>
                    <Button
                        isDestructive
                        onClick={() => onDeleteFolder(selectedFolder.id)}
                    >
                        {__('Delete', 'media-folders')}
                    </Button>
                </>
            )}

            {isModalOpen && (
                <Modal
                    title={isEditing ? __('Rename Folder', 'media-folders') : __('Create New Folder', 'media-folders')}
                    onRequestClose={() => {
                        setIsModalOpen(false);
                        setIsEditing(false);
                        setFolderName('');
                    }}
                >
                    <TextControl
                        value={folderName}
                        onChange={setFolderName}
                        label={__('Folder Name', 'media-folders')}
                    />
                    <Button
                        isPrimary
                        onClick={handleSubmit}
                        disabled={!folderName.trim()}
                    >
                        {isEditing ? __('Update', 'media-folders') : __('Create', 'media-folders')}
                    </Button>
                </Modal>
            )}
        </div>
    );
};

export default Toolbar;