<?php /* Smarty version 2.6.28, created on 2015-02-23 15:28:14
         compiled from com_content_read.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'com_content_read.tpl', 22, false),array('modifier', 'spellcount', 'com_content_read.tpl', 66, false),)), $this); ?>
<?php if ($this->_tpl_vars['article']['showtitle']): ?>
    <h1 class="con_heading"><?php echo $this->_tpl_vars['article']['title']; ?>
</h1>
<?php endif; ?>

	<!--div class="con_pubdate">
		<span style="color:#CC0000"></span> - <a href=""></a>
	</div-->

<?php if ($this->_tpl_vars['is_pages']): ?>
	<div class="con_pt" id="pt">
		<span class="con_pt_heading">
			<a class="con_pt_hidelink" href="javascript:void;" onClick="<?php echo '$(\'#pt_list\').toggle();'; ?>
"><?php echo $this->_tpl_vars['LANG']['CONTENT']; ?>
</a>
			<?php if ($this->_tpl_vars['cfg']['pt_hide']): ?> [<a href="javascript:void(0);" onclick="<?php echo '$(\'#pt\').hide();'; ?>
"><?php echo $this->_tpl_vars['LANG']['HIDE']; ?>
</a>] <?php endif; ?>
		</span>
		<div id="pt_list" style="<?php if ($this->_tpl_vars['cfg']['pt_disp']): ?>display: block;<?php else: ?>display: none;<?php endif; ?> width:100%">
			<div>
				<ul id="con_pt_list">
				<?php $_from = $this->_tpl_vars['pt_pages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['pages']):
?>
					<?php if (( $this->_tpl_vars['tid']+1 != $this->_tpl_vars['page'] )): ?>
						<?php echo smarty_function_math(array('equation' => "x + 1",'x' => $this->_tpl_vars['tid'],'assign' => 'key'), $this);?>

						<li><a href="<?php echo $this->_tpl_vars['pages']['url']; ?>
"><?php echo $this->_tpl_vars['pages']['title']; ?>
</a></li>
					<?php else: ?>
						<li><?php echo $this->_tpl_vars['pages']['title']; ?>
</li>
					<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
				<ul>
			</div>
		</div>
	</div>
<?php endif; ?>

<div class="con_text just_text" style="overflow:hidden">
        <?php echo $this->_tpl_vars['article']['content']; ?>

</div>

<?php if ($this->_tpl_vars['is_admin'] || $this->_tpl_vars['is_editor'] || $this->_tpl_vars['is_author']): ?>
    <div class="blog_comments">
        <?php if (! $this->_tpl_vars['article']['published'] && ( $this->_tpl_vars['is_admin'] || $this->_tpl_vars['is_editor'] )): ?>
        	<a class="blog_moderate_yes" href="/content/publish<?php echo $this->_tpl_vars['article']['id']; ?>
.html"><?php echo $this->_tpl_vars['LANG']['ARTICLE_ALLOW']; ?>
</a> |
        <?php endif; ?>
        <?php if ($this->_tpl_vars['is_admin'] || $this->_tpl_vars['is_editor'] || $this->_tpl_vars['is_author_del']): ?>
        	<a class="blog_moderate_no" href="/content/delete<?php echo $this->_tpl_vars['article']['id']; ?>
.html"><?php echo $this->_tpl_vars['LANG']['DELETE']; ?>
</a> |
        <?php endif; ?>
        <?php if ($this->_tpl_vars['is_admin'] || $this->_tpl_vars['is_editor'] || $this->_tpl_vars['is_author']): ?>
        	<a href="/content/edit<?php echo $this->_tpl_vars['article']['id']; ?>
.html" class="blog_entry_edit"><?php echo $this->_tpl_vars['LANG']['EDIT']; ?>
</a>
        <?php endif; ?>
    </div>
<?php endif; ?>

<?php if ($this->_tpl_vars['article']['showtags']): ?>
	<?php echo $this->_tpl_vars['tagbar']; ?>

<?php endif; ?>

<?php if ($this->_tpl_vars['cfg']['rating'] && $this->_tpl_vars['article']['canrate']): ?>
	<div id="con_rating_block">
		<div>
			<strong><?php echo $this->_tpl_vars['LANG']['RATING']; ?>
: </strong><span id="karmapoints"><?php echo $this->_tpl_vars['karma_points']; ?>
</span>
			<span style="padding-left:10px;color:#999"><strong><?php echo $this->_tpl_vars['LANG']['VOTES']; ?>
:</strong> <?php echo $this->_tpl_vars['karma_votes']; ?>
</span>
            <span style="padding-left:10px;color:#999"><?php echo ((is_array($_tmp=$this->_tpl_vars['article']['hits'])) ? $this->_run_mod_handler('spellcount', true, $_tmp, $this->_tpl_vars['LANG']['HIT'], $this->_tpl_vars['LANG']['HIT2'], $this->_tpl_vars['LANG']['HIT10']) : smarty_modifier_spellcount($_tmp, $this->_tpl_vars['LANG']['HIT'], $this->_tpl_vars['LANG']['HIT2'], $this->_tpl_vars['LANG']['HIT10'])); ?>
</span>
		</div>
		<?php if ($this->_tpl_vars['karma_buttons']): ?>
            <div id="karmactrl"><strong><?php echo $this->_tpl_vars['LANG']['RAT_ARTICLE']; ?>
:</strong> <?php echo $this->_tpl_vars['karma_buttons']; ?>
</div>
		<?php endif; ?>
	</div>
<?php endif; ?>
