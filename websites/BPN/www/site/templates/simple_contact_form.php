<div class="">
<?php if ($input->success): ?>
<p class='success scf-state'><?= $input->success; ?></p>
<?php else: ?>

<form id="InputfieldForm33" class="js-simple_contact_form InputfieldForm" method="post" action="./" data-colspacing="0">
<ul class='Inputfields'>

	<li class='Inputfield InputfieldText Inputfield_fullName InputfieldStateRequired' id='wrap_Inputfield_fullName'>

		<label class='InputfieldHeader' for='Inputfield_fullName'>fullName<i class='toggle-icon fa fa-angle-down' data-to='fa-angle-down fa-angle-right'></i></label>
		<div class='InputfieldContent'>

<input id="Inputfield_fullName" class=" required InputfieldMaxWidth" name="fullName" value="<?= $input->fullName; ?>" type="text" maxlength="2048" placeholder="fullName" />
		</div>
	</li>
	<li class='Inputfield InputfieldText Inputfield_email InputfieldStateRequired' id='wrap_Inputfield_email'>

		<label class='InputfieldHeader' for='Inputfield_email'>email<i class='toggle-icon fa fa-angle-down' data-to='fa-angle-down fa-angle-right'></i></label>
		<div class='InputfieldContent'>

<input id="Inputfield_email" class=" required InputfieldMaxWidth" name="email" value="<?= $input->email; ?>" type="text" maxlength="2048" placeholder="email" />
		</div>
	</li>
	<li class='Inputfield InputfieldText Inputfield_message InputfieldStateRequired' id='wrap_Inputfield_message'>

		<label class='InputfieldHeader' for='Inputfield_message'>message<i class='toggle-icon fa fa-angle-down' data-to='fa-angle-down fa-angle-right'></i></label>
		<div class='InputfieldContent'>

<input id="Inputfield_message" class=" required InputfieldMaxWidth" name="message" value="<?= $input->message; ?>" type="text" maxlength="2048" placeholder="message" />
		</div>
	</li>
	<li class='Inputfield InputfieldText Inputfield_scf-website' id='wrap_Inputfield_scf-website'>

		<label class='InputfieldHeader' for='Inputfield_scf-website'>scf-website<i class='toggle-icon fa fa-angle-down' data-to='fa-angle-down fa-angle-right'></i></label>
		<div class='InputfieldContent'>

<input id="Inputfield_scf-website" class="InputfieldMaxWidth" name="scf-website" type="text" maxlength="2048" />
		</div>
	</li>
	<li class='Inputfield InputfieldHidden Inputfield_submitted' id='wrap_Inputfield_submitted'>

		<label class='InputfieldHeader' for='Inputfield_submitted'>submitted<i class='toggle-icon fa fa-angle-down' data-to='fa-angle-down fa-angle-right'></i></label>
		<div class='InputfieldContent'>

<input id="Inputfield_submitted" name="submitted" value="1" type="hidden" />
		</div>
	</li>
	<li class='Inputfield InputfieldHidden Inputfield_scf-date' id='wrap_Inputfield_scf-date'>

		<label class='InputfieldHeader' for='Inputfield_scf-date'>scf-date<i class='toggle-icon fa fa-angle-down' data-to='fa-angle-down fa-angle-right'></i></label>
		<div class='InputfieldContent'>

<input id="Inputfield_scf-date" name="scf-date" value="<?= time(); ?>" type="hidden" />
		</div>
	</li>
	<li class='Inputfield InputfieldSubmit Inputfield_submit' id='wrap_Inputfield_submit'>

		<div class='InputfieldContent'>

<button id="Inputfield_submit" class="ui-button ui-widget ui-state-default ui-corner-all" name="submit" value="Submit" type="submit"><span class='ui-button-text'>Submit</span></button>
		</div>
	</li>
</ul>
<input type='hidden' name='<?= $input->tokenName; ?>' value='<?= $input->tokenValue; ?>' class='_post_token' />
</form>



<?php if ($input->error): ?>
<p class='error scf-state'><?= $input->error; ?></p>
<?php endif; ?>
<?php endif; ?>
</div>