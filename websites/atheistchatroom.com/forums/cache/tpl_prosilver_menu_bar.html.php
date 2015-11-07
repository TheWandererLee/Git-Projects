<?php if (!defined('IN_PHPBB')) exit; ?><div style="clear: both;"></div>
<div id="chromestyle" >
	<div id="chromestyle_corner"></div>
	<div id="chromemenu">
    	<ul>							
       		<li<?php if ($this->_rootref['SCRIPT_NAME'] == ("index")) {  ?> class="chromestyle_button_active"<?php } else { ?> class="chromestyle_button"<?php } ?>>
				<a href="<?php echo (isset($this->_rootref['U_INDEX'])) ? $this->_rootref['U_INDEX'] : ''; ?>" rel="dropmenu2"><?php echo ((isset($this->_rootref['L_INDEX'])) ? $this->_rootref['L_INDEX'] : ((isset($user->lang['INDEX'])) ? $user->lang['INDEX'] : '{ INDEX }')); ?><span></span></a>
			</li>																	
		</ul>
	</div>
<div id="chromestyle_corner_right"></div>
</div>