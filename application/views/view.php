<?php
$sql = 'SELECT * FROM products ';

//Facade
$sort_by = isset($_GET['s']) ? $_GET['s'] : false;


switch ($sort_by) {
	case 'product_name' :
	case 'product_code' :
	case 'product_price' :
		break;
	default :
		$sort_by = 'product_name';
}

$sql .= ' ORDER BY ' . $sort_by . ' ';

$direction = isset($_GET['d']) ? $_GET['d'] : false;
if ($direction != 'ASC' && $direction != 'DESC')
	$direction = 'DESC';
$sql .= $direction;

$res = mysql_query($sql);
$results = array();
if ($res) {
	while ($r = mysql_fetch_assoc($res)) {
		$results[] = $r;
	}
}

$reverse_direction = ($direction == 'DESC' ? 'ASC' : 'DESC');
?>

<table>
	<thead>
		<th scope="col" class="<?php echo $sort_by == 'product_id' ? 'sortColumn' : ''; ?>"><a href="view?s=id&d=<?php echo $reverse_direction; ?>">Name</a><?php echo $sort_by == 'product_name' ? "" : ''; ?>
		<th scope="col" class="<?php echo $sort_by == 'product_code' ? 'sortColumn' : ''; ?>"><a href="view?s=product_code&d=<?php echo $reverse_direction; ?>">Manufacturer</a><?php echo $sort_by == 'product_code' ? "": '' ; ?>
		<th scope="col" class="<?php echo $sort_by == 'product_price' ? 'sortColumn' : ''; ?>"><a href="view?s=total&d=<?php echo $reverse_direction; ?>">Price</a><?php echo $sort_by == 'product_price' ? "" : ''; ?>
	</thead>
	<tbody>
		<?php
		if (count($results) > 0) {
			foreach ($results as $r) {
				print '<tr>';
				print '<th scope="row">'. $r['product_name'] . '</th>';
				print '<td>' . $r['product_code'] . '</td>';
				print '<td>' . $r['product_price'] . '</td>';
				print '</tr>';
			}
		} else {
			
		}
		?>
	</tbody>
</table>