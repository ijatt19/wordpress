/**
 * Admin Notice Handler
 * @param $
 */
( function ( $ ) {
	'use strict';

	$( document ).ready( function () {
		// Ensure notice data exists and has required properties
		if (
			typeof fresh_blog_lite_notice === 'undefined' ||
			! fresh_blog_lite_notice.notice_class ||
			! fresh_blog_lite_notice.ajax_url ||
			! fresh_blog_lite_notice.action ||
			! fresh_blog_lite_notice.nonce
		) {
			return;
		}

		const noticeClass = fresh_blog_lite_notice.notice_class;
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
				url: fresh_blog_lite_notice.ajax_url,
				method: 'POST',
				data: {
					action: fresh_blog_lite_notice.action,
					nonce: fresh_blog_lite_notice.nonce,
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
