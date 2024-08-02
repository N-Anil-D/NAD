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
<div>
    <div>
      <table class="table table-auto">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>positionCount</th>
            <th>Result</th>
            <th>Create Date</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($positionList as $positionListRow)
          <tr wire:click="setPositionData({{ $positionListRow->id }})" class="hover:bg-slate-600">
            <td>{{ $positionListRow->id }}</td>
            <td>{{ $positionListRow->name }}</td>
            <td>{{ $positionListRow->positionCount }}</td>
            <td>{{ $positionListRow->result }}</td>
            <td>{{ $positionListRow->created_at->format('Y-m-d H:i') }}</td>
            <td>
              <div class="badge badge-primary badge-outline gap-1" wire:click='edit({{ $positionListRow->id }},"up")'>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-4 h-4 stroke-current" stroke-width="1.5" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 10.5 12 3m0 0 7.5 7.5M12 3v18" /></svg>
                Up
              </div>  
              <div class="badge badge-secondary badge-outline gap-1" wire:click='edit({{ $positionListRow->id }},"down")'>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-4 h-4 stroke-current" stroke-width="1.5" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5 12 21m0 0-7.5-7.5M12 21V3" /></svg>
                Down
              </div>  
              <div class="badge badge-error gap-1" wire:click='edit({{ $positionListRow->id }},"delete")'>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-4 h-4 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                Delete
              </div>  
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    @if ($position->count())
      <div class="h-16 bg-white dark:bg-gray-900"></div>
    @endif

    <div class="grid grid-cols-1 mt-4">
        @if ($position->count())
          <div class="grid grid-cols-1 tradeed-white leading-7 px-4 lg:px-12">
            <h2 class="font-extrabold text-lg">SUMMARY</h2>
            <span class="font-extrabold text-md">Margin : {{ $position->count()>0 ? "%" . $record->margin : "" }}</span>
            <span class="font-extrabold text-md">New Portfolio : {{ $position->count()>0 ? number_format($position->last()->new_main_load, 1, '.', ',')."$" : "" }}</span>
            <span class="font-extrabold text-md">Total PnL Ratio : {{ $position->count()>0 ? "%" . number_format(100*($position->sum('profit')/($position->first()->new_main_load - $position->first()->profit)), 0, '', '') : "" }}</span>
            <span class="font-extrabold text-md">Total PnL : {{ $position->count()>0 ? number_format($position->sum('profit'), 1, '.', ',')."$": "" }}</span>
            <span class="font-extrabold text-md">Portfolio Change : {{ $position->count()>0 ? "X". number_format(($position->sum('profit')+($position->first()->new_main_load - $position->first()->profit))/($position->first()->new_main_load - $position->first()->profit), 2, '.', ',') : "" }}</span>
          </div>
        @endif
    </div>
    {{-- @if ($position->count())
      <div class="h-16 bg-white dark:bg-gray-900"></div>
    @endif --}}
    <div class="grid grid-cols-4 gap-4 mt-4">
      @if ($position->count())
        @foreach ($position as $positionKey => $positionVal)
            <div class="card tradeed-gray {{ $editPositionKey===$positionKey ? 'ring-4 ring-inset ring-neutral-400':'' }} text-primary-content">
                <div class="card-body p-6 pl-0">
                    <div class="flex flex-row">
                        <div class="basis-full lg:px-6 px-2">
                            <h2 class="text-xl lg:text-2xl font-bold align-bottom {{ $positionVal->tp ? 'tradeed-blue':' tradeed-red' }}"> <strong class="lg:text-5xl text-2xl">{{ $loop->iteration }}</strong><span class="text-xs font-bold tradeed-bulue">&#9632;</span> Position</h2>
                            <h3 class="text-lg lg:text-xl font-extrabold tradeed-white mt-4"> {{ 'Balance : '. number_format($positionVal->new_main_load, 1, '.', ' ') }}</h3>
                            <h4 class="text-lg lg:text-xl font-extrabold tradeed-white"> {{ 'PnL : '. number_format($positionVal->diff_in_numbers, 1, '.', ' ') }}</h4>
                            <div class="lg:mt-12 mt-6">
                                {!! $positionVal->tp ? '<p class="block text-2xl size-lg tradeed-blue font-black">Profit : %'.$positionVal->position_persantage.'</p>':'<p class="block text-2xl size-lg tradeed-red font-black">Loss : %'.$positionVal->position_persantage.'</p>' !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
      @endif
    </div>

    <dialog id="my_modal_5" class="modal modal-bottom sm:modal-middle">
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
