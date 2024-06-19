<div class="box @if(!empty($class)) {{$class}} @else box-solid @endif" id="accordion2">
  <div class="box-header with-border" style="cursor: pointer;">
    <h3 class="box-title">
      <a data-toggle="collapse" data-parent="#accordion2" href="#collapseFilter2" aria-expanded="true" class="collapsed">
        @if(!empty($icon)) {!! $icon !!} @endif {{$title ?? ''}}
      </a>
    </h3>
  </div>
  @php
  if(isMobile()) {
  $closed = true;
  }
  @endphp
  <div id="collapseFilter2" class="panel-collapse active collapse @if(empty($closed)) in @endif" aria-expanded="true">
    <div class="box-body">
      {{$slot}}
    </div>
  </div>
</div>