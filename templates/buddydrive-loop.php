<?php

/**
 * BuddyDrive Loop
 *
 * Inspired by BuddyPress Activity Loop
 *
 * @package BuddyDrive
 * @since  version (1.0)
 */

?>

<?php do_action( 'buddydrive_before_loop' ); ?>

<?php if ( buddydrive_has_items( buddydrive_querystring() ) ): ?>

	<?php if ( empty( $_POST['page'] ) && empty( $_POST['folder'] ) ) : ?>

		<table id="buddydrive-dir" class="user-dir">
			<thead>
				<tr><th><?php buddydrive_th_owner_or_cb();?></th><th class="buddydrive-item-name"><?php _e( 'Name', 'buddydrive' );?></th><th class="buddydrive-privacy"><?php _e( 'Privacy', 'buddydrive' );?></th><th class="buddydrive-mime-type"><?php _e( 'Type', 'buddydrive' );?></th><th class="buddydrive-last-edit"><?php _e( 'Last edit', 'buddydrive' );?></th></tr>
			</thead>
			<tbody>
	<?php endif; ?>

	<?php while ( buddydrive_has_items() ) : buddydrive_the_item(); ?>

		<?php buddydrive_get_template( 'buddydrive-entry', false );?>

	<?php endwhile; ?>

	<?php if ( buddydrive_has_more_items() ) : ?>

		<tr>
			<td class="buddydrive-load-more" colspan="5">
				<a href="#more-buddydrive"><?php _e( 'Load More', 'buddydrive' ); ?></a>
			</td>
		</tr>

	<?php endif; ?>

	<?php if ( empty( $_POST['page'] ) && empty( $_POST['folder'] ) ) : ?>
			</tbody>
		</table>

	<?php endif; ?>

<?php else : ?>

	<?php if ( empty( $_POST['page'] ) && empty( $_POST['folder'] ) ) : ?>
		<table id="buddydrive-dir" class="user-dir">
			<thead>
				<tr><th><?php buddydrive_th_owner_or_cb();?></th><th class="buddydrive-item-name"><?php _e( 'Name', 'buddydrive' );?></th><th class="buddydrive-privacy"><?php _e( 'Privacy', 'buddydrive' );?></th><th class="buddydrive-mime-type"><?php _e( 'Type', 'buddydrive' );?></th><th class="buddydrive-last-edit"><?php _e( 'Last edit', 'buddydrive' );?></th></tr>
			</thead>
			<tbody>
	<?php endif;?>
			<tr id="no-buddyitems">
				<td colspan="5">
					<div id="message" class="info">
						<p><?php _e( 'Sorry, there was no buddydrive items found.', 'buddydrive' ); ?></p>
					</div>
				</td>
			</tr>
	<?php if ( empty( $_POST['page'] ) && empty( $_POST['folder'] ) ) : ?>
			</tbody>
		</table>
	<?php endif;?>
	

<?php endif; ?>

<?php do_action( 'buddydrive_after_loop' ); ?>

<?php if ( empty( $_POST['page'] ) && empty( $_POST['folder'] ) ) : ?>

	<form action="" name="buddydrive-loop-form" id="buddydrive-loop-form" method="post">

		<?php wp_nonce_field( 'buddydrive_actions', '_wpnonce_buddydrive_actions' ); ?>

	</form>
<?php endif;?>