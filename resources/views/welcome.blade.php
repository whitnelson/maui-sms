<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport"
		content="width=device-width, initial-scale=1">

	<title>MauiSMS</title>

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"
		rel="stylesheet">

	<!-- Scripts -->
	<link rel="stylesheet"
		href="{{ asset('css/app.css') }}">
	<script src="{{ asset('js/app.js') }}"
		defer></script>
</head>

<body class="antialiased">
	<div class="relative flex items-top justify-center min-h-screen bg-gray-900 sm:items-center py-4 sm:pt-0">
		@if (Route::has('login'))
			<div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
				@auth
					<a href="{{ url('/dashboard') }}"
						class="text-sm text-gray-500 underline">Dashboard</a>
				@else
					<a href="{{ route('login') }}"
						class="text-sm text-gray-500 underline">Log in</a>
				@endauth
			</div>
		@endif

		<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
			<div class=" justify-center pt-8 sm:justify-start sm:pt-0">
				<h1 class="text-2xl text-gray-700 font-bold">MauiSMS</h1><br />
				<div class="text-gray-300">Send an SMS to 808-501-1060</div>
				<br /><br />
				<div class="text-gray-200">
					The format is as follows:<br />
					(keep each item on a separate line)
				</div><br /><br />
				<div class="text-gray-200"> Contact Name<br />
					Contact Phone Number<br />
					Address<br />
					Condition<br />
					Notes<br />
				</div>
				<br /><br />
				<a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none "
					href="sms:+18085011060?&body=NAME%0aPHONE%0aADDRESS%0aCONDITION%0aNOTES">SEND SMS</a>

			</div>
		</div>
</body>

</html>
