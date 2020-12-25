<x-app-layout>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                {{ Breadcrumbs::render('users') }}
                <div class="p-6 bg-white border-b border-gray-200">
                    Users!
                    <div id="wrapper"></div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        const grid = new gridjs.Grid({
            columns: ['Title', 'Director', 'Producer'],
            server: {
                url: 'https://swapi.dev/api/films/',
                then: data => data.results.map(movie =>
                [movie.title, movie.director, movie.producer]
                )
            }
        }).render(document.getElementById("wrapper"));
    </script>
</x-app-layout>
