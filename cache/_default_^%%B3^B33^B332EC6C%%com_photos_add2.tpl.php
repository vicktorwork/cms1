<?php /* Smarty version 2.6.28, created on 2015-02-23 15:13:50
         compiled from com_photos_add2.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'add_js', 'com_photos_add2.tpl', 6, false),array('function', 'add_css', 'com_photos_add2.tpl', 10, false),)), $this); ?>
<h3 style="border-bottom: solid 1px gray">
	<strong><?php echo $this->_tpl_vars['LANG']['STEP_2']; ?>
</strong>: <?php echo $this->_tpl_vars['LANG']['FILE_UPLOAD']; ?>

</h3>
<?php if (! $this->_tpl_vars['stop_photo']): ?>
<?php if ($this->_tpl_vars['uload_type'] == 'multi'): ?>
<?php echo cmsSmartyAddJS(array('file' => 'includes/swfupload/swfupload.js'), $this);?>

<?php echo cmsSmartyAddJS(array('file' => 'includes/swfupload/swfupload.queue.js'), $this);?>

<?php echo cmsSmartyAddJS(array('file' => 'includes/swfupload/fileprogress.js'), $this);?>

<?php echo cmsSmartyAddJS(array('file' => 'includes/swfupload/handlers.js'), $this);?>

<?php echo cmsSmartyAddCSS(array('file' => 'includes/swfupload/swfupload.css'), $this);?>


<script type="text/javascript">
    <?php echo '
    var swfu;
    var uploadedCount = 0;

    window.onload = function() {
        var settings = {
            flash_url: "/includes/swfupload/swfupload.swf",
            upload_url: "'; ?>
<?php echo $this->_tpl_vars['upload_url']; ?>
<?php echo '",
            post_params: {"sess_id" :'; ?>
 "<?php echo $this->_tpl_vars['sess_id']; ?>
", "album_id" : <?php echo $this->_tpl_vars['album']['id']; ?>
<?php echo '},
            file_size_limit: "20 MB",
            file_types: "*.jpg;*.png;*.gif;*.jpeg;*.JPG;*.PNG;*.GIF;*.JPEG",
            file_types_description: "'; ?>
<?php echo $this->_tpl_vars['LANG']['PHOTO']; ?>
<?php echo '",
    '; ?>

            file_upload_limit : <?php if ($this->_tpl_vars['max_limit']): ?><?php echo $this->_tpl_vars['max_files']; ?>
<?php else: ?>100<?php endif; ?>,
    <?php echo '
            file_queue_limit : 0,
            custom_settings : {
                progressTarget : "fsUploadProgress",
                cancelButtonId : "btnCancel"
            },
            debug: false,

            // Button settings
            button_image_url: "/includes/swfupload/uploadbtn199x36.png",
            button_width: "199",
            button_height: "36",
            button_placeholder_id: "spanButtonPlaceHolder",

            // The event handler functions are defined in handlers.js
            file_queued_handler : fileQueued,
            file_queue_error_handler : fileQueueError,
            file_dialog_complete_handler : fileDialogComplete,
            upload_start_handler : uploadStart,
            upload_progress_handler : uploadProgress,
            upload_error_handler : uploadError,
            upload_success_handler : uploadSuccess,
            upload_complete_handler : uploadComplete,
            queue_complete_handler : queueComplete	// Queue plugin event
        };

        swfu = new SWFUpload(settings);
    };

    function queueComplete(numFilesUploaded) {
        if (numFilesUploaded>0){
            window.location.href = '; ?>
'<?php echo $this->_tpl_vars['upload_complete_url']; ?>
'<?php echo ';
        }
    }

    '; ?>

</script>

<form id="usr_photos_upload_form" action="" method="post" enctype="multipart/form-data">

    <?php if ($this->_tpl_vars['max_limit']): ?>
    <p class="usr_photos_add_limit"><?php echo $this->_tpl_vars['LANG']['YOU_CAN_UPLOAD']; ?>
 <strong><?php echo $this->_tpl_vars['max_files']; ?>
</strong> <?php echo $this->_tpl_vars['LANG']['PHOTO']; ?>
</p>
    <?php endif; ?>
        <div class="fieldset flash" id="fsUploadProgress" style="display:none">
            <span class="legend"><?php echo $this->_tpl_vars['LANG']['UPLOAD_QUEUE']; ?>
</span>
        </div>
        <div>
            <span id="spanButtonPlaceHolder"></span>
            <input id="btnCancel" type="button" value="<?php echo $this->_tpl_vars['LANG']['CANCEL']; ?>
" onclick="swfu.cancelQueue();" disabled="disabled" style="margin-left: 2px; font-size: 8pt; height: 36px;" />
        </div>

</form>

<?php elseif ($this->_tpl_vars['uload_type'] == 'single'): ?>
        <?php if ($this->_tpl_vars['max_limit']): ?>
         <p class="usr_photos_add_limit"><?php echo $this->_tpl_vars['LANG']['YOU_CAN_UPLOAD']; ?>
 <strong><?php echo $this->_tpl_vars['max_files']; ?>
</strong> <?php echo $this->_tpl_vars['LANG']['PHOTO']; ?>
</p>
        <?php endif; ?>

        <form enctype="multipart/form-data" action="<?php echo $this->_tpl_vars['upload_url']; ?>
" method="POST">

            <p><?php echo $this->_tpl_vars['LANG']['SELECT_FILE_TO_UPLOAD']; ?>
: </p>
                    <input name="Filedata" type="file" id="picture" size="30" />
                    <input name="upload" type="hidden" value="1"/>
                    <input name="album_id" type="hidden" value="<?php echo $this->_tpl_vars['album']['id']; ?>
"/>
                    <input name="sess_id" type="hidden" value="<?php echo $this->_tpl_vars['sess_id']; ?>
"/>

            <div style="margin:5px 0">
                <strong><?php echo $this->_tpl_vars['LANG']['ALLOW_FILE_TYPE']; ?>
:</strong> gif, jpg, jpeg, png
            </div>

            <p>
                <input type="submit" value="<?php echo $this->_tpl_vars['LANG']['LOAD']; ?>
">
                <input type="button" onclick="window.history.go(-1);" value="<?php echo $this->_tpl_vars['LANG']['CANCEL']; ?>
"/>
            </p>
        </form>
<?php endif; ?>
<?php else: ?>
<p class="usr_photos_add_limit"><?php echo $this->_tpl_vars['LANG']['MAX_UPLOAD_IN_DAY']; ?>
</p>
<?php endif; ?>