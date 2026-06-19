<?php

/**
 * Title: Hidden Query Loop, Sidebar
 * Slug: perfume-store-fse/hidden-query-loop-sidebar
 * Inserter: no
 */
?>
<!-- wp:group {"tagName":"section","metadata":{"name":"Main QL"},"layout":{"type":"default"}} -->
<section class="wp-block-group"><!-- wp:query {"query":{"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true,"perPage":10},"layout":{"type":"default"}} -->
  <div class="wp-block-query"><!-- wp:post-template {"className":"is-style-post-template-tf is-style-post-template-1 is-style-post-template-2 is-style-default","layout":{"type":"grid","columnCount":null,"minimumColumnWidth":"300px"}} -->
    <!-- wp:group {"className":"is-style-section-2","style":{"dimensions":{"minHeight":"100%"},"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","verticalAlignment":"space-between"}} -->
    <div class="wp-block-group is-style-section-2" style="min-height:100%"><!-- wp:group {"className":"is-style-default","style":{"layout":{"selfStretch":"fill","flexSize":null},"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
      <div class="wp-block-group is-style-default"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"4/3","align":"center","className":"is-style-image-shine"} /-->

        <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|12","padding":{"right":"var:preset|spacing|24","left":"var:preset|spacing|24","top":"var:preset|spacing|24","bottom":"var:preset|spacing|24"}}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--24);padding-right:var(--wp--preset--spacing--24);padding-bottom:var(--wp--preset--spacing--24);padding-left:var(--wp--preset--spacing--24)"><!-- wp:post-title {"isLink":true,"fontSize":"diminutive"} /--></div>
        <!-- /wp:group -->
      </div>
      <!-- /wp:group -->

      <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|6","padding":{"top":"var:preset|spacing|24","bottom":"var:preset|spacing|24","left":"var:preset|spacing|24","right":"var:preset|spacing|24"}},"border":{"top":{"color":"var:preset|color|secondary-200","style":"dotted","width":"1px"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
      <div class="wp-block-group" style="border-top-color:var(--wp--preset--color--secondary-200);border-top-style:dotted;border-top-width:1px;padding-top:var(--wp--preset--spacing--24);padding-right:var(--wp--preset--spacing--24);padding-bottom:var(--wp--preset--spacing--24);padding-left:var(--wp--preset--spacing--24)"><!-- wp:group {"style":{"typography":{"lineHeight":"1"},"spacing":{"blockGap":"var:preset|spacing|8"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
        <div class="wp-block-group" style="line-height:1"><!-- wp:avatar {"size":24,"isLink":true} /-->

          <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|6"}},"layout":{"type":"default"}} -->
          <div class="wp-block-group"><!-- wp:post-author-name {"isLink":true,"fontSize":"minute"} /--></div>
          <!-- /wp:group -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"style":{"typography":{"lineHeight":"1"},"spacing":{"blockGap":"var:preset|spacing|4"},"layout":{"selfStretch":"fit","flexSize":null}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
        <div class="wp-block-group" style="line-height:1"><!-- wp:post-date {"format":"M j, Y","isLink":true,"fontSize":"minute"} /--></div>
        <!-- /wp:group -->
      </div>
      <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
    <!-- /wp:post-template -->

    <!-- wp:query-pagination {"paginationArrow":"arrow","className":"is-style-default","layout":{"type":"flex","justifyContent":"center"}} -->
    <!-- wp:query-pagination-previous {"label":"Prev"} /-->

    <!-- wp:query-pagination-numbers /-->

    <!-- wp:query-pagination-next {"label":"Next"} /-->
    <!-- /wp:query-pagination -->

    <!-- wp:query-no-results -->
    <!-- wp:paragraph {"align":"center"} -->
    <p class="has-text-align-center"><?php esc_html_e('No posts were found.', 'perfume-store-fse'); ?></p>
    <!-- /wp:paragraph -->
    <!-- /wp:query-no-results -->
  </div>
  <!-- /wp:query -->

  <!-- wp:spacer {"height":"1px","className":"is-style-spacer-none-up-lg","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|52"}}}} -->
  <div style="margin-bottom:var(--wp--preset--spacing--52);height:1px" aria-hidden="true" class="wp-block-spacer is-style-spacer-none-up-lg"></div>
  <!-- /wp:spacer -->
</section>
<!-- /wp:group -->
