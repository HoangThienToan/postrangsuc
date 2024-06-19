<div class=" box @if(!empty($class)) {{$class}} @else box-solid @endif" id="accordion5">
  <div class="box-header with-border" style="cursor: pointer;">
    <h3 class="box-title">
      <a data-toggle="collapse" data-parent="#accordion5" href="#collapseFilter5">
        @if(!empty($icon)) {!! $icon !!} @endif {{$title ?? ''}}
      </a>
    </h3>
  </div>
  @php
  if(isMobile()) {
  $closed = true;
  }
  @endphp
  <div id="collapseFilter5" class="panel-collapse active collapse @if(!empty($closed)) in @endif" aria-expanded="true">
    <div class="box-body">
      {{$slot}}
    </div>
  </div>
</div>