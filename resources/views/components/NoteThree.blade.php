<!-- Click on Modal Button -->
<a class="nav-link" type="button" data-bs-toggle="modal" data-bs-target="#modalForm3">
    {{ $lang }}
</a>

<!-- Modal -->
<div class="modal fade" id="modalForm3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h3 class="modal-title text-white" id="exampleModalLabel">{{ $headerThree }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <h5>{{ $headerFiveOne }}</h5>
                <hr style="height:3px;border:none;color:rgb(2, 2, 2);background-color:rgb(0, 0, 0);" />

                <p>
                    {{ $paragraphOne }}
                </p>
                <h5>{{ $headerFiveTwo }}</h5>
                <ol>
                    <li><span style="color: red;">{{ $olOnefOne }}</span> {{ $olOnepOne }}</li>
                    <li><span style="color: red;">{{ $olOnefTwo }}</span> {{ $olOnepTwo }}</li>
                </ol>
                <h5>{{ $headerFiveThree }}</h5>

                <ol>

                    <li><span style="color: red;">{{ $olTwofOne }}</span> {{ $olTwopOne }}</li>
                    <li><span style="color: red;">{{ $olTwofTwo }}</span> {{ $olTwopTwo }}</li>
                </ol>

                <p>{{ $paragraphTwo }}</p>

                <a target="_blank" href="{{route('controllerModelSystem')}}">{{ $link }}
                </a>

            </div>
        </div>
    </div>
</div>
