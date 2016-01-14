<div class="element-container">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="form-group">
					<div class="col-md-3">
						<label class="control-label" for="ucphelloworld_enable"><?php echo _("Enable Hello World")?></label>
						<i class="fa fa-question-circle fpbx-help-icon" data-for="ucphelloworld_enable"></i>
					</div>
					<div class="col-md-9">
						<span class="radioset">
							<input type="radio" name="ucphelloworld_enable" id="ucphelloworld_enable_yes" value="yes" <?php echo ($enabled) ? 'checked' : ''?>>
							<label for="ucphelloworld_enable_yes"><?php echo _('Yes')?></label>
							<input type="radio" name="ucphelloworld_enable" id="ucphelloworld_enable_no" value="no" <?php echo (!is_null($enabled) && !$enabled) ? 'checked' : ''?>>
							<label for="ucphelloworld_enable_no"><?php echo _('No')?></label>
							<?php if($mode == "user") {?>
								<input type="radio" id="ucphelloworld_enable_inherit" name="ucphelloworld_enable" value='inherit' <?php echo is_null($enabled) ? 'checked' : ''?>>
								<label for="ucphelloworld_enable_inherit"><?php echo _('Inherit')?></label>
							<?php } ?>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<span id="ucphelloworld_enable-help" class="help-block fpbx-help-block"><?php echo _("Whether to allow this user to be able to Hello World in UCP")?></span>
		</div>
	</div>
</div>
