/**
 * Media Folders Admin JavaScript
 */

(function($) {
    'use strict';

    const MediaFolders = {
        init: function() {
            this.bindEvents();
            this.initTabs();
            
            if ($('.index-status').length) {
                this.initIndexing();
            }
        },

        bindEvents: function() {
            $('.welcome-actions .button').on('click', this.handleActionButtons);
        },

        initTabs: function() {
            const $tabs = $('.nav-tab-wrapper .nav-tab');
            const $currentTab = $tabs.filter('.nav-tab-active');

            if (!$currentTab.length) {
                $tabs.first().addClass('nav-tab-active');
            }

            $tabs.on('click', function(e) {
                e.preventDefault();
                const $this = $(this);
                
                $tabs.removeClass('nav-tab-active');
                $this.addClass('nav-tab-active');
                
                // Update URL without page reload
                const newUrl = new URL(window.location);
                newUrl.searchParams.set('tab', $this.data('tab'));
                window.history.pushState({}, '', newUrl);
            });
        },

        initIndexing: function() {
            const self = this;
            const $progress = $('.progress');
            const $status = $('.index-status');

            if ($status.data('indexing')) {
                self.pollIndexProgress();
            }
        },

        pollIndexProgress: function() {
            $.ajax({
                url: mediaFoldersAdmin.ajaxUrl,
                data: {
                    action: 'media_folders_index_progress',
                    nonce: mediaFoldersAdmin.nonce
                },
                success: function(response) {
                    if (response.success) {
                        $('.progress').css('width', response.data.progress + '%');
                        
                        if (response.data.complete) {
                            $('.index-status h2').text(mediaFoldersAdmin.i18n.indexComplete);
                        } else {
                            setTimeout(function() {
                                MediaFolders.pollIndexProgress();
                            }, 2000);
                        }
                    }
                }
            });
        },

        handleActionButtons: function(e) {
            const $button = $(this);
            
            if ($button.hasClass('button-primary')) {
                $button.addClass('disabled')
                    .find('.dashicons')
                    .addClass('spin');
            }
        }
    };

    $(document).ready(function() {
        MediaFolders.init();
    });

})(jQuery);