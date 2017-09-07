{strip}
<table border="1" cellpadding="1" cellspacing="1" style="border-collapse:collapse; width:100%">
	<tbody>
		<tr>
			<td style="border-color:rgb(102, 102, 102); height:20px; text-align:center"><span style="font-size:12px"><span style="font-family:arial,helvetica,sans-serif"><span style="color:rgb(105, 105, 105)">WERKBON</span></span></span></td>
		</tr>
	</tbody>
</table>
<table border="0" cellpadding="5" cellspacing="1" style="border-collapse:collapse; margin-top:5px; width:100%">
	<tbody>
		<tr>
			<td style="border-color:rgb(102, 102, 102); vertical-align:top; width:20%">
				<img alt="" src="storage/images/Logo_CBX_zwart_wit.png" style="height:80px; width:80px" />
				<p><span style="font-size:9px"><span style="font-family:arial,helvetica,sans-serif"><strong>{$COMPANY.organizationname}</strong><br />
					{$COMPANY.address}<br />
					{$COMPANY.code} {$COMPANY.city}<br />
					{$COMPANY.phone}<br />
					{$COMPANY.website}</span></span></p>
			</td>
			<td align="right" style="border-color:rgb(102, 102, 102); vertical-align:top; width:80%">
			<table border="1" cellpadding="5" cellspacing="1" style="border-collapse:collapse; margin-right:-5px;">
				<tbody>
					<tr>
						<td colspan="4" style="background-color:rgb(204, 204, 204); height:20px; text-align:center"><span style="font-size:12px"><span style="font-family:arial,helvetica,sans-serif">KLANTGEGEVENS</span></span></td>
					</tr>
					<tr>
						<td style="border-color:rgb(102, 102, 102); width:25%"><span style="font-size:10px"><span style="font-family:arial,helvetica,sans-serif">Bedrijfsnaam</span></span></td>
						<td style="border-color:rgb(102, 102, 102); width:25%"><strong><span style="font-size:11px"><span style="font-family:arial,helvetica,sans-serif">{$SO.accountname}</span></span></strong></td>
						<td style="border-color:rgb(102, 102, 102); width:25%"><span style="font-size:10px"><span style="font-family:arial,helvetica,sans-serif">Telefoon nummer</span></span></td>
						<td style="border-color:rgb(102, 102, 102); width:25%"><strong><span style="font-size:11px"><span style="font-family:arial,helvetica,sans-serif">{$SO.phone}</span></span></strong></td>
					</tr>
					<tr>
						<td style="border-color:rgb(102, 102, 102); width:25%"><span style="font-size:10px"><span style="font-family:arial,helvetica,sans-serif">Bezoekadres</span></span></td>
						<td style="border-color:rgb(102, 102, 102); width:25%"><span style="font-size:11px"><strong><span style="font-family:arial,helvetica,sans-serif">{$SO.ship_street}</span></strong></span></td>
						<td style="border-color:rgb(102, 102, 102); width:25%"><span style="font-size:10px"><span style="font-family:arial,helvetica,sans-serif"></span></span></td>
						<td style="border-color:rgb(102, 102, 102); width:25%"><strong><span style="font-size:11px"><span style="font-family:arial,helvetica,sans-serif"></span></span></strong></td>
					</tr>
					<tr>
						<td style="border-color:rgb(102, 102, 102); width:25%"><span style="font-size:10px"><span style="font-family:arial,helvetica,sans-serif">Postcode / Plaats</span></span></td>
						<td style="border-color:rgb(102, 102, 102); width:25%"><strong><span style="font-size:11px"><span style="font-family:arial,helvetica,sans-serif">{$SO.ship_code} {$SO.ship_city}</span></span></strong></td>
						<td style="border-color:rgb(102, 102, 102); width:25%"><span style="font-size:10px"><span style="font-family:arial,helvetica,sans-serif">Nummer verkooporder</span></span></td>
						<td style="border-color:rgb(102, 102, 102); width:25%"><strong><span style="font-size:10px"><span style="font-family:arial,helvetica,sans-serif"></span>{$SO.salesorder_no}</span></strong></td>
					</tr>
				</tbody>
			</table>
			</td>
		</tr>
	</tbody>
</table>

<table border="1" cellpadding="5" cellspacing="1" style="border-collapse:collapse; margin-top:7px; width:100%">
	<tbody>
		<tr>
			<td style="background-color:rgb(204, 204, 204); width:10%"><strong><span style="font-size:10px"><span style="font-family:arial,helvetica,sans-serif">Aantal</span></span></strong></td>
			<td style="background-color:rgb(204, 204, 204); width:90%"><strong><span style="font-size:10px"><span style="font-family:arial,helvetica,sans-serif">Omschrijving</span></span></strong></td>
		</tr>
		{foreach from=$LINES item=line}
		{if $line.desc != ''}
		<tr>
			<td><span style="font-size:10px"><span style="font-family:arial,helvetica,sans-serif">{$line.qty}</span></span></td>
			<td><span style="font-size:10px"><span style="font-family:arial,helvetica,sans-serif">{$line.desc}</span></span></td>
		</tr>
		{/if}
		{/foreach}
	</tbody>
</table>

<table border="1" cellpadding="5" cellspacing="1" style="border-collapse:collapse; margin-top:10px; width:100%">
	<tbody>
		<tr>
			<td style="background-color:rgb(204, 204, 204); height:20px"><strong><span style="font-size:10px"><span style="font-family:arial,helvetica,sans-serif">Starttijd</span></span></strong></td>
			<td style="background-color:rgb(204, 204, 204)"><strong><span style="font-size:10px"><span style="font-family:arial,helvetica,sans-serif">Eindtijd</span></span></strong></td>
		</tr>
		<tr>
			<td><span style="font-size:10px">{$TIMES.start}</span></td>
			<td><span style="font-size:10px">{$TIMES.end}</span></td>
		</tr>
	</tbody>
</table>

<table border="1" cellpadding="5" cellspacing="1" style="border-collapse:collapse; margin-top:10px; width:100%">
	<tbody>
		<tr>
			<td colspan="2" style="background-color:rgb(204, 204, 204); height:20px"><strong><span style="font-size:10px"><span style="font-family:arial,helvetica,sans-serif">In te vullen door de monteur (CBX)</span></span></strong></td>
			<td colspan="2" style="background-color:rgb(204, 204, 204)"><strong><span style="font-size:10px"><span style="font-family:arial,helvetica,sans-serif">In te vullen door de klant</span></span></strong></td>
		</tr>
		<tr>
			<td style="height:40px; width:15%"><span style="font-size:10px"><span style="font-family:arial,helvetica,sans-serif">Naam</span></span></td>
			<td style="width:35%">{$USER.first_name}&nbsp;{$USER.last_name}</td>
			<td style="width:15%"><span style="font-size:10px"><span style="font-family:arial,helvetica,sans-serif">Naam</span></span></td>
			<td style="width:35%">{$AUTOGRAPH_NAME}</td>
		</tr>
		<tr>
			<td style="height:75px; width:15%"><span style="font-size:10px"><span style="font-family:arial,helvetica,sans-serif">Datum</span></span></td>
			<td style="width:35%">{$smarty.now|date_format:'%d-%m-%Y'}</td>
			<td style="width:15%"><span style="font-size:10px"><span style="font-family:arial,helvetica,sans-serif">Handtekening voor akkoord</span></span></td>
			<td style="width:35%"><img src="{$AUTOGRAPH_SRC}" width="240" height="200" /></td>
		</tr>
	</tbody>
</table>
{/strip}