<?php
// check if the flexible content field has rows of data
if( have_rows('page_layout_options') ):

     // loop through the rows of data
	while ( have_rows('page_layout_options') ) : the_row();

		// modules

		// two columns half-half
		if( get_row_layout() == 'two_columns_half-half' ): 
			$style="";
			$bg_color = get_sub_field('background_color');
			if ($bg_color) {
				$style = 'style="background-color:'.$bg_color.'"';
			} ?>
		<div class="module two-columns-half" <?php echo $style?>>
			<div class="wrap">
				<div class="grid-x grid-margin-x">
					<div class="large-6 cell"><?php the_sub_field('column_1'); ?></div>
					<div class="large-6 cell"><?php the_sub_field('column_2'); ?></div>
				</div>
			</div>
		</div>
		<?php
		// two columns small-large
		elseif( get_row_layout() == 'two_columns_small-large' ): ?>
		<div class="module two-columns-sm-lg">
			<div class="wrap">
				<div class="grid-x">
					<div class="large-4 cell"><?php the_sub_field('column_1'); ?></div>
					<div class="large-auto cell"><?php the_sub_field('column_2'); ?></div>
				</div>
			</div>
		</div>
		<?php
		// one column
		elseif( get_row_layout() == 'one_column'):
			$style="";
			$bg_color = get_sub_field('background_color');
			if ($bg_color) {
				$style = 'style="background-color:'.$bg_color.'"';
			} ?>
		<div class="module one-column-section" <?php echo $style?>>
			<div class="wrap text-center">
				<?php
				$icon = get_sub_field('icon');
				if( $icon ): ?>
					<img src="<?php echo $icon['url']?>" alt="<?php echo $icon['alt']?>">
				<?php endif; ?>
				<?php if( get_sub_field('section_title') ): ?>
					<h2><?php the_sub_field('section_title'); ?></h2>
				<?php endif; ?>
				<?php if( get_sub_field('description') ): ?>
					<?php the_sub_field('description'); ?>
				<?php endif; ?>
				<?php
					$link_type = get_sub_field('link_type');
					if ($link_type == 'internal') {
						$link = get_sub_field('internal_link');
						$target = "";
					} elseif ($link_type == 'external') {
						$link = get_sub_field('external_link');
						$target = 'target=_blank';
					}
					if( get_sub_field('button_text') ): ?>
						<a href="<?php echo $link; ?>" class="button" <?php echo $target ?>><?php the_sub_field('button_text') ?></a>
				<?php endif; ?>
			</div>
		</div>
		<?php
		// image block
		elseif( get_row_layout() == 'image_block' ):
			$image = get_sub_field('image');
		?>
		<div class="image-block module">
			<div class="grid-x">
				<div class="small-12 cell">
					<img src="<?php echo $image['url']?>" alt="<?php echo $image['alt']?>">
				</div>
			</div>
		</div>
		<?php

		// Repeater
		elseif( get_row_layout() == 'repeater' ): ?>
		<div class="repeater module">
			<div class="wrap">
				<?php if( get_sub_field('section_title') ): ?>
					<h2 class="text-center"><?php the_sub_field('section_title'); ?></h2>
				<?php endif; ?>

				<?php if( get_sub_field('section_subtitle') ): ?>
					<h3><?php the_sub_field('section_subtitle'); ?></h3>
				<?php endif; ?>

				<?php if( get_sub_field('section_description') ): ?>
					<?php the_sub_field('section_description'); ?>
				<?php endif; ?>

				<?php if( have_rows('repeated_items') ): ?>
					<div class="grid-x grid-margin-x">
						<?php while ( have_rows('repeated_items') ) : the_row();
							$image = get_sub_field('image');
							$title = get_sub_field('title');
							$subtitle = get_sub_field('subtitle');
							$description = get_sub_field('description');
						?>
							<div class="small-12 medium-6 cell">
								<?php if( $image ): ?>
									<img class="block-img" src="<?php echo $image['url']?>" alt="<?php echo $image['alt']?>">
								<?php endif; ?>
								<?php if( $title ): ?>
									<h4><?php echo $title; ?></h4>
								<?php endif; ?>
								<?php if( $subtitle ): ?>
									<h5><?php echo $subtitle; ?></h5>
								<?php endif; ?>
								<?php if( $description ): ?>
									<?php echo $description; ?>
								<?php endif; ?>
							</div>
						<?php endwhile ?>
					</div>
				<?php endif; ?>
			</div>
		</div>

		<?php
		// Accordion
		elseif( get_row_layout() == 'accordion' ): ?>
		<div class="module">
			<div class="wrap module">
				<?php if( get_sub_field('section_title') ): ?>
					<h2 class="text-center"><?php the_sub_field('section_title'); ?></h2>
				<?php endif; ?>
				<?php if( get_sub_field('section_description') ): ?>
					<p><?php the_sub_field('section_description'); ?></p>
				<?php endif; ?>

				<?php if( have_rows('panel_repeater') ): ?>
					<ul class="accordion" data-accordion data-multi-expand="true">
						<?php while ( have_rows('panel_repeater') ) : the_row();
							$panel_title = get_sub_field('panel_title');
							$panel_body = get_sub_field('panel_body');
						?>
						<li class="accordion-item" data-accordion-item>
							<a href="#" class="accordion-title"><?php echo $panel_title?></a>
							<div class="accordion-content" data-tab-content>
						      <?php echo $panel_body?>
						    </div>
						</li>
						<?php endwhile ?>
					</ul>
				<?php endif; ?>
			</div>
		</div>

		<?php endif;

	endwhile;

else :

// no layouts found

endif;