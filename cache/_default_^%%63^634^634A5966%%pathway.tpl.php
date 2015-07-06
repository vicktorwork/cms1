<?php /* Smarty version 2.6.28, created on 2015-07-06 11:58:07
         compiled from pathway.tpl */ ?>
<div class="pathway">
    <?php $_from = $this->_tpl_vars['pathway']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['pathway'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['pathway']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['path']):
        $this->_foreach['pathway']['iteration']++;
?>
        <?php if ($this->_tpl_vars['path']['is_last']): ?>
            <span class="pathwaylink"><?php echo $this->_tpl_vars['path']['title']; ?>
</span>
        <?php else: ?>
            <a href="<?php echo $this->_tpl_vars['path']['link']; ?>
" class="pathwaylink"><?php echo $this->_tpl_vars['path']['title']; ?>
</a>
        <?php endif; ?>
        <?php if (! ($this->_foreach['pathway']['iteration'] == $this->_foreach['pathway']['total'])): ?><?php echo $this->_tpl_vars['separator']; ?>
<?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
</div>