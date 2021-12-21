<x-public-layout>
    <x-slot name="PageName">BT account dashboard</x-slot>

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
              <h2 class="mb-2 mt-4">Your Services</h2>
              <div class="table-responsive">
                @if (Session::has('warning'))
                <div class="alert alert-warning text-black">
                    {{ Session::get('warning') }}
                </div>
                @endif
                <table class="table table-striped custom-table">
                  <thead>
                    <tr>
                      <th scope="col">Order</th>
                      <th scope="col">Name_Service</th>
                      <th scope="col">Your_boss</th>
                      <th scope="col">Enter_The_Work</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($AccountServices as $Service)
                    <tr scope="row">
                        <td>{{ $Service->id }}</td>
                        <td>{{ $Service->name_service }}</td>
                        <td>{{ $Service->User->name }}</td>
                        <td><a class="btn btn-sm btn-outline-secondary text-success" href="{{ route('Chain.Account.Auth.'. $Service->name_service) }}">Enter</a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
      </div>
    </section>
</x-public-layout>
