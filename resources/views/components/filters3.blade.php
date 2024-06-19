<div class="box @if(!empty($class)) {{$class}} @else box-solid @endif" id="accordion3">
  <div class="box-header with-border" style="cursor: pointer;">
    <h3 class="box-title">
      <a data-toggle="collapse" data-parent="#accordion3" href="#collapseFilter3">
        @if(!empty($icon)) {!! $icon !!} @endif {{$title ?? ''}}
      </a>
    </h3>
  </div>
  @php
    if(isMobile()) {
      $closed = true;
    }
  @endphp
  <div id="collapseFilter3" class="panel-collapse active collapse @if(!empty($closed)) in @endif" aria-expanded="true">
    <div class="box-body">
      {{$slot}}
    </div>
  </div>
</div>