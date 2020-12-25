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
            sort: {
                multiColumn: false,
                server: {
                    url: (prev, columns) => {
                        if (!columns.length) return prev;

                        const col = columns[0];
                        const dir = col.direction === 1 ? '' : '-'; //asc '': desc '-'
                        let colName = ['name', 'email'][col.index];

                        return prev.includes("search") ? `${prev}&sort=${dir}${colName}` : `${prev}?sort=${dir}${colName}`;
                    }
                }
            },
            search: {
                server: {
                   url: (prev, keyword) => `${prev}?search=${keyword}`
                }
            },
            pagination: {
                limit: 5,
                server: {
                    url: (prev, page, limit) => prev.includes("search") || prev.includes("sort") ? `${prev}&page[size]=${limit}&page[number]=${page+1}` : `${prev}?page[size]=${limit}&page[number]=${page+1}`
                }
            },
            columns: ['Name', 'Email'],
            server: {
                url: "{{ route('api.users.index') }}",
                then: data => data.data.map(user => [user.name, user.email]),
                total: data => data.meta.total
            },
        }).render(document.getElementById("wrapper"));
    </script>
</x-app-layout>
