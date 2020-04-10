
$('#register-form').submit(function(e) {
	e.preventDefault();
	let target_id = $(this).attr('id');

	let input_login = $(`.${target_id} input[name="login"]`).val();
	let input_password = $(`.${target_id} input[name="password"]`).val();
	let input_email = $(`.${target_id} input[name="email"]`).val();
	console.log(target_id);
	let pattern_email = /.+@.+\.(ru|com)/;

	if (pattern_email.test(input_email)) {
		console.log('OKay');
	} else {
		console.log('Error');
		return false;
	}

	async function connect_server() {
		let response = await fetch('Register.php', {
			method: 'POST',
			body: new FormData(e.target)
		});
		let data = await response.json();
		console.log(data);
		$('body .alert').remove();
		$('body').append(`
			<div class="alert alert-success" role="alert">
			  ${data.message}
			</div>
		`);
		if (data.status == 200) location.reload();
	}
	connect_server().catch(error => console.log(error));
});

$('#auth-form').submit(function(e) {
	e.preventDefault();
	async function connect_server() {
		let response = await fetch('Authorization.php', {
			method: 'POST',
			body: new FormData(e.target)
		});
		let data = await response.json();
		$('body .alert').remove();
		$('body').append(`
			<div class="alert alert-success" role="alert">
			  ${data.message}
			</div>
		`);
		if (data.status == 200) location.reload();
	}
	connect_server().catch(error => console.log(error));
});

$('#logout').on('click', function() {
	async function logout() {
		let response = await fetch('Logout.php', {
			method: 'POST'
		});
		let data = await response.text();
		console.log(data);
		location.reload();
	}
	logout().catch(error => console.log(error));
});

$('#create-article').submit(function(e) {
	e.preventDefault();
	async function create_article() {
		let response = await fetch('CreateArticle.php', {
			method: 'POST',
			body: new FormData(e.target)
		});
		let data = await response.json();
		console.log(data);
	}
	create_article();
});

$('button#article-up').on('click', function(e) {
	e.preventDefault();
	let article_id = $(this).attr('data-article');
	console.log(article_id);
	async function up_article() {
		let response = await fetch('UpArticle.php', {
			method: 'POST',
			body: article_id
		});
		let data = await response.json();
		console.log(data);
	}
	up_article();
});
