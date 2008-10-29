<div class="block">

<b>{$translate->_('reports.ui.worker.response_time.date_range')}</b>
{if $invalidDate}<font color="red"><b>{$translate->_('reports.ui.invalid_date')}</b></font>{/if}

<form action="{devblocks_url}{/devblocks_url}" method="POST" id="frmRange" name="frmRange" onsubmit="return false;">
<input type="hidden" name="c" value="reports">
<input type="hidden" name="a" value="action">
<input type="hidden" name="extid" value="report.workers.averageresponsetime">
<input type="hidden" name="extid_a" value="getAverageResponseTimeReport">
<input type="text" name="start" id="start" size="10" value="{$start}"><button type="button" onclick="ajax.getDateChooser('divCal',this.form.start);">&nbsp;<img src="{devblocks_url}c=resource&p=cerberusweb.core&f=images/calendar.gif{/devblocks_url}" align="top">&nbsp;</button>
<input type="text" name="end" id="end" size="10" value="{$end}"><button type="button" onclick="ajax.getDateChooser('divCal',this.form.end);">&nbsp;<img src="{devblocks_url}c=resource&p=cerberusweb.core&f=images/calendar.gif{/devblocks_url}" align="top">&nbsp;</button>
<button type="button" id="btnSubmit" onclick="genericAjaxPost('frmRange', 'reportAverageResponseTime')">{$translate->_('common.refresh')|capitalize}</button>
<div id="divCal" style="display:none;position:absolute;z-index:1;"></div>
</form>

<a href="javascript:;" onclick="document.getElementById('start').value='-1 year';document.getElementById('end').value='now';document.getElementById('btnSubmit').click();">1 {$translate->_('common.year')|lower}</a>
| <a href="javascript:;" onclick="document.getElementById('start').value='-6 months';document.getElementById('end').value='now';document.getElementById('btnSubmit').click();">6 {$translate->_('common.months')|lower}</a>
| <a href="javascript:;" onclick="document.getElementById('start').value='-3 months';document.getElementById('end').value='now';document.getElementById('btnSubmit').click();">3 {$translate->_('common.months')|lower}</a>
| <a href="javascript:;" onclick="document.getElementById('start').value='-1 month';document.getElementById('end').value='now';document.getElementById('btnSubmit').click();">1 {$translate->_('common.month')|lower}</a>
| <a href="javascript:;" onclick="document.getElementById('start').value='-1 week';document.getElementById('end').value='now';document.getElementById('btnSubmit').click();">1 {$translate->_('common.week')|lower}</a>
| <a href="javascript:;" onclick="document.getElementById('start').value='-1 day';document.getElementById('end').value='now';document.getElementById('btnSubmit').click();">1 {$translate->_('common.day')|lower}</a>
<br>

<br>
<h3>{$translate->_('reports.ui.worker.response_time.worker_responses')}</h3>
<table cellspacing="0" cellpadding="2" border="0">
	{foreach from=$worker_responses item=responses key=worker_id}
		{if $responses.replies != 0}{math assign=response_time equation="x/y/60" x=$responses.time y=$responses.replies format="%0.1f"}
		{else}{assign var=response_time value=0}{/if}
		<tr>
			<td style="padding-right:20px;">
				<b>{$workers.$worker_id->first_name}&nbsp;{$workers.$worker_id->last_name}</b>&nbsp;&nbsp;({$workers.$worker_id->email})</b>
			</td>
			{if $response_time==0}<td valign="top"></td>
			{elseif $response_time>1440}<td valign="top">{math equation="x/1440" x=$response_time format="%0.1f"} {$translate->_('common.days')|lower}</td>
			{elseif $response_time>60}<td valign="top">{math equation="x/60" x=$response_time format="%0.1f"} {$translate->_('common.hours')|lower}</td>
			{else}<td valign="top">{math equation="x/60" x=$response_time format="%0.1f"} {$translate->_('common.minutes')|lower}</td>{/if}
			<td valign="top">({$responses.replies} replies)</td>
		</tr>
	{/foreach}
</table>

<br>
<h3>{$translate->_('reports.ui.worker.response_time.group_responses')}</h3>
<table cellspacing="0" cellpadding="2" border="0">
	{foreach from=$group_responses item=responses key=group_id}
		{if $responses.replies != 0}{math assign=response_time equation="x/y/60" x=$responses.time y=$responses.replies format="%0.1f"}
		{else}{assign var=response_time value=0}{/if}
		<tr>
			<td style="padding-right:20px;">
				<b>{$groups.$group_id->name}</b> &nbsp;
			</td>
			{if $response_time==0}<td valign="top"> &nbsp; </td>
			{elseif $response_time>1440}<td valign="top">{math equation="x/1440" x=$response_time format="%0.1f"} {$translate->_('common.days')|lower} &nbsp; </td>
			{elseif $response_time>60}<td valign="top">{math equation="x/60" x=$response_time format="%0.1f"} {$translate->_('common.hours')|lower} &nbsp; </td>
			{else}<td valign="top">{math equation="x/60" x=$response_time format="%0.1f"} {$translate->_('common.minutes')|lower} &nbsp; </td>{/if}
			<td valign="top">({$responses.replies} replies)</td>
		</tr>
	{/foreach}
</table>

</div>


