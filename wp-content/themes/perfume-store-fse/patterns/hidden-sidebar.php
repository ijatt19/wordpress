<?php

/**
 * Title: Hidden Sidebar
 * Slug: perfume-store-fse/hidden-sidebar
 * Inserter: no
 */
?>
<!-- wp:group {"metadata":{"name":"Sidebar"},"style":{"position":{"type":""},"dimensions":{"minHeight":""},"spacing":{"blockGap":"var:preset|spacing|32"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|32"},"blockGap":"var:preset|spacing|32"},"border":{"bottom":{"color":"var:preset|color|secondary-100","width":"1px"}}},"layout":{"type":"constrained"}} -->
  <div class="wp-block-group" style="border-bottom-color:var(--wp--preset--color--secondary-100);border-bottom-width:1px;padding-bottom:var(--wp--preset--spacing--32)"><!-- wp:group {"align":"wide","className":"is-style-default","style":{"border":{"radius":"12px"}},"layout":{"type":"default"}} -->
    <div class="wp-block-group alignwide is-style-default" style="border-radius:12px"><!-- wp:group {"layout":{"type":"default"}} -->
      <div class="wp-block-group"><!-- wp:heading {"level":3,"className":"is-style-heading-basic is-style-text-label-2"} -->
        <h3 class="wp-block-heading is-style-heading-basic is-style-text-label-2"><?php esc_html_e('Popular Posts', 'perfume-store-fse'); ?></h3>
        <!-- /wp:heading -->
      </div>
      <!-- /wp:group -->

      <!-- wp:query {"query":{"perPage":4,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
      <div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"default","columnCount":null,"minimumColumnWidth":"10rem"}} -->
        <!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
        <div class="wp-block-columns are-vertically-aligned-center" style="margin-top:0;margin-bottom:0"><!-- wp:column {"verticalAlignment":"center","width":"33.33%"} -->
          <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:33.33%"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"4/3.5","className":"is-style-image-shine"} /--></div>
          <!-- /wp:column -->

          <!-- wp:column {"verticalAlignment":"center","width":"66.66%"} -->
          <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:66.66%"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|4"}},"layout":{"type":"default"}} -->
            <div class="wp-block-group"><!-- wp:post-title {"isLink":true,"className":"is-style-text-summary"} /-->

              <!-- wp:post-date {"isLink":true,"fontSize":"minuscule"} /-->
            </div>
            <!-- /wp:group -->
          </div>
          <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
        <!-- /wp:post-template -->
      </div>
      <!-- /wp:query -->
    </div>
    <!-- /wp:group -->
  </div>
  <!-- /wp:group -->

  <!-- wp:group {"className":"is-style-default","style":{"spacing":{"blockGap":"var:preset|spacing|32","padding":{"bottom":"var:preset|spacing|32"}},"border":{"bottom":{"color":"var:preset|color|secondary-100","width":"1px"},"top":[],"right":[],"left":[]}},"layout":{"type":"default"}} -->
  <div class="wp-block-group is-style-default" style="border-bottom-color:var(--wp--preset--color--secondary-100);border-bottom-width:1px;padding-bottom:var(--wp--preset--spacing--32)"><!-- wp:group {"layout":{"type":"default"}} -->
    <div class="wp-block-group"><!-- wp:heading {"level":3,"className":"is-style-heading-basic is-style-text-label-2"} -->
      <h3 class="wp-block-heading is-style-heading-basic is-style-text-label-2"><?php esc_html_e('Categories', 'perfume-store-fse'); ?></h3>
      <!-- /wp:heading -->
    </div>
    <!-- /wp:group -->

    <!-- wp:categories {"showPostCounts":true,"showOnlyTopLevel":true,"showLabel":false,"className":"is-style-categories-1"} /-->
  </div>
  <!-- /wp:group -->

  <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|32"}},"layout":{"type":"constrained"}} -->
  <div class="wp-block-group"><!-- wp:group {"align":"wide","className":"is-style-default","style":{"border":{"radius":"12px"}},"layout":{"type":"default"}} -->
    <div class="wp-block-group alignwide is-style-default" style="border-radius:12px"><!-- wp:group {"layout":{"type":"default"}} -->
      <div class="wp-block-group"><!-- wp:heading {"level":3,"className":"is-style-heading-basic is-style-text-label-2"} -->
        <h3 class="wp-block-heading is-style-heading-basic is-style-text-label-2"><?php esc_html_e('Tags', 'perfume-store-fse'); ?></h3>
        <!-- /wp:heading -->
      </div>
      <!-- /wp:group -->

      <!-- wp:tag-cloud {"numberOfTags":10,"className":"is-style-outline"} /-->
    </div>
    <!-- /wp:group -->
  </div>
  <!-- /wp:group -->
</div>
<!-- /wp:group -->
