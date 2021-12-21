<x-public-layout>
    <x-slot name="PageName">BT file manager</x-slot>
    <!-- ======= Breadcrumbs ======= -->
    {{-- <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2></h2>
          <ol>
            <li><a href="index.html"></a></li>
            <li></li>
          </ol>
        </div>

      </div>
    </section> --}}
    <!-- End Breadcrumbs -->

    <section class="inner-page ">
      <div class="container ">
        <div class="content">
            <div class="container">
              <h2 class="mb-2 mt-4"><span class="text-danger">{{$account->name}}:</span> File_Manager_Service</h2>
              <div class="table-responsive text-center">

                @error('folder_name')

                <div class="alert alert-danger alert-dismissible fade show">
                    <strong>Error!</strong> {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @enderror

            <div>
                @error('file_request')
                    <small class="text-danger fw-bold" style="font-size: 15px;">
                        {{ $message }}</small>
                @enderror

            </div>

            <div>
                @error('file_name')
                    <small class="text-danger fw-bold" style="font-size: 15px;">
                        {{ $message }}</small>
                @enderror
            </div>
            @if (Session::has('warning'))
                <div class="alert alert-warning text-black">
                    {{ Session::get('warning') }}
                </div>
            @endif

                <table class="table table-striped custom-table">
                  <thead>
                    <tr>

                        <th><input type="checkbox"></th>
                        <th scope="col">Order</th>
                        <th>Folder_Name</th>
                        <th>Folder_Size</th>
                        <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($Folders as $Folder)
                    <tr scope="row">
                        <td><input type="checkbox"></td>
                        <td>{{ $Folder->id }}</td>
                        <td>
                            <a href="{{ route('Chain.Account.Auth.Open_Folder', $Folder->folder_path) }}"
                                class="ms-1 text-warning" style="text-decoration: none; color:black;">
                                <span data-feather="folder"></span>
                            </a>

                            <a href="{{ route('Chain.Account.Auth.Open_Folder', $Folder->folder_path) }}"
                                class="ms-1" style="text-decoration: none; color:black;">
                                {{ $Folder->folder_name }}
                            </a>

                        </td>
                        <td>
                            <a href="" style="text-decoration: none; color:black; ">{{ $Folder->folder_size }}</a>
                        </td>
                        <td><a href="" style="text-decoration: none; color:black; ">{{ $Folder->created_at }}</a>
                        </td>
                    </tr>
                    @endforeach

                    @foreach ($Files as $File)
                    <tr scope="row">
                        <td><input type="checkbox"></td>
                        <td>{{ $File->id }}</td>
                        <td>
                            <a target="_blank" href="{{$File->file_path_directory}}"
                                class="ms-1 text-warning" style="text-decoration: none; color:black;">
                                <i class="{{$File->icon}}"></i>
                            </a>

                            <a target="_blank" href="{{$File->file_path_directory}}"
                                class="ms-1" style="text-decoration: none; color:black;">
                                {{ $File->file_name }}
                            </a>

                        </td>
                        <td>
                            <a href="" style="text-decoration: none; color:black; ">{{ $File->file_size }}</a>
                        </td>
                        <td><a href="" style="text-decoration: none; color:black; ">{{ $File->created_at }}</a>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>

                <x-Upload_Button path="{{ $Root }}"></x-Upload_Button>

                <x-Create_Button folder="{{ $Root }}"></x-Create_Button>

              </div>
            </div>
          </div>
      </div>
    </section>
</x-public-layout>
