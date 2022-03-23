<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex sm:justify-end p-2">
                    <a href="{{ route('admin.permissions.index') }}" class="px-4 py-2 bg-green-700 hover:bg-green-500 rounded-md">Permission Index</a>
                </div>
                <div class="flex flex-col ml-4 p-2 bg-slate-100">
                    <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                        <form method="POST" action="{{ route('admin.permissions.update', $permission) }}">
                            @csrf
                            @method('PUT')
                            <div class="sm:col-span-6">
                                <label for="name" class="block text-sm font-medium text-gray-700">Permission Name </label>
                                <div class="mt-1">
                                    <input type="text"
                                           id="name"
                                           name="name"
                                           value="{{$permission->name}}"
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
                <div class="mt-6 p-2 bg-slate-100">
                    <h2 class="font-semibold text-2xl">Roles</h2>
                    <div class="p-2 flex space-x-2 mb-6">
                        @if($permission->roles)
                            @foreach($permission->roles as $permission_role)
                                {{--                                <span>{{$role_permission->name}}</span>--}}
                                <form class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md"
                                      onsubmit="return confirm('Are You Sure...?');"
                                      method="POST"
                                      action="{{ route('admin.permissions.roles.remove', [$permission->id, $permission_role->id]) }} ">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">{{$permission_role->name}}</button>
                                </form>
                            @endforeach
                        @endif
                    </div>
                    <div class="max-w-xl">
                        <form method="POST" action="{{ route('admin.permissions.roles', $permission->id) }}">
                            @csrf
                            <div class="sm:col-span-6">
                                <label for="role" class="block text-sm font-medium text-gray-700">Roles</label>
                                <select
                                    name="role"
                                    id="role"
                                    autocomplete="role-name"
                                    class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                    @foreach($roles as $role)
                                        <option value="{{$role->name}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('name')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
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
