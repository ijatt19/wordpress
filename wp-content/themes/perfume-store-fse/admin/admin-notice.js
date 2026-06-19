/**
 * Admin Notice Handler
 * @param $
 */
( function ( $ ) {
	'use strict';

	$( document ).ready( function () {
		// Ensure notice data exists and has required properties
		if (
			typeof perfume_store_fse_notice === 'undefined' ||
			! perfume_store_fse_notice.notice_class ||
			! perfume_store_fse_notice.ajax_url ||
			! perfume_store_fse_notice.action ||
			! perfume_store_fse_notice.nonce
		) {
			return;
		}

		const noticeClass = perfume_store_fse_notice.notice_class;
		const $notice = $( `.${ noticeClass }` );

		if ( $notice.length === 0 ) {
			return;
		}

		/**
		 * Handle notice dismiss click
		 *
		 * @param {Event} e
		 */
		function handleNoticeDismiss( e ) {
			e.preventDefault();

			const $thisNotice = $( this ).closest( `.${ noticeClass }` );

			// Prevent duplicate dismiss requests
			if ( $thisNotice.data( 'dismissing' ) ) {
				return;
			}

			$thisNotice.data( 'dismissing', true );

			$.ajax( {
				url: perfume_store_fse_notice.ajax_url,
				method: 'POST',
				data: {
					action: perfume_store_fse_notice.action,
					nonce: perfume_store_fse_notice.nonce,
				},
				success( response ) {
					if ( response && response.success ) {
						$thisNotice.fadeOut( 200, function () {
							$( this ).remove();
						} );
					} else {
						console.error(
							'Failed to dismiss notice:',
							response ? response.data : 'No response data'
						);
						// Optional: still hide on failure to avoid user frustration
						$thisNotice.fadeOut( 200, function () {
							$( this ).remove();
						} );
					}
				},
				error( xhr, status, error ) {
					console.error( 'AJAX error:', error );
					// Optional: still hide on AJAX error
					$thisNotice.fadeOut( 200, function () {
						$( this ).remove();
					} );
				},
				complete() {
					// Allow potential future interactions if needed
					$thisNotice.data( 'dismissing', false );
				},
			} );
		}

		// Delegated click handler for dismiss button
		$( document ).on(
			'click',
			`.${ noticeClass } .notice-dismiss`,
			handleNoticeDismiss
		);
	} );
} )( jQuery );
