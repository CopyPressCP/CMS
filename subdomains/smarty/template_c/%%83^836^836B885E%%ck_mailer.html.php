<?php /* Smarty version 2.6.11, created on 2012-03-14 14:58:29
         compiled from mail/ck_mailer.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'mail/ck_mailer.html', 94, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "themes/".($this->_tpl_vars['theme'])."/header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script language="javascript" src="/js/OptionTransfer.js"></script>
<script type="text/javascript" src="/js/multifile.js"></script>
<script language="javascript">
var opt = new OptionTransfer("list1","list2");
opt.setAutoSort(true);
opt.setDelimiter(";");
opt.saveNewLeftOptions("newLeft");
opt.saveNewRightOptions("newRight");
<?php echo '
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "charcount,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",
		// Theme options
		theme_advanced_buttons1 : "charcount,spellchecker,save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true
	});
'; ?>

</script>

<?php if ($this->_tpl_vars['feedback'] != ''): ?>
<script language="JavaScript">
<!--
alert('<?php echo $this->_tpl_vars['feedback']; ?>
');
//-->
</script>
<?php endif; ?>

<?php echo '
<script language="JavaScript">
<!--
var f_common = "document.f_ck_mailer.";
function check_f_ck_mailer() {
   var f = document.f_ck_mailer;

  if (f.newRight.value.length == 0) {
    alert(\'Who will you want to send?\');
	//f.list2.focus();
    return false;
  }
  if (f.subject.value.length == 0) {
    alert(\'Please provide mail subject\');
	f.subject.focus();
    return false;
  }
  /*
  if (f.mailbody.value.length == 0) {
    alert(\'Please provide mail body\');
	f.mailbody.focus();
    return false;
  }
  */

  return true;
}

'; ?>

//-->
</script>


<br>
<div id="show_result_status" ></div>
<div id="page-box1">
  <h2>company mailer</h2>
  <div id="campaign-search" >
    <strong>this feature will enable admin, pm , editor to send email to specifc group of user easily</strong>
  </div>
<form name="f_ck_mailer" id="f_ck_mailer" action="#" method="post" <?php if ($this->_tpl_vars['js_check'] == true): ?> onsubmit="return check_f_ck_mailer()"<?php endif; ?>>
<div class="form-item" >
<table border="0" cellspacing="1" cellpadding="4" align="center" >
<tr  ><td colspan="3">
<input name="ccm" type="radio" value="all_user" <?php if ($_GET['ccm'] == 'all_user'): ?>checked<?php endif; ?> onclick="window.location='ck_mailer.php?ccm=all_user'">
ALL User
<input name="ccm" type="radio" value="all_e" <?php if ($_GET['ccm'] == 'all_e'): ?>checked<?php endif; ?> onclick="window.location='ck_mailer.php?ccm=all_e'"> 
ALL Editor 
<input name="ccm" type="radio" value="all_ewaa" <?php if ($_GET['ccm'] == 'all_ewaa'): ?>checked<?php endif; ?> onclick="window.location='ck_mailer.php?ccm=all_ewaa'"> 
ALL Editor with active assigment
<input name="ccm" type="radio" value="all_cp" <?php if ($_GET['ccm'] == 'all_cp'): ?>checked<?php endif; ?> onclick="window.location='ck_mailer.php?ccm=all_cp'"> 
ALL CP 
<input name="ccm" type="radio" value="all_waa" <?php if ($_GET['ccm'] == 'all_waa'): ?>checked<?php endif; ?> onclick="window.location='ck_mailer.php?ccm=all_waa'"> 
<a href="#">ALL CP with active assigment </a></td></tr>
<tr>
	<td>
	<select  id="slt_list1" style="width: 200px;" name="list1" multiple size="10" onDblClick="opt.transferRight()">
    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['all_list'],'selected' => $this->_tpl_vars['list1']), $this);?>

	</select>
	</td>
	<td valign=middle align=center>
		<input type="button" name="right" value="   &gt;&gt;  " onclick="opt.transferRight()"><br><br>
		<input type="button" name="right" value="All &gt;&gt;" onclick="opt.transferAllRight()"><br><br>
		<input type="button" name="left" value="   &lt;&lt;   " onclick="opt.transferLeft()"><br><br>
		<input type="button" name="left" value="All &lt;&lt;" onclick="opt.transferAllLeft()">
	</td>
	<td>
	<select id="slt_list2" name="list2" style="width:200px;"  size="10" multiple ondblclick="opt.transferLeft()">
	</select>
    <input type="hidden" name="movepattern1" value="">
    <input type="hidden" name="newRight" value="" size="70" />
    <input type="hidden" name="newLeft" value="" size="70" />
	</td>
</tr>
<tr>
  <td colspan="3">Tempate Name:<select name="email_event" onchange="changeTemplate('/mail/tempate_change.php', this.value);return false;" ><option value="">[choose]</option><?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['email_event'],'selected' => $this->_tpl_vars['template_info']['event_id']), $this);?>
</select></td>
</tr>
<tr><td colspan="3">CC:<select name="cc_email"><option value="">[choose]</option><?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['all_system'],'selected' => $_POST['cc_email']), $this);?>
</select></td></tr>
<tr><td colspan="3">From:<select name="from_email"><option value="">[choose]</option><?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['all_editor'],'selected' => $_POST['from_email']), $this);?>
</select></td></tr>
<tr><td colspan="3">Subject:<input name="subject" id="subject" type="text" size="30"></td></tr>
<tr><td colspan="3"><textarea name="mailbody" id="mailbody" cols="60" rows="20"></textarea></td></tr>
<tr><td colspan="3"><div id="files_list" ></div></td></tr>
</table>
</form>
<iframe id="upload_target" name="upload_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
<form action="/mail/upload.php" method="post" enctype="multipart/form-data" target="upload_target" id="uploadform"  name="uploadform" >
<table border="0" cellspacing="1" cellpadding="4" align="center" width="65%"  >
<tr><td>
<p id="f1_upload_process" align="left">Loading...<br /><img src="/image/loader.gif" /><br/></p>
<p id="f1_upload_form" align="left"><br />
  <label>Attach file:  
      <input name="myfile" type="file" size="30" id="my_file_element" /><strong>[Max: <?php echo $this->_tpl_vars['maxsize']; ?>
]</strong>
  </label>
</p>
</td></tr>
</table>
</form>
<br />
<table border="0" cellspacing="1" cellpadding="4" align="center" width="65%">
<tr><td><input type="button" class="button" value="Send Mail" onclick="$('f_ck_mailer').submit()" />&nbsp;&nbsp;<input type="reset" class="button" value="Reset" /></td></tr>
</table>
<form action="/mail/removefile.php" method="post" target="upload_target" id="removeform"  name="removeform">
<input type="hidden" name="filename" id="filename" value="" />
</form>
</div>
</div>
<script language="javascript">
var multi_selector = new MultiSelector( $( 'files_list' ), $('uploadform'), $('f1_upload_form'),  $('f1_upload_process'), $('removeform'), 10);
multi_selector.addElement($( 'my_file_element' ) );
<?php echo '
stopUpload = function(success, filename, prefix){
      var result = \'\';
      multi_selector.stopUpload(success, filename, prefix);
      return true;   
}
'; ?>

moveSelectedOptions(document.getElementById('slt_list1'), document.getElementById('slt_list2'));
</script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "themes/".($this->_tpl_vars['theme'])."/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>