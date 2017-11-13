<?php

/**
 * This file should be used to render each module instance.
 * You have access to two variables in this file: 
 * 
 * $module An instance of your module class.
 * $settings The module's settings.
 *
 * Example: 
 */

?>
<div class="fl-promo-feature-text-video-module">
<?php  
/*
	[promo_type_select] =&gt; text_promo
    [video_field] =&gt; 
    [top_title] =&gt; Build A Business You Love
    [lower_title] =&gt; Live The Life of Your Dreams
    [promo_header] =&gt; <h2 style="text-align: center;"><em><strong>Product</strong></em> Launch&nbsp;</h2><h3 style="text-align: center;">Formula</h3>
    [promo_box_text] =&gt; <p>Product Launch Formula is a proven, step-by-step process that<br>shows you exactly how to launch a product in precise detail. It<br>shows you exactly what to do every step of the way, right down to<br>which blog post to release when, and what to say in every email.</p>
    [button_field] =&gt; button-link
    [button_color_field] =&gt; 333333
    [button_link_text] =&gt; Learn More
    [icon_field] =&gt; fa fa-play
    [link_field] =&gt; /somelinkhere/
    [background_select] =&gt; photo-bg
    [photo_field] =&gt; 212
    [background_color_field] =&gt; FFFFFF
    [toggle_me] =&gt; script_yes
    [embed_code] =&gt; <script type="text/javascript" src="//app.icontact.com/icp/core/mycontacts/signup/designer/form/automatic?id=4&amp;cid=195376&amp;lid=7346"></script>
    [left_text_sub] =&gt; some text will go here once you have created your left side box.
    [sub_photo] =&gt; 847
    [margin_top] =&gt; 
    [margin_top_medium] =&gt; 
    [margin_top_responsive] =&gt; 
    [margin_bottom] =&gt; 
    [margin_bottom_medium] =&gt; 
    [margin_bottom_responsive] =&gt; 
    [margin_left] =&gt; 
    [margin_left_medium] =&gt; 
    [margin_left_responsive] =&gt; 
    [margin_right] =&gt; 
    [margin_right_medium] =&gt; 
    [margin_right_responsive] =&gt; 
    [responsive_display] =&gt; 
    [visibility_display] =&gt; 
    [visibility_user_capability] =&gt; 
    [animation] =&gt; 
    [animation_delay] =&gt; 0.0
    [id] =&gt; 
    [class] =&gt; 
    [type] =&gt; index
    [link_field-search] =&gt; 
    [photo_field_src] =&gt; http://69f.ff6.myftpupload.com/wp-content/uploads/2017/04/gallery-6-1600x1067.jpg
    [sub_photo_src] =&gt; http://69f.ff6.myftpupload.com/wp-content/uploads/2017/07/Screen-Shot-2017-07-14-at-3.16.21-PM-150x150.png
*/
if ( $settings->promo_type_select === 'text_promo' ){
	if ( $settings->background_select === 'photo-bg' ) {
		$bg_class =	'fl-row-bg-photo';
		$bg = 'url("' . $settings->photo_field_src .'");'; 
	} elseif ($settings->background_select === 'color-bg' ) {
		$bg_class = 'fl-row-bg-color';
		$bg = '#'. $settings->background_color_field .';';
	} else {
		$bg_class = 'fl-row-bg-none';
		$bg = '';
	}
	?>
	<div id="promo-feature-module" data-node="<?php echo $module->node; ?>" class="fl-row fl-row-full-width <?php echo $bg_class; ?> fl-node-<?php echo $module->node; ?>" >
		<div class="fl-row-content-wrap" style="background:url('<?php echo $settings->photo_field_src; ?>');"> 
			<div class="fl-row-content fl-row-fixed-width fl-node-content">
				<div class="promo-feature-box">
					<div class="fl-col-group fl-node-<?php echo $module->node; ?>">
						<h2 class="extra-top"><?php echo $settings->top_title; ?></h2>
						<h2 class="indent"><?php echo $settings->lower_title; ?></h2>
						<div class="special-feature-box">
							<div class="topper">
								<?php echo $settings->promo_header; ?>
							</div>
							<div class="lower">
								<?php echo $settings->promo_box_text; ?>
								<a href="<?php echo $settings->link_field; ?>" class="btn btn-promo btn-arrow-left"><i class="<?php echo $settings->icon_field; ?>"></i><?php echo $settings->button_link_text;?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php if ( $settings->toggle_me === 'script_yes' ){ ?>
			<div id="pfsubscribe" class="fl-sub-node-<?php echo $module->node; ?> fl-row-content fl-row-fixed-width fl-node-content">
				<div class="fl-row-content-wrap">
					<div class="fl-row-content fl-row-fixed-width fl-node-content">
						<div class="fl-col-group fl-node-<?php echo $module->node; ?>">
							<div class="fl-col fl-col-small sub-left" style="width:40%;">
								<img class="promo-image alignleft size-full wp-image-<?php echo $settings->sub_photo; ?>" alt="" src="<?php echo $settings->sub_photo_src; ?>"/>
								<p class="optin-copy"><?php echo $settings->left_text_sub; ?></p>

							</div>
							<div class="fl-col sub-right" style="width:60%;">
								<h2 class="small"><?php echo $settings->top_sub_text; ?></h2>
								<div class="contact-form">
									<?php echo $settings->embed_code; ?>
								</div>
								<script>
								jQuery(document).ready(function() {
									jQuery('*[data-label="Email Address"]').css('float','left');
									jQuery('*[data-label="Email Address"] label').hide();
									jQuery('input[name="data[email]"').attr('placeholder','Email Address');
									jQuery('input[name="data[email]"').css('width','100%');
									jQuery('.submit-container .btn-submit').val('Sign Up!');
									// jQuery('.submit-container').css('float','left');
									jQuery('#ic_signupform .elcontainer').css('border','none');
									jQuery('#ic_signupform .elcontainer').css('max-width','none');
									
									jQuery('*[data-label="First Name"]').removeClass('required');
									jQuery('*[data-label="First Name"] label').hide();
									jQuery('*[data-label="First Name"]').css('width','50%');
									jQuery('*[data-label="First Name"]').css('float','left');
									jQuery('input[name="data[fname]"').attr('placeholder','First Name');
									jQuery('input[name="data[fname]"').css('width','100%');
									jQuery('*[data-label="Last Name"]').removeClass('required');
									jQuery('*[data-label="Last Name"] label').hide();
									jQuery('*[data-label="Last Name"]').css('width','50%');
									jQuery('*[data-label="Last Name"]').css('float','left');
									jQuery('input[name="data[lname]"').attr('placeholder','Last Name');
									jQuery('input[name="data[lname]"').css('width','100%');
									
									jQuery('*[data-label="Business"]').hide();
									jQuery('*[data-label="State"]').hide();
								});
								</script>
							</div>
							
						</div>
					</div>
				</div>
			</div>
<!--
<div class="vc_span8 wpb_column column_container col instance-4" data-animation="" data-delay="0">
<div class="wpb_wrapper">
<div class="wpb_text_column wpb_content_element ">
<div class="wpb_wrapper">
<h2 class="small" style="text-transform:none !important;">Learn the secrets of the world's most successful Internet Marketers:</h2>
</div>
</div>
<div class="wpb_raw_code wpb_content_element wpb_raw_html">
<div class="wpb_wrapper">
<form accept-charset="UTF-8" action="https://yj227.infusionsoft.com/app/form/process/cc1f373c4633acce3484dfd015e419d4" class="infusion-form" method="POST">
    <input name="inf_form_xid" type="hidden" value="cc1f373c4633acce3484dfd015e419d4">
    <input name="inf_form_name" type="hidden" value="16 Rules for Internet &amp;#a;Success">
    <input name="infusionsoft_version" type="hidden" value="1.49.0.36">
    <div class="infusion-field">
        <label for="inf_field_Email">Email *</label>
        <input class="text infusion-field-input-container" id="inf_field_Email" type="text" name="inf_field_Email" value="" tabindex="500" onfocus=" if (this.value == '') { this.value = ''; }" onblur="if (this.value == '') { this.value='';} " placeholder="Email Address">
    </div>
    <input name="inf_custom_utmsource" type="hidden" value="null">
    <input name="inf_custom_utmterm" type="hidden" value="null">
    <div class="infusion-submit">
    <button class="btn btn-arrow-left" type="submit" name="submit" value="submit">Sign up</button>
    </div>
<input type="hidden" name="inf_custom_GaSource" value="direct"><input type="hidden" name="inf_custom_GaMedium" value="none"><input type="hidden" name="inf_custom_GaTerm" value="-"><input type="hidden" name="inf_custom_GaContent" value="-"><input type="hidden" name="inf_custom_GaCampaign" value="direct"><input type="hidden" name="inf_custom_GaReferurl" value="http://jeffwalker.com/"><input type="hidden" name="inf_field_LeadSourceName" value="direct-none-link"><input type="hidden" name="inf_custom_IPAddress" value="72.210.58.101"></form>
</div>
</div>
</div>
</div>
</div>

		</div>
	</div>

			</div> 
	</div> 
</div></div>
			</div> -->
		<?php } ?>
		
	</div>
<?php } // endif text_promo 
else { // video_promo ?>
	<div id="promo-feature-module" data-node="<?php echo $module->node; ?>" class="fl-row fl-row-full-width video_promo fl-node-<?php echo $module->node; ?>" >
		<div class="fl-row-content-wrap"> 
			<div class="fl-row-content fl-row-fixed-width fl-node-content">
				<div class="fl-col-group fl-node-<?php echo $module->node; ?>">
					
				</div>
			</div>
		</div>
	</div>
<?php } ?>
</div>