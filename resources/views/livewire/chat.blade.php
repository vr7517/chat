<div class=" mx-auto p-4 sm:p-0 space-y-4  min-h-screen">
    <div class="text-center">
        <h2 class="text-2xl font-semibold text-center">Mavask AI v 1.0</h2>
        <span>Welcome How can i help you ?</span>
    </div>
    <!-- Chat messages -->
    <!-- Chat messages -->
    <div id="chatContainer" class="min-h-[35rem] overflow-y-auto scrollbar-hide rounded-lg  dark:bg-zinc-800 shadow">
        @foreach ($messages as $msg)
            <div class="flex mb-4 {{ $msg['sender'] === 'user' ? 'justify-end' : 'justify-start' }}">
                <div class="flex items-start space-x-3 max-w-[80%]  overflow-y-auto scrollbar-hide">
                    {{-- @if ($msg['sender'] === 'ai')
                        <div
                            class="flex-shrink-0 w-8 h-8 bg-green-600 rounded-full flex items-center justify-center text-sm font-bold">
                            AI
                        </div>
                    @endif --}}

                    <div class="p-3 rounded-xl whitespace-pre-wrap overflow-y-auto scrollbar-hide">
                        {{ $msg['text'] }}
                    </div>
                    {{-- 
                    @if ($msg['sender'] === 'user')
                        <div
                            class="flex-shrink-0 w-8 h-8 bg-gray-600 text-white rounded-full flex items-center justify-center text-sm font-bold">
                            U
                        </div>
                    @endif --}}
                </div>
            </div>
        @endforeach
    </div>


    <!-- Chat input -->
    <form wire:submit.prevent="send" class="flex items-center justify-center space-x-2 mt-4">
        <div class="relative group w-full flex justify-center items-center gap-2 px-4">
            <input wire:model="input" type="text"
                class=" bg-transparent  pb-2 focus:outline-none  placeholder-gray-200 text-lg"
                placeholder="Describe your aim here...">
            <div class="absolute bottom-0 flex space-x-4 w-1/4 ">
                <span
                    class="absolute left-1 bottom-[-5px] w-3 h-3 rotate-320 border-r-2 border-b-2 border-green-500 opacity-0 group-focus-within:opacity-100  transition-transform duration-500 group-focus-within:scale-x-100"></span>
                <span
                    class="absolute left-3 bottom-[-5px] w-3 h-3 rotate-320 border-r-2 border-b-2 border-green-500 opacity-0 group-focus-within:opacity-100  transition-transform duration-500 group-focus-within:scale-x-100"></span>
                <span
                    class="absolute left-2 bottom-[-5px] w-3 h-3 rotate-320 border-r-2 border-b-2 border-green-500 opacity-0 group-focus-within:opacity-100  transition-transform duration-500 group-focus-within:scale-x-100"></span>

            </div>
            <span
                class="absolute bottom-0 w-1/5  h-[2px] bg-gradient-to-r from-gray-50 to-black transform scale-x-0 origin-left transition-transform duration-500 group-focus-within:scale-x-100"></span>
            <div  class="text-gray-400 text-lg pb-2">send</div>
        </div>

    </form>

    <script>
        window.addEventListener('scroll-bottom', () => {
            const el = document.getElementById('chatContainer');
            if (el) el.scrollTop = el.scrollHeight;
        });
    </script>

</div>
