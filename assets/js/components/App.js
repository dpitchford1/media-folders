import { useState, useEffect } from '@wordpress/element';
import { __ } from '@wordpress/i18n';
import apiFetch from '@wordpress/api-fetch';
import { Spinner } from '@wordpress/components';
import FolderTree from './FolderTree';
import MediaGrid from './MediaGrid';
import Toolbar from './Toolbar';
import Welcome from './screens/Welcome';
import Setup from './screens/Setup';

const App = () => {
    // Existing state
    const [folders, setFolders] = useState([]);
    const [selectedFolder, setSelectedFolder] = useState(null);
    const [attachments, setAttachments] = useState([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);

    // New state for welcome flow
    const [isFirstRun, setIsFirstRun] = useState(true);
    const [setupComplete, setSetupComplete] = useState(false);

    // Check if this is first run
    useEffect(() => {
        const checkFirstRun = async () => {
            try {
                const response = await apiFetch({
                    path: `${MediaFoldersAdmin.apiNamespace}/settings/first-run`,
                });
                setIsFirstRun(response.isFirstRun);
                setSetupComplete(response.setupComplete);
            } catch (err) {
                setError(err.message);
            } finally {
                setLoading(false);
            }
        };
        checkFirstRun();
    }, []);

    // Existing methods...
    const fetchFolders = async () => { /* ... */ };
    const fetchAttachments = async (folderId) => { /* ... */ };
    const handleCreateFolder = async (name, parentId = null) => { /* ... */ };
    const handleUpdateFolder = async (id, name) => { /* ... */ };
    const handleDeleteFolder = async (id) => { /* ... */ };

    if (error) {
        return (
            <div className="notice notice-error">
                <p>{error}</p>
            </div>
        );
    }

    if (loading) {
        return <Spinner />;
    }

    // Show welcome screen if first run
    if (isFirstRun) {
        return <Welcome onComplete={() => setIsFirstRun(false)} />;
    }

    // Show setup screen if welcome complete but setup not done
    if (!setupComplete) {
        return <Setup onComplete={() => setSetupComplete(true)} />;
    }

    // Main app UI (existing return)
    return (
        <div className="media-folders-container">
            {/* ... existing JSX ... */}
        </div>
    );
};

export default App;