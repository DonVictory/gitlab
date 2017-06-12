<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<form  class="form-inline" action="web/doAction2.php" method="post" enctype="multipart/form-data" role="form">
	<div class="form-group">
		<label class="sr-only" for="name">名称</label>
		<input type="text" class="form-control" id="name" 
			   placeholder="请输入名称">
	</div>
	<div class="form-group">
		<label class="sr-only" for="inputfile">文件输入</label>
		<input type="file" id="inputfile" name="myFile[]">
	</div>
	<div class="form-group">
		<label class="sr-only" for="inputfile">文件输入</label>
		<input type="file" id="inputfile" name="myFile[]">
	</div>
	<div class="form-group">
		<label class="sr-only" for="inputfile">文件输入</label>
		<input type="file" id="inputfile" name="myFile[]">
	</div>
	<div class="form-group">
		<label class="sr-only" for="inputfile">文件输入</label>
		<input type="file" id="inputfile" name="myFile[]">
	</div>
	<div class="checkbox">
		<label>
			<input type="checkbox"> 请打勾
		</label>
	</div>
	<button type="submit" class="btn btn-default">提交</button>
</form>

</body>
</html>