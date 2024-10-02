<?php

namespace FSPoster\App\Pages\Accounts\Views;

use FSPoster\App\Providers\Pages;
use FSPoster\App\Providers\Helper;

defined( 'ABSPATH' ) or exit;
?>

<div>
	<?php foreach ( $fsp_params[ 'accounts_list' ] as $account_info )
	{
		?>
		<div class="fsp-account">
			<div class="fsp-card fsp-account-item" data-id="<?php echo esc_html( $account_info[ 'id' ] ); ?>" data-type="account" data-active="<?php echo esc_html( $account_info[ 'is_active' ] ); ?>" data-hidden="<?php echo esc_html( $account_info[ 'is_hidden' ] ); ?>" >
				<div class="fsp-account-inline">
					<div class="fsp-account-image">
						<img src="<?php echo Helper::profilePic( $account_info ); ?>" onerror="FSPoster.no_photo( this );">
					</div>
					<div class="fsp-account-name">
						<?php echo esc_html( $account_info[ 'name' ] ); ?>
					</div>
				</div>
				<div class="fsp-account-inline fsp-is-buttons-container">
					<div class="fsp-account-checkbox">
						<i class="<?php echo empty( $account_info[ 'is_active' ] ) ? 'far fa-check-square' :  'fas fa-check-square fsp-is-checked' ; ?>"></i>
					</div>
					<a class="fsp-account-link fsp-tooltip" href="<?php echo Helper::profileLink( $account_info ); ?>" data-title="<?php echo esc_html__( 'Profile link', 'fs-poster' ); ?>" target="_blank">
						<i class="fas fa-external-link-alt"></i>
					</a>
					<div class="fsp-account-more">
						<i class="fas fa-ellipsis-h"></i>
					</div>
				</div>
				<div class="fsp-account-inline fsp-is-select-container">
					<input type="checkbox" class="fsp-form-checkbox fsp-account-selectbox" data-id="<?php echo esc_html( $account_info[ 'id' ] ); ?>" data-type="account">
				</div>
			</div>
		</div>
	<?php } ?>

	<div class="fsp-card fsp-emptiness <?php echo( empty( $fsp_params[ 'accounts_list' ] ) ? '' : 'fsp-hide' ); ?>">
		<div class="fsp-emptiness-image">
			<img src="<?php echo Pages::asset( 'Base', 'img/empty.svg' ); ?>">
		</div>
		<div class="fsp-emptiness-text">
			<?php echo  ! empty( [ $fsp_params[ 'err_text' ] ] ) ? esc_html__( vsprintf( 'No %s found!', [ $fsp_params[ 'err_text' ] ] ), 'fs-poster' ) : esc_html__( 'No %s found!', 'fs-poster' ); ?>
		</div>
		<div class="fsp-emptiness-button">
			<button class="fsp-button fsp-accounts-add-button">
				<i class="fas fa-plus"></i>
				<span><?php echo esc_html( $fsp_params[ 'button_text' ] ); ?></span>
			</button>
		</div>
	</div>
</div>

<?php
$count = count( $fsp_params[ 'accounts_list' ] );
?>

<script>
	FSPObject.modalURL = 'add_plurk_account';
	FSPObject.accountsCount = <?php echo esc_html( $count ); ?>;
</script>