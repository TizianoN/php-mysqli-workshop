<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Blog</title>
	<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'
		integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
</head>

<body>
	<header>
		<nav class="nav justify-content-center">
			<a class="nav-link active" href="/">Posts</a>
			<a class="nav-link" href="/create-post">Add Post</a>
		</nav>
	</header>

	<main>
		<div class="p-5 bg-light mb-5">
			<div class="container">
				<h1 class="display-3"><?= $single_post->title ?></h1>
				<p class="lead"><?= $single_post->content ?></p>

			</div>
		</div>
		<div class="container">
			<div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
				<img src="<?= $single_post->image ?>" />
			</div>
		</div>
	</main>
</body>

</html>