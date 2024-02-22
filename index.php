<?php
$data = json_decode(file_get_contents('php://input'), true);
if(isset($data)) {
	if($data['shf-section'] == 'lang') {
		$dirPath	= __DIR__ . '/shf/lang/';
		$files		= scandir($dirPath);
		foreach ($files as $file) {
			$filePath = $dirPath . '/' . $file;
			if (is_file($filePath)) { echo $file . ','; }
		}
		die();
	}
}

$domains = file_get_contents('./shf/shf_access.txt');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
 		<meta name="viewport" content="width=device-width, initial-scale=1.0">
 		<title>Access Validate Sections</title>
 		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
 		<link rel="stylesheet" href="./assets/style.css">
	</head>
	<body class="pt-5 pb-5">
 		<div class="container">
 			<form style="width: 500px;" method="POST" action="./generate_token.php">
 				<div class="input-group mb-3">
 					<input type="text" name="shf-domain" class="form-control" id="shf_domain">
 					<input type="submit" class="btn btn-outline-secondary" value="Add">
 				</div>
 			</form>
			<table class="table">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">User</th>
						<th scope="col">Token</th>
						<td scope="col" class="text-end">Action</td>
					</tr>
				</thead>
				<tbody>
					<?php $object = explode("\n", $domains); ?>
					<?php foreach($object as $data): ?>
						<?php $item = explode(":", $data); ?>
						<?php if(isset($item[0]) && $item[0] != ''): ?>
							<tr>
								<th scope="row">#</th>
								<td><?= $item[0]; ?></td>
								<td>
									<div class="input-group input-group-sm shf-token">
										<input type="text" class="form-control shf-input" value="<?= $item[1]; ?>">
										<button class="input-group-text shf-btn">Copy</button>
									</div>
								</td>
								<td class="text-end"><a href="./generate_token.php?shf-remove=<?= $item[1]; ?>" class="btn btn-sm btn-danger">Remove</a></td>
							</tr>
						<?php endif; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<script src="./assets/script.js"></script>
 	</body>
</html>