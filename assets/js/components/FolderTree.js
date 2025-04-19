import { __ } from '@wordpress/i18n';
import { Dashicon } from '@wordpress/components';

const FolderTree = ({ folders, selectedFolder, onSelectFolder }) => {
    const buildFolderTree = (items, parentId = null) => {
        return items
            .filter(folder => folder.parent_id === parentId)
            .map(folder => (
                <div key={folder.id}>
                    <div
                        className={`media-folders-tree-item ${selectedFolder?.id === folder.id ? 'active' : ''}`}
                        onClick={() => onSelectFolder(folder)}
                    >
                        <Dashicon icon="portfolio" className="media-folders-tree-item-icon" />
                        <span>{folder.name}</span>
                    </div>
                    <div style={{ marginLeft: 20 }}>
                        {buildFolderTree(items, folder.id)}
                    </div>
                </div>
            ));
    };

    return (
        <div className="media-folders-tree">
            {folders.length === 0 ? (
                <div className="media-folders-empty">
                    {__('No folders found', 'media-folders')}
                </div>
            ) : (
                buildFolderTree(folders)
            )}
        </div>
    );
};

export default FolderTree;