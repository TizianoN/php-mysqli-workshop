<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Create Post</title>
	<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'
		integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
</head>

<body>

	<div class="p-5 bg-light mb-5">
		<div class="container">
			<h1 class="display-3">Create a new Post</h1>
		</div>
	</div>
	<div class="container">
		<form action="/create-post" method="POST">
			<div class="mb-3">
				<label for="title" class="form-label">title</label>
				<input type="text" class="form-control" name="title" id="title" aria-describedby="titleHelper"
					placeholder="learn html" required>
				<small id="titleHelper" class="form-text text-muted">Add a post Title</small>
			</div>
			<div class="mb-3">
				<label for="content" class="form-label">content</label>
				<textarea class="form-control" name="content" id="content" aria-describedby="contentHelper"
					placeholder="learn html" required></textarea>
				<small id="contentHelper" class="form-text text-muted">Add a post content</small>
			</div>
			<div class="mb-3">
				<label for="image" class="form-label">image</label>
				<input type="text" class="form-control" name="image" id="image" aria-describedby="imageHelper"
					placeholder="https://" required>
				<small id="imageHelper" class="form-text text-muted">Add a post image</small>
			</div>

			<button type="submit" class="btn btn-primary">Add Post</button>
		</form>
	</div>


</body>

</html>