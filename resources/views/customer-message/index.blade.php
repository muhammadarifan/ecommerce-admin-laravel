<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Customer Message') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if (count($customerMessages) == 0)
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="text-center">
                            <h3 class="text-lg font-semibold leading-tight text-gray-800">
                                {{ __('No customer messages found.') }}
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @foreach ($customerMessages as $key => $customerMessage)
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <p class="text-sm font-medium leading-5 text-gray-900">
                                    {{ $customerMessage->name }}
                                </p>
                                <p class="text-sm leading-5 text-gray-500">
                                    {{ $customerMessage->email }}
                                </p>
                                <p class="text-sm leading-5 text-gray-500">
                                    {{ $customerMessage->phone }}
                                </p>
                            </div>
                            <div class="flex-shrink-0">
                                <div class="flex">
                                    <a href="#"
                                        class="flex items-center justify-center ml-3 text-sm leading-5 text-gray-500 hover:text-red-800"
                                        onclick="setModalState('deleteModal{{$key}}', true)">
                                        <ion-icon name="trash-outline" class="text-xl"></ion-icon>
                                        <span class="ml-3">Delete</span>
                                    </a>
                                    <div class="absolute top-0 left-0 z-40 flex items-center justify-center invisible w-full h-screen transition duration-500 ease-in-out opacity-0"
                                        id="deleteModal{{$key}}">
                                        <div class="absolute top-0 flex items-center justify-center w-full h-screen bg-gray-500 opacity-50"
                                            onclick="setModalState('deleteModal{{$key}}', false)">
                                        </div>
                                        <div class="z-50 p-8 bg-white rounded-lg shadow-lg">
                                            <div class="flex flex-col items-center">
                                                <div class="flex-1 space-y-6">
                                                    <div class="flex items-start justify-start gap-3">
                                                        <ion-icon name="warning-outline" class="text-red-800"></ion-icon>
                                                        <h3 class="text-base font-semibold leading-tight text-gray-900">
                                                            {{ __('Delete Confirmation') }}
                                                        </h3>
                                                    </div>
                                                    <p class="text-sm leading-5 text-gray-500">
                                                        {{ __('Are you sure you want to delete this customer message?') }}
                                                    </p>
                                                    <div class="flex justify-end gap-3 mt-3">
                                                        <button class="px-3 py-2 text-sm text-gray-800 uppercase transition-all ease-in-out bg-gray-300 rounded-lg hover:bg-gray-500 hover:text-white focus:ring-2 ring-0 ring-gray-800 ring-offset-2" onclick="setModalState('deleteModal{{$key}}', false)">Cancel</button>
                                                        <form method="POST" action="{{route('customer-message-delete')}}">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{$customerMessage->id}}">
                                                            <button type="submit" class="px-3 py-2 text-sm text-white uppercase transition-all ease-in-out bg-red-600 rounded-lg hover:bg-red-800 hover:text-white focus:ring-2 ring-0 ring-red-800 ring-offset-2">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="#"
                                        class="flex items-center justify-center ml-3 text-sm leading-5 text-gray-500 hover:text-green-800">
                                        <ion-icon name="logo-whatsapp" class="text-xl"></ion-icon>
                                        <span class="ml-3">Replay Whatsapp</span>
                                    </a>
                                    <a href="#"
                                        class="flex items-center justify-center ml-3 text-sm leading-5 text-gray-500 hover:text-blue-800">
                                        <ion-icon name="mail-outline" class="text-xl"></ion-icon>
                                        <span class="ml-3">Replay Email</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <p class="mt-6 text-sm font-semibold leading-5 text-gray-900">
                            {{ __('Message') }}
                        </p>
                        <div class="text-sm leading-5 text-gray-900">
                            {{ $customerMessage->message }}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <x-slot name="script">
        <script>
            const setModalState = (idModal, state) => {
                const modal = document.getElementById(idModal);
                if (state) {
                    modal.classList.add('opacity-100', 'visible');
                    modal.classList.remove('opacity-0', 'invisible');
                } else {
                    modal.classList.add('opacity-0');
                    modal.classList.remove('opacity-100');
                    setTimeout(() => {
                        modal.classList.add('invisible');
                        modal.classList.remove('visible');
                    }, 500);
                }
            };
        </script>
    </x-slot>
</x-app-layout>
