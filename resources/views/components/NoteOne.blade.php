<!-- Click on Modal Button -->
<a class="nav-link" type="button" data-bs-toggle="modal" data-bs-target="#modalForm1">
    {{ $lang }}
 </a>

 <!-- Modal -->
 <div class="modal fade" id="modalForm1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header bg-danger">
                 <h3 class="modal-title " id="exampleModalLabel">{{ $headerThree }}</h3>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <h5>{{ $headerFive }}</h5>
                 <hr style="height:3px;border:none;color:rgb(2, 2, 2);background-color:rgb(0, 0, 0);" />
                 <p>{{ $paragraphOne }}
                </p>
                <hr style="height:3px;border:none;color:rgb(158, 1, 1);background-color:rgb(167, 4, 4);" />

                <ol>
                    <li>{{$liOne }}</li>
                    <li>{{$liTwo }}</li>
                    <li>{{$liThree }}</li>
                    <li>{{$liFour }}</li>
                </ol>
                <hr style="height:3px;border:none;color:rgb(158, 1, 1);background-color:rgb(167, 4, 4);" />
                <p>
                    {{ $paragraphTwo }}                </p>
                <a target="_blank" href="{{ route('databaseSystem') }}">{{ $link }}
                </a>
             </div>
         </div>
     </div>
 </div>
