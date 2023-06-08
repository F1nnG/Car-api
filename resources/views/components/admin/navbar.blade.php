<button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm rounded-lg sm:hidden focus:outline-none focus:ring-2 text-gray-400 hover:bg-gray-700 focus:ring-gray-600">
	<span class="sr-only">Open sidebar</span>
	<svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
		<path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
	</svg>
</button>

<aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidenav">
	<div class="overflow-y-auto py-5 px-3 h-full border-r bg-gray-800 border-gray-700">
		<ul class="space-y-2">
			<li>
				<a href="{{ route('home') }}" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-gray-700 group">
						<svg class="w-6 h-6 transition duration-75 text-gray-400 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
							<path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z"></path>
							<path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z"></path>
						</svg>
						<span class="ml-3">Home</span>
				</a>
			</li>
			<li>
				<a href="{{ route('admin.requests') }}" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-gray-700 group">
					<svg class="w-6 h-6 transition duration-75 text-gray-400 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
						<path d="M5.507 4.048A3 3 0 017.785 3h8.43a3 3 0 012.278 1.048l1.722 2.008A4.533 4.533 0 0019.5 6h-15c-.243 0-.482.02-.715.056l1.722-2.008z"></path>
						<path clip-rule="evenodd" fill-rule="evenodd" d="M1.5 10.5a3 3 0 013-3h15a3 3 0 110 6h-15a3 3 0 01-3-3zm15 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm2.25.75a.75.75 0 100-1.5.75.75 0 000 1.5zM4.5 15a3 3 0 100 6h15a3 3 0 100-6h-15zm11.25 3.75a.75.75 0 100-1.5.75.75 0 000 1.5zM19.5 18a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"></path>
					  </svg>
					<span class="ml-3">Api Requests</span>
				</a>
			</li>
		</ul>
		<ul class="pt-5 mt-5 space-y-2 border-t border-gray-700">
			<li>
				<a href="{{ route('admin.cars') }}" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-gray-700 group">
					<svg class="w-6 h-6 transition duration-75 text-gray-400 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
						<path clip-rule="evenodd" fill-rule="evenodd" d="M11.622 1.602a.75.75 0 01.756 0l2.25 1.313a.75.75 0 01-.756 1.295L12 3.118 10.128 4.21a.75.75 0 11-.756-1.295l2.25-1.313zM5.898 5.81a.75.75 0 01-.27 1.025l-1.14.665 1.14.665a.75.75 0 11-.756 1.295L3.75 8.806v.944a.75.75 0 01-1.5 0V7.5a.75.75 0 01.372-.648l2.25-1.312a.75.75 0 011.026.27zm12.204 0a.75.75 0 011.026-.27l2.25 1.312a.75.75 0 01.372.648v2.25a.75.75 0 01-1.5 0v-.944l-1.122.654a.75.75 0 11-.756-1.295l1.14-.665-1.14-.665a.75.75 0 01-.27-1.025zm-9 5.25a.75.75 0 011.026-.27L12 11.882l1.872-1.092a.75.75 0 11.756 1.295l-1.878 1.096V15a.75.75 0 01-1.5 0v-1.82l-1.878-1.095a.75.75 0 01-.27-1.025zM3 13.5a.75.75 0 01.75.75v1.82l1.878 1.095a.75.75 0 11-.756 1.295l-2.25-1.312a.75.75 0 01-.372-.648v-2.25A.75.75 0 013 13.5zm18 0a.75.75 0 01.75.75v2.25a.75.75 0 01-.372.648l-2.25 1.312a.75.75 0 11-.756-1.295l1.878-1.096V14.25a.75.75 0 01.75-.75zm-9 5.25a.75.75 0 01.75.75v.944l1.122-.654a.75.75 0 11.756 1.295l-2.25 1.313a.75.75 0 01-.756 0l-2.25-1.313a.75.75 0 11.756-1.295l1.122.654V19.5a.75.75 0 01.75-.75z"></path>
					</svg>
					<span class="ml-3">Cars</span>
				</a>
			</li>
			<li>
				<a href="{{ route('admin.brands') }}" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-gray-700 group">
					<svg class="w-6 h-6 transition duration-75 text-gray-400 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
						<path clip-rule="evenodd" fill-rule="evenodd" d="M11.622 1.602a.75.75 0 01.756 0l2.25 1.313a.75.75 0 01-.756 1.295L12 3.118 10.128 4.21a.75.75 0 11-.756-1.295l2.25-1.313zM5.898 5.81a.75.75 0 01-.27 1.025l-1.14.665 1.14.665a.75.75 0 11-.756 1.295L3.75 8.806v.944a.75.75 0 01-1.5 0V7.5a.75.75 0 01.372-.648l2.25-1.312a.75.75 0 011.026.27zm12.204 0a.75.75 0 011.026-.27l2.25 1.312a.75.75 0 01.372.648v2.25a.75.75 0 01-1.5 0v-.944l-1.122.654a.75.75 0 11-.756-1.295l1.14-.665-1.14-.665a.75.75 0 01-.27-1.025zm-9 5.25a.75.75 0 011.026-.27L12 11.882l1.872-1.092a.75.75 0 11.756 1.295l-1.878 1.096V15a.75.75 0 01-1.5 0v-1.82l-1.878-1.095a.75.75 0 01-.27-1.025zM3 13.5a.75.75 0 01.75.75v1.82l1.878 1.095a.75.75 0 11-.756 1.295l-2.25-1.312a.75.75 0 01-.372-.648v-2.25A.75.75 0 013 13.5zm18 0a.75.75 0 01.75.75v2.25a.75.75 0 01-.372.648l-2.25 1.312a.75.75 0 11-.756-1.295l1.878-1.096V14.25a.75.75 0 01.75-.75zm-9 5.25a.75.75 0 01.75.75v.944l1.122-.654a.75.75 0 11.756 1.295l-2.25 1.313a.75.75 0 01-.756 0l-2.25-1.313a.75.75 0 11.756-1.295l1.122.654V19.5a.75.75 0 01.75-.75z"></path>
					</svg>
					<span class="ml-3">Brands</span>
				</a>
			</li>
		</ul>
	</div>
</aside>