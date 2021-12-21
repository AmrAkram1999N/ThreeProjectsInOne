<x-public-layout>
    <x-slot name="PageName">BT short link</x-slot>
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
              <h2 class="mb-2 mt-4"><span class="text-danger">{{$account->name}}:</span> Short_Link_Service</h2>
              <div class="table-responsive">
                <div>
                    @error('url_request')
                        <small class="text-danger fw-bold" style="font-size: 15px;">
                            {{ $message }}</small>
                    @enderror
                </div>

                <table class="table table-striped custom-table">
                  <thead>
                    <tr>
                        <th>Order</th>
                        <th scope="col">Web_site_name</th>
                        <th scope="col">Url_old</th>
                        <th scope="col">Url_new</th>
                        <th scope="col">Clicks_Number</th>
                        <th scope="col">Editting</th>
                        <th scope="col">Result</th>
                        <th scope="col">Deleting</th>
                        <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($ShortLink as $link)
                    <tr scope="row">
                        <td>{{ $link->id }}</td>
                        <td>{{ $link->web_site_name }}</td>
                        <td>{{ $link->url_old }}</td>
                        <td><a target="_blank" href="{{ route('Redirect_Short_Link', $link->id) }}">{{ $link->url_new }}</a></td>
                        <td> {{ $link->clicks }} </td>
                        <td style="text-align: left">
                            <x-editButton  link="{{ $link->id }}"></x-editButton>
                        </td>
                        <td><a target="_blank" class="btn btn-sm btn-outline-secondary text-success"
                                href="{{ route('Redirect_Short_Link', $link->id) }}">Show</a></td>
                        <td><a  class="btn btn-sm btn-outline-secondary text-danger"
                                href="{{ route('Chain.Account.Auth.deleteShortLink', $link->id) }}">Delete</a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <x-addButton></x-addButton>
              </div>
            </div>
          </div>
      </div>
    </section>
</x-public-layout>
