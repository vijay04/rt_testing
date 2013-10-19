<?php $total_amount = 0; ?>
<div>
	<form class="form-inline" method="get" action="<?php print $formAction; ?>">
		<input type="text" name="startDate" value="<?php print $startDate; ?>" class="datepicker" autocomplete="off"/>
		<input type="text" name="endDate" value="<?php print $endDate; ?>" class="datepicker" autocomplete="off"/>
		<input type="submit" value="Search" class="btn" />
	</form>
</div>

<div class="expense-list-wrapper">
	<div class="expense-item">
		<table class="table table-bordered table-hover table-striped">
			<thead>
				<tr>
					<th>Title</th>
					<th>Date</th>
					<th>Description</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach($content as $key => $value) : ?>
				<tr>
					<td><?php print anchor('node/view/' . $value['nid'], $value['title']); ?></td>
					<td><?php print date('d-m-Y', $value['created']); ?></td>
					<td><?php print $value['description']; ?></td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
		</body>
	</div>
</div>
