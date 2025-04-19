import { __ } from '@wordpress/i18n';

const MediaGrid = ({ attachments, selectedFolder }) => {
    if (!selectedFolder) {
        return (
            <div className="media-folders-empty">
                {__('Select a folder to view its contents', 'media-folders')}
            </div>
        );
    }

    if (attachments.length === 0) {
        return (
            <div className="media-folders-empty">
                {__('No media files in this folder', 'media-folders')}
            </div>
        );
    }

    return (
        <div className="media-folders-grid">
            {attachments.map(attachment => (
                <div key={attachment.id} className="media-folders-attachment">
                    <img
                        src={attachment.url}
                        alt={attachment.title}
                    />
                    <div className="media-folders-attachment-title">
                        {attachment.title}
                    </div>
                </div>
            ))}
        </div>
    );
};

export default MediaGrid;