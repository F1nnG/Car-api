<div class="mt-8 mb-20 p-4 bg-gray-800 rounded-lg">
	<h1 class="text-white text-lg font-semibold">Delete Account</h1>
	<p class="mt-1 text-gray-200 text-sm">Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.</p>
	<form action="{{ route('profile.destroy', $user->id) }}" method="POST">
		@csrf
		@method('DELETE')
		<button type="submit" class="mt-4 px-6 py-2 bg-red-600 text-white text-base rounded-lg hover:bg-red-500 transistion-all ease-in duration-75">Delete Account</button>
	</form>
</div>