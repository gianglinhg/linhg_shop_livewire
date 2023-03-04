<div>
  @push('styles')
  <style>
    .pagination li a {
      cursor: pointer;
    }
  </style>
  @endpush
  @if ($paginator->hasPages())
  <nav class="pagination__nav right clearfix">
    @if ($paginator->onFirstPage())
    <a href="#" class="pagination__page disabled"><i class="ui-arrow-left"></i></a>
    @else
    <a wire:click='previousPage' class="pagination__page">
      <i class="ui-arrow-left"></i>
    </a>
    @endif
    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
    {{-- Array Of Links --}}
    @if (is_array($element))
    @foreach ($element as $page => $url)
    @if ($page == $paginator->currentPage())
    <a href="#" class="pagination__page pagination__page--current" style="color: white">{{ $page }}</a>
    @else
    <a href="#" class="pagination__page" wire:click="gotoPage({{ $page }})">{{ $page }}</a>
    @endif
    @endforeach
    @endif
    @endforeach
    {{-- @endif --}}
    @if ($paginator->hasMorePages())
    <a wire:click='nextPage' class="pagination__page">
      <i class="ui-arrow-right"></i>
    </a>
    @else
    <a href="#" class="pagination__page disabled"><i class="ui-arrow-right"></i></a>
    @endif
  </nav>
  @endif
</div>

{{-- <a href="#" class="pagination__page"><i class="ui-arrow-left"></i></a>
<span class="pagination__page pagination__page--current">1</span>
<a href="#" class="pagination__page">2</a>
<a href="#" class="pagination__page">3</a>
<a href="#" class="pagination__page">4</a>
<a href="#" class="pagination__page"><i class="ui-arrow-right"></i></a> --}}