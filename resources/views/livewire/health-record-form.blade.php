<div>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form wire:submit="save">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- 身長 -->
                            <div>
                                <label for="height" class="block text-sm font-medium text-gray-700">身長 (cm)</label>
                                <input type="number" step="0.1" wire:model="height" id="height" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @error('height') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- 体重 -->
                            <div>
                                <label for="weight" class="block text-sm font-medium text-gray-700">体重 (kg)</label>
                                <input type="number" step="0.1" wire:model="weight" id="weight" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @error('weight') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- 視力（裸眼） -->
                            <div>
                                <label for="visionLeftUncorrected" class="block text-sm font-medium text-gray-700">裸眼視力（左）</label>
                                <input type="number" step="0.1" wire:model="visionLeftUncorrected" id="visionLeftUncorrected" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @error('visionLeftUncorrected') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="visionRightUncorrected" class="block text-sm font-medium text-gray-700">裸眼視力（右）</label>
                                <input type="number" step="0.1" wire:model="visionRightUncorrected" id="visionRightUncorrected" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @error('visionRightUncorrected') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- 視力（矯正） -->
                            <div>
                                <label for="visionLeftCorrected" class="block text-sm font-medium text-gray-700">矯正視力（左）</label>
                                <input type="number" step="0.1" wire:model="visionLeftCorrected" id="visionLeftCorrected" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @error('visionLeftCorrected') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="visionRightCorrected" class="block text-sm font-medium text-gray-700">矯正視力（右）</label>
                                <input type="number" step="0.1" wire:model="visionRightCorrected" id="visionRightCorrected" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @error('visionRightCorrected') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- 聴力検査 -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">聴力検査</label>
                                <div class="mt-2">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" wire:model="hearingTest" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        <span class="ml-2">要検査</span>
                                    </label>
                                </div>
                                @error('hearingTest') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- 歯科検診 -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">歯科検診</label>
                                <div class="mt-2">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" wire:model="dentalExam" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        <span class="ml-2">虫歯あり</span>
                                    </label>
                                </div>
                                @error('dentalExam') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- 検査日 -->
                            <div>
                                <label for="recordedDate" class="block text-sm font-medium text-gray-700">検査日</label>
                                <input type="date" wire:model="recordedDate" id="recordedDate" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @error('recordedDate') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end space-x-3">
                            <button type="button" onclick="window.history.back()" class="bg-gray-200 py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                キャンセル
                            </button>
                            <button type="submit" class="bg-indigo-600 py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                保存
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
