<div>
    <div class="col-12 shadow rounded-1 p-4">
        <table class="table text-center align-middle">
            <thead class="text-nowrap">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Created</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="col-12 d-flex justify-content-center">
            {{ $users->links() }}
        </div>
    </div>
</div>
