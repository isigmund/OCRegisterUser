
<!--[if IE 8]><style>input[type="checkbox"]{padding:0;}</style><![endif]-->
<form method="post" action="?" name="login">
	<fieldset>
		<p id="message" class="hidden">
			<img class="float-spinner" alt="" src="/core/img/loading-dark.gif" />
			<span id="messageText"></span>
			<!-- the following div ensures that the spinner is always inside the #message div -->
			<div style="clear: both;"></div>
		</p>
		<p class="grouptop">

			<input
				type="text"
				name="r" 
				id="newuserfullname"
				style="width: 255px; padding-left: 36px"
				placeholder="Vor- und Nachname"
				value="<?php echo htmlentities($user_real) ?>"
				autofocus
				autocomplete="on" 
				autocapitalize="off" 
				autocorrect="off" 
				required 
			/>
			<label for="newuserfullname" class="infield">Vor- und Nachname</label>
		</p>
	
		<p class="groupbottom">
			<input 
				type="text" 
				name="e" 
				id="newuseremail" 
				value="<?php echo htmlentities($user_email) ?>"
				style="width: 255px; padding-left: 36px"
				placeholder="eMail"
				autocomplete="on" 
				autocapitalize="off" 
				autocorrect="off" 
				required 
		   />
			<label for="newuseremail" class="infield">eMail</label>
		</p>
		
		
		<p class="grouptop">
			<input 
				type="text" 
				name="u" 
				id="newusername" 
				value="<?php echo htmlentities($user_id) ?>"
				style="width: 255px; padding-left: 36px"
				placeholder="Benutzername"
				autocomplete="on" 
				autocapitalize="off" 
				autocorrect="off" 
				required 
		  />
			<label for="newusername" class="infield">Benutzername</label>
			<img class="svg" style="top: 22px;" id="password-icon" src="/core/img/actions/user.svg" alt=""/> 
		</p>
		
		<p class="groupbottom">
			<input 
				type="password" 
				name="p" 
				id="newuserpassword" 
				value=""
				style="width: 255px; padding-left: 36px"
				placeholder="Passwort"
				autocomplete="on" 
				autocapitalize="off" 
				autocorrect="off" 
				required 
		  />
			<label for="newuserpassword" class="infield">Passwort</label>
			<img class="svg" id="password-icon" src="/core/img/actions/password.svg" alt=""/>
		</p>
		
		<!-- reCAPTCHA widget -->
		<div class="g-recaptcha" data-sitekey="<?php echo $recaptchaSiteKey ?>"></div>
		
		<!-- Submit button -->
		<p><input style="width: 304px; margin-top: 20px" type="submit" name="submitted" value="Benutzer registrieren"></p>
	</fieldset>
</form>

