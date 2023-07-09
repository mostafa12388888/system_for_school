<div>
  <div class="card card-statistics mb-30">
    <div class="card-body">
        <h5 class="card-title">{{$data[$count]->title}}</h5>
        @foreach(preg_split('/(-)/',$data[$count]->answers) as $index=>$anser)
<div class="custom-control custom-radio">
    <input type="radio" id="Custom{{$index}}"  name="CustomRadio" wire:click="nextQuestion('{{$data[$count]->id}}','{{$data[$count]->score}}','{{$anser}}','{{$data[$count]->right_answer}}')">
    <label for="Custom{{$index}}"class='cutom-control-label' >{{$anser}}</label>
</div>
        @endforeach
    </div>

  </div>
</div>
