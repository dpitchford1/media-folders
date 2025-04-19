import { useState, useEffect } from '@wordpress/element';
import { __ } from '@wordpress/i18n';
import apiFetch from '@wordpress/api-fetch';
import { Spinner } from '@wordpress/components';
import FolderTree from './FolderTree';
import MediaGrid from './MediaGrid';
import Toolbar from './Toolbar';

const App = () => {
    const [folders, setFolders] = useState([]);
    const [selectedFolder, setSelectedFolder] = useState(null);
    const [attachments, setAttachments] = useState([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);

    // Fetch folders on mount
    useEffect(() => {
        fetchFolders();
    }, []);

    // Fetch attachments when folder is selected
    useEffect(() => {
        if (selectedFolder) {
            fetchAttachments(selectedFolder.id);
        }
    }, [selectedFolder]);

    const fetchFolders = async () => {
        try {
            const response = await apiFetch({
                path: `${MediaFoldersAdmin.apiNamespace}/folders`,
            });
            setFolders(response.folders);
        } catch (err) {
            setError(err.message);
        } finally {
            setLoading(false);
        }
    };

    const fetchAttachments = async (folderId) => {
        setLoading(true);
        try {
            const response = await apiFetch({
                path: `${MediaFoldersAdmin.apiNamespace}/folders/${folderId}/attachments`,
            });
            setAttachments(response.attachments);
        } catch (err) {
            setError(err.message);
        } finally {
            setLoading(false);
        }
    };

    const handleCreateFolder = async (name, parentId = null) => {
        try {
            await apiFetch({
                path: `${MediaFoldersAdmin.apiNamespace}/folders`,
                method: 'POST',
                data: { name, parent_id: parentId },
            });
            fetchFolders();
        } catch (err) {
            setError(err.message);
        }
    };

    const handleUpdateFolder = async (id, name) => {
        try {
            await apiFetch({
                path: `${MediaFoldersAdmin.apiNamespace}/folders/${id}`,
                method: 'PUT',
                data: { name },
            });
            fetchFolders();
        } catch (err) {
            setError(err.message);
        }
    };

    const handleDeleteFolder = async (id) => {
        if (!window.confirm(__('Are you sure you want to delete this folder?', 'media-folders'))) {
            return;
        }

        try {
            await apiFetch({
                path: `${MediaFoldersAdmin.apiNamespace}/folders/${id}`,
                method: 'DELETE',
            });
            setSelectedFolder(null);
            fetchFolders();
        } catch (err) {
            setError(err.message);
        }
    };

    if (error) {
        return (
            <div className="notice notice-error">
                <p>{error}</p>
            </div>
        );
    }

    return (
        <div className="media-folders-container">
            <div className="media-folders-sidebar">
                <Toolbar
                    onCreateFolder={handleCreateFolder}
                    selectedFolder={selectedFolder}
                    onUpdateFolder={handleUpdateFolder}
                    onDeleteFolder={handleDeleteFolder}
                />
                {loading && !folders.length ? (
                    <Spinner />
                ) : (
                    <FolderTree
                        folders={folders}
                        selectedFolder={selectedFolder}
                        onSelectFolder={setSelectedFolder}
                    />
                )}
            </div>
            <div className="media-folders-content">
                {loading ? (
                    <div className="media-folders-loading">
                        <Spinner />
                    </div>
                ) : (
                    <MediaGrid
                        attachments={attachments}
                        selectedFolder={selectedFolder}
                    />
                )}
            </div>
        </div>
    );
};

export default App;