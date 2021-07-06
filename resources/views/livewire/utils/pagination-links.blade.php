@if ($paginator->hasPages())
<div class="container-fluid pagination-div">
    <ul class="p-3 flex row justify-content-between">
        @if ($paginator->onFirstPage())
        <li class="d-inline-block rounded px-2 py-1 disable_li">قبلی</li>
        @else
        <li class="pointer d-inline-block rounded shadow-sm bg-white border px-2 py-1" wire:click="previousPage">قبلی</li>
        @endif


        <div class="row justify-content-md-center">
        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page =>$url)
                    @if ($page ==$paginator->currentPage())
                    <li class="d-inline-block mx-2 w-10 px-2 py-1 text-center rounded border shadow-sm alert-success ">{{$page}}</li>
                    @else
                    <li class="d-inline-block mx-2 w-10 px-2 py-1 text-center rounded border shadow-sm pointer" wire:click="gotoPage({{$page}})">{{$page}}</li>
                    @endif
                @endforeach
            @endif
        @endforeach
        </div>


        @if ($paginator->hasMorePages())
        <li class="pointer d-inline-block rounded shadow-sm bg-white border px-2 py-1" wire:click="nextPage">بعدی</li>
        @else
        <li class="d-inline-block rounded disable_li px-2 py-1">بعدی</li>
        @endif
    </ul>
</div>

@endif
