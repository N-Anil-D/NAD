
@section('custom-js')
    @script
    <script>
        $wire.on('hideModal', () => {
            document.getElementById('importModal').close();

        });
        
        </script>
    @endscript
    @endsection

<div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
    {{-- <a
        href="https://laravel.com/docs"
        id="docs-card"
        class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
    >
        <div id="screenshot-container" class="relative flex w-full flex-1 items-stretch">
            <img
                src="https://laravel.com/assets/img/welcome/docs-light.svg"
                alt="Laravel documentation screenshot"
                class="aspect-video h-full w-full flex-1 rounded-[10px] object-top object-cover drop-shadow-[0px_4px_34px_rgba(0,0,0,0.06)] dark:hidden"
                onerror="
                    document.getElementById('screenshot-container').classList.add('!hidden');
                    document.getElementById('docs-card').classList.add('!row-span-1');
                    document.getElementById('docs-card-content').classList.add('!flex-row');
                    document.getElementById('background').classList.add('!hidden');
                "
            />
            <img
                src="https://laravel.com/assets/img/welcome/docs-dark.svg"
                alt="Laravel documentation screenshot"
                class="hidden aspect-video h-full w-full flex-1 rounded-[10px] object-top object-cover drop-shadow-[0px_4px_34px_rgba(0,0,0,0.25)] dark:block"
            />
            <div
                class="absolute -bottom-16 -left-16 h-40 w-[calc(100%+8rem)] bg-gradient-to-b from-transparent via-white to-white dark:via-zinc-900 dark:to-zinc-900"
            ></div>
        </div>

        <div class="relative flex items-center gap-6 lg:items-end">
            <div id="docs-card-content" class="flex items-start gap-6 lg:flex-col">
                <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
                    <svg class="size-5 sm:size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><path fill="#FF2D20" d="M23 4a1 1 0 0 0-1.447-.894L12.224 7.77a.5.5 0 0 1-.448 0L2.447 3.106A1 1 0 0 0 1 4v13.382a1.99 1.99 0 0 0 1.105 1.79l9.448 4.728c.14.065.293.1.447.1.154-.005.306-.04.447-.105l9.453-4.724a1.99 1.99 0 0 0 1.1-1.789V4ZM3 6.023a.25.25 0 0 1 .362-.223l7.5 3.75a.251.251 0 0 1 .138.223v11.2a.25.25 0 0 1-.362.224l-7.5-3.75a.25.25 0 0 1-.138-.22V6.023Zm18 11.2a.25.25 0 0 1-.138.224l-7.5 3.75a.249.249 0 0 1-.329-.099.249.249 0 0 1-.033-.12V9.772a.251.251 0 0 1 .138-.224l7.5-3.75a.25.25 0 0 1 .362.224v11.2Z"/><path fill="#FF2D20" d="m3.55 1.893 8 4.048a1.008 1.008 0 0 0 .9 0l8-4.048a1 1 0 0 0-.9-1.785l-7.322 3.706a.506.506 0 0 1-.452 0L4.454.108a1 1 0 0 0-.9 1.785H3.55Z"/></svg>
                </div>

                <div class="pt-3 sm:pt-5 lg:pt-0">
                    <h2 class="text-xl font-semibold text-black dark:text-white">Documentation</h2>

                    <p class="mt-4 text-sm/relaxed">
                        Laravel has wonderful documentation covering every aspect of the framework. Whether you are a newcomer or have prior experience with Laravel, we recommend reading our documentation from beginning to end.
                    </p>
                </div>
            </div>

            <svg class="size-6 shrink-0 stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/></svg>
        </div>
    </a> --}}

    <a
        href="#"
        title="excel-import-export"
        class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
    >
        <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
            {{-- <svg class="size-5 sm:size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><g fill="#FF2D20"><path d="M24 8.25a.5.5 0 0 0-.5-.5H.5a.5.5 0 0 0-.5.5v12a2.5 2.5 0 0 0 2.5 2.5h19a2.5 2.5 0 0 0 2.5-2.5v-12Zm-7.765 5.868a1.221 1.221 0 0 1 0 2.264l-6.626 2.776A1.153 1.153 0 0 1 8 18.123v-5.746a1.151 1.151 0 0 1 1.609-1.035l6.626 2.776ZM19.564 1.677a.25.25 0 0 0-.177-.427H15.6a.106.106 0 0 0-.072.03l-4.54 4.543a.25.25 0 0 0 .177.427h3.783c.027 0 .054-.01.073-.03l4.543-4.543ZM22.071 1.318a.047.047 0 0 0-.045.013l-4.492 4.492a.249.249 0 0 0 .038.385.25.25 0 0 0 .14.042h5.784a.5.5 0 0 0 .5-.5v-2a2.5 2.5 0 0 0-1.925-2.432ZM13.014 1.677a.25.25 0 0 0-.178-.427H9.101a.106.106 0 0 0-.073.03l-4.54 4.543a.25.25 0 0 0 .177.427H8.4a.106.106 0 0 0 .073-.03l4.54-4.543ZM6.513 1.677a.25.25 0 0 0-.177-.427H2.5A2.5 2.5 0 0 0 0 3.75v2a.5.5 0 0 0 .5.5h1.4a.106.106 0 0 0 .073-.03l4.54-4.543Z"/></g></svg> --}}
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="size-8 fill-red-500 stroke-[#FF2D20]" viewBox="0 0 50 50">
                <path d="M 28.875 0 C 28.855469 0.0078125 28.832031 0.0195313 28.8125 0.03125 L 0.8125 5.34375 C 0.335938 5.433594 -0.0078125 5.855469 0 6.34375 L 0 43.65625 C -0.0078125 44.144531 0.335938 44.566406 0.8125 44.65625 L 28.8125 49.96875 C 29.101563 50.023438 29.402344 49.949219 29.632813 49.761719 C 29.859375 49.574219 29.996094 49.296875 30 49 L 30 44 L 47 44 C 48.09375 44 49 43.09375 49 42 L 49 8 C 49 6.90625 48.09375 6 47 6 L 30 6 L 30 1 C 30.003906 0.710938 29.878906 0.4375 29.664063 0.246094 C 29.449219 0.0546875 29.160156 -0.0351563 28.875 0 Z M 28 2.1875 L 28 6.53125 C 27.867188 6.808594 27.867188 7.128906 28 7.40625 L 28 42.8125 C 27.972656 42.945313 27.972656 43.085938 28 43.21875 L 28 47.8125 L 2 42.84375 L 2 7.15625 Z M 30 8 L 47 8 L 47 42 L 30 42 L 30 37 L 34 37 L 34 35 L 30 35 L 30 29 L 34 29 L 34 27 L 30 27 L 30 22 L 34 22 L 34 20 L 30 20 L 30 15 L 34 15 L 34 13 L 30 13 Z M 36 13 L 36 15 L 44 15 L 44 13 Z M 6.6875 15.6875 L 12.15625 25.03125 L 6.1875 34.375 L 11.1875 34.375 L 14.4375 28.34375 C 14.664063 27.761719 14.8125 27.316406 14.875 27.03125 L 14.90625 27.03125 C 15.035156 27.640625 15.160156 28.054688 15.28125 28.28125 L 18.53125 34.375 L 23.5 34.375 L 17.75 24.9375 L 23.34375 15.6875 L 18.65625 15.6875 L 15.6875 21.21875 C 15.402344 21.941406 15.199219 22.511719 15.09375 22.875 L 15.0625 22.875 C 14.898438 22.265625 14.710938 21.722656 14.5 21.28125 L 11.8125 15.6875 Z M 36 20 L 36 22 L 44 22 L 44 20 Z M 36 27 L 36 29 L 44 29 L 44 27 Z M 36 35 L 36 37 L 44 37 L 44 35 Z"></path>
            </svg>
        </div>

        <div class="pt-3 sm:pt-5">
            <h2 class="text-xl font-semibold text-black dark:text-white">Import Your Own Excel File To Export</h2>

            <p class="mt-4 text-sm/relaxed">
                I am using Laravel-Excel extension. Laravel-Excel extension is able do import and export datas via excel file. Create your own data from example excel file than import it. You will be able to download your date from export. <br>
                <u><b>Datas will be reset in every import.</b></u>
            </p>
            <div class="grid grid-flow-col justify-around mt-2">
                <button class="btn btn-outline" wire:click="exampleImportFileDownload()">Download Example Excel</button>
                <button class="btn btn-outline btn-accent" onclick="importModal.showModal()">Import</button>
                <button class="btn btn-outline btn-primary" wire:click="exportExampleExcelFile()">Export</button>
            </div>
        </div>
    </a>

    <a
        href="https://github.com/barryvdh/laravel-debugbar"
        title="barryvdh/laravel-debugbar"
        rel="nofollow" target="_blank"
        class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
    >
        <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 shrink-0 self-center stroke-[#FF2D20]">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 1 1-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 0 0 4.486-6.336l-3.276 3.277a3.004 3.004 0 0 1-2.25-2.25l3.276-3.276a4.5 4.5 0 0 0-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437 1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008Z" />
              </svg>
        </div>

        <div class="pt-3 sm:pt-5">
            <h2 class="text-xl font-semibold text-black dark:text-white">Laravel Debugbar (barryvdh/laravel-debugbar)</h2>

            <p class="mt-4 text-sm/relaxed">
                This is a package to integrate PHP Debug Bar with Laravel. It includes a ServiceProvider to register the debugbar and attach it to the output. You can publish assets and configure it through Laravel.
                It bootstraps some Collectors to work with Laravel and implements a couple custom DataCollectors, specific for Laravel.
                It is configured to display Redirects and (jQuery) Ajax Requests. (Shown in a dropdown) Read the documentation for more configuration options.
            </p>
        </div>

        <svg class="size-6 shrink-0 self-center stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/></svg>
    </a>

    <div class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
        <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 shrink-0 self-center stroke-[#FF2D20]">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0M3.124 7.5A8.969 8.969 0 0 1 5.292 3m13.416 0a8.969 8.969 0 0 1 2.168 4.5" />
              </svg>
        </div>

        <div class="pt-3 sm:pt-5">
            
            <h2 class="text-xl font-semibold text-black dark:text-white">Laravel Sweet Alert 2 (jantinnerezo/livewire-alert)</h2>

            <p>Livewire Alert is a simple alert utility package designed to seamlessly integrate with your Livewire components. Under the hood, it utilizes SweetAlert2, offering you the functionality of SweetAlert2 without the need for any custom Javascript.</p>
            <button class="btn btn-outline btn-secondary" wire:click="runSweetAlert('question')" style="margin-right: 8px;margin-bottom: 8px;">Question Alert</button>
            <button class="btn btn-outline btn-info" wire:click="runSweetAlert('info')" style="margin-right: 8px;margin-bottom: 8px;">Info Alert</button>
            <button class="btn btn-outline btn-success" wire:click="runSweetAlert('success')" style="margin-right: 8px;margin-bottom: 8px;">Success Alert</button>
            <button class="btn btn-outline btn-warning" wire:click="runSweetAlert('warning')" style="margin-right: 8px;margin-bottom: 8px;">Warning Alert</button>
            <button class="btn btn-outline btn-error" wire:click="runSweetAlert('error')" style="margin-right: 8px;margin-bottom: 8px;">Error Alert</button>
        </div>
        <a 
        href="https://github.com/jantinnerezo/livewire-alert"
        title="barryvdh/laravel-debugbar"
        rel="nofollow" target="_blank"
        >
        </a>
        <svg class="size-6 shrink-0 self-center stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/></svg>

    </div>


    {{-- https://developer.mozilla.org/en-US/docs/Web/HTML/Element/dialog#technical_summary <dialog> TAG INFO--}}
        
    {{-- https://developer.mozilla.org/en-US/docs/Web/HTML/Element/dialog#technical_summary <dialog> TAG INFO--}}
        
    {{-- https://developer.mozilla.org/en-US/docs/Web/HTML/Element/dialog#technical_summary <dialog> TAG INFO--}}
    <dialog id="importModal" class="modal modal-middle" wire:ignore>
        <div class="modal-box">
            <h3 class="font-bold text-lg">Import Excel</h3>
            <div class="flex flex-col my-6">
                <form wire:submit.prevent="importExampleExcelFile()">
                    <div class="grid grid-flow-row auto-rows-max lg:mt-6 mt-2">
                        <input class="file-input file-input-bordered file-input-success w-full" type="file" wire:model="exampleExcelFile">
                        @error('exampleExcelFile') <span class="error">{{ $message }}</span> @enderror
                        <div class="mt-3">
                            <button class="btn btn-outline btn-accent w-full" type="submit">Import</button>
                        </div>
                    </div>
                </form>
                <div class="flex justify-start modal-action mt-2">
                    <form method="dialog" style="width: 100%">
                        <!-- if there is a button in form, it will close the modal -->
                        {{-- <button class="btn">Close</button> --}}
                        <button class="btn btn-outline px-5 w-full">Close</button>
                    </form>
                </div>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button></button>
        </form>
    </dialog>

</div>
