@section('custom-css')
    <style>
        
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .tradeed-blue{
            color: #1fd6ff;
        }
        .tradeed-red{
            color: #ff6666;
        }
        .tradeed-gray{
            background-color: #2d3542;
        }
        .tradeed-white{
            color: #a6aebb;
        }
        .card.image-full:before {
            opacity: 0;
        }
    </style>      
@endsection
@section('custom-js')
    <script>
        window.addEventListener('hideModal', event => {
        $('#saveCalculationModal').modal('hide');
        })
    </script>     
@endsection

<div>
    <div class="lg:flex">
        <div class="card lg:w-1/2 bg-base-100 shadow-xl">
            <div class="card-body">
                <div class="mb-1">
                    <label for="price" class="block teext-2xl lg:text-4xl size-lg tradeed-blue font-extrabold">Portfolio</label>
                    <div class="relative mt-2 rounded-md shadow-sm">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <span class="text-gray-500 sm:text-sm">$</span>
                        </div>
                        <input wire:model.live.debounce.500ms="mainLoad" type="number" name="price" id="price" class="block bg-gray-700/[.6] w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-500 font-bold ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="0">
                    </div>
                </div>
                <div class="my-1">
                    <label class="block text-2xl size-lg mb-2 tradeed-white font-extrabold">Margin</label>
                    <input type="range" id="size"  min="0" max="100" wire:model.live.debounce.250ms="size" class="range" step="25" />
                    <div class="w-full flex justify-between text-xs px-2">
                        <span>0</span>
                        <span>25</span>
                        <span>50</span>
                        <span>75</span>
                        <span>100</span>
                    </div>
                </div>
                <div class="flex justify-stretch">
                    <div class="my-1 grow">
                        <label for="profit" class="block text-2xl size-lg tradeed-white font-extrabold">TP % :</label>
                        <div class="relative mt-2 rounded-md shadow-sm">
                            <input type="number" name="profit" id="profit" wire:model.live.debounce.250ms="profit" min="0" class="block bg-gray-700/[.6] rounded-md border-0 py-1.5 text-gray-500 font-bold ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="%">
                        </div>
                    </div>
                    <div class="my-1 grow">
                        <label for="profit" class="block text-2xl size-lg tradeed-white font-extrabold">SL -%</label>
                        <div class="relative mt-2 rounded-md shadow-sm">
                            <input type="number" name="profit" id="profit" wire:model.live.debounce.250ms="loss" min="0" class="block bg-gray-700/[.6] rounded-md border-0 py-1.5 text-gray-500 font-bold ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="% -">
                        </div>
                    </div>
                </div>
                <div class="my-1">
                    <label for="positionCount" class="block text-2xl size-lg tradeed-white font-extrabold">Position Count</label>
                    <div class="relative mt-2 rounded-md shadow-sm">
                        <input type="number" name="positionCount" id="positionCount" wire:model.live.debounce.250ms="positionCount" class="block bg-gray-700/[.6] w-full rounded-md border-0 py-1.5 pr-20 text-gray-500 font-bold ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
        
                <div class="grid grid-cols-1 mt-8">
                    <div class="card-actions justify-between ">
                        <button class="btn tradeed-gray" wire:click='calculate()'>HESAPLA</button>
                        @if (!is_null($positions->first()))

                        <!-- Open the modal using ID.showModal() method -->
                            <button class="btn tradeed-gray" onclick="saveCalculationModal.showModal()">KAYDET</button>
                        @endif
                        <button class="btn tradeed-gray" wire:click='resetComponentData()'>SIFIRLA</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card lg:w-1/2 bg-base-100 shadow-xl image-full">
            <figure><img src="{{ url('img/calc-res.png') }}" alt="Tradeed" /></figure>
            <div class="card-body">
                <div class="grid grid-cols-2 tradeed-white leading-7">
                    <span class="font-extrabold text-md">New Portfolio : {{ $positions->count()>0 ? number_format($positions->sum('profit')+$mainLoad, 1, '.', ',')."$" : "" }}</span>
                    <span class="font-extrabold text-md">Margin : %{{ $size }}</span>
                    <span class="font-extrabold text-md">Total PnL Ratio : {{ $positions->count()>0 ? "%" . number_format(100*($positions->sum('profit'))/$mainLoad, 0, '', '') : "" }}</span>
                    <span class="font-extrabold text-md">Total PnL : {{ $positions->count()>0 ? number_format($positions->sum('profit'), 1, '.', ',')."$": "" }}</span>
                    <span class="font-extrabold text-md">Portfolio Change : {{ $positions->count()>0 ? "X". number_format(($positions->sum('profit')+$mainLoad)/$mainLoad, 1, '.', ',') : "" }}</span>
                    <span class="font-extrabold text-md">Stop Lose Waste : {{ $totalSL<0 ? number_format($totalSL, 1, '.', ' '):"" }}</span>
                    <span class="font-extrabold text-md">Strateegy Success Rate : {{ $positions->count()>0 ? '%'. number_format(($profitCount/$positions->count())*100, 1, '.', ','):"" }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-4 gap-4 mt-4">
        @if ($positions->count())
            @foreach ($positions as $positionKey => $positionVal)
                <div class="card {{ $positionVal['tp'] ? 'tradeed-gray':'bg-base-100' }} {{ $editPositionKey===$positionKey ? 'ring-4 ring-inset ring-neutral-400':'' }} text-primary-content" wire:click='editPosition({{ $positionKey }})' >
                    <div class="card-body p-6 pl-0">
                        <div class="flex flex-row">
                            <div class="basis-full lg:px-6 px-2">
                                <h2 class="text-xl lg:text-2xl font-bold align-bottom {{ $positionVal['tp'] ? 'tradeed-blue':' tradeed-red' }}"> <strong class="lg:text-5xl text-2xl">{{ $loop->iteration }}</strong><span class="text-xs font-bold {{ $positionVal['tp'] ? 'tradeed-blue':' tradeed-red' }}">&#9632;</span> Position</h2>
                                <h3 class="text-lg lg:text-xl font-extrabold tradeed-white mt-4"> {{ 'Balance : $ '. number_format($positionVal['newMainLoad'], 1, '.', ' ') }}</h3>
                                <h4 class="text-lg lg:text-xl font-extrabold tradeed-white"> {{ 'PnL : $ '. number_format($positionVal['diffInNumbers'], 1, '.', ' ') }}</h4>
                                <div class="lg:mt-12 mt-6">
                                    {!! $positionVal['tp'] ? '<p class="block text-2xl size-lg tradeed-blue font-black">Profit : %'.$positionVal['positionPersantage'].'</p>':'<p class="block text-2xl size-lg tradeed-red font-black">Loss : %'.$positionVal['positionPersantage'].'</p>' !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>


    <dialog id="saveCalculationModal" class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Save Calculation With Name</h3>
            <input type="text" class="input input-bordered input-info w-full max-w-xs mt-6" wire:model.lazy='name' />
            <div class="modal-action">
                <form method="dialog">
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn" wire:click='saveCollection'>Save</button>
                <button class="btn">Close</button>
                </form>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>Close</button>
        </form>
    </dialog>

</div>

