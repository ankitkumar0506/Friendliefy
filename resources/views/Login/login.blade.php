
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>form login page </title>
	<link rel="stylesheet" href="{{ asset('Login_Assets/formlogin.css ')}}">
	<link rel="stylesheet" href="{{ asset('Login_Assets/formmediya.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
		integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
		integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
	<div class="container" id="container">
		<div class="form-container sign-up-container">
			<form action="/register" method="POST">
                @csrf
				<h1>Create Account</h1>
				{{-- <input type="text" name="text" id="text" placeholder="Fullname" required> --}}
				<input type="text" name="username" id="username" placeholder="Username" required>
				<input type="email" name="email" id="email" placeholder="Email" required>
				<input type="tel" name="mobile" id="mobile" placeholder="Phone No." required>
				<input type="password" name="password" class="show-pass" id="password" placeholder="Password" required>
				<span class="span"> <i class="fa-solid fa-eye eyes" style="color: #000000;" id="togglePassword"></i>
				</span>
                <a href="{{ url('authorized/google') }}">
                    <div class="logo1">

                        <img src="{{ asset('Login_Assets/image/search.png')}}" height="20px" width="20px">
                        <p class="p">Sign up with Google</p>
                    </div>
                </a>
				<button type="submit">Sign Up</button>
			</form>
		</div>
		<div class="form-container sign-in-container">
			<form action="/login" method="POST">
                @csrf
				<h1>Sign in</h1>
				<input type="email" name="email" id="email" placeholder="Email/Number/Username" required>
				<input type="password" name="password" class="show-pass1" id="password" placeholder="Password"
					required>
				<span class="span"> <i class="fa-solid fa-eye eyes" style="color: #000000;" id="togglePassword1"></i>
				</span>
                        <a href="{{ url('authorized/google') }}">
                            <div class="logo1">

                                <img src="{{ asset('Login_Assets/image/search.png')}}" height="20px" width="20px">
                                <p class="p">Sign up with Google</p>
                            </div>
                        </a>

				<a href="">Forgot your password?</a>
				<button type="submit">Sign In</button>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1>Welcome to our community!</h1>
					<p>"Connect, Share, Explore, Enjoy!"</p>
					<img src="{{ asset('Login_Assets/image/logoin-ff-removebg-preview.png') }}" alt="">
					<button class="ghost" id="signIn">Sign In</button>
				</div>
				<div class="overlay-panel overlay-right">
					<h1>Welcome to our community!</h1>
					<p>Connect, Share, Explore, Enjoy!</p>
					<img src="{{ asset('Login_Assets/image/logoin-ff-removebg-preview.png') }}" alt="">
					<button class="ghost" id="signUp">Sign Up</button>
				</div>
			</div>
		</div>
	</div>
</body>
<script>
	const signUpButton = document.getElementById('signUp');
	const signInButton = document.getElementById('signIn');
	const container = document.getElementById('container');

	signUpButton.addEventListener('click', () => {
		container.classList.add("right-panel-active");
	});

	signInButton.addEventListener('click', () => {
		container.classList.remove("right-panel-active");
	});

	const togglePassword = document.querySelector("#togglePassword");
	const password = document.querySelector("#password");

	togglePassword.addEventListener("click", function () {

		const type = password.getAttribute("type") === "password" ? "text" : "password";
		password.setAttribute("type", type);

		// toggle the icon
		this.classList.toggle("bi-eye");
	});

	const togglePassword1 = document.querySelector("#togglePassword1");
	const password1 = document.querySelector("#password1");

	togglePassword1.addEventListener("click", function () {

		const type = password1.getAttribute("type") === "password" ? "text" : "password";
		password1.setAttribute("type", type);

		// toggle the icon
		this.classList.toggle("bi-eye");
	});
</script>

</html>
