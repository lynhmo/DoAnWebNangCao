<?php
// session_start(); 
include "./header.php";
include "./permission.php";
$id = -1;
if (isset($_GET["id"])) {
	$id = intval($_GET['id']);
}
// $id = $_GETp['id'];

$sql = "select * from posts where posts_id = '$id'";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($query);
?>

<body>
	<div class="posts">
		<form action="" method="POST">
			<table class="table table-bordered table-striped">
				<tr>
					<td nowrap="nowrap">Tiêu đề bài viết :</td>
					<td><input type="text" id="title" name="title" value="<?php echo $data['title'] ?>">
					</td>
				</tr>
				<tr>
					<td nowrap="nowrap">Nội dung :</td>
					<td><textarea name="post_content" id="post_content" rows="10" cols="150"><?php echo $data['content'] ?></textarea></td>
				</tr>
				<tr>
					<td nowrap="nowrap">Public bài viết ?</td>
					<td><input type="checkbox" id="is_public" name="is_public" value="<?php echo $data['is_public'] ?>"> Public</td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" name="btn_update" value="Hoàn tất"></td>
				</tr>
			</table>
			<?php require_once 'updateposts.php'; ?>
		</form>
	</div>
</body>
<script>
	// Replace the <textarea id="editor1"> with a CKEditor
	// instance, using default configuration.
	CKEDITOR.replace('post_content');
</script>
<?php include "./footer.php" ?>