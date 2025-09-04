<div>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form wire:submit="save">
                        <div class="grid grid-cols-1 gap-6">
                            <!-- 生徒名 -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">生徒名</label>
                                <input type="text" wire:model="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- 学年 -->
                            <div>
                                <label for="grade" class="block text-sm font-medium text-gray-700">学年</label>
                                <select wire:model="grade" id="grade" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @foreach($grades as $g)
                                        <option value="{{ $g }}">{{ $g }}年</option>
                                    @endforeach
                                </select>
                                @error('grade') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- クラス -->
                            <div>
                                <label for="class" class="block text-sm font-medium text-gray-700">クラス</label>
                                <select wire:model="class" id="class" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @foreach($classes as $c)
                                        <option value="{{ $c }}">{{ $c }}</option>
                                    @endforeach
                                </select>
                                @error('class') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div class="flex justify-end space-x-3">
                                <button type="button" onclick="window.history.back()" class="bg-gray-200 py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                    キャンセル
                                </button>
                                <button type="submit" class="bg-indigo-600 py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    保存
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
