<?php /* Smarty version 2.6.28, created on 2015-02-11 20:22:45
         compiled from com_comments_view.tpl */ ?>
<div class="cmm_heading">
	<?php echo $this->_tpl_vars['labels']['comments']; ?>
 (<span id="comments_count"><?php echo $this->_tpl_vars['comments_count']; ?>
</span>)
</div>

<div class="cm_ajax_list">
<?php if ($this->_tpl_vars['cfg']['cmm_ajax']): ?>
	<script type="text/javascript">
        <?php echo '
            var anc = \'\';
            if (window.location.hash){
                var anc = window.location.hash;
            }
        '; ?>

        loadComments('<?php echo $this->_tpl_vars['target']; ?>
', <?php echo $this->_tpl_vars['target_id']; ?>
, anc);
    </script>
<?php else: ?>
	<?php echo $this->_tpl_vars['html']; ?>

<?php endif; ?>
</div>

<a name="c"></a>
<div class="cmm_links">
    <span id="cm_add_link0" class="cm_add_link add_comment">
        <a href="javascript:void(0);" onclick="<?php echo $this->_tpl_vars['add_comment_js']; ?>
" class="ajaxlink"><?php echo $this->_tpl_vars['labels']['add']; ?>
</a>
    </span>
    <?php if ($this->_tpl_vars['cfg']['subscribe']): ?>
        <?php if ($this->_tpl_vars['is_user']): ?>
            <?php if (! $this->_tpl_vars['user_subscribed']): ?>
            <span class="subscribe">
                <a href="/subscribe/<?php echo $this->_tpl_vars['target']; ?>
/<?php echo $this->_tpl_vars['target_id']; ?>
"><?php echo $this->_tpl_vars['LANG']['SUBSCRIBE_TO_NEW']; ?>
</a>
            </span>
            <?php else: ?>
            <span class="unsubscribe">
                <a href="/unsubscribe/<?php echo $this->_tpl_vars['target']; ?>
/<?php echo $this->_tpl_vars['target_id']; ?>
"><?php echo $this->_tpl_vars['LANG']['UNSUBSCRIBE']; ?>
</a>
            </span>
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['comments_count']): ?>
        <span class="cmm_rss">
            <a href="/rss/comments/<?php echo $this->_tpl_vars['target']; ?>
-<?php echo $this->_tpl_vars['target_id']; ?>
/feed.rss"><?php echo $this->_tpl_vars['labels']['rss']; ?>
</a>
        </span>
    <?php endif; ?>
</div>
<div id="cm_addentry0"></div>