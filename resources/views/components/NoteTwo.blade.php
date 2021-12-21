<!-- Click on Modal Button -->
<a class="nav-link" type="button" data-bs-toggle="modal" data-bs-target="#modalForm2">
    {{ $lang }}
 </a>

 <!-- Modal -->
 <div class="modal fade" id="modalForm2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header bg-success">
                 <h3 class="modal-title" id="exampleModalLabel">{{ $headerThree }}</h3>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                <h5>{{ $headerFive }}</h5>
                <hr style="height:3px;border:none;color:rgb(2, 2, 2);background-color:rgb(0, 0, 0);" />
                <p>{{ $paragraphOne }}  </p>

               <hr style="height:3px;border:none;color:rgb(158, 1, 1);background-color:rgb(167, 4, 4);" />
               <hr style="height:3px;border:none;color:rgb(158, 1, 1);background-color:rgb(167, 4, 4);" />
               <p> {{ $paragraphTwo }} </p>

               <a target="_blank" href="{{ route('interfaceSystem') }}">{{ $link}}
               </a>
            </div>
         </div>
     </div>
 </div>
