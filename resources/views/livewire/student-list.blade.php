<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">生徒一覧</h1>

    <!-- 検索フィルター -->
    <div class="mb-6 space-y-4 sm:space-y-0 sm:flex sm:space-x-4">
        <div class="flex-1">
            <input type="text" wire:model.live="search" placeholder="生徒名で検索" 
                class="w-full px-4 py-2 border rounded-lg">
        </div>
        <div class="sm:w-48">
            <select wire:model.live="grade" class="w-full px-4 py-2 border rounded-lg">
                <option value="">学年を選択</option>
                @foreach($grades as $g)
                    <option value="{{ $g }}">{{ $g }}年</option>
                @endforeach
            </select>
        </div>
        <div class="sm:w-48">
            <select wire:model.live="class" class="w-full px-4 py-2 border rounded-lg">
                <option value="">クラスを選択</option>
                @foreach($classes as $c)
                    <option value="{{ $c }}">{{ $c }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- 生徒リスト -->
    <div class="bg-white shadow overflow-hidden rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        名前
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        学年
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        クラス
                    </th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                        操作
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($students as $student)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $student->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $student->grade }}年</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $student->class }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <button wire:click="deleteStudent({{ $student->id }})" class="text-red-600 hover:text-red-900">
                                削除
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- ページネーション -->
    <div class="mt-4">
        {{ $students->links() }}
    </div>
</div>
