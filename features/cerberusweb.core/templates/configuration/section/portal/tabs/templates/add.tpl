<div id="divPortalAddTemplate">
	{if !empty($templates)}
		<form action="{devblocks_url}{/devblocks_url}" method="POST" id="frmPortalAddTemplatePeek" onsubmit="return false;">
		<input type="hidden" name="c" value="config">
		<input type="hidden" name="a" value="handleSectionAction">
		<input type="hidden" name="section" value="portal">
		<input type="hidden" name="action" value="saveAddTemplatePeek">
		<input type="hidden" name="view_id" value="{$view_id}">
		<input type="hidden" name="portal" value="{$portal}">
		<input type="hidden" name="_csrf_token" value="{$session.csrf_token}">
		
		<b>Template:</b><br>
		<select name="template">
			{foreach from=$templates item=template}
			<option value="{$template->plugin_id}:{$template->path}">[{$template->plugin_id}]{*({$template->set})*} {$template->path}</option>
			{/foreach}
		</select><br>
		<br>
		
		{if $active_worker->is_superuser}
			<button type="button" class="submit"><span class="glyphicons glyphicons-circle-ok" style="color:rgb(0,180,0);"></span> {'common.save_changes'|devblocks_translate}</button>
		{else}
			<div class="error">{'error.core.no_acl.edit'|devblocks_translate}</div>	
		{/if}
		<br>
		</form>
	{else}
		You've customized all the available templates.<br>
		<br>
	{/if}
</div>

<script type="text/javascript">
$(function() {
	var $popup = genericAjaxPopupFind('#divPortalAddTemplate');
	
	$popup.one('popup_open', function(event,ui) {
		$popup.dialog('option','title',"Add Custom Template");
		
		$popup.find('button.submit').click(function() {
			genericAjaxPost('frmPortalAddTemplatePeek', 'divPortalAddTemplate', '', function() {
				$popup.trigger('popup_open');
			});
		});
	});
});
</script>