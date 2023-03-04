<div>
  @push('styles')
  <style>
    .pagination li a {
      cursor: pointer;
    }
  </style>
  @endpush
  @if ($paginator->hasPages())
  <ul class="pagination pagination-split">
    @if ($paginator->onFirstPage())
      <li class="disabled">
        <a><i class="fa fa-angle-left"></i></a>
      </li>
    @else
      <li>
        <a wire:click='previousPage'>
          <i class="fa fa-angle-left"></i>
        </a>
      </li>
    @endif
    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
      {{-- Array Of Links --}}
      @if (is_array($element))
        @foreach ($element as $page => $url)
          @if ($page == $paginator->currentPage())
            <li class="page-item active d-none d-md-block">
              <a class="page-link">{{ $page }}</a>
            </li>
          @else
            <li class="page-item d-none d-md-block">
              <a class="page-link" wire:click="gotoPage({{ $page }})">{{ $page }}</a>
            </li>
          @endif
        @endforeach
      @endif
    @endforeach
    {{-- @endif --}}
    @if ($paginator->hasMorePages())
    <li>
      <a wire:click='nextPage'>
        <i class="fa fa-angle-right"></i>
      </a>
    </li>
    @else
    <li class="disabled">
      <a>
        <i class="fa fa-angle-right"></i>
      </a>
    </li>
    @endif
  </ul>
  @endif
</div>