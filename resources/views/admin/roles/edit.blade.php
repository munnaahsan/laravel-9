<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex sm:justify-end p-2">
                    <a href="{{ route('admin.roles.index') }}" class="px-4 py-2 bg-green-700 hover:bg-green-500 rounded-md">Role Index</a>
                </div>
                <div class="flex flex-col ml-4">
                    <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                        <form method="POST" action="{{ route('admin.roles.update', $role) }}">
                            @csrf
                            @method('PUT')
                            <div class="sm:col-span-6">
                                <label for="name" class="block text-sm font-medium text-gray-700"> Role Name </label>
                                <div class="mt-1">
                                    <input type="text"
                                           id="name"
                                           name="name"
                                           value="{{$role->name}}"
                                           class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                </div>
                                @error('name') <span class="error text-red-400 text-sm mt-2">{{ $message }}</span> @enderror
                            </div>
                            <div class="sm:col-span-6 pt-5">
                                <button type="submit" class="px-4 py-2 bg-green-400 rounded-md hover:bg-green-600">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="mt-6 p-2">
                    <h2 class="font-semibold text-2xl">Role Permission</h2>
                    <div class="p-2 flex space-x-2 mb-6">
                        @if($role->permissions)
                            @foreach($role->permissions as $role_permission)
{{--                                <span>{{$role_permission->name}}</span>--}}
                                <form class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md"
                                      onsubmit="return confirm('Are You Sure...?');"
                                      method="POST"
                                      action="{{ route('admin.roles.permissions.revoke', [$role->id, $role_permission->id]) }} ">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">{{$role_permission->name}}</button>
                                </form>
                            @endforeach
                        @endif
                    </div>
                    <div class="max-w-xl">
                        <form method="POST" action="{{ route('admin.roles.permissions', $role->id) }}">
                            @csrf
                            <div class="sm:col-span-6">
                                <label for="permission" class="block text-sm font-medium text-gray-700">Permission</label>
                                <select
                                    name="permission"
                                    id="permission"
                                    autocomplete="permission-name"
                                    class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                    @foreach($permissions as $permission)
                                        <option value="{{$permission->name}}">{{$permission->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="sm:col-span-6 pt-5">
                                <button type="submit" class="px-4 py-2 bg-green-400 rounded-md hover:bg-green-600">Assign</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
